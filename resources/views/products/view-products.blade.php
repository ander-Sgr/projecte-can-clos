@extends('layouts.app')
@section('content')
    <section class="relative mt-20 shadow-lg p-8">

        <h3 class="text-2xl font-semibold text-center mb-2"> Categoria {{ $categoria->name }}</h3>
        <div class="mt-4">
            <table id="clothes-table" class="min-w-full border border-gray-200 shadow-md">
                <thead>
                    <tr>
                        @if ($categoria->name === 'Ropa')
                            <th class="py-3 px-1 border-b font-semibold text-left">Nombre del Producto</th>
                            <th class="py-3 px-1 border-b text-left">Genero</th>
                            <th class="py-3 px-1 border-b text-left">Tipo</th>
                            <th class="py-3 px-1 border-b text-left">Rango de Edad</th>
                        @elseif ($categoria->name === 'Libros')
                            <th class="py-3 px-1 border-b text-left">Nombre del Libro</th>
                            <th class="py-3 px-1 border-b text-left">Tipo de Libro</th>
                        @elseif ($categoria->name === 'Alimentacion')
                            <th class="py-3 px-1 border-b text-left">Nombre Producto</th>
                            <th class="py-3 px-1 border-b text-left">Tipo de alimento</th>
                        @endif
                        <th class="py-3 px-1 border-b text-left">Stock Disponible</th>
                        <th class="py-3 px-1 border-b text-left">Fecha de entrada y hora</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($productos as $product)
                        <tr>
                            <td class="py-3 px-1 border-b">{{ $product->name }}</td>
                            @if ($product->category->name === 'Ropa')
                                <td class="py-3 px-1 border-b text-left">{{ $product->clothes->gender }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->clothes->typeClothe }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->clothes->rangeAge }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->cantidad }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->created_at }}</td>
                                <td class="py-3 px-4 border-b text-left">
                                    <a href="#"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 edit-product-clothe-link"
                                        data-productid="{{ $product->clothes->product_id }}"
                                        data-clotheid="{{ $product->clothes->id }}"
                                        title="Editar nombre de la categoría">Editar</a>
                                    <a href="#"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md delete-product-clothe-link"
                                        data-productid="{{ $product->id }}" title="Eliminar categoria">Eliminar</a>
                                </td>
                            @elseif ($product->category->name === 'Libros')
                                <td class="py-3 px-1 border-b text-left">{{ $product->book->typeBook }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->cantidad }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->created_at }}</td>
                                <td class="py-3 px-4 border-b text-left">
                                    <a href="#"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 edit-product-book-link"
                                        data-productid="{{ $product->book->product_id }}"
                                        data-bookId="{{ $product->book->id }}"
                                        title="Editar nombre de la categoría">Editar</a>
                                    <a href="#"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md delete-product-book-link"
                                        data-productid="{{ $product->id }}" title="Eliminar categoria">Eliminar</a>
                                </td>
                            @elseif ($categoria->name === 'Alimentacion')
                                <td class="py-3 px-1 border-b text-left">{{ $product->food->typeFood }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->cantidad }}</td>
                                <td class="py-3 px-1 border-b text-left">{{ $product->created_at }}</td>
                                <td class="py-3 px-4 border-b text-left">
                                    <a href="#"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 edit-product-food-link"
                                        data-productid="{{ $product->food->product_id }}"
                                        data-foodId="{{ $product->food->id }}"
                                        title="Editar nombre de la categoría">Editar</a>
                                    <a href="#"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md delete-product-food-link"
                                        data-productid="{{ $product->id }}" title="Eliminar categoria">Eliminar</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        @if ($categoria->name === 'Ropa')
            <button id="open-modal" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Añadir nuevo producto</button>
        @elseif ($categoria->name === 'Libros')
            <button id="open-modal-Libros" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Añadir nuevo
                libro</button>
        @elseif ($categoria->name === 'Alimentacion')
            <button id="open-modal-food" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Añadir nuevo
                alimento</button>
        @else
            <button id="open-modal" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Añadir nuevo producto</button>
        @endif

    </section>
    @if ($categoria->name === 'Ropa')
        @include('products.clothes.create-clothe')
        @include('products.clothes.edit-clothe')
        @include('products.clothes.delete-clothe')
        <script src="{{ asset('js/displayAgeSelect.js') }}"></script>
        <script src="{{ asset('js/modalClotheCreate.js') }}"></script>
        <script src="{{ asset('js/modalClotheEdit.js') }}"></script>
        <script src="{{ asset('js/modalDeleteClothe.js') }}"></script>
    @elseif ($categoria->name === 'Libros')
        @include('products.books.create-book')
        @include('products.books.edit-book')
        @include('products.books.delete-book')
        <script src="{{ asset('js/bookModals/modalCreate.js') }}"></script>
        <script src="{{ asset('js/bookModals/modalEdit.js') }}"></script>
        <script src="{{ asset('js/bookModals/modalDelete.js') }}"></script>
    @elseif ($categoria->name === 'Alimentacion')
        @include('products.food.create-food')
        @include('products.food.edit-food')
        <script src="{{ asset('js/foodModals/modalCreate.js') }}"></script>
        <script src="{{ asset('js/foodModals/modalEdit.js') }}"></script>
    @endif
@endsection
