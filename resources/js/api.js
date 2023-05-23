const form = document.getElementById('create-category-form');
const categoryTable = document.getElementById('category-table');

// Escuchar el evento submit del formulario
form.addEventListener('submit', (event) => {
    event.preventDefault(); 


    const categoryName = document.getElementById('category_name').value;

   
    fetch('/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ category_name: categoryName }),
    })
        .then((response) => response.json()) 
        .then((data) => {
        
            if (data.success) {
          
                form.reset();

                categoryTable.innerHTML = ''; 

                data.categories.forEach((category) => {
                    const row = document.createElement('tr');
                    const nameCell = document.createElement('td');
                    const actionsCell = document.createElement('td');

                    nameCell.textContent = category.name;

                    const editButton = document.createElement('a');
                    editButton.href = '#';
                    editButton.classList.add('bg-blue-500', 'text-white', 'px-4', 'py-2', 'rounded-md', 'mr-2');
                    editButton.textContent = 'Editar';
                    actionsCell.appendChild(editButton);

                    const deleteForm = document.createElement('form');
                    deleteForm.action = '#';
                    deleteForm.method = 'POST';
                    deleteForm.classList.add('inline-block');

                    const csrfField = document.createElement('input');
                    csrfField.type = 'hidden';
                    csrfField.name = '_token';
                    csrfField.value = data.csrf_token;
                    deleteForm.appendChild(csrfField);

                    const deleteButton = document.createElement('button');
                    deleteButton.type = 'submit';
                    deleteButton.classList.add('bg-red-500', 'text-white', 'px-4', 'py-2', 'rounded-md');
                    deleteButton.textContent = 'Eliminar';
                    deleteForm.appendChild(deleteButton);

                    actionsCell.appendChild(deleteForm);

                    const viewButton = document.createElement('a');
                    viewButton.href = '#';
                    viewButton.classList.add('bg-green-500', 'text-white', 'px-4', 'py-2', 'rounded-md', 'ml-2');
                    viewButton.textContent = 'Ver Productos';
                    actionsCell.appendChild(viewButton);

                    row.appendChild(nameCell);
                    row.appendChild(actionsCell);

                    categoryTable.appendChild(row);
                });
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
});