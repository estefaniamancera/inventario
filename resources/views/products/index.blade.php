<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
    

    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f4f7f6; }
        h1 { color: #333; }
        .nav-buttons { margin-bottom: 20px; }
        .nav-buttons a { text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px; font-weight: bold; transition: background 0.3s; }
        .nav-buttons a:hover { background-color: #0056b3; }
        table.dataTable { background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .btn-delete { background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; }
        .btn-edit { background-color: #ffc107; color: black; text-decoration: none; padding: 5px 10px; border-radius: 3px; }
    </style>
</head>
<body>

<h1>Productos</h1>


<div class="nav-buttons">
    <a href="{{ route('products.create') }}">Nuevo producto</a>
    <a href="{{ route('categories.create') }}">Nueva categoría</a>
</div>

@if (session('success')) <p style="color: green;">{{ session('success') }}</p> @endif

<table id="t-all" class="data-table display nowrap" width="100%">
  <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  @forelse ($products as $product)
    <tr>
      <td>{{ $product->product_id }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->category?->name }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->stock }}</td>
      <td>
        <a href="{{ route('products.edit', $product) }}" class="btn-edit">Editar</a>
        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar producto?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn-delete">Eliminar</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="6">No hay productos registrados.</td></tr>
  @endforelse
  </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function () {
        $('#t-all').DataTable({
            dom: 'Bfrtip',
            "language": { "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
            "pageLength": 50,
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
</script>

</body>
</html>