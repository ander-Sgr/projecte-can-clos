@extends('layouts.app')
@section('content')
    <section class="relative mt-20 shadow-lg p-8">

        <h3 class="text-2xl font-semibold text-center mb-2"> Categoria {{ $id }}</h3>
        <div class="mt-4">
            <table id="clothes-table" class="min-w-full border border-gray-200 shadow-md">
                <thead>
                    <tr>
                        <th class="py-3 px-1 border-b font-semibold text-left">Nombre del Producto</th>
                        <th class="py-3 px-1 border-b text-left">Genero</th>
                        <th class="py-3 px-1 border-b text-left">Tipo</th>
                        <th class="py-3 px-1 border-b text-left">Rango de Edad</th>
                        <th class="py-3 px-1 border-b text-left">Stock Disponible</th>
                        <th class="py-3 px-1 border-b text-left">Fecha de entrada y hora</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($clothe as $product)
                        <tr>
                            <td class="py-3 px-1 border-b">{{ $product->name }}</td>
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
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <button id="open-modal" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Añadir nuevo producto</button>

    </section>
    @include('products.clothes.create-clothe')
    @include('products.clothes.edit-clothe')
    @include('products.clothes.delete-clothe')
    <script src="{{ asset('js/displayAgeSelect.js') }}"></script>
    <script src="{{ asset('js/modalClotheCreate.js') }}"></script>
    <script src="{{ asset('js/modalClotheEdit.js') }}"></script>
    <script src="{{ asset('js/modalDeleteClothe.js') }}"></script>
@endsection
