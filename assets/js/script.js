// Animasi style desktop ke tablet
const sidebarSlide = () => {

    const sidebar = document.querySelector('.sidebar');
    const navbar = document.querySelector('.navbar');
    const main = document.querySelector('.main');
    const footer = document.querySelector('.footer');
    const tombol = document.querySelector('.sidebar .tengah .tombol');
    const teks = document.querySelector('.sidebar .logo .text');
    const sidebar_header = document.querySelectorAll('.sidebar .sidebar-header');
    const sidebar_a = document.querySelectorAll('.sidebar li a');
    const sidebar_a_i = document.querySelectorAll('.sidebar li a i');
    const sidebar_a_span = document.querySelectorAll('.sidebar li a span');
    const sidebar_li_active = document.querySelector('.sidebar li.active');
    const sidebar_tombol = document.querySelector('.sidebar .tengah .tombol i.arrow');

    tombol.addEventListener('click', () => {
        sidebar.classList.toggle('toggle-tablet');
        navbar.classList.toggle('toggle-tablet');
        footer.classList.toggle('toggle-tablet');
        main.classList.toggle('toggle-tablet');
        teks.classList.toggle('toggle-tablet');

        sidebar_header.forEach((link) => {
            link.classList.toggle('toggle-tablet');
        });
        sidebar_a.forEach((link) => {
            link.classList.toggle('toggle-tablet');
        });
        sidebar_a_i.forEach((link) => {
            link.classList.toggle('toggle-tablet');
        });
        sidebar_a_span.forEach((link) => {
            link.classList.toggle('toggle-tablet');
        });
        sidebar_li_active.classList.toggle('toggle-tablet');
        sidebar_tombol.classList.toggle('toggle-tablet');
    });
}

// Animasi style tablet ke phone
const sidebarSlide2 = () => {

    const burger = document.querySelector('.navbar .burger1');
    const navbar = document.querySelector('.navbar');
    const sidebar = document.querySelector('.sidebar');
    const main = document.querySelector('.main');
    const footer = document.querySelector('.footer');

    burger.addEventListener('click', () => {
        sidebar.classList.toggle('toggle-phone');
        navbar.classList.toggle('toggle-phone');
        main.classList.toggle('toggle-phone');
        footer.classList.toggle('toggle-phone');
    });
}

// Animasi style phone ke tablet
const sidebarSlide3 = () => {

    const burger = document.querySelector('.navbar .burger2');
    const navbar = document.querySelector('.navbar');
    const sidebar = document.querySelector('.sidebar');
    const main = document.querySelector('.main');
    const footer = document.querySelector('.footer');

    burger.addEventListener('click', () => {
        sidebar.classList.toggle('toggle-phone-buka');
        navbar.classList.toggle('toggle-phone-buka');
        main.classList.toggle('toggle-phone-buka');
        footer.classList.toggle('toggle-phone-buka');
    });
}

// Toggle kotak
const kotakmuncul = () => {
    const tombol_user = document.querySelector('nav.navbar .tombol-user');
    const kotak = document.querySelector('nav.navbar .tombol-user .kotak');

    tombol_user.addEventListener('click', () => {
        kotak.classList.toggle('muncul');
    });
}

// Inisialisasi
const starto = () => {
    sidebarSlide();
    sidebarSlide2();
    sidebarSlide3();
    kotakmuncul();
}
starto();