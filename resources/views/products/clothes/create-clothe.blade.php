<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-md p-6">
        <h2 class="text-lg font-semibold mb-2">Añadir nuevo producto a esta categoría</h2>
        <form id="create-category-form" action="{{ url('/createClothe') }}" method="POST" class="flex flex-col">
            @csrf

            <input type="hidden" type="text" name="category_id" id="category_id" value="{{ $id }}">

            <label for="name" class="mb-2">Nombre del Producto:</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded-md px-2 py-1 mb-2"
                required>

            <label for="gender" class="mb-2">Género:</label>
            <select name="gender" id="gender" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                @foreach (['masculino', 'femenino'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>


            <label for="typeClothe" class="mb-2">Tipo:</label>
            <select name="typeClothe" id="typeClothe" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                @foreach (['infantil', 'adulto'] as $option)
                    <option value="{{ $option }}">{{ $option }}</option>
                @endforeach
            </select>

            <label for="rangeAge" class="mb-2" id="rangeAgeLabel">Rango Edad:</label>
            <select name="rangeAge" id="rangeAge" class="border border-gray-300 rounded-md px-2 py-1 mb-2">
                <option value="0-6 meses">0-6 meses</option>
                <option value="6-12 meses">6-12 meses</option>
                <option value="1-5">1-5 años</option>
                <option value="5-10">5-10 años</option>
            </select>

            <label for="cantidad" class="mb-2">Cantidad:</label>
            <input type="text" id="cantidad" name="cantidad"
                class="border border-gray-300 rounded-md px-2 py-1 mb-2" required>

            <div class="text-left">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md self-start">Crear</button>
                <button id="cancel-create" type="button"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
            </div>
        </form>
    </div>
</div>
