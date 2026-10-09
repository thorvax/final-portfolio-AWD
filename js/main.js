"use strict";

const menuButton = document.querySelector("#menu-toggle");
const navigation = document.querySelector("#primary-navigation");
const navLinks = [...document.querySelectorAll("[data-nav-link]")];
const sections = [...document.querySelectorAll("main section[id]")];
const contactForm = document.querySelector("#contact-form");
const formStatus = document.querySelector("#form-status");

// Feature 1: provide a keyboard-accessible mobile navigation toggle.
if (menuButton && navigation) {
  menuButton.addEventListener("click", () => {
    const isExpanded = menuButton.getAttribute("aria-expanded") === "true";
    menuButton.setAttribute("aria-expanded", String(!isExpanded));
    menuButton.setAttribute("aria-label", isExpanded ? "Open navigation menu" : "Close navigation menu");
    navigation.classList.toggle("hidden", isExpanded);
  });

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      if (window.matchMedia("(max-width: 767px)").matches) {
        navigation.classList.add("hidden");
        menuButton.setAttribute("aria-expanded", "false");
        menuButton.setAttribute("aria-label", "Open navigation menu");
      }
    });
  });
}

// Feature 2: highlight the navigation link for the section in view.
if ("IntersectionObserver" in window) {
  const sectionObserver = new IntersectionObserver((entries) => {
    const visibleSections = entries
      .filter((entry) => entry.isIntersecting)
      .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

    if (visibleSections.length === 0) return;

    const activeId = visibleSections[0].target.id;
    navLinks.forEach((link) => {
      const isCurrent = link.getAttribute("href") === `#${activeId}`;
      link.classList.toggle("bg-white/10", isCurrent);
      link.classList.toggle("text-cyan-200", isCurrent);
      link.classList.toggle("text-slate-300", !isCurrent);
      if (isCurrent) {
        link.setAttribute("aria-current", "location");
      } else {
        link.removeAttribute("aria-current");
      }
    });
  }, { rootMargin: "-25% 0px -60% 0px", threshold: [0, 0.15, 0.4, 0.7] });

  sections.forEach((section) => sectionObserver.observe(section));
}

// Feature 3: validate the contact form and show a local-only confirmation.
if (contactForm && formStatus) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();
    formStatus.textContent = "";

    if (!contactForm.checkValidity()) {
      contactForm.reportValidity();
      formStatus.textContent = "Please check the highlighted fields and try again.";
      return;
    }

    const formData = new FormData(contactForm);
    const senderName = String(formData.get("name")).trim();
    formStatus.textContent = `Thanks, ${senderName}. Your form entries are valid. This demo does not send or store messages.`;
    contactForm.reset();
  });
}

const year = document.querySelector("#current-year");
if (year) year.textContent = String(new Date().getFullYear());
