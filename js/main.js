const menuButton = document.querySelector("#menu-toggle");
const menu = document.querySelector("#primary-navigation");
const funFact = document.querySelector("#fact");

menuButton.addEventListener("click", () => {
  const isOpen = menuButton.getAttribute("aria-expanded") === "true";

  menu.classList.toggle("hidden", isOpen);
  menuButton.setAttribute("aria-expanded", String(!isOpen));
  menuButton.setAttribute("aria-label", isOpen ? "Open navigation menu" : "Close navigation menu");
});

menu.addEventListener("click", (event) => {
  if (!event.target.closest("a")) return;

  menu.classList.add("hidden");
  menuButton.setAttribute("aria-expanded", "false");
  menuButton.setAttribute("aria-label", "Open navigation menu");
});


function randomFact() {


  const facts = [
    "I debug with console.log and prayers.",
    "One small change, twelve new bugs.",
    "It works on my machine.",
    "Powered by coffee and questionable commits.",
    "My code has two moods: almost working and mysteriously broken.",
    "I call it a feature until the bug report arrives.",
    "Works perfectly, as long as nobody touches it.",
  ];

  typewriter("#fact", facts[Math.floor(Math.random() * facts.length)], 15);
  


}


function typewriter(selector, text, speed = 80) {
  const el = document.querySelector(selector);
  if (!el) return;

  el.textContent = "";
  let i = 0;
  const timer = setInterval(() => {
    el.textContent += text[i++];
    if (i === text.length) clearInterval(timer);
  }, speed);
}

typewriter("#tagline", "Hi, I am Marc Whesley!");