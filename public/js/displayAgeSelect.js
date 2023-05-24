var typeClotheSelect = document.getElementById('typeClothe');
var rangeAgeLabel = document.getElementById('rangeAgeLabel');
var rangeAgeSelect = document.getElementById('rangeAge');

// Ocultar el campo de rango de edad inicialmente


// Mostrar u ocultar el campo de rango de edad según el tipo seleccionado
typeClotheSelect.addEventListener('change', function() {
    if (this.value === 'adulto') {
        rangeAgeLabel.style.display = 'none';
        rangeAgeSelect.style.display = 'none';
    } else {
        rangeAgeLabel.style.display = 'block';
        rangeAgeSelect.style.display = 'block';
    }
});