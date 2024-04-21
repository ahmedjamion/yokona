// SCRIPTS


// LINKS TO PHP
const custUrl = "includes/Customer.php";
const empUrl = "includes/Employee.php";
const prodUrl = "includes/Product.php";
const userUrl = "includes/User.php";


// FORM ELEMENTS
const customerForm = document.getElementById('customer-form');
const employeeForm = document.getElementById('employee-form');
const productForm = document.getElementById('product-form');
const userForm = document.getElementById('user-form');




// AUTOMATICALLY CREATE TABLE
document.addEventListener('DOMContentLoaded', (e) => {
    e.preventDefault();
    getAllData(custUrl, createCustomersTable, 'getAllCustomers');
    getAllData(empUrl, createEmployeesTable, 'getAllEmployees');
    getAllData(prodUrl, createProductsTable, 'getAllProducts');
    getAllData(userUrl, createUsersTable, 'getAllUsers');
});




// HANDLE FORM SUBMIT
customerForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append(e.submitter.name, e.submitter.value);
    const data = Object.fromEntries(formData.entries());
    console.log(data);
    submitForm(data, custUrl, getAllData, createCustomersTable, 'getAllCustomers');
});


employeeForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append(e.submitter.name, e.submitter.value);
    const data = Object.fromEntries(formData.entries());
    console.log(data);
    submitForm(data, empUrl, getAllData, createEmployeesTable, 'getAllEmployees');
});


productForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append(e.submitter.name, e.submitter.value);
    const data = Object.fromEntries(formData.entries());
    console.log(data);
    submitForm(data, prodUrl, getAllData, createProductsTable, 'getAllProducts');
});


userForm.addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append(e.submitter.name, e.submitter.value);
    const data = Object.fromEntries(formData.entries());
    console.log(data);
    submitForm(data, userUrl, getAllData, createUsersTable, 'getAllUsers');
});







// SUBMIT FORM PROCESS AND UPDATE TABLE
async function submitForm(data, url, callback, callbackFunction, value) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        });

        console.log(response);

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();
        callback(url, callbackFunction, value);
        console.log(result);
    } catch (error) {
        console.error(error);
    }
}





// GET ALL DATA FROM DATABASE
async function getAllData(url, callback, value) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: value }) // Include any other data you need to send
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();

        console.log(response);
        console.log(data);

        callback(data);

    } catch (error) {
        console.error('Error fetching data:', error);
    }
}




// CREATE CUSTOMERS TABLE
function createCustomersTable(data) {
    const tableBody = document.getElementById('ct-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const columnsToDisplay = ['first_name', 'last_name', 'gender', 'address', 'contact_number'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            td.textContent = row[column];
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}

// CREATE EMPLOYEES TABLE
function createEmployeesTable(data) {
    const tableBody = document.getElementById('et-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const columnsToDisplay = ['first_name', 'last_name', 'gender', 'address', 'contact_number'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            td.textContent = row[column];
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}


// CREATE PRODUCTS TABLE
function createProductsTable(data) {
    const tableBody = document.getElementById('pt-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const columnsToDisplay = ['name', 'size', 'type', 'tray_size', 'price'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            td.textContent = row[column];
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}


// CREATE USERS TABLE
function createUsersTable(data) {
    const tableBody = document.getElementById('ut-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const columnsToDisplay = ['username', 'role'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            td.textContent = row[column];
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}





// MODALS
const modalButtons = document.querySelectorAll('.open-modal');
const modals = document.querySelectorAll('.modal');
const closeButtons = document.querySelectorAll('.close-modal');

modalButtons.forEach(function (button) {
    button.onclick = function () {
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = 'flex';
            modal.style.animation = 'open-modal .25s';
            modal.setAttribute('tabindex', '0');
            modal.focus();
        }
    }
});


closeButtons.forEach(function (button) {
    button.onclick = function () {
        const modal = button.closest('.modal');
        if (modal) {
            modal.style.animation = 'close-modal .25s';
            setTimeout(function () {
                modal.style.display = 'none';
            }, 250);

            modal.removeAttribute('tabindex');
        }
    }
});

modals.forEach(function (modal) {
    modal.addEventListener('keydown', function (event) {
        if (event.key === 'Tab') {
            const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            if (!event.shiftKey && document.activeElement === lastElement) {
                event.preventDefault();
                firstElement.focus();
            } else if (event.shiftKey && document.activeElement === firstElement) {
                event.preventDefault();
                lastElement.focus();
            }
        }
    });
});

window.onclick = function (event) {
    if (event.target.className === 'modal') {
        event.target.style.display = 'none';
    }
}










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




/*
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
*/