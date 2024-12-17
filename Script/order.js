



document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("birthdayButton").addEventListener("click", function() {
        console.log("Birthday button clicked");
        document.getElementById("productDescription").value = "Happy Birthday! Wishing you a day filled with love, joy, and all your favorite things!";
    });

    document.getElementById("anniversaryButton").addEventListener("click", function() {
        console.log("Anniversary button clicked");
        document.getElementById("productDescription").value = "Happy Anniversary! Celebrating another year of love, laughter, and unforgettable memories together!";
    });

    document.getElementById("graduationButton").addEventListener("click", function() {
        console.log("Graduation button clicked");
        document.getElementById("productDescription").value = "Congratulations on your graduation! Wishing you success and happiness on your new journey!";
    });

    document.getElementById("apologizeButton").addEventListener("click", function() {
        console.log("Apologize button clicked");
        document.getElementById("productDescription").value = "I'm sorry for what happened. Please accept my heartfelt apologies.";
    });
});


function calculateTotal() {
    const cakeSize = document.getElementById('cakeSize');
    const quantity = document.getElementById('quantity').value;
    const candles = document.getElementById('candles').value;
    const totalPriceField = document.getElementById('totalPriceHidden');
    const totalPriceDisplay = document.getElementById('totalPriceDisplay');
    
    
    const selectedSizePrice = parseFloat(cakeSize.options[cakeSize.selectedIndex].value);
    
    
    let total = (selectedSizePrice * quantity) + (candles * 10); 

    
    totalPriceField.value = total;
    totalPriceDisplay.innerText = '₱' + total.toFixed(2);
}




function showProduct(productName, productImage, productDescription) {
    console.log("Product Name:", productName);
    console.log("Product Image:", productImage);
    console.log("Product Description:", productDescription);

    const productNameElement = document.querySelector(".left-column .cake-name");
    if (productNameElement) {
        productNameElement.textContent = productName; 
    }
    const productImageElement = document.querySelector(".right-column .product-img");
    if (productImageElement) {
        productImageElement.src = productImage; 
        productImageElement.alt = productName; 
    }
    const productDescriptionElement = document.querySelector(".right-column #description");
    if (productDescriptionElement) {
        productDescriptionElement.textContent = productDescription; 
    }

    document.getElementById('product').style.display = 'flex'; 
}


function closeProduct() {
    document.getElementById('product').style.display = 'none';
    document.getElementById('cakeOrderForm').reset();
}

function verifyOtp() {
    var otp = document.getElementById('otp').value;

    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "verifyOtp.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText == "success") {
              
                window.location.href = "../UserPage/index2.php";
            } else {
                alert("Invalid OTP. Please try again.");
            }
        }
    };
    xhr.send("otp=" + otp);

}





function openEditModal(itemIndex) {
    var modal = document.getElementById('editModal-' + itemIndex);
    modal.style.display = "flex";
}

function closeEditModal(itemIndex) {
    var modal = document.getElementById('editModal-' + itemIndex);
    modal.style.display = "none";
}


window.onclick = function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach((modal) => {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
}

