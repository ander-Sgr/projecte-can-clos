@extends('layouts.app')
@section('content')
    <section class="relative mt-20 shadow-lg p-8">
        <h1 class="text-3xl font-semibold text-center mb-2">CATEGORIAS EXISTENTES</h1>

        <div class="mt-4">
            @if ($categories->isEmpty())
                <p>No hay categorías disponibles.</p>
            @else
                <table id="category-table" class="min-w-full border border-gray-200 shadow-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b font-semibold text-left">Nombre de Categoría</th>
                            <th class="py-2 px-4 border-b"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                                <td class="py-5 px-4 border-b text-right">
                                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 edit-category-link"
                                        data-category-id="{{ $category->id }}" title="Editar nombre de la categoria">Editar</a>
                                    <a href="#" class="bg-red-500 text-white px-4 py-2 rounded-md delete-category-link"
                                        data-category-id="{{ $category->id }}" title="Eliminar categoria">Eliminar</a>
                                    <a href="{{ url('/products/'.$category->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md ml-2"
                                        title="Productos de la categoria">Ver Productos</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
    @include('create-category')
@endsection
@include('edit-category-form')
@include('delete-category')
<script src="{{ asset('js/popupEdit.js') }}"></script>
<script src="{{ asset('js/popupDelete.js') }}"></script>
