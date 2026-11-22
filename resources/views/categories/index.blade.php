<thead>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Tipo</th> <!-- Nueva columna para el tipo -->
    <th>Acciones</th>
  </tr>
</thead>
<tbody>
  @forelse ($categories as $category)
    <tr>
      <td>{{ $category->category_id }}</td>
      <td>{{ $category->name }}</td>
      <td>{{ $category->description }}</td>
      <td>{{ $category->type }}</td> <!-- Mostrar tipo de categoría -->
      <td>
        <a href="{{ route('categories.edit', $category) }}">Editar</a>
        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Eliminar categoría?')">
          @csrf
          @method('DELETE')
          <button type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="5">No hay categorías registradas.</td></tr>
  @endforelse
</tbody>
