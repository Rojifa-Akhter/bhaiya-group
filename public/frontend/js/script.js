// /**
//  * Saltbay Real Estate Website
//  * Main JavaScript File
//  */


// /**
//  * Initialize Slick Slider
//  */
// function initSlider() {
//   $(document).ready(function () {
//     $(".slider").slick({
//       dots: true,
//       infinite: true,
//       speed: 800,
//       fade: true,
//       cssEase: "cubic-bezier(0.4, 0, 0.2, 1)",
//       autoplay: true,
//       autoplaySpeed: 5000,
//       arrows: true,
//       pauseOnHover: false,
//       pauseOnFocus: false,
//       responsive: [
//         {
//           breakpoint: 768,
//           settings: {
//             arrows: false,
//             dots: true,
//           },
//         },
//         {
//           breakpoint: 480,
//           settings: {
//             arrows: false,
//             dots: true,
//             autoplaySpeed: 4000,
//           },
//         },
//       ],
//     });

//     console.log("✅ Slider initialized");
//   });
// }

// /**
//  * Smooth scroll for navigation links
//  */

// /**
//  * Mobile menu toggle
//  */
// function toggleMobileMenu() {
//   const mobileMenu = document.getElementById("mobile-menu");
//   if (mobileMenu) {
//     mobileMenu.classList.toggle("hidden");
//   }
// }

// /**
//  * Form validation
//  */
// function validateEmail(email) {
//   const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   return re.test(email);
// }

// function validatePhone(phone) {
//   const re = /^[\d\s\-\+\(\)]+$/;
//   return re.test(phone);
// }

// /**
//  * Scroll to top function
//  */
// function scrollToTop() {
//   window.scrollTo({
//     top: 0,
//     behavior: "smooth",
//   });
// }

// /**
//  * Debounce utility function
//  */
// function debounce(func, wait) {
//   let timeout;
//   return function executedFunction(...args) {
//     const later = () => {
//       clearTimeout(timeout);
//       func(...args);
//     };
//     clearTimeout(timeout);
//     timeout = setTimeout(later, wait);
//   };
// }

// /**
//  * Throttle utility function
//  */
// function throttle(func, limit) {
//   let inThrottle;
//   return function () {
//     const args = arguments;
//     const context = this;
//     if (!inThrottle) {
//       func.apply(context, args);
//       inThrottle = true;
//       setTimeout(() => (inThrottle = false), limit);
//     }
//   };
// }

// /**
//  * Show loading indicator
//  */
// function showLoader() {
//   const loader = document.createElement("div");
//   loader.className =
//     "loader fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50";
//   loader.id = "page-loader";
//   document.body.appendChild(loader);
// }

// function hideLoader() {
//   const loader = document.getElementById("page-loader");
//   if (loader) {
//     loader.remove();
//   }
// }

// // Export functions for global use
// window.Saltbay = {
//   toggleMobileMenu,
//   scrollToTop,
//   validateEmail,
//   validatePhone,
//   debounce,
//   throttle,
//   showLoader,
//   hideLoader,
// };

// const propertyCards = document.querySelectorAll(".property-card");

// propertyCards.forEach((card) => {
//   card.addEventListener("mouseenter", function () {
//     // Remove expanded class from all cards
//     propertyCards.forEach((c) => c.classList.remove("expanded"));

//     // Add expanded class to hovered card
//     this.classList.add("expanded");
//   });
// });


// const mobileMenuBtn = document.getElementById("mobileMenuBtn");
// const closeMobileMenu = document.getElementById("closeMobileMenu");
// const mobileMenu = document.getElementById("mobileMenu");

// // Open mobile menu
// mobileMenuBtn.addEventListener("click", () => {
//   mobileMenu.classList.remove("hidden");
//   document.body.style.overflow = "hidden"; // Prevent scrolling
// });

// // Close mobile menu
// closeMobileMenu.addEventListener("click", () => {
//   mobileMenu.classList.add("hidden");
//   document.body.style.overflow = "auto"; // Allow scrolling
// });

// // Close menu when clicking on a link
// const mobileMenuLinks = mobileMenu.querySelectorAll("a");
// mobileMenuLinks.forEach((link) => {
//   link.addEventListener("click", () => {
//     mobileMenu.classList.add("hidden");
//     document.body.style.overflow = "auto";
//   });
// });

// // Counter Animation (optional feature)
// function animateCounter(element, target) {
//   let current = 0;
//   const increment = target / 100;
//   const timer = setInterval(() => {
//     current += increment;
//     if (current >= target) {
//       element.textContent = target;
//       clearInterval(timer);
//     } else {
//       element.textContent = Math.floor(current);
//     }
//   }, 20);
// }

// // Initialize counters on page load
// window.addEventListener("load", () => {
//   const projectsCounter = document.querySelector('[data-counter="projects"]');
//   const hotelsCounter = document.querySelector('[data-counter="hotels"]');
//   const yearCounter = document.querySelector('[data-counter="year"]');

//   if (projectsCounter) animateCounter(projectsCounter, 18);
//   if (hotelsCounter) animateCounter(hotelsCounter, 30);
//   if (yearCounter) animateCounter(yearCounter, 1972);
// });








/**
 * Saltbay Real Estate Website
 * Optimized Main JavaScript File
 */

/* ==================================================
  1. Slick Slider Initialization
================================================== */
function initSlider() {
  document.addEventListener("DOMContentLoaded", () => {
    const sliderEl = document.querySelector(".slider");
    if (!sliderEl) return;

    $(sliderEl).slick({
      dots: true,
      infinite: true,
      speed: 800,
      fade: true,
      cssEase: "cubic-bezier(0.4, 0, 0.2, 1)",
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: true,
      pauseOnHover: false,
      pauseOnFocus: false,
      responsive: [
        { breakpoint: 768, settings: { arrows: false, dots: true } },
        { breakpoint: 480, settings: { arrows: false, dots: true, autoplaySpeed: 4000 } },
      ],
    });

    console.log("✅ Slider initialized");
  });
}

/* ==================================================
  2. Mobile Menu Toggle
================================================== */
const mobileMenuBtn = document.getElementById("mobileMenuBtn");
const closeMobileMenu = document.getElementById("closeMobileMenu");
const mobileMenu = document.getElementById("mobileMenu");

function openMobileMenu() {
  mobileMenu.classList.remove("hidden");
  document.body.classList.add("no-scroll"); // use CSS class
}

function closeMobileMenuFunc() {
  mobileMenu.classList.add("hidden");
  document.body.classList.remove("no-scroll");
}

if (mobileMenuBtn && closeMobileMenu && mobileMenu) {
  mobileMenuBtn.addEventListener("click", openMobileMenu);
  closeMobileMenu.addEventListener("click", closeMobileMenuFunc);
  mobileMenu.querySelectorAll("a").forEach(link => {
    link.addEventListener("click", closeMobileMenuFunc);
  });
}

/* CSS class to prevent scrolling */
const style = document.createElement("style");
style.innerHTML = `
  .no-scroll {
    overflow: hidden;
  }
`;
document.head.appendChild(style);

/* ==================================================
  3. Property Card Hover Effect (optimized)
================================================== */
const propertyCards = document.querySelectorAll(".property-card");
propertyCards.forEach(card => {
  card.addEventListener("mouseenter", function () {
    requestAnimationFrame(() => {
      propertyCards.forEach(c => c.classList.remove("expanded"));
      this.classList.add("expanded");
    });
  });
});

/* ==================================================
  4. Form Validation Utilities
================================================== */
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

function validatePhone(phone) {
  const re = /^[\d\s\-\+\(\)]+$/;
  return re.test(phone);
}

/* ==================================================
  5. Scroll to Top
================================================== */
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}

/* ==================================================
  6. Debounce & Throttle Utilities
================================================== */
function debounce(func, wait) {
  let timeout;
  return function (...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

function throttle(func, limit) {
  let inThrottle;
  return function () {
    const args = arguments;
    const context = this;
    if (!inThrottle) {
      func.apply(context, args);
      inThrottle = true;
      setTimeout(() => (inThrottle = false), limit);
    }
  };
}

/* ==================================================
  7. Page Loader
================================================== */
function showLoader() {
  if (document.getElementById("page-loader")) return;
  const loader = document.createElement("div");
  loader.className =
    "loader fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50";
  loader.id = "page-loader";
  document.body.appendChild(loader);
}

function hideLoader() {
  const loader = document.getElementById("page-loader");
  if (loader) loader.remove();
}

/* ==================================================
  8. Counter Animation (optimized)
================================================== */
function animateCounter(element, target) {
  let current = 0;
  function step() {
    current += target / 100;
    if (current >= target) {
      element.textContent = target;
    } else {
      element.textContent = Math.floor(current);
      requestAnimationFrame(step);
    }
  }
  requestAnimationFrame(step);
}

window.addEventListener("load", () => {
  const counters = [
    { selector: '[data-counter="projects"]', value: 18 },
    { selector: '[data-counter="hotels"]', value: 30 },
    { selector: '[data-counter="year"]', value: 1972 },
  ];

  counters.forEach(c => {
    const el = document.querySelector(c.selector);
    if (el) animateCounter(el, c.value);
  });
});

/* ==================================================
  9. Export Functions Globally
================================================== */
window.Saltbay = {
  toggleMobileMenu: openMobileMenu,
  scrollToTop,
  validateEmail,
  validatePhone,
  debounce,
  throttle,
  showLoader,
  hideLoader,
};

/* ==================================================
  10. Initialize Everything
================================================== */
initSlider();
