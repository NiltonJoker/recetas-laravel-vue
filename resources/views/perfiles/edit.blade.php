@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection

@section('botones')
<a class="btn btn-outline-primary mr-2 text-uppercase font-weight-bold" href="{{ route("recetas.index") }}">
  <svg class="icono" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path></svg>
  Volver
</a>
@endsection

@section('content')
  <h1 class="text-center">Editar Mi Perfil</h1>

  <div class="row justify-content-center mt-5">
    <div class="col-md-10 bg-white p-3">
      <form action="{{ route('perfiles.update', ['perfil' => $perfil->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input
            type="text"
            name="nombre"
            class="form-control @error('nombre') is-invalid @enderror"
            id="nombre"
            placeholder="Tu Nombre"
            value="{{ $perfil->usuario->name }}"
          >
          @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message  }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="url">Sitio Web</label>
          <input
            type="text"
            name="url"
            class="form-control @error('url') is-invalid @enderror"
            id="url"
            placeholder="Tu Sitio Web"
            value="{{ $perfil->usuario->url }}"
          >
          @error('url')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message  }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="biografia">Biografia</label>
          <input
            type="hidden"
            id="biografia"
            name="biografia"
            value="{{ $perfil->biografia }}"
          >
          <trix-editor
            input="biografia"
            class="form-control trix-content @error('biografia') is-invalid @enderror"
          ></trix-editor>
          @error('biografia')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message  }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group mt-3">
          <label for="imagen">Tu Imagen</label>
          <input type="file"
            id="imagen"
            class="form-control @error('imagen') is-invalid @enderror"
            name="imagen"
          >
          @if ($perfil->imagen)
            <div class="mt-4">
              <p>Imagen Actual:</p>
              <img src="/storage/{{ $perfil->imagen }}" style="width:300px">
            </div>
            @error('imagen')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message  }}</strong>
            </span>
            @enderror
          @endif
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Guardar Cambios">
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" defer integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
@endsection
