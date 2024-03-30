const btn = document.getElementById('menu-btn');
const mobileNav = document.getElementById('mobile-nav');

btn.addEventListener('click', () => {
  btn.classList.toggle('open');
  mobileNav.classList.toggle('open');

  if (mobileNav.classList.contains('open')) {
    document.body.style.overflow = 'hidden';
  } else {
    document.body.style.overflow = 'visible';
  }
});
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.querySelector(".header").style.top = "0";} 
    else {
      document.querySelector(".header").style.top = "-50px";}
      prevScrollpos = currentScrollPos;}
      document.querySelector(".header").addEventListener("mouseenter", function() {
        document.querySelector(".header").style.top = "0";});