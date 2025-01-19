// Mobile menu toggle (if required)
document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.querySelector(".menu-toggle");
    const navLinks = document.querySelector("nav ul");
  
    menuToggle.addEventListener("click", function() {
      navLinks.classList.toggle("active");
    });
  });
  