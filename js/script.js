document.addEventListener('DOMContentLoaded', function() {
    var url = window.location.pathname;
    var filename = url.substring(url.lastIndexOf('/')+1);

    var navbar = document.querySelector('.navbar');

    // Add classes to the navbar based on the current page
    if (filename === '' || filename === 'index.php') {
        navbar.classList.add('navbar-home');
    } else if (filename === 'program.php') {
        navbar.classList.add('navbar-program');
    } else if (filename === 'booking.php') {
        navbar.classList.add('navbar-booking');
    } else if (filename === 'gallery.php') {
        navbar.classList.add('navbar-photos');
    } else if (filename === 'contact.php') {
        navbar.classList.add('navbar-contact');
    } else if (filename === 'thank_you.php') {
        navbar.classList.add('navbar-thank-you');
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const slide_l_1 = document.getElementById('slide_l1');
    const slide_l_1_5 = document.getElementById('slide_l1_5');
    const slide_l_2 = document.getElementById('slide_l2');
    const slide_l_2_5 = document.getElementById('slide_l2_5');
    const slide_r1_5 = document.getElementById('slide_r1_5');

    if(slide_l_1 !== null){
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity0');
                    entry.target.classList.add('slide_l1');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(slide_l_1);
    }
    if(slide_l_1_5 !== null){
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity0');
                    entry.target.classList.add('slide_l1_5');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(slide_l_1_5);
    }
    if(slide_l_2 !== null){
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity0');
                    entry.target.classList.add('slide_l2');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(slide_l_2);
    }
    if(slide_l_2_5 !== null){
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity0');
                    entry.target.classList.add('slide_l2_5');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(slide_l_2_5);
    }
    if(slide_r1_5 !== null){
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity0');
                    entry.target.classList.add('slide_r1_5');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        observer.observe(slide_r1_5);
    }
});

$('.portfolio-menu ul li').click(function(){
    $('.portfolio-menu ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.portfolio-item').isotope({
        filter:selector
    });
    return  false;
});
$(document).ready(function() {
    var popup_btn = $('.popup-btn');
    popup_btn.magnificPopup({
        type : 'image',
        gallery : {
            enabled : true
        }
    });
});
document.getElementById('navbar-toggler').addEventListener('click', function() {
    this.classList.toggle('active');
    const icon = this.querySelector('.navbar-toggler-icon');
    if (this.classList.contains('active')) {
        icon.classList.add('x-icon');
    } else {
        icon.classList.remove('x-icon');
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const numberInput = document.getElementById('number');
    const guests = document.getElementById('guests');
    const price = document.getElementById('price');

    numberInput.addEventListener('input', function() {
        const value = parseInt(numberInput.value, 10) || 0;
        guests.innerHTML = '';  // Clear existing divs

        for (let i = 0; i < value; i++) {
            const newDiv = document.createElement('div');
            newDiv.id = 'guest_' + (i + 1);
            newDiv.innerHTML = `<div class="mb-1 text-center">
                                    <label for="guest_${i + 1}" class="form-label">Guest ${i + 1}</label>
                                </div>
                                <div class="mb-3">
                                    <label for="guest_${i + 1}_height" class="form-label">Height</label>
                                    <input type="number" class="form-control" id="guest_${i + 1}_height"
                                     name="guest_${i + 1}_height" placeholder="Height (in cm)" required>
                                </div>
                                <div class="mb-3">
                                    <label for="guest_${i + 1}_weight" class="form-label">Weight</label>
                                    <input type="number" class="form-control" id="guest_${i + 1}_weight"
                                     name="guest_${i + 1}_weight" placeholder="Weight (in kg)" min="27" required>
                                </div>
                                <div class="mb-3">
                                    <label for="guest_${i + 1}_shoe_size" class="form-label">Shoe size</label>
                                    <input type="number" class="form-control" id="guest_${i + 1}_shoe_size"
                                     name="guest_${i + 1}_shoe_size" placeholder="Shoe size (EU standard)" required>
                                </div>`;
            guests.appendChild(newDiv);
        }
        price.innerHTML = `<h1>Price: ${value * 80}€</h1>`
    });
});