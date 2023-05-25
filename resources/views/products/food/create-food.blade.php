<div id="create-product-food-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50  hidden">
    <div class="bg-white rounded-md p-10">
        <h2 class="text-lg font-semibold mb-5">Crear producto </h2>
        <form id="edit-product-clothe-form" action="{{ url('/createFood') }}" method="POST" class="flex flex-col">
            @csrf
            <input type="hidden" type="text" name="category_id" id="category_id" value="{{ $id }}">

            <label for="name-product-food" class="mb-2">Nombre alimento:</label>
            <input type="text" id="name-product-food" name="name-product-food"
                class="border border-gray-300 rounded-md px-3 py-1 mb-2" required>

                <label for="typeFood-product-food" class="mb-2">Tipo de alimento:</label>
                <select name="typeFood-product-food" id="typeFood-product-food" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                    @foreach (['infantil', 'adulto', 'ambos'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>

            <label for="cantidad-product-food" class="mb-2">Cantidad:</label>
            <input type="text" id="cantidad-product-food" name="cantidad-product-food"
                class="border border-gray-300 rounded-md px-2 py-1 mb-2" required>

            <div class="text-left">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md self-start">Crear Producto</button>
                <button id="cancel-create" type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
            </div>
        </form>

    </div>
</div>
