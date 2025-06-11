<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;
use App\Models\MarcaModel;

class CatalogoController extends BaseController
{
    // Método para mostrar el catálogo principal
    public function catalogo()
    {
        // Cargar modelos
        $productoModel = new ProductoModel();
        $marcaModel = new MarcaModel();

        // Configurar paginación
        $perPage = 6;

        // Obtener filtros
        $filtros = [
            'marca_id' => $this->request->getGet('marca_id'),
            'anio' => $this->request->getGet('anio'),
            'transmision' => $this->request->getGet('transmision'),
            'orden' => $this->request->getGet('orden') ?? 'recientes'
        ];

        // Obtener búsqueda
        $busqueda = $this->request->getGet('search');

        // Configurar consulta base con JOIN a marcas
        $productoModel->select('productos.*, marcas.nombre as marca_nombre')
            ->join('marcas', 'marcas.id = productos.marca_id')
            ->where('productos.estado', 1);

        // Aplicar filtros
        if (!empty($filtros['marca_id'])) {
            $productoModel->where('productos.marca_id', $filtros['marca_id']);
        }
        if (!empty($filtros['anio'])) {
            $productoModel->where('productos.anio', $filtros['anio']);
        }
        if (!empty($filtros['transmision'])) {
            $productoModel->where('productos.transmision', $filtros['transmision']);
        }

        // Aplicar búsqueda textual (modificado para trabajar con el JOIN)
        if (!empty($busqueda)) {
            $productoModel->groupStart()
                ->like('productos.nombre', $busqueda)
                ->orLike('marcas.nombre', $busqueda)
                ->orLike('productos.descripcion', $busqueda)
                ->groupEnd();
        }

        // Ordenamiento
        switch ($filtros['orden']) {
            case 'precio_asc':
                $productoModel->orderBy('productos.precio_base', 'ASC');
                break;
            case 'precio_desc':
                $productoModel->orderBy('productos.precio_base', 'DESC');
                break;
            case 'recientes':
                $productoModel->orderBy('productos.anio', 'DESC');
                break;
            case 'antiguos':
                $productoModel->orderBy('productos.anio', 'ASC');
                break;
            default:
                $productoModel->orderBy('productos.id', 'DESC');
        }

        // Obtener datos para filtros
        $data = [
            'productos' => $productoModel->paginate($perPage),
            'pager' => $productoModel->pager,
            'filtros' => $filtros,
            'marcas_disponibles' => $marcaModel->where('estado', 1)->findAll(),
            'anios' => $productoModel->select('productos.anio')->distinct()->orderBy('anio', 'DESC')->findAll(),
            'transmisiones' => $productoModel->select('productos.transmision')->distinct()->findAll()
        ];

        // Cargar vista
        return view('catalogo/catalogo', $data);
    }

    // Método para mostrar formulario de agregar producto
    public function agregar()
    {
        $marcaModel = new MarcaModel();
        $data['marcas'] = $marcaModel->where('estado', 1)
            ->orderBy('nombre', 'ASC')
            ->findAll();

        return view('catalogo/agregar', $data);
    }

    // Método para procesar el guardado
    public function guardar()
    {
        // Validación actualizada para usar marca_id
        $rules = [
            'marca_id' => 'required|numeric',
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio_base' => 'required|decimal',
            'stock' => 'required|integer', // Añadir validación para stock
            'img_principal' => 'uploaded[img_principal]|max_size[img_principal,2048]|is_image[img_principal]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Procesar imágenes (se mantiene igual)
        $imagenes = [];
        $camposImagen = [
            'img_principal',
            'img_exterior',
            'img_interior1',
            'img_interior2',
            'img_baul',
            'img_motor',
            'img_neumaticos'
        ];

        foreach ($camposImagen as $campo) {
            $file = $this->request->getFile($campo);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/catalogo/productos', $newName);
                $imagenes[$campo] = $newName;
            }
        }

        // Datos completos para guardar
        $data = [
            'marca_id' => $this->request->getPost('marca_id'),
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'anio' => $this->request->getPost('anio'),
            'kilometros' => $this->request->getPost('kilometros'),
            'motor' => $this->request->getPost('motor'),
            'potencia' => $this->request->getPost('potencia'),
            'transmision' => $this->request->getPost('transmision'),
            'consumo' => $this->request->getPost('consumo'),
            'tanque' => $this->request->getPost('tanque'),
            'velocidad_maxima' => $this->request->getPost('velocidad_maxima'),
            'pantalla_tactil' => $this->request->getPost('pantalla_tactil'),
            'diseno_exterior' => $this->request->getPost('diseno_exterior'),
            'diseno_interior' => $this->request->getPost('diseno_interior'),
            'tamano_baul' => $this->request->getPost('tamano_baul'),
            'motor_info' => $this->request->getPost('motor_info'),
            'neumaticos' => $this->request->getPost('neumaticos'),
            'caracteristicas_adicionales' => $this->request->getPost('caracteristicas_adicionales'),
            'accesorios' => $this->request->getPost('accesorios'),
            'precio_base' => $this->request->getPost('precio_base'),
            'stock' => $this->request->getPost('stock') ?? 0, // Valor por defecto si no se proporciona
            'estado' => 1 // Por defecto activo
        ];

        // Combinar con imágenes
        $data = array_merge($data, $imagenes);

        // Guardar en BD
        $productoModel = new ProductoModel();

        try {
            // Debug: mostrar datos antes de insertar
            // dd($data);

            $productoModel->insert($data);
            return redirect()->to('catalogo')->with('success', 'Vehículo agregado correctamente');
        } catch (\Exception $e) {
            // Eliminar imágenes subidas si hubo error
            foreach ($imagenes as $imagen) {
                if (file_exists(FCPATH . 'assets/img/catalogo/productos/' . $imagen)) {
                    unlink(FCPATH . 'assets/img/catalogo/productos/' . $imagen);
                }
            }
            return redirect()->back()->withInput()->with('error', 'Error al guardar: ' . $e->getMessage());
        }
    }
    public function vehiculo($id)
    {
        try {
            $productoModel = new ProductoModel();

            // Simple find first to verify product exists
            $vehiculo = $productoModel->find($id);

            if (!$vehiculo) {
                throw new \Exception('Vehículo no encontrado');
            }

            // If you need marca info, join with marcas table
            $vehiculo = $productoModel->select('productos.*, marcas.nombre as marca_nombre')
                ->join('marcas', 'marcas.id = productos.marca_id')
                ->where('productos.id', $id)
                ->first();

            if (!$vehiculo) {
                throw new \Exception('Vehículo no encontrado');
            }

            return view('catalogo/vehiculo', ['vehiculo' => $vehiculo]);

        } catch (\Exception $e) {
            log_message('error', 'Error al cargar vehículo: ' . $e->getMessage());
            return redirect()->to('catalogo')->with('error', $e->getMessage());
        }
    }


    public function catalogo_admin()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->getWithMarca();

        // Transformar los datos
        $productos = array_map(function ($producto) {
            $producto['marca'] = $producto['marca_nombre'];
            return $producto;
        }, $productos);

        $data = [
            'productos' => $productos,
            'titulo' => 'Gestión de Vehículos'
        ];

        return view('catalogo/catalogo_admin', $data);
    }

    public function deshabilitar($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $productoModel = new ProductoModel();
        $productoModel->update($id, ['estado' => 0]);

        return redirect()->route('catalogo_admin')->with('msg', 'Vehículo deshabilitado correctamente');
    }

    public function habilitar($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $productoModel = new ProductoModel();
        $productoModel->update($id, ['estado' => 1]);

        return redirect()->route('catalogo_admin')->with('msg', 'Vehículo habilitado correctamente');
    }
    public function editar_precio($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $productoModel = new ProductoModel();
        $data['producto'] = $productoModel->find($id);

        if (!$data['producto']) {
            return redirect()->to('catalogo/catalogo_admin')->with('error', 'Producto no encontrado');
        }

        return view('catalogo/editar_precio', $data);
    }

    public function actualizar_precio($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $nuevoPrecio = $this->request->getPost('precio_base');
        $productoModel = new ProductoModel();
        $productoModel->update($id, ['precio_base' => $nuevoPrecio]);

        return redirect()->route('catalogo_admin')->with('msg', 'Precio actualizado correctamente');
    }

    public function editar($id)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        $marcaModel = new MarcaModel();
        $data = [
            'producto' => $producto,
            'marcas' => $marcaModel->where('estado', 1)
                ->orderBy('nombre', 'ASC')
                ->findAll()
        ];

        return view('catalogo/editar', $data);
    }


    public function actualizar($id)
    {
        $productoModel = new ProductoModel();
        $data = $this->request->getPost();

        // Procesar imágenes si se subieron nuevas
        $imagenes = [];
        $camposImagen = [
            'img_principal',
            'img_exterior',
            'img_interior1',
            'img_interior2',
            'img_baul',
            'img_motor',
            'img_neumaticos'
        ];

        foreach ($camposImagen as $campo) {
            $file = $this->request->getFile($campo);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/catalogo/productos', $newName);
                $imagenes[$campo] = $newName;

                // Eliminar imagen anterior si existe
                $producto = $productoModel->find($id);
                if (!empty($producto[$campo])) {
                    $oldImage = FCPATH . 'assets/img/catalogo/productos/' . $producto[$campo];
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
            } else {
                // Mantener la imagen actual si no se subió una nueva
                $imagenActual = $this->request->getPost($campo . '_actual');
                if ($imagenActual) {
                    $imagenes[$campo] = $imagenActual;
                }
            }
        }

        // Combinar datos del formulario con las nuevas imágenes
        $data = array_merge($data, $imagenes);

        // Actualizar producto
        $productoModel->update($id, $data);

        return redirect()->to('catalogo_admin')->with('success', 'Producto actualizado');
    }
    // Métodos para el carrito de compras
    public function agregar_al_carrito($producto_id)
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($producto_id);

        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Verificar stock
        if ($producto['stock'] < 1) {
            return redirect()->back()->with('error', 'No hay stock disponible');
        }

        $session = session();
        $carrito = $session->get('carrito') ?? [];

        // Si el producto ya está en el carrito, aumentar cantidad
        if (isset($carrito[$producto_id])) {
            $carrito[$producto_id]['cantidad'] += 1;
        } else {
            $carrito[$producto_id] = [
                'id' => $producto['id'],
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio_base'],
                'cantidad' => 1,
                'imagen' => $producto['img_principal']
            ];
        }

        $session->set('carrito', $carrito);
        return redirect()->to('compras')->with('success', 'Producto agregado al carrito');
    }

    // Método para mostrar BOTH carrito activo e historial
    public function ver_carrito()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión');
        }

        $db = \Config\Database::connect();

        // Obtener transacciones con detalles
        $compras_historicas = $db->table('transacciones_maestro')
            ->select('transacciones_maestro.*, 
                GROUP_CONCAT(transacciones_detalle.producto_id) as productos_ids,
                GROUP_CONCAT(transacciones_detalle.cantidad) as cantidades,
                GROUP_CONCAT(transacciones_detalle.precio_unitario) as precios')
            ->join('transacciones_detalle', 'transacciones_detalle.transaccion_id = transacciones_maestro.id')
            ->where('transacciones_maestro.usuario_id', session()->get('id'))
            ->groupBy('transacciones_maestro.id')
            ->orderBy('transacciones_maestro.fecha_creacion', 'DESC')
            ->get()
            ->getResultArray();

        // Obtener información completa de los productos para cada transacción
        foreach ($compras_historicas as &$compra) {
            $productos_ids = explode(',', $compra['productos_ids']);
            $cantidades = explode(',', $compra['cantidades']);
            $precios = explode(',', $compra['precios']);

            $compra['productos'] = [];
            foreach ($productos_ids as $index => $producto_id) {
                $producto = $db->table('productos')
                    ->where('id', $producto_id)
                    ->get()
                    ->getRowArray();

                if ($producto) {
                    $compra['productos'][] = [
                        'id' => $producto_id,
                        'nombre' => $producto['nombre'],
                        'imagen' => $producto['img_principal'],
                        'cantidad' => $cantidades[$index],
                        'precio_unitario' => $precios[$index],
                        'subtotal' => $cantidades[$index] * $precios[$index]
                    ];
                }
            }
        }

        $data = [
            'carrito' => session()->get('carrito') ?? [],
            'compras_historicas' => $compras_historicas
        ];

        return view('back/compras/compras', $data);
    }

    public function actualizar_carrito()
    {
        $carrito = [];
        $productos = $this->request->getPost('productos');
        $errores = []; // Para almacenar productos con stock insuficiente

        foreach ($productos as $producto_id => $cantidad) {
            if ($cantidad > 0) {
                $productoModel = new ProductoModel();
                $producto = $productoModel->find($producto_id);

                if ($producto) {
                    if ($producto['stock'] >= $cantidad) {
                        // Agregar al carrito si hay stock suficiente
                        $carrito[$producto_id] = [
                            'id' => $producto['id'],
                            'nombre' => $producto['nombre'],
                            'precio' => $producto['precio_base'],
                            'cantidad' => $cantidad,
                            'imagen' => $producto['img_principal']
                        ];
                    } else {
                        // Registrar error de stock insuficiente
                        $errores[] = [
                            'nombre' => $producto['nombre'],
                            'stock_disponible' => $producto['stock'],
                            'cantidad_solicitada' => $cantidad
                        ];
                    }
                }
            }
        }

        // Guardar el carrito en sesión (solo productos con stock válido)
        session()->set('carrito', $carrito);

        // Manejar mensajes de éxito/error
        if (!empty($errores)) {
            $mensajeError = "Stock insuficiente para: ";
            foreach ($errores as $error) {
                $mensajeError .= sprintf(
                    "%s (Stock: %d, Pedido: %d), ",
                    $error['nombre'],
                    $error['stock_disponible'],
                    $error['cantidad_solicitada']
                );
            }
            return redirect()->to('compras')->with('error', rtrim($mensajeError, ', '));
        }

        return redirect()->to('compras')->with('success', 'Carrito actualizado correctamente');
    }

    public function eliminar_del_carrito($producto_id)
    {
        $carrito = session()->get('carrito') ?? [];

        if (isset($carrito[$producto_id])) {
            unset($carrito[$producto_id]);
            session()->set('carrito', $carrito);
            return redirect()->to('compras')->with('success', 'Producto eliminado del carrito');
        }

        return redirect()->to('compras')->with('error', 'Producto no encontrado en el carrito');
    }

    public function finalizar_compra()
    {
        // 1. Validar sesión
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión');
        }

        // 2. Validar carrito no vacío
        $carrito = session()->get('carrito') ?? [];
        if (empty($carrito)) {
            return redirect()->to('compras')->with('error', 'El carrito está vacío');
        }

        $db = \Config\Database::connect();
        $db->transStart(); // Iniciar transacción

        try {
            // 3. Calcular total
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }

            // 4. Guardar cabecera de transacción
            $db->table('transacciones_maestro')->insert([
                'usuario_id' => session()->get('id'),
                'total' => $total,
                'estado' => 'completada',
                'fecha_creacion' => (new \DateTime('now', new \DateTimeZone('America/Argentina/Buenos_Aires')))->format('Y-m-d H:i:s')
            ]);
            $transaccionId = $db->insertID();

            // 5. Procesar cada producto
            foreach ($carrito as $item) {
                // Validar stock
                $producto = $db->table('productos')
                    ->where('id', $item['id'])
                    ->get()
                    ->getRow();

                if (!$producto || $producto->stock < $item['cantidad']) {
                    throw new \Exception("No hay stock para: {$item['nombre']}");
                }

                // Guardar detalle
                $db->table('transacciones_detalle')->insert([
                    'transaccion_id' => $transaccionId,
                    'producto_id' => $item['id'],
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['precio'],
                    'subtotal' => $item['precio'] * $item['cantidad']
                ]);

                // Actualizar stock
                $db->table('productos')
                    ->where('id', $item['id'])
                    ->set('stock', 'stock - ' . $item['cantidad'], false)
                    ->update();
            }

            $db->transComplete(); // Confirmar transacción
            session()->remove('carrito'); // Limpiar carrito
            return redirect()->to('compras')->with('success', '¡Compra exitosa!');

        } catch (\Exception $e) {
            $db->transRollback(); // Revertir cambios
            return redirect()->to('compras')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    // Muestra el formulario para editar el stock de un vehículo
    public function editar_stock($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $productoModel = new ProductoModel();
        $producto = $productoModel->select('productos.*, marcas.nombre as marca_nombre')
            ->join('marcas', 'marcas.id = productos.marca_id')
            ->where('productos.id', $id)
            ->first();

        if (!$producto) {
            return redirect()->route('catalogo_admin')->with('error', 'Vehículo no encontrado');
        }

        // Rename marca_nombre to marca for view compatibility
        $producto['marca'] = $producto['marca_nombre'];

        return view('catalogo/editar_stock', ['producto' => $producto]);
    }

    // Procesa la actualización del stock
    public function actualizar_stock($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $rules = [
            'stock' => 'required|integer|greater_than_equal_to[0]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $productoModel = new ProductoModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            return redirect()->route('catalogo_admin')->with('error', 'Producto no encontrado');
        }

        $productoModel->update($id, ['stock' => (int) $this->request->getPost('stock')]);

        return redirect()->route('catalogo_admin')->with('msg', 'Stock actualizado correctamente');
    }

    public function detalle_compra($transaccion_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        $db = \Config\Database::connect();

        // Verificar que la compra pertenezca al usuario logueado
        $compra = $db->table('transacciones_maestro')
            ->where('id', $transaccion_id)
            ->where('usuario_id', session()->get('id'))
            ->get()
            ->getRowArray();

        if (!$compra) {
            return redirect()->to('compras')->with('error', 'Compra no encontrada');
        }

        // Obtener productos de esta transacción con más detalles
        $productos = $db->table('transacciones_detalle td')
            ->select('td.*, p.nombre, p.img_principal, p.descripcion, p.marca_id, m.nombre as marca_nombre')
            ->join('productos p', 'td.producto_id = p.id')
            ->join('marcas m', 'm.id = p.marca_id')
            ->where('td.transaccion_id', $transaccion_id)
            ->get()
            ->getResultArray();

        return view('back/compras/detalle_compra', [
            'titulo' => 'Detalle de Compra #' . $transaccion_id,
            'compra' => $compra,
            'productos' => $productos
        ]);
    }
}