var cancelCreateBtn = document.getElementById('cancel-create');
let modal = document.getElementById('create-product-book-modal')
// Función para abrir el modal
document.getElementById('open-modal-Libros').addEventListener('click', function () {
    document.getElementById('create-product-book-modal').classList.remove('hidden');
});

// Función para cerrar el modal
document.getElementById('create-product-book-modal').addEventListener('click', function (event) {
    if (event.target.id === 'create-product-book-modal') {
        document.getElementById('create-product-book-modal').classList.add('hidden');
    }
});

cancelCreateBtn.addEventListener('click', function() {
    // Ocultar el modal
    modal.classList.add('hidden');
    modal.classList.remove('block');
});