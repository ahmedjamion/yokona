// SCRIPTS



// SET UP TABS FOR MAIN COMPONENT
function setUpTabs() {
    document.querySelectorAll(".tab-button").forEach(button => {
        button.addEventListener("click", () => {
            const tabNav = button.parentElement;
            const tabsContainer = tabNav.parentElement;
            const tabButton = button.dataset.forTab;
            const tabToActivate = tabsContainer.querySelector(`.tab-content[data-tab="${tabButton}"]`);



            tabNav.querySelectorAll(".tab-button").forEach(button => {
                button.classList.remove("tab-button-active");
            })

            tabsContainer.querySelectorAll(".tab-content").forEach(tab => {
                tab.classList.remove("tab-content-active");
            })

            button.classList.add("tab-button-active");
            tabToActivate.classList.add("tab-content-active");
        })
    })
}

document.addEventListener("DOMContentLoaded", () => {
    setUpTabs(document.body);

    document.querySelectorAll(".tabs").forEach(tabsContainer => {
        tabsContainer.querySelector(".tab-nav .tab-button").click();
    })
})
// END OF SET UP TABS FOR MAIN COMPONENT...




// SET UP CONTENTS TABS
function setUpContentTabs() {
    document.querySelectorAll(".c-tab-button").forEach(button => {
        button.addEventListener("click", () => {
            const tabNav = button.parentElement;
            const tabsContainer = tabNav.parentElement;
            const tabButton = button.dataset.forTab;
            const tabToActivate = tabsContainer.querySelector(`.c-tab-content[data-tab="${tabButton}"]`);



            tabNav.querySelectorAll(".c-tab-button").forEach(button => {
                button.classList.remove("c-tab-button-active");
            })

            tabsContainer.querySelectorAll(".c-tab-content").forEach(tab => {
                tab.classList.remove("c-tab-content-active");
            })

            button.classList.add("c-tab-button-active");
            tabToActivate.classList.add("c-tab-content-active");
        })
    })
}

document.addEventListener("DOMContentLoaded", () => {
    setUpContentTabs();

    document.querySelectorAll(".content-tabs").forEach(tabsContainer => {
        tabsContainer.querySelector(".c-tab-nav .c-tab-button").click();
    })
})
// END OF SET UP CONTENTS TABS...




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