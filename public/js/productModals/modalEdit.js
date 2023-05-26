document.addEventListener('DOMContentLoaded', function(){
    let editLinks = document.querySelectorAll('.edit-product-link');
    let modal = document.getElementById('edit-product-modal');
    let modalForm = document.getElementById('edit-product-form');
    let cancelEditBtn = document.getElementById('cancel-edit');

    editLinks.forEach(function (link){
        link.addEventListener('click', function(e){
            e.preventDefault();
            let productId = this.dataset.productid;
            console.log(productId)
            let url = modalForm.dataset.url + '/' + productId;
            console.log(url)
            modalForm.action = url
            
            fetch(`/product/${productId}`)
                .then(response => response.json())
                .then(productData => {
                    let nameInput = document.getElementById('name-edit-product');
                    let cantidadProduct = document.getElementById('cantidad-edit-product');

                    nameInput.value = productData.name;
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
    cancelEditBtn.addEventListener('click', function(){
        modal.classList.add('hidden');
        modal.classList.remove('block')
    });

});