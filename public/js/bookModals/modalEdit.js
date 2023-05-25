document.addEventListener('DOMContentLoaded', function(){
    let editLinks = document.querySelectorAll('.edit-product-book-link');
    let modal = document.getElementById('edit-product-book-modal');
    let modalForm = document.getElementById('edit-product-book-form');
    let cancelEditBtn = document.getElementById('cancel-edit');

    editLinks.forEach(function (link){
        link.addEventListener('click', function(e){
            e.preventDefault();
            let bookId = this.dataset.bookid;
            let productId = this.dataset.productid;
            console.log(bookId)
            let url = modalForm.dataset.url + '/' + productId;
            console.log(url)
            modalForm.action = url
            
            fetch(`/productBook/${bookId}`)
                .then(response => response.json())
                .then(productData => {
                    let nameInput = document.getElementById('name-edit-book');
                    let typeBookSelect = document.getElementById('typeBook-edit-book');
                    let cantidadProduct = document.getElementById('cantidad-edit-book');

                    nameInput.value = productData.name;
                    for (let i = 0; i < typeBookSelect.length; i++) {
                        let option = typeBookSelect.options[i];
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
    cancelEditBtn.addEventListener('click', function(){
        modal.classList.add('hidden');
        modal.classList.remove('block')
    });

});