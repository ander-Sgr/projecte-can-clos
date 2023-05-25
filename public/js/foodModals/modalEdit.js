document.addEventListener('DOMContentLoaded', function () {
    let editLinks = document.querySelectorAll('.edit-product-food-link');
    let modal = document.getElementById('edit-product-food-modal');
    let modalForm = document.getElementById('edit-product-food-form');
    let cancelEditBtn = document.getElementById('cancel-edit');

    editLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            let foodId = this.dataset.foodid;
            let productId = this.dataset.productid;
            console.log(foodId)
            let url = modalForm.dataset.url + '/' + productId;
            console.log(url)
            modalForm.action = url

            fetch(`/productFood/${foodId}`)
                .then(response => response.json())
                .then(productData => {
                    let nameInput = document.getElementById('name-edit-food');
                    let typeFoodSelect = document.getElementById('typeFood-edit-food');
                    let cantidadProduct = document.getElementById('cantidad-edit-food');

                    nameInput.value = productData.name;
                    for (let i = 0; i < typeFoodSelect.length; i++) {
                        let option = typeFoodSelect.options[i];
                        if (option.value === productData.typeBook) {
                            option.selected = true;
                            break;
                        }

                    }
                    cantidadProduct.value = productData.cantidad

                    console.log(nameInput.value)
                    console.log(productData)
                })
                .catch(error => {
                    console.error(`Error al obtener datos: ${error}`);
                })

            modal.classList.add('block');
            modal.classList.remove('hidden');
        });
    });
    cancelEditBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
        modal.classList.remove('block')
    });
});