document.addEventListener('DOMContentLoaded', function () {
    let deleteLinks = document.querySelectorAll('.delete-product-link');
    let deleteModal = document.getElementById('delete-product-modal');
    let deleteForm = document.getElementById('delete-product-form');
    let cancelDeleteBtn = document.getElementById('cancel-delete');

    deleteLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            let productId = this.dataset.productid;
            console.log(productId)
            let url = deleteForm.dataset.url + '/' + productId; // Construir la URL
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