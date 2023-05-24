<div id="edit-product-clothe-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden ">
    <div class="bg-white rounded-md p-10">
        <h2 class="text-lg font-semibold mb-5">Editar producto </h2>
        <form id="edit-product-clothe-form" data-url="{{ url('editProductClothe/') }}" method="POST" class="flex flex-col">
            @csrf
            @method('PUT')

            <label for="name-product" class="mb-2">Nombre del Producto:</label>
            <input type="text" id="name-product" name="name-product"
                class="border border-gray-300 rounded-md px-3 py-1 mb-2" required>

            <label for="gender-product" class="mb-2">Género:</label>
            <select name="gender-product" id="gender-product" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                @foreach (['masculino', 'femenino'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>

            <label for="typeClothe-product" class="mb-2">Tipo:</label>
            <select name="typeClothe-product" id="typeClothe-product" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                @foreach (['infantil', 'adulto'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>

            <label for="rangeAge-product" class="mb-2" id="rangeAgeLabel-product">Rango Edad:</label>
            <select name="rangeAge-product" id="rangeAge-product" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                <option value="">Seleccionar</option>
                <option value="0-6 meses">0-6 meses</option>
                <option value="6-12 meses">6-12 meses</option>
                <option value="1-5">1-5 años</option>
                <option value="5-10">5-10 años</option>
            </select>


            <label for="cantidad-product" class="mb-2">Cantidad:</label>
            <input type="text" id="cantidad-product" name="cantidad-product"
                class="border border-gray-300 rounded-md px-2 py-1 mb-2" required>

            <div class="text-left">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md self-start">Editar</button>
                <button id="cancel-edit" type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
            </div>
        </form>

    </div>
</div>
