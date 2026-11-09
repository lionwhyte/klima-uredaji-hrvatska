//CAROUSEL
// Get all elements with the 'thumb' class
var thumbElements = document.querySelectorAll('.thumb');

// Add click event listener to each element
thumbElements.forEach(function (element, index) {
    const carousel = document.getElementById("carousel");
    element.addEventListener('click', function () {
        
        if(!element.classList.contains("border-gray-500")){
            // Your click event handling logic here
            carousel.classList.remove(carousel.classList[carousel.classList.length - 1])
            carousel.classList.add(`translate-${index * 100}`)
            // carousel.classList.add(`translate-x-[-${index * 100}%]`)
            // carousel.style.transform = `translateX(-${index * 100}%)`

            thumbElements.forEach(function (el) {
                el.classList.remove("border-gray-500")
                el.classList.add("border-gray-200")
            });
            element.classList.remove("border-gray-200")
            element.classList.add("border-gray-500")
        }
    });
});
 
 
//MOBILE NAV LINKS WHEN OPENING TRANSITION
document.getElementById('hamburger').addEventListener('click', function() {
    const nav = document.getElementById('mobile-nav');
    if (nav.clientHeight === 0) {
        // Open the nav element
        nav.style.height = `${nav.scrollHeight}px`;
        nav.style.marginTop = '2rem';
        nav.style.transition = 'height 500ms, margin-top 1000ms';
    } else {
        // Close the nav element
        nav.style.height = '0';
        nav.style.marginTop = '0';
        nav.style.transition = 'height 500ms, margin-top 1000ms ';
    }
});


//ON SCROLL FUNCTIONS
window.onscroll = function() {
    elementsFixedOnScroll();
    backToTop();
};


//LOGO SECTION STICK ON TOP WHEN SCROLL DOWN
function elementsFixedOnScroll() {
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
       document.getElementById("logo-section").classList.remove("container");
       document.getElementById("logo-section").classList.add("fixed");
       document.getElementById("logo-section").classList.add("top-0");
       document.getElementById("logo-section").classList.add("w-full");
    } else {
       document.getElementById("logo-section").classList.add("container");
       document.getElementById("logo-section").classList.remove("fixed");
       document.getElementById("logo-section").classList.remove("top-0");
       document.getElementById("logo-section").classList.remove("w-full");
    }
}


//BACK TO THE TOP OF THE PAGE BUTTON
const backToTopButton = document.getElementById('back-to-top');
// Show the button when user scrolls down 100px from the top of the document
function backToTop() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        backToTopButton.classList.remove('hidden');
    } else {
        backToTopButton.classList.add('hidden');
    }
};
// When the user clicks on the button, scroll to the top of the document
backToTopButton.addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});


//SHOW MORE TAB
function toggleDetails(button) {
    const content = button.nextElementSibling;
    content.classList.toggle('hidden');

    const icons = button.querySelector('.toggle-icon').children;
    icons[0].classList.toggle('hidden'); // Plus icon
    icons[1].classList.toggle('hidden'); // Minus icon

    const textSpan = button.querySelector('span:last-of-type');
    textSpan.textContent = content.classList.contains('hidden') ? '(prikaži više)' : '(prikaži manje)';
}

//INFO TABS BUTTONS IN SINGLE PRODUCT PAGE
function showTab(tabId) {
    if (document.getElementById(tabId).style.display !== 'block') {
        // Hide all tabs
        document.getElementById('opisContent').style.display = 'none';
        document.getElementById('informacijeContent').style.display = 'none';

        // Show the selected tab
        document.getElementById(tabId).style.display = 'block';

        // Emphasize the selected button with border
        document.getElementById('opisContentButton').classList.remove('border-b-4', 'border-sky-500');
        document.getElementById('informacijeContentButton').classList.remove('border-b-4', 'border-sky-500');
        document.getElementById(tabId + 'Button').classList.add('border-b-4', 'border-sky-500');
    }  
}



    
