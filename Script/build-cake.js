const steps = document.querySelectorAll(".step");
const progressBar = document.getElementById("progress-bar");
const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");
const userSelections = {}; // Store user choices
let currentStep = 0;

function updateStep() {
    // Show only the current step
    steps.forEach((step, index) => {
        step.style.display = index === currentStep ? "block" : "none";
    });

    // Update progress bar
    const progress = ((currentStep + 1) / steps.length) * 100;
    progressBar.style.width = `${progress}%`;

    // Update navigation buttons
    prevButton.disabled = currentStep === 0;
    nextButton.textContent = currentStep === steps.length - 1 ? "Checkout" : "Next";
    
    if (currentStep === steps.length - 1) {
        const summary = document.getElementById("summary");
        if (!summary) {
            console.error("Summary element not found");
            return;
        }
    
        const generateSummaryContent = (selections) => {
            return Object.entries(selections)
                .filter(([_, value]) => {
                    // Exclude falsy values (e.g., unchecked checkboxes, empty arrays, or null values)
                    if (Array.isArray(value)) {
                        return value.length > 0; // Keep only non-empty arrays
                    }
                    return Boolean(value); // Keep only truthy scalar values
                })
                .map(([key, value]) => {
                    if (Array.isArray(value)) {
                        return `<p><strong>${key}:</strong><br> ${value.join("<br>")}</p>`;
                    }
                    return `<p><strong>${key}:</strong> ${value}</p>`;
                })
                .join("");
        };
    
        const summaryContent = Object.keys(userSelections).length
            ? generateSummaryContent(userSelections)
            : "<p>No selections made</p>";
    
        summary.innerHTML = summaryContent;
    }
    
    
    
}




function saveSelection() {
    const inputs = steps[currentStep].querySelectorAll("input, select");
    inputs.forEach(input => {
        if (input.type === "radio" && input.checked) {
            // Save single selection for radio buttons
            userSelections[input.name] = input.value;
        } else if (input.type === "checkbox") {
            // Save multiple selections for checkboxes
            if (!userSelections[input.name]) {
                userSelections[input.name] = [];
            }
            if (input.checked && !userSelections[input.name].includes(input.value)) {
                userSelections[input.name].push(input.value);
            } else if (!input.checked && userSelections[input.name].includes(input.value)) {
                userSelections[input.name] = userSelections[input.name].filter(
                    value => value !== input.value
                );
            }
        } else if (input.tagName.toLowerCase() === "select") {
            // Save selected value for dropdowns
            userSelections[input.name] = input.value;
        }
    });
}

prevButton.addEventListener("click", () => {
    saveSelection();
    if (currentStep > 0) {
        currentStep--;
        updateStep();
    }
});

nextButton.addEventListener("click", () => {
    if (currentStep < steps.length - 1) {
        
        const inputs = steps[currentStep].querySelectorAll("input, select");
        const optionalStep = currentStep === 4 || currentStep === 5; 
        const hasSelection = Array.from(inputs).some(input => {
            if (input.tagName.toLowerCase() === "select") {
                return input.value !== ""; 
            }
            return (input.type === "radio" && input.checked) || 
                   (input.type === "checkbox" && input.checked);
        });

        if (inputs.length > 0 && !hasSelection && !optionalStep) {
            alert("Please make a selection before proceeding.");
            return;
        }

        saveSelection();
        currentStep++;
        updateStep();
    } else {
        
        checkout(); 
    }
});



updateStep();

function updateCakePreview() {
    // Get selected values
    const size = document.querySelector('input[name="Size"]:checked')?.value || "transparent-size";
    const flavor = document.querySelector('input[name="Flavor"]:checked')?.value || "transparent-flavor";
    const frosting = document.querySelector('input[name="Frosting"]:checked')?.value || "transparent-frosting";
    const frostingColor = document.getElementById("frostingColor")?.value || "transparent-frostingcolor";
    const icingTopColor = document.getElementById("icingTopColor")?.value || "white";
    const icingBottomColor = document.getElementById("icingBottomColor")?.value || "white";

    // Get design elements
    const sprinkles = document.getElementById("sprinkles")?.checked;
    const chocochip = document.getElementById("chocochip")?.checked;
    const nips = document.getElementById("nips")?.checked;
    const icingSwirlTop = document.getElementById("icingSwirlTop")?.checked;
    const icingSwirlBottom = document.getElementById("icingSwirlBottom")?.checked;

    // Update images based on selection
    document.getElementById("cakeBase").src = `../images/size/${size}.png`;
    document.getElementById("cakeFlavor").src = `../images/flavor/${flavor}.png`;
    document.getElementById("cakeFrosting").src = `../images/frosting/${frosting}.png`;
    document.getElementById("cakeFrostingColor").src = `../images/frostingcolor/${frostingColor}.png`;

    // Update icing colors if the checkboxes are checked
    const icingTopImg = document.getElementById("cakeIcingTopColor");
    const icingTopColorPicker = document.getElementById("icingTopColorPicker");

    if (icingSwirlTop) {
        icingTopImg.src = `../images/icingtop/${icingTopColor}.png`;
        icingTopImg.style.display = "block";
        icingTopColorPicker.style.display = "block"; // Show color picker
    } else {
        icingTopImg.style.display = "none";
        icingTopColorPicker.style.display = "none"; // Hide color picker
    }

    const icingBottomImg = document.getElementById("cakeIcingBottomColor");
    const icingBottomColorPicker = document.getElementById("icingBottomColorPicker");

    if (icingSwirlBottom) {
        icingBottomImg.src = `../images/icingbottom/${icingBottomColor}.png`;
        icingBottomImg.style.display = "block";
        icingBottomColorPicker.style.display = "block"; // Show color picker
    } else {
        icingBottomImg.style.display = "none";
        icingBottomColorPicker.style.display = "none"; // Hide color picker
    }

    // Toggle visibility of design layers
    document.getElementById("designSprinkles").style.display = sprinkles ? "block" : "none";
    document.getElementById("designChocoChip").style.display = chocochip ? "block" : "none";
    document.getElementById("designNips").style.display = nips ? "block" : "none";
    document.getElementById("icingTop").style.display = icingSwirlTop ? "block" : "none";
    document.getElementById("icingBottom").style.display = icingSwirlBottom ? "block" : "none";

}

// Attach event listeners only once
document.getElementById("icingSwirlTop")?.addEventListener("change", (event) => {
    updateCakePreview();
});

document.getElementById("icingSwirlBottom")?.addEventListener("change", (event) => {
    updateCakePreview();
});

// Initial call to update the cake preview
updateCakePreview();


const sizePriceMap = {
    "6x5": 530,
    "7x4": 550,
    "7x6": 800,
    "8x3": 920,
    "8x5": 950
};

function getCakeSizePrice() {
    const size = document.querySelector('input[name="Size"]:checked')?.value;

    var cakeSizePrice = sizePriceMap[size];

    if (!cakeSizePrice) {
        console.error(`Invalid size selected: ${size}`);
        return 0; // Fallback
    }

    return cakeSizePrice;
}


function calculateTotal() {
    const sizePrices = {
        "6x5": 520,
        "7x4": 550,
        "7x6": 800,
        "8x3": 920,
        "8x5": 950
    };
    
    const size = document.querySelector('input[name="Size"]:checked')?.value;
    const quantity = document.getElementById("quantity").value;
    const candles = document.getElementById("candles").value;
    
    let total = 0;
    if (size) {
        total = sizePrices[size] * quantity;
    }
    
    // Add candle cost if necessary
    total += candles * 20; // assuming 20 per candle
    
    // Update the displayed total price
    document.getElementById("totalPrice").textContent = total.toFixed(2);
}

    
function checkout() {
    
    saveSelection();

    
    const size = document.querySelector('input[name="Size"]:checked');
    const flavor = document.querySelector('input[name="Flavor"]:checked');
    const frosting = document.querySelector('input[name="Frosting"]:checked');

    if (!size || !flavor || !frosting) {
        alert("Please make sure all required fields are selected.");
        return;  
    }

    const cakeSizePrice = getCakeSizePrice();
    const quantity = document.getElementById("quantity").value;
    const candles = document.getElementById("candles").value;

    // Calculate the total price
    let total = cakeSizePrice * quantity;
    total += candles * 20; 

    // Prepare the order summary
    const summaryElement = document.getElementById("orderSummary");
    const cakeDetails = `
        <h2>Order Summary</h2>
        <p><strong>Cake Size:</strong> ${size.value}</p>
        <p><strong>Flavor:</strong> ${flavor.value}</p>
        <p><strong>Frosting:</strong> ${frosting.value}</p>
        <p><strong>Frosting Color:</strong> ${document.getElementById("frostingColor")?.value}</p>
        <p><strong>Quantity:</strong> ${quantity}</p>
        <p><strong>Candles:</strong> ${candles}</p>
        <p><strong>Total Price:</strong> ₱${total.toFixed(2)}</p>
    `;

    summaryElement.innerHTML = cakeDetails;

    const confirmOrder = confirm("Do you want to proceed with the checkout?");
    if (confirmOrder) {
        alert("Thank you for your order! We will process it shortly.");
        resetForm();
    } else {
        alert("You have canceled the order.");
    }
}


// Reset the form after checkout (if needed)
function resetForm() {
    document.querySelectorAll('input[type="radio"], input[type="checkbox"], select').forEach(input => {
        input.checked = false;
        input.selectedIndex = -1;
    });
   
    document.getElementById("quantity").value = 1;
    document.getElementById("candles").value = 0;
    updateCakePreview();
}



