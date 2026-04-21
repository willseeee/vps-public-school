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
