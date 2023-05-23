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