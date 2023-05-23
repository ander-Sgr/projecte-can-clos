@extends('layouts.app')
@section('content')
    <section class="relative mt-20 shadow-lg p-8">
        <h1 class="text-3xl font-semibold text-center mb-2">CATEGORIAS EXISTENTES</h1>

        <div class="mt-4">
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
                            <td class="py-2 px-4 border-b text-right">
                                <a href="" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2"
                                    title="Editar nombre de la categoria">Editar</a>
                                <form action="" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md"
                                        title="Eliminar categoria">Eliminar</button>
                                </form>
                                <a href="" class="bg-green-500 text-white px-4 py-2 rounded-md ml-2"
                                    title="Productos de la categoria">Ver Productos</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <div class="flex justify-center mt-4">
        <div class="flex flex-col items-center">
            <h2 class="text-lg font-semibold mb-2">Crear nueva categoría</h2>
            <form id="create-category-form" action="#" method="POST" class="flex items-center">
                @csrf
                <label for="category_name" class="mr-2">Nombre categoría:</label>
                <input type="text" id="category_name" name="category_name"
                    class="border border-gray-300 rounded-md px-2 py-1" required>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-2">Crear</button>
            </form>
        </div>
    </div>
@section('scripts')
    <script src="{{ asset('js/api.js') }}"></script>
@endsection

@endsection
