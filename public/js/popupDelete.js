document.addEventListener('DOMContentLoaded', function () {

    var deleteLinks = document.querySelectorAll('.delete-category-link');
    var deleteModal = document.getElementById('delete-category-modal');
    var deleteForm = document.getElementById('delete-category-form');
    var cancelDeleteBtn = document.getElementById('cancel-delete');

    deleteLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            var categoryId = this.dataset.categoryId;
            console.log(categoryId)
            var url = deleteForm.dataset.url + '/' + categoryId; // Construir la URL
            console.log(url)
            deleteForm.action = url
            // Mostrar el modal de confirmación
            deleteModal.classList.add('block');
            deleteModal.classList.remove('hidden');
        });
    });

    cancelDeleteBtn.addEventListener('click', function () {
        // Ocultar el modal de confirmación
        deleteModal.classList.add('hidden');
        deleteModal.classList.remove('block');
    });
});