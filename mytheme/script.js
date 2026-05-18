const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");
const navLinks = document.querySelectorAll(".nav-link[data-nav]");
const navItems = document.querySelectorAll(".nav-item--has-dropdown");
const revealItems = document.querySelectorAll(".reveal");
const year = document.getElementById("year");

if (year) {
  year.textContent = new Date().getFullYear();
}

// Set active page based on URL path
const currentPath = window.location.pathname;
navLinks.forEach((link) => {
  const linkHref = link.getAttribute('href');
  if (linkHref && currentPath === new URL(linkHref, window.location.origin).pathname) {
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

// Header scroll effect with hysteresis to prevent jittering
const header = document.querySelector(".main-header");
if (header) {
  window.addEventListener("scroll", () => {
    const scrollPos = window.scrollY;
    if (scrollPos > 100) {
      header.classList.add("main-header--scrolled");
    } else if (scrollPos < 40) {
      header.classList.remove("main-header--scrolled");
    }
  });
}

// Reveal animations
if (revealItems.length > 0) {
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("active");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );

    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add("active"));
  }
}

// Payment method selection
document.querySelectorAll('.method-item').forEach(item => {
  item.addEventListener('click', () => {
    document.querySelectorAll('.method-item').forEach(i => i.classList.remove('active'));
    item.classList.add('active');
  });
});

// Home page Enquiry Form submission via AJAX
const enquiryForm = document.getElementById("home-enquiry-form");
if (enquiryForm) {
  enquiryForm.addEventListener("submit", function(e) {
    e.preventDefault();

    const statusDiv = document.getElementById("enquiry-form-status");
    const submitBtn = enquiryForm.querySelector('button[type="submit"]');
    const originalBtnText = submitBtn.textContent;

    // Get form data
    const formData = new FormData(enquiryForm);
    formData.append("action", "submit_enquiry");
    formData.append("nonce", vps_ajax.nonce);

    // Set loading state
    submitBtn.disabled = true;
    submitBtn.textContent = "Sending Enquiry...";
    
    if (statusDiv) {
      statusDiv.className = "form-status loading";
      statusDiv.textContent = "Submitting your enquiry, please wait...";
      statusDiv.style.display = "block";
    }

    fetch(vps_ajax.ajax_url, {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        statusDiv.className = "form-status success";
        statusDiv.textContent = data.data.message;
        enquiryForm.reset();
      } else {
        statusDiv.className = "form-status error";
        statusDiv.textContent = data.data.message || "An error occurred. Please try again.";
      }
    })
    .catch(error => {
      console.error("Error submitting form:", error);
      statusDiv.className = "form-status error";
      statusDiv.textContent = "Could not send request. Please check your internet connection.";
    })
    .finally(() => {
      submitBtn.disabled = false;
      submitBtn.textContent = originalBtnText;
    });
  });
}
