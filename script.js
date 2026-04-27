const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");
const navLinks = document.querySelectorAll(".nav-link[data-nav]");
const navItems = document.querySelectorAll(".nav-item--has-dropdown");
const revealItems = document.querySelectorAll(".reveal");
const page = document.body.dataset.page;
const year = document.getElementById("year");

if (year) {
  year.textContent = new Date().getFullYear();
}

// Set active page
navLinks.forEach((link) => {
  if (link.dataset.nav === page) {
    link.classList.add("is-active");
  }
});

if (navToggle && navMenu) {
  // Toggle main mobile menu
  navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("is-open");
    navToggle.setAttribute("aria-expanded", String(isOpen));
    // Close all sub-dropdowns when closing main menu
    if (!isOpen) {
      navItems.forEach(item => item.classList.remove("is-open"));
    }
  });

  // Mobile dropdown toggles
  navItems.forEach(item => {
    const link = item.querySelector(".nav-link");
    link.addEventListener("click", (e) => {
      if (window.innerWidth <= 1120) {
        e.preventDefault();
        item.classList.toggle("is-open");
      }
    });
  });

  // Close menu when clicking regular links
  const regularLinks = document.querySelectorAll(".nav-menu a:not(.nav-item--has-dropdown > .nav-link)");
  regularLinks.forEach((link) => {
    link.addEventListener("click", () => {
      navMenu.classList.remove("is-open");
      navToggle.setAttribute("aria-expanded", "false");
      navItems.forEach(item => item.classList.remove("is-open"));
    });
  });
}

// Hero Slider
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.slider-dot');
let currentSlide = 0;
let slideInterval;

function initSlider() {
  if (slides.length === 0) return;
  
  slides[0].classList.add('active');
  if(dots.length > 0) dots[0].classList.add('active');
  
  slideInterval = setInterval(nextSlide, 5000);
  
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      clearInterval(slideInterval);
      goToSlide(index);
      slideInterval = setInterval(nextSlide, 5000);
    });
  });
}

function nextSlide() {
  goToSlide(currentSlide + 1);
}

function goToSlide(n) {
  slides[currentSlide].classList.remove('active');
  if(dots.length > 0) dots[currentSlide].classList.remove('active');
  
  currentSlide = (n + slides.length) % slides.length;
  
  slides[currentSlide].classList.add('active');
  if(dots.length > 0) dots[currentSlide].classList.add('active');
}

// Initialize
initSlider();

// Reveal animations
if ("IntersectionObserver" in window) {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12 }
  );

  revealItems.forEach((item) => observer.observe(item));
} else {
  revealItems.forEach((item) => item.classList.add("is-visible"));
}
