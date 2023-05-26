<div id="edit-product-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden ">
    <div class="bg-white rounded-md p-10">
        <h2 class="text-lg font-semibold mb-5">Editar producto </h2>
        <form id="edit-product-form" data-url="{{ url('editProduct/') }}" method="POST" class="flex flex-col">
            @csrf
            @method('PUT')

            <label for="name-edit-product" class="mb-2">Nombre de alimento:</label>
            <input type="text" id="name-edit-product" name="name-edit-product"
                class="border border-gray-300 rounded-md px-3 py-1 mb-2" required>

            <label for="cantidad-edit-product" class="mb-2">Cantidad:</label>
            <input type="text" id="cantidad-edit-product" name="cantidad-edit-product"
                class="border border-gray-300 rounded-md px-2 py-1 mb-2" required>

            <div class="text-left">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md self-start">Editar Producto</button>
                <button id="cancel-edit" type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
            </div>
        </form>

    </div>
</div>
