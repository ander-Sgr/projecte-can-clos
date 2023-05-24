var cancelCreateBtn = document.getElementById('cancel-create');

// Función para abrir el modal
document.getElementById('open-modal').addEventListener('click', function () {
    document.getElementById('modal').classList.remove('hidden');
});

// Función para cerrar el modal
document.getElementById('modal').addEventListener('click', function (event) {
    if (event.target.id === 'modal') {
        document.getElementById('modal').classList.add('hidden');
    }
});

cancelCreateBtn.addEventListener('click', function() {
    // Ocultar el modal
    modal.classList.add('hidden');
    modal.classList.remove('block');
});