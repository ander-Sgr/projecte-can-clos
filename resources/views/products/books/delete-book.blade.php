<div id="delete-book-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4 text-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h2 class="text-lg font-semibold mb-4">Eliminar este producto</h2>
                <p class="mb-4">¿Estás seguro de que deseas eliminar este producto?</p>
                <form id="delete-book-form" data-url="{{ url('deleteProductBook/') }}" method="POST" class="inline-block mr-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button>
                </form>
                <button id="cancel-delete" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancelar</button>
            </div>
        </div>
    </div>
</div>
