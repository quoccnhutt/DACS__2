const tabs = document.querySelectorAll(".tab-link");
const contents = document.querySelectorAll(".tab-contents");

tabs.forEach((tab, index) => {
  tab.addEventListener("click", () => {
    //  to remove active class from previous tab
    tabs.forEach((tab) => tab.classList.remove("active"));

    tab.classList.add("active");

    // to show content according to tab selected

    // to hide previous tab content
    contents.forEach((c) => c.classList.remove("active"));

    contents[index].classList.add("active");
  });
});
