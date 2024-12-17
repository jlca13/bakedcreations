


function showEditModal(id, name, priceStart, priceEnd, sizes, image, description) {
    // Populate general fields
    document.getElementById('editId').value = id;
    document.getElementById('editProductName').value = name;
    document.getElementById('editPriceStart').value = priceStart;
    document.getElementById('editPriceEnd').value = priceEnd;
    document.getElementById('edittotalSize').value = sizes;
    document.getElementById('editproductDescription').value = description;

    // Clear any existing size/price fields
    const editSizePriceFieldsContainer = document.getElementById('editSizePriceFieldsContainer');
    editSizePriceFieldsContainer.innerHTML = '';

    // Generate size and price fields dynamically
    for (let i = 1; i <= sizes; i++) {
        const sizeLabel = document.createElement('label');
        sizeLabel.textContent = `Size ${i}:`;
        const sizeInput = document.createElement('input');
        sizeInput.type = 'text';
        sizeInput.id = `editSize${i}`;
        sizeInput.name = `editSize${i}`;
        sizeInput.required = true;

        const priceLabel = document.createElement('label');
        priceLabel.textContent = `Price ${i}:`;
        const priceInput = document.createElement('input');
        priceInput.type = 'number';
        priceInput.id = `editPrice${i}`;
        priceInput.name = `editPrice${i}`;
        priceInput.required = true;

        // Append to container
        editSizePriceFieldsContainer.appendChild(sizeLabel);
        editSizePriceFieldsContainer.appendChild(sizeInput);
        editSizePriceFieldsContainer.appendChild(priceLabel);
        editSizePriceFieldsContainer.appendChild(priceInput);
    }

    // Show the modal
    document.getElementById('editModal').style.display = 'flex';
}


function updateEditSizeFields() {
    const totalSize = document.getElementById('edittotalSize').value;
    const container = document.getElementById('editSizePriceFieldsContainer');
    container.innerHTML = '';

    for (let i = 1; i <= totalSize; i++) {
        const sizeLabel = document.createElement('label');
        sizeLabel.setAttribute('for', 'editSize' + i);
        sizeLabel.innerText = 'Size ' + i + ':';
        const sizeInput = document.createElement('input');
        sizeInput.type = 'text';
        sizeInput.id = 'editSize' + i;
        sizeInput.name = 'editSize' + i;
        
        const priceLabel = document.createElement('label');
        priceLabel.setAttribute('for', 'editPrice' + i);
        priceLabel.innerText = 'Price ' + i + ':';
        const priceInput = document.createElement('input');
        priceInput.type = 'number';
        priceInput.id = 'editPrice' + i;
        priceInput.name = 'editPrice' + i;
        
        container.appendChild(sizeLabel);
        container.appendChild(sizeInput);
        container.appendChild(priceLabel);
        container.appendChild(priceInput);
    }
}


function validateAddForm() {
    var totalSize = document.getElementById('addTotalSize').value;

    if (totalSize < 1 || totalSize > 6) {
        alert("Please enter a valid number of sizes (between 1 and 6).");
        return false; 
    }
    return true; 
}

function validateEditForm() {
    var totalSize = document.getElementById('edittotalSize').value;

   
    if (totalSize < 1 || totalSize > 6) {
        alert("Please enter a valid number of sizes (between 1 and 6).");
        return false; 
    }
    return true; 
}




function openAddModal() {
    document.getElementById('addModal').style.display = 'flex';
}

function showDeleteModal(id) {
    document.getElementById('deleteId').value = id;
    document.getElementById('delete-alert').style.display = 'flex';
}

function closeDelete() {
    document.getElementById('delete-alert').style.display = 'none';
}

function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
    document.getElementById('addProductForm').reset();
    document.getElementById('sizePriceFieldsContainer').innerHTML = ''; 
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
    document.getElementById('editProductForm').reset();
    document.getElementById('editSizePriceFieldsContainer').innerHTML = '';
    document.getElementById('message-alert').style.display = 'none';
}
function showOrderDetails(orderId) {
    document.getElementById('orderModal').style.display = "block";
    document.getElementById('order-id').textContent = orderId;
}

function closeModal() {
    document.getElementById('orderModal').style.display = "none";
}

function calculateTotal() {
    let cakeSize = document.getElementById("cakeSize").value;
    let quantity = document.getElementById("quantity").value;
    let totalPrice = parseFloat(cakeSize) * quantity;
    document.getElementById("totalPrice").textContent = "₱" + totalPrice.toFixed(2);
}

