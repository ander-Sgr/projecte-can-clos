document.addEventListener('DOMContentLoaded', function () {
    let editLinks = document.querySelectorAll('.edit-product-clothe-link');
    let modal = document.getElementById('edit-product-clothe-modal');
    let modalForm = document.getElementById('edit-product-clothe-form');
    let cancelEditBtn = document.getElementById('cancel-edit');


    editLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            let clotheId = this.dataset.clotheid;

            let productId = this.dataset.productid;
            console.log(clotheId)
            let url = modalForm.dataset.url + '/' + productId
            modalForm.action = url
            console.log(url)
            console.log(productId)
            fetch(`/productClotheData/${clotheId}`)
                .then(response => response.json())
                .then(productData => {
                    let nameInput = document.getElementById('name-product');
                    let genderSelect = document.getElementById('gender-product');
                    let typeClotheSelect = document.getElementById('typeClothe-product');
                    let rangeAgeLabel = document.getElementById('rangeAgeLabel-product');
                    let rangeAgeSelect = document.getElementById('rangeAge-product');
                    let cantidadProductInput = document.getElementById('cantidad-product');


                    nameInput.value = productData.name;
                    for (let i = 0; i < genderSelect.length; i++) {
                        let option = genderSelect.options[i];
                        if (option.value === productData.gender) {
                            option.selected = true;
                            break;
                        }

                    }

                    for (let i = 0; i < typeClotheSelect.length; i++) {
                        let option = typeClotheSelect.options[i];
                        if (option.value === productData.typeClothe) {
                            option.selected = true;
                            break;
                        }

                    }
                    rangeAgeLabel.style.display = 'none';
                    rangeAgeSelect.style.display = 'none';
                    typeClotheSelect.addEventListener('change', function () {
                        if (this.value === 'adulto') {
                            rangeAgeLabel.style.display = 'none';
                            rangeAgeSelect.style.display = 'none';
                        } else {
                            rangeAgeLabel.style.display = 'block';
                            rangeAgeSelect.style.display = 'block';
                        }
                    });

                    if (typeClotheSelect.value === 'infantil') {
                        rangeAgeLabel.style.display = 'block';
                        rangeAgeSelect.style.display = 'block';
                    }
                    cantidadProductInput.value = productData.cantidad
                    // genderSelect.value = productData.gender;
                }).catch(error => {console.error(`Error al obtener los datos ${error}`)});
                
            


            modal.classList.add('block');
            modal.classList.remove('hidden');
        });
    });

    // Cerrar el modal al hacer clic en el botón de cancelar
    cancelEditBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
        modal.classList.remove('block');
    });
});
