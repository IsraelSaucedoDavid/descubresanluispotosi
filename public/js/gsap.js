gsap.registerPlugin(ScrollTrigger);




//animacion para el Nav boton paquetes
gsap.to(".navbar-nav .btnpaquetes", {
    scrollTrigger: {
        trigger: '.navbar',
        start: 'bottom bottom',
        opacity: 0,

    },
    y: 1800
});

//animacion para el Nav
gsap.to(" .logo-nav", {
    scrollTrigger: {
        trigger: '.navbar',
        start: '+=350',

        toggleActions: 'restart none none reverse',
    },
    x: 250

});



//Animacion para el logo principal 
gsap.to("#logo-pri", {
    scrollTrigger: {
        trigger: '.navbar',
        start: '-=1',
        opacity: 0,

    },
    x: 400,

});




