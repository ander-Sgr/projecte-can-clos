<div id="edit-category-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Editar categoría</h3>
                <form id="edit-category-form" data-url="{{ url('edit/') }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if (!$categories->isEmpty())
                    <div class="mb-4">
                        <label for="category_name" class="block text-sm font-medium text-gray-700">Nuevo nombre de categoría:</label>
                        <input value="{{ $category->name }}" type="text" id="category_name" name="category_name" class="mt-1 border border-gray-300 rounded-md px-3 py-2 w-full" required>
                    </div>
                    @endif
                    <div class="text-right">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Guardar cambios</button>
                        <button id="cancel-edit" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md ml-2">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
