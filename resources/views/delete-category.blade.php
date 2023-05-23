<div id="delete-category-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-8">
        <h2 class="text-lg font-semibold mb-4">Eliminar Categoría</h2>
        <p class="mb-4">¿Estás seguro de que deseas eliminar esta categoría?</p>
        <div class="flex justify-end">
            <form action="#" method="POST" class="inline-block mr-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">Eliminar</button>
            </form>
            <button id="cancel-delete" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md">Cancelar</button>
        </div>
    </div>
</div>
