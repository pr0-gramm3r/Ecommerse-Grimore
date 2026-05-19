const arrows = document.querySelectorAll(".arrow");
const cards = document.querySelectorAll(".card")
const logo = document.querySelector('.logo');

logo.addEventListener('click',function(){
    window.location.href = "/";
})

cards.forEach(card =>{
  card.addEventListener("click",function(){
      window.location.href = "/";
  })
})

arrows.forEach(arrow => {
    arrow.addEventListener("click",function(){
        window.location.href = "/";
    })
});


const swiper = new Swiper('.swiper', {
  // Optional parameters
  slidesPerView: 3,        // how many cards visible
  spaceBetween: 35,
  centeredSlides: true,    // active card in center
  direction: 'horizontal',
  loop: true,
  watchSlidesProgress: true, // 👈 add this — fixes cloned slide rendering


   autoplay: {
   delay: 1500,
 },
 
 pagination: {
   el: '.swiper-pagination',
   clickable: true,
   dynamicBullets: true,   // cleaner dots when many slides
 },
  disableOnInteraction: false,  // keeps going after user swipes
  pauseOnMouseEnter: true,      // pauses when hovered
  speed: 400,              // transition speed in ms
  // If we need pagination

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  breakpoints: {
    0:    { slidesPerView: 1 },
    600:  { slidesPerView: 2 },
    900:  { slidesPerView: 3 },
  },

  effect: 'coverflow',   // 3D fan effect
  // coverflowEffect: {
  //   rotate: 30,
  //   slideShadows: false,
  //   depth: 100,            // 👈 add explicit depth
  //   modifier: 1,           // 👈 add explicit modifier
  // },
  coverflowEffect: {
    rotate: 30,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: false,
},

});
