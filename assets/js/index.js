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




// THIS IS TEMPORARY, NEED TO STUDY THIS MORE, KINDA WORKS THOUGH
$(document).ready(function () {
    $('#addProduct').on('click', function (event) {
        event.preventDefault();
        var formData = $('#add-product-form').serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: './includes/Product.php',
            data: formData,
            success: function (response) {
                // Handle success response here
                console.log(response);
                // Optionally, update the UI or show a success message
                $('#all-products').html(response);
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                // Optionally, show an error message to the user
            }
        });
    });
});