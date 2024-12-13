"use strict";
document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const navLinks = document.querySelector(".nav-links");

  menuToggle.addEventListener("click", function () {
    navLinks.classList.toggle("active");
    menuToggle.classList.toggle("active");
  });

  window.addEventListener("scroll", function () {
    var childOfOne = document.getElementById("main_nav");
    var navLinks = document.querySelector(".nav-links");

    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
      childOfOne.style.padding = "10px";
      childOfOne.style.opacity = "1";
      childOfOne.style.transition = "all 0.5s ease";
      childOfOne.style.width = "70%";
      childOfOne.style.marginTop = "1rem";
      childOfOne.style.borderRadius = "10px";
      navLinks.style.borderRadius = "10px";
    } else {
      childOfOne.style.width = "100%";
      childOfOne.style.marginTop = "0";
      childOfOne.style.borderRadius = "0px";
      childOfOne.style.backgroundColor = "";
      childOfOne.style.padding = "1rem 1rem 1rem .7rem";
      childOfOne.style.opacity = "1";
      childOfOne.style.transition = "all 0.2s ease";
      navLinks.style.borderRadius = "0px 0px 10px 10px";
    }
  });
});
