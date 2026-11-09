function decreaseQuantity() {
    let quantityInput = document.querySelector('.qty');
    let currentValue = parseInt(quantityInput.value, 10);

    if (currentValue > 1) {
        quantityInput.focus();
        quantityInput.value = currentValue - 1;
        quantityInput.focus();
    }
}

function increaseQuantity() {
    let quantityInput = document.querySelector('.qty');
    let currentValue = parseInt(quantityInput.value, 10);

    if (currentValue < 15) {
        quantityInput.focus();
        quantityInput.value = currentValue + 1;
        quantityInput.focus();
    }   
}