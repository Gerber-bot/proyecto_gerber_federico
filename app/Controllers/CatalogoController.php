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

        // Configurar consulta base
        $productoModel->where('productos.estado', 1);

        // Aplicar filtros
        if (!empty($filtros['marca_id'])) {
            $productoModel->where('marca_id', $filtros['marca_id']);
        }
        if (!empty($filtros['anio'])) {
            $productoModel->where('anio', $filtros['anio']);
        }
        if (!empty($filtros['transmision'])) {
            $productoModel->where('transmision', $filtros['transmision']);
        }

        // Ordenamiento
        switch ($filtros['orden']) {
            case 'precio_asc':
                $productoModel->orderBy('precio_base', 'ASC');
                break;
            case 'precio_desc':
                $productoModel->orderBy('precio_base', 'DESC');
                break;
            case 'recientes':
                $productoModel->orderBy('anio', 'DESC');
                break;
            case 'antiguos':
                $productoModel->orderBy('anio', 'ASC');
                break;
            default:
                $productoModel->orderBy('id', 'DESC');
        }

        // Obtener datos para filtros
        $data = [
            'productos' => $productoModel->paginate($perPage),
            'pager' => $productoModel->pager,
            'filtros' => $filtros,
            'marcas_disponibles' => $marcaModel->where('estado', 1)->findAll(),
            'anios' => $productoModel->select('anio')->distinct()->orderBy('anio', 'DESC')->findAll(),
            'transmisiones' => $productoModel->select('transmision')->distinct()->findAll()
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
            'marca_id' => 'required|numeric', // Cambiado de 'marca' a 'marca_id'
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio_base' => 'required|decimal',
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

        // Datos completos para guardar (actualizado para marca_id)
        $data = [
            'marca_id' => $this->request->getPost('marca_id'), // Usamos marca_id en lugar de marca
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
            'stock' => $this->request->getPost('stock'),
        ];

        // Combinar con imágenes
        $data = array_merge($data, $imagenes);

        // Guardar en BD
        $productoModel = new ProductoModel();

        try {
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

        $data = [
            'carrito' => session()->get('carrito') ?? [],
            'compras_historicas' => $db->table('transacciones_maestro')
                ->where('usuario_id', session()->get('id'))
                ->orderBy('fecha_creacion', 'DESC')
                ->get()
                ->getResultArray()
        ];

        return view('back/compras/compras', $data);
    }

    public function actualizar_carrito()
    {
        $carrito = [];
        $productos = $this->request->getPost('productos');

        foreach ($productos as $producto_id => $cantidad) {
            if ($cantidad > 0) {
                $productoModel = new ProductoModel();
                $producto = $productoModel->find($producto_id);

                if ($producto && $producto['stock'] >= $cantidad) {
                    $carrito[$producto_id] = [
                        'id' => $producto['id'],
                        'nombre' => $producto['nombre'],
                        'precio' => $producto['precio_base'],
                        'cantidad' => $cantidad,
                        'imagen' => $producto['img_principal']
                    ];
                }
            }
        }

        session()->set('carrito', $carrito);
        return redirect()->to('compras')->with('success', 'Carrito actualizado');
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
                'fecha_creacion' => date('Y-m-d H:i:s')
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
    public function editar_stock($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $productoModel = new ProductoModel();
        $data['producto'] = $productoModel->find($id);

        if (!$data['producto']) {
            return redirect()->to('catalogo_admin')->with('error', 'Producto no encontrado');
        }

        return view('catalogo/editar_stock', $data);
    }

    public function actualizar_stock($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        $rules = [
            'stock' => 'required|integer|greater_than_equal_to[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nuevoStock = $this->request->getPost('stock');
        $productoModel = new ProductoModel();
        $productoModel->update($id, ['stock' => $nuevoStock]);

        return redirect()->to('catalogo_admin')->with('msg', 'Stock actualizado correctamente');
    }
    public function detalle_compra($transaccion_id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        $db = \Config\Database::connect();

        // 1. Verificar que la compra pertenezca al usuario logueado
        $compra = $db->table('transacciones_maestro')
            ->where('id', $transaccion_id)
            ->where('usuario_id', session()->get('id'))
            ->get()
            ->getRowArray();

        if (!$compra) {
            return redirect()->to('compras')->with('error', 'Compra no encontrada');
        }

        // 2. Obtener productos de esta transacción
        $productos = $db->table('transacciones_detalle td')
            ->select('td.*, p.nombre, p.img_principal')
            ->join('productos p', 'td.producto_id = p.id')
            ->where('td.transaccion_id', $transaccion_id)
            ->get()
            ->getResultArray();

        // 3. Pasar datos a la vista
        return view('back/compras/detalle_compra', [
            'titulo' => 'Detalle de Compra #' . $transaccion_id,
            'compra' => $compra,
            'productos' => $productos
        ]);
    }

}