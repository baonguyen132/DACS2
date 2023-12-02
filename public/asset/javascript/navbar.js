const body = document.querySelector("body"),
    slidebar = document.querySelector(".slidebar"),
    toggle = document.querySelector(".toggle"),
    searchBtn = document.querySelector(".search-box"),
    modeText = document.querySelector(".mode-text"),
    modeSwitch = document.querySelector(".toggle-width");

if (localStorage.getItem("mode") === "dark") {
    body.classList.add("dark");
    modeText.innerHTML = "Light Mode";
} else {
    body.classList.remove("dark");
    modeText.innerHTML = "Dark Mode";
}

toggle.addEventListener("click", () => {
    slidebar.classList.toggle("close");
});

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerHTML = "Light Mode";
        localStorage.setItem("mode", "dark");
    } else {
        modeText.innerHTML = "Dark Mode";
        localStorage.setItem("mode", "light");
    }
});
