let tabs = document.querySelectorAll(".tabs");
let navi = document.querySelectorAll(".nav-point")
let next = document.querySelector("#next");
let prev = document.querySelector("#prev");
let submit = document.querySelector("#send");
let currentTab = 0; // Corrected variable name

tabs[currentTab].classList.add("show-tabs")
next.addEventListener("click", () => {
    if (currentTab < tabs.length - 1) {
        // tabs[currentTab].style.display = "none"
        tabs[currentTab].classList.remove("show-tab")
        currentTab++;
        tabs[currentTab].classList.add("show-tab")
        navi[currentTab].classList.add("bg-info")
        navi[currentTab].classList.add("active-nav-point")

        prev.style.display = "block"

        if (currentTab == tabs.length - 1) {
            submit.style.display = "block"
            next.style.display = "none"
        }
    }
})
prev.addEventListener('click', () => {

    if (currentTab > 0) {
        tabs[currentTab].classList.remove("show-tab")
        navi[currentTab].classList.remove("bg-info")
        navi[currentTab].classList.remove("active-nav-point")
        currentTab--;
        tabs[currentTab].classList.add("show-tab")
        next.style.display = "block"
        submit.style.display = "none"
        if (currentTab == 0) {
            prev.style.display = "none"
            next.style.display = "block"
        }
    }
})



