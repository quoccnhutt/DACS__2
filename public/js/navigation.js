const item = document.querySelectorAll(".section2 .nav-item");
// const contents = document.querySelectorAll(".tab-content");

item.forEach((tab) => {
    tab.addEventListener("click", () => {

        //  to remove active class from previous tab
        item.forEach((tab) => tab.classList.remove("active"));

        tab.classList.add("active");

        // to show content according to tab selected

        // to hide previous tab content
        // contents.forEach((c) => c.classList.remove("active"));

        // contents[index].classList.add("active");
    });
});
