// SCRIPTS



// SET UP TABS FOR MAIN COMPONENT
function setUpTabs() {
    document.querySelectorAll(".mc-tab-button").forEach(button => {
        button.addEventListener("click", () => {
            const sideBar = button.parentElement;
            const tabsContainer = sideBar.parentElement;
            const tabButton = button.dataset.forTab;
            const tabToActivate = tabsContainer.querySelector(`.mc-tab-content[data-tab="${tabButton}"]`);

            sideBar.querySelectorAll(".mc-tab-button").forEach(button => {
                button.classList.remove("mc-tab-button-active");
            })

            tabsContainer.querySelectorAll(".mc-tab-content").forEach(tab => {
                tab.classList.remove("mc-tab-content-active");
            })

            button.classList.add("mc-tab-button-active");
            tabToActivate.classList.add("mc-tab-content-active");
        })
    })
}

document.addEventListener("DOMContentLoaded", () => {
    setUpTabs();

    document.querySelectorAll(".main-component").forEach(tabsContainer => {
        tabsContainer.querySelector(".mc-sidebar .mc-tab-button").click();
    })
})

// END OF SET UP TABS...