console.log("hello world");

const burger = document.querySelector('.burger');
const navList = document.querySelector('.navbar-links');
const navLinks = document.querySelectorAll('.navbar-links li');

console.log(burger);
burger.addEventListener('click',toggleMenu)
console.log(navList)


function toggleMenu(){

    navList.classList.toggle('nav-active');
    console.log('toggle')
    burger.classList.toggle('active');

        if (navList.classList == ('nav-active')) {
            navList.style.animation = '';
        } else {
            navList.style.animation = `navListFade 1s ease forwards`;
        }



    navLinks.forEach((link, index) => {

        if (link.style.animation) {
            link.style.animation = '';
        } else {
            link.style.animation = `navLinksFade 0.5s ease forwards ${index / 5 + 0.5}s`;
        }
    });
}

for(const navLink of navLinks){
    navLink.addEventListener('click', toggleMenu);
}