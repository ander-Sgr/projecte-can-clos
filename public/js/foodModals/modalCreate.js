var cancelCreateBtn = document.getElementById('cancel-create');
let modal = document.getElementById('create-product-food-modal')
// Función para abrir el modal
document.getElementById('open-modal-food').addEventListener('click', function () {
    document.getElementById('create-product-food-modal').classList.remove('hidden');
});

// Función para cerrar el modal
document.getElementById('create-product-food-modal').addEventListener('click', function (event) {
    if (event.target.id === 'create-product-food-modal') {
        document.getElementById('create-product-food-modal').classList.add('hidden');
    }
});

cancelCreateBtn.addEventListener('click', function() {
    // Ocultar el modal
    modal.classList.add('hidden');
    modal.classList.remove('block');
});