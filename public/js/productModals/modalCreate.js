var cancelCreateBtn = document.getElementById('cancel-create');
let modal = document.getElementById('create-product-modal')
// Función para abrir el modal
document.getElementById('open-modal').addEventListener('click', function () {
    document.getElementById('create-product-modal').classList.remove('hidden');
});

// Función para cerrar el modal
document.getElementById('create-product-modal').addEventListener('click', function (event) {
    if (event.target.id === 'create-product-modal') {
        document.getElementById('create-product-modal').classList.add('hidden');
    }
});

cancelCreateBtn.addEventListener('click', function() {
    // Ocultar el modal
    modal.classList.add('hidden');
    modal.classList.remove('block');
});