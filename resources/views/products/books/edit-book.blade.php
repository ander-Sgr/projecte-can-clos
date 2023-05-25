<div id="edit-product-book-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden ">
    <div class="bg-white rounded-md p-10">
        <h2 class="text-lg font-semibold mb-5">Editar producto </h2>
        <form id="edit-product-book-form" data-url="{{ url('editProductClothe/') }}" method="POST" class="flex flex-col">
            @csrf
            @method('PUT')

            <label for="name-product-book" class="mb-2">Nombre del libro:</label>
            <input type="text" id="name-product-book" name="name-product-book"
                class="border border-gray-300 rounded-md px-3 py-1 mb-2" required>

                <label for="typeBook-product-book" class="mb-2">Tipo de libro:</label>
                <select name="typeBook-product-book" id="typeBook-product-book" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                    @foreach (['infantil', 'adulto'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>

            <label for="cantidad-product-book" class="mb-2">Cantidad:</label>
            <input type="text" id="cantidad-product-book" name="cantidad-product-book"
                class="border border-gray-300 rounded-md px-2 py-1 mb-2" required>

            <div class="text-left">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md self-start">Crear Producto</button>
                <button id="cancel-create" type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
            </div>
        </form>

    </div>
</div>
