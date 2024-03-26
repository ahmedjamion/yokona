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

            // Store the active tab in session storage
            //sessionStorage.setItem('activeTab', tabButton);
        })
    })
}

document.addEventListener("DOMContentLoaded", () => {
    setUpTabs();

    document.querySelectorAll(".main-component").forEach(tabsContainer => {
        tabsContainer.querySelector(".mc-sidebar .mc-tab-button").click();
        /*
                const activeTab = sessionStorage.getItem('activeTab');
                if (activeTab) {
                    const activeTabButton = tabsContainer.querySelector(`.mc-tab-button[data-for-tab="${activeTab}"]`);
                    if (activeTabButton) {
                        activeTabButton.click();
                    }
                } else {
                    tabsContainer.querySelector(".mc-sidebar .mc-tab-button").click();
                }*/
    })
})

// END OF SET UP TABS...




// AJAX TEST
/*
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
                alert("new product added");
            },
            error: function (xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                // Optionally, show an error message to the user
            }
        });
    });
});
*/



// FETCH TEST
/*
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('addProduct').addEventListener('click', (event) => {
        event.preventDefault();

        // Serialize form data manually
        const formData = new URLSearchParams(new FormData(document.getElementById('add-product-form')));

        fetch('./includes/Product.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                // Handle success response here
                console.log(data);
                // Optionally, update the UI or show a success message
                document.getElementById('all-products').innerHTML = data;
                alert('New product added');
            })
            .catch(error => {
                // Handle error
                console.error('There was an error:', error.message);
                // Optionally, show an error message to the user
            });
    });
});
*/