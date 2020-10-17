<a class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold " href="{{ route('recetas.create') }}">
  <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
  Crear Receta
</a>
<a class="btn btn-outline-success mr-2 text-uppercase font-weight-bold " href="{{ route('perfiles.edit',['perfil' => Auth::user()->id]) }}">
  <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
  Editar Perfil
</a>
<a class="btn btn-outline-info mr-2 text-uppercase font-weight-bold " href="{{ route('perfiles.show',['perfil' => Auth::user()->id]) }}">
  <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
  Ver Perfil
</a>
{{-- <a class="btn btn-success mr-2 text-white" href="{{ route('perfiles.edit', ['perfil' => $usuario->id]) }}">Editar Perfil</a> --}}