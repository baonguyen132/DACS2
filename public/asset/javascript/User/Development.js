// animate của development

window.addEventListener("scroll", () => {
    let content = document.querySelector(".animate1");
    let contentPosition = content.getBoundingClientRect().top;
    let screenPosition = window.innerHeight / 1.7;
    if (screenPosition > contentPosition) {
        content.classList.add("active1");
    }
});

window.addEventListener("scroll", () => {
    let content = document.querySelector(".animate2");
    let contentPosition = content.getBoundingClientRect().top;
    let screenPosition = window.innerHeight / 1.7;
    if (screenPosition > contentPosition) {
        content.classList.add("active2");
    }
});

window.addEventListener("scroll", () => {
    let content = document.querySelector(".animate3");
    let contentPosition = content.getBoundingClientRect().top;
    let screenPosition = window.innerHeight / 1.7;
    if (screenPosition > contentPosition) {
        content.classList.add("active3");
    }
});

window.addEventListener("scroll", () => {
    let content = document.querySelector(".animate4");
    let contentPosition = content.getBoundingClientRect().top;
    let screenPosition = window.innerHeight / 1.7;
    if (screenPosition > contentPosition) {
        content.classList.add("active4");
    }
});
