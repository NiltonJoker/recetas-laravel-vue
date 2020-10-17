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

<h2 class="text-center mb-5">Editar Receta: {{ $receta->titulo }}</h2>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form method="POST" action="{{ route('recetas.update', ['receta' => $receta->id]) }}" enctype="multipart/form-data" novalidate>
            @csrf

            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título Receta</label>
                <input
                  type="text"
                  name="titulo"
                  class="form-control @error('titulo') is-invalid @enderror"
                  id="titulo"
                  placeholder="Título Receta"
                  value="{{ $receta->titulo }}"
                >
                @error('titulo')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message  }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="categoria">Categoria</label>
              <select
                name="categoria"
                id="categoria"
                class="form-control @error('categoria') is-invalid @enderror"
              >
                <option value="">--Seleccione--</option>
                @foreach ($categorias as $categoria)
                    <option
                      value="{{ $categoria->id }}"
                      {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}
                    >{{ $categoria->nombre }}</option>
                @endforeach
              </select>
              @error('categoria')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message  }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mt-3">
              <label for="preparacion">Preparación</label>
              <input
                type="hidden"
                id="preparacion"
                name="preparacion"
                value="{{ $receta->preparacion }}"
              >
              <trix-editor
                input="preparacion"
                class="form-control trix-content @error('preparacion') is-invalid @enderror"
              ></trix-editor>
              @error('preparacion')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message  }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group mt-3">
              <label for="ingredientes">ingredientes</label>
              <input
                type="hidden"
                id="ingredientes"
                name="ingredientes"
                value="{{ $receta->ingredientes }}"
              >
              <trix-editor
                input="ingredientes"
                class="form-control trix-content @error('ingredientes') is-invalid @enderror"
              ></trix-editor>
              @error('ingredientes')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message  }}</strong>
                </span>
              @enderror
            </div>

            <div class="form-group mt-3">
              <label for="imagen">Elige la imagen</label>
              <input type="file"
                id="imagen"
                class="form-control @error('imagen') is-invalid @enderror"
                name="imagen"
              >
              <div class="mt-4">
                <p>Imagen Actual:</p>
                <img src="/storage/{{ $receta->imagen }}" style="width:300px">
              </div>

              @error('imagen')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message  }}</strong>
                </span>
              @enderror
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
