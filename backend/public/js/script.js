document.addEventListener("DOMContentLoaded", function () {
    // Handle form submissions
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            alert("Form submitted!");
        });
    });

    // Handle navigation
    const navLinks = document.querySelectorAll(".nav-link");
    navLinks.forEach((link) => {
        link.addEventListener("click", function () {
            alert(`Navigating to ${this.textContent}`);
        });
    });
});
