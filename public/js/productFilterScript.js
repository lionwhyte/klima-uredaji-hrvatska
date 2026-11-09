//MOBILE SCREEN FILTER
const filterProizvoda = document.getElementById("product-filter");
const filterButton = document.getElementById("filter-button");
const darkElement = document.getElementById("dark-element");

function toggleFilter(){
    filterProizvoda.classList.toggle("translate-x-[-140%]");
    darkElement.classList.toggle("hidden");
    document.body.classList.toggle("overflow-y-hidden");
}
// Close the filter when clicking outside of it
document.body.addEventListener("click", function (event) {
    if(filterProizvoda){
        const isClickInsideFilter = filterProizvoda.contains(event.target);
        const isClickInsideFilterButton = filterButton.contains(event.target);
    
        if (!isClickInsideFilterButton && !isClickInsideFilter && !filterProizvoda.classList.contains("translate-x-[-140%]")) {
            filterProizvoda.classList.toggle("translate-x-[-140%]");
            darkElement.classList.toggle("hidden");
            document.body.classList.toggle("overflow-y-hidden");
        }
    }
});

//PRICE RANGE FILTER
const rangeInput = document.querySelectorAll(".range-input input"),
priceInput = document.querySelectorAll(".price-input input"),
priceRange = document.querySelector(".slider .progress");
let priceGap = 0;

function setPriceRange(element){
    let minPrice = parseInt(priceInput[0].value),
    maxPrice = parseInt(priceInput[1].value);

    if(minPrice < parseInt(rangeInput[0].min)){
        minPrice = rangeInput[0].min;
    }

    if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
        if(element.target.className === "input-min"){
            rangeInput[0].value = minPrice;
            priceRange.style.left = ((minPrice - rangeInput[0].min) / (rangeInput[0].max - rangeInput[0].min) * 100) + "%";
        }else{
            rangeInput[1].value = maxPrice;
            priceRange.style.right = 100 - ((maxPrice - rangeInput[1].min) / (rangeInput[1].max - rangeInput[1].min) * 100) + "%";
        }
    }
}
priceInput.forEach(input =>{
    input.addEventListener("input", e =>{
        setPriceRange(e);
    });
    setPriceRange({
        target: {
            className: input.className,
        }
    });
});
rangeInput.forEach(input =>{
    input.addEventListener("input", e =>{
        let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

        if((maxVal - minVal) < priceGap){
            if(e.target.className === "range-min"){
                rangeInput[0].value = maxVal - priceGap
            }else{
                rangeInput[1].value = minVal + priceGap;
            }
        }else{
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            priceRange.style.left = ((minVal - rangeInput[0].min) / (rangeInput[0].max - rangeInput[0].min) * 100) + "%";
            priceRange.style.right = 100 - ((maxVal - rangeInput[1].min) / (rangeInput[1].max - rangeInput[1].min)) * 100 + "%";
        }
    });
});

//ON SALE FILTER
function filterDiscounted(){
    const onSaleCheckbox = document.getElementById('onSaleCheckbox');
    const onSaleInput = document.getElementById('onSaleInput');

    // Update the value of the hidden input based on the checkbox state
    onSaleInput.value = onSaleCheckbox.checked ? '1' : '';
    
    document.getElementById("product-filter-form").submit(); 
}
//BEST BUY FILTER
function filterBestBuys(){
    const bestBuyCheckbox = document.getElementById('bestBuyCheckbox');
    const bestBuyInput = document.getElementById('bestBuyInput');

    // Update the value of the hidden input based on the checkbox state
    bestBuyInput.value = bestBuyCheckbox.checked ? '1' : '';
    
    document.getElementById("product-filter-form").submit(); 
}