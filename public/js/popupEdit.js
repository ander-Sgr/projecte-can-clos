document.addEventListener('DOMContentLoaded', function() {
    // Obtener elementos del DOM
    var editLinks = document.querySelectorAll('.edit-category-link');
    var modal = document.getElementById('edit-category-modal');
    var modalForm = document.getElementById('edit-category-form');
    var cancelEditBtn = document.getElementById('cancel-edit');

    // Agregar evento de clic a cada enlace de edición
    editLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var categoryId = this.dataset.categoryId;
            var categoryName = this.parentNode.previousElementSibling.innerText;
            var url = modalForm.dataset.url + '/' + categoryId; // Construir la URL

            // Establecer los valores en el formulario de edición del modal
            modalForm.action = url;
            document.getElementById('category_name').value = categoryName;

            // Mostrar el modal
            modal.classList.add('block');
            modal.classList.remove('hidden');
        });
    });

    // Agregar evento de clic al botón de cancelar edición
    cancelEditBtn.addEventListener('click', function() {
        // Ocultar el modal
        modal.classList.add('hidden');
        modal.classList.remove('block');
    });
});