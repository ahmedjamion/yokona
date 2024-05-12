// SCRIPTS


console.log('user id: ', userId);


// LINKS TO PHP
const custUrl = "includes/Customer.php";
const empUrl = "includes/Employee.php";
const prodUrl = "includes/Product.php";
const userUrl = "includes/User.php";
const produceUrl = "includes/Produce.php";
const orderUrl = "includes/Order.php";


// FORM ELEMENTS
const customerForm = document.getElementById('customer-form');
const customerForm1 = document.getElementById('customer-form1');
const employeeForm = document.getElementById('employee-form');
const productForm = document.getElementById('product-form');
const userForm = document.getElementById('user-form');
const produceForm = document.getElementById('produce-form');
const orderForm = document.getElementById('order-form');


document.addEventListener('DOMContentLoaded', (e) => {
    e.preventDefault();


    // CREATING TABLES
    showCustomers();
    showEmployees();
    showProducts();
    showUsers();
    showProduces();
    showOrders();
    showEmpSelect();


    // HANDLE FORM SUBMIT
    customerForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, e.submitter.value);
        const data = Object.fromEntries(formData.entries());
        console.log(data);
        submitForm(data, custUrl, getAllData, createCustomersTable, 'getAllCustomers', customerForm);
    });

    customerForm1.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, e.submitter.value);
        const data = Object.fromEntries(formData.entries());
        console.log(data);

        const submitCallback = () => {
            getAllData(custUrl, createCustomersCards, 'getAllCustomers');
        };


        submitForm(data, custUrl, getAllData, createCustomersTable, 'getAllCustomers', customerForm1, submitCallback);
    });


    employeeForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, e.submitter.value);
        const data = Object.fromEntries(formData.entries());
        console.log(data);

        const submitCallback = () => {
            showEmpSelect();
        };

        submitForm(data, empUrl, getAllData, createEmployeesTable, 'getAllEmployees', employeeForm, submitCallback);
    });


    productForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, e.submitter.value);
        const data = Object.fromEntries(formData.entries());
        console.log(data);

        const submitCallback = () => {
            getAllData(prodUrl, createItemsCards, 'getAllProducts');
            getAllData(prodUrl, createProductsCards, 'getAllProducts');
        };
        submitForm(data, prodUrl, getAllData, createProductsTable, 'getAllProducts', productForm, submitCallback);
    });

    produceForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, e.submitter.value);
        const data = Object.fromEntries(formData.entries());
        console.log(data);
        submitForm(data, produceUrl, getAllData, createProduceTable, 'getAllProduce', produceForm);
    });


    orderForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const orderUserId = userId;
        const ordCustId = addOrder.querySelector('.custId').value;

        const data = {};

        data.user_id = orderUserId;
        data.customer_id = ordCustId;

        const submitButton = orderForm.querySelector('button[type="submit"]');
        data.action = submitButton.value;


        const itemInputs = document.querySelectorAll('.item-input');
        data.items = [];

        itemInputs.forEach(itemInput => {
            const productId = itemInput.querySelector('.productId').value;
            const itemPrice = itemInput.querySelector('.itemPrice').value;
            const itemQuantity = itemInput.querySelector('.itemQuantity').value;
            const subTotal = itemInput.querySelector('.subTotal').value;

            data.items.push({
                prod_id: productId,
                price: itemPrice,
                quantity: itemQuantity,
                sub_total: subTotal
            });
        });


        console.log('order data: ', data);


        submitForm(data, orderUrl, getAllData, createOrderTable, 'getAllOrders', orderForm);
    });


    userForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(e.target);
        formData.append(e.submitter.name, e.submitter.value);
        const data = Object.fromEntries(formData.entries());
        console.log(data);
        submitForm(data, userUrl, getAllData, createUsersTable, 'getAllUsers', userForm);
    });



    const mainComponent = document.getElementById('main-component');

    mainComponent.addEventListener("submit", (e) => {
        e.preventDefault();

        if (e.target.classList.contains('action-form')) {
            console.log(e.target);

            const form = e.target.closest(".action-form");

            const url = form.getAttribute('action');

            const formData = new FormData(e.target);
            formData.append(e.submitter.name, e.submitter.value);
            const data = Object.fromEntries(formData.entries());

            submitAction(data, url);
        }
    });
});





// SUBMIT FORM PROCESS AND UPDATE TABLE
async function submitForm(data, url, callback, callbackFunction, value, form, submitCallback) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();
        console.log(response);
        console.log(result);

        if (callback) {
            callback(url, callbackFunction, value);
        }


        const message = document.createElement('p');
        message.textContent = result.message;
        message.style.textAlign = 'center';


        const modalContent = form.parentElement;
        const modal = modalContent.parentElement;


        if (result.success === true) {

            message.style.color = 'green';
            modalContent.appendChild(message);

            setTimeout(() => {
                //hideModal(modal);
                message.remove();
            }, 3000);
        } else {

            message.style.color = 'red';
            modalContent.appendChild(message);

            setTimeout(() => {
                message.remove();
            }, 3000);
        }


        if (submitCallback) {
            submitCallback();
        }
        form.reset();




    } catch (error) {
        console.error(error);
    }
}



// PROCESSING ACTION BUTTONS
async function submitAction(data, url) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();

        if (result.success === true) {
            switch (url) {
                case 'includes/Customer.php':
                    showCustomers();
                    getAllData(custUrl, createCustomersCards, 'getAllCustomers');
                    break;

                case 'includes/Employee.php':
                    showEmployees();
                    break;

                case 'includes/Product.php':
                    showProducts();
                    getAllData(prodUrl, createItemsCards, 'getAllProducts');
                    getAllData(prodUrl, createProductsCards, 'getAllProducts');
                    break;

                case 'includes/Produce.php':
                    showProduces();
                    break;

                case 'includes/User.php':
                    showUsers();
                    break;

                default:
                    break;
            }
        }

    } catch (error) {
        console.error(error);
    }
}




// FUNCTIONS FOR CREATING TABLES
function showCustomers() {
    getAllData(custUrl, createCustomersTable, 'getAllCustomers');
}

function showEmployees() {
    getAllData(empUrl, createEmployeesTable, 'getAllEmployees');
}

function showProducts() {
    getAllData(prodUrl, createProductsTable, 'getAllProducts');
}

function showProduces() {
    getAllData(produceUrl, createProduceTable, 'getAllProduce');
}

function showUsers() {
    getAllData(userUrl, createUsersTable, 'getAllUsers');
}

function showOrders() {
    getAllData(orderUrl, createOrderTable, 'getAllOrders');
}

function showEmpSelect() {
    getAllData(empUrl, createEmployeeSelect, 'getAllEmployees');
}





// GET ALL DATA FROM DATABASE
async function getAllData(url, callback, value) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: value })
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


// GET A SINGLE DATA FROM DATABASE
async function getData(url, callback, action, id) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: action, id: id })
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



// FUNCTION FOR CREATING INPUT SUBMITS (ACTION COLUMN OF TABLES)
function createButtonSubmit(value, buttonName, buttonClass) {
    const button = document.createElement('button');
    button.innerHTML = buttonName;
    button.className = buttonClass;
    button.type = 'submit';
    button.name = 'action';
    button.value = value;
    return button;
}


// CREATE ACTIONS COLUMN FOR TABLES
function createActions(td, id, url) {
    const actionForm = document.createElement('form');
    actionForm.method = 'POST';
    actionForm.action = url;
    actionForm.className = 'action-form';

    const actionId = document.createElement('input');
    actionId.type = 'hidden';
    actionId.name = 'id';
    actionId.value = id;

    const view = createButtonSubmit('view', '<i class="fa-solid fa-image"></i><span class="tooltip">View</span>', 'view-button');
    const edit = createButtonSubmit('edit', '<i class="fa-solid fa-square-pen"></i><span class="tooltip">Edit</span>', 'edit-button');
    const remove = createButtonSubmit('delete', '<i class="fa-solid fa-trash"></i><span class="tooltip">Delete</span>', 'delete-button');


    actionForm.appendChild(actionId);
    actionForm.appendChild(view);
    actionForm.appendChild(edit);
    actionForm.appendChild(remove);
    td.appendChild(actionForm);
}



// CREATE CUSTOMERS TABLE
function createCustomersTable(data) {
    const tableBody = document.getElementById('ct-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const columnsToDisplay = ['first_name', 'last_name', 'gender', 'address', 'contact_number', 'actions'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            if (column === 'actions') {
                createActions(td, row.id, 'includes/Customer.php');
            } else {
                td.textContent = row[column];
            }
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

        const columnsToDisplay = ['first_name', 'last_name', 'gender', 'address', 'contact_number', 'actions'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            if (column === 'actions') {
                createActions(td, row.id, 'includes/Employee.php');
            } else {
                td.textContent = row[column];
            }
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}

function createEmployeeSelect(data) {
    const empSelect = document.getElementById('employeeId');

    data.forEach(employee => {
        const option = document.createElement('option');
        option.value = employee.id;
        option.textContent = `${employee.first_name} ${employee.last_name}`;
        empSelect.appendChild(option);
    });
}


// CREATE PRODUCTS TABLE
function createProductsTable(data) {
    const tableBody = document.getElementById('pt-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const columnsToDisplay = ['name', 'size', 'type', 'tray_size', 'price', 'actions'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            if (column === 'actions') {
                createActions(td, row.id, 'includes/Product.php');
            } else {
                td.textContent = row[column];
            }
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}



// CREATE PRODUCE TABLE
function createProduceTable(data) {
    const tableBody = document.getElementById('pd-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const mergedColumnCell = document.createElement('td');
        mergedColumnCell.textContent = `${row.name} ${row.size} ${row.type} ${row.tray_size}s`;
        tr.appendChild(mergedColumnCell);

        const columnsToDisplay = ['produce_date', 'quantity', 'actions'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            if (column === 'actions') {
                createActions(td, row.id, 'includes/Produce.php');
            } else {
                td.textContent = row[column];
            }
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}




function createOrderTable(data) {
    const tableBody = document.getElementById('or-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');

        const dateCreated = document.createElement('td');
        dateCreated.textContent = `${row.date_created}`;
        tr.appendChild(dateCreated);

        const custName = document.createElement('td');
        custName.textContent = `${row.cfn} ${row.cln}`;
        tr.appendChild(custName);

        const userName = document.createElement('td');
        userName.textContent = `${row.efn} ${row.eln} / ${row.role}`;
        tr.appendChild(userName);

        const datePaid = document.createElement('td');
        datePaid.textContent = row.date_paid !== null ? row.date_paid : 'Unpaid';
        tr.appendChild(datePaid);

        const actions = document.createElement('td');
        createActions(actions, row.id, 'includes/Order.php');
        tr.appendChild(actions);


        tableBody.appendChild(tr);
    });
}




// CREATE USERS TABLE
function createUsersTable(data) {
    const tableBody = document.getElementById('ut-body');
    tableBody.innerHTML = '';



    data.forEach(row => {
        const tr = document.createElement('tr');

        const mergedColumnCell = document.createElement('td');
        mergedColumnCell.textContent = `${row.first_name} ${row.last_name}`;
        tr.appendChild(mergedColumnCell);

        const columnsToDisplay = ['username', 'role', 'actions'];

        columnsToDisplay.forEach(column => {
            const td = document.createElement('td');
            if (column === 'actions') {
                createActions(td, row.id, 'includes/User.php');
            } else {
                td.textContent = row[column];
            }
            tr.appendChild(td);
        });

        tableBody.appendChild(tr);
    });
}




// PRODUCE LOGS
const productSelection = document.querySelector('.product-selection');
const productId = document.getElementById('pp-id');

// FUNCTION TO CREATE PRODUCTS CARDS
function createProductsCards(data) {
    productSelection.innerHTML = "";

    data.forEach(product => {
        const card = document.createElement('div');
        card.classList.add('product-card');
        card.setAttribute('data-id', product.id);

        const cardContent = `
            <div class="product-details">
                <h3>${product.name}</h3>
                <p>Size: ${product.size}</p>
                <p>Type: ${product.type}</p>
                <p>Tray Size: ${product.tray_size}</p>
                <p>Price: ${product.price}</p>
            </div>
        `;
        card.innerHTML = cardContent;
        productSelection.appendChild(card);


        card.addEventListener('click', function () {
            const id = card.getAttribute('data-id');
            productId.value = id;
            const event = new Event('input', { bubbles: true });
            productId.dispatchEvent(event);

            const modal = card.closest('.modal');
            hideModal(modal);
            console.log('Product ID set:', id);
        });
    });
}




function createProductCard(data) {

    console.log("this is data: ", data)

    const card = document.querySelector('.sp-card');
    card.innerHTML = '';

    if (data) {
        const cardContent = `
                <div class="product-details">
                    <h3>${data[0].name}</h3>
                    <p>Size: ${data[0].size}</p>
                    <p>Type: ${data[0].type}</p>
                    <p>Tray Size: ${data[0].tray_size}</p>
                    <p>Price: ${data[0].price}</p>
                </div>
            `;
        card.innerHTML = cardContent;
    } else {
        card.innerHTML = '<p>No Product Selected</p>';
    }
}

productId.addEventListener('input', () => {
    const id = productId.value;
    if (id) {
        getData(prodUrl, createProductCard, 'getProduct', id);
    }
    console.log('input changed');
})


// CREATE CARDS
document.addEventListener('DOMContentLoaded', () => {
    getAllData(prodUrl, createProductsCards, 'getAllProducts');
});




// ORDERS
const customerSelection = document.querySelector('.customer-selection');
const customerId = document.getElementById('cust-id');

function createCustomersCards(data) {
    customerSelection.innerHTML = "";

    data.forEach(customer => {
        const card = document.createElement('div');
        card.classList.add('customer-card');
        card.setAttribute('data-id', customer.id);

        const cardContent = `
            <div class="customer-details">
                <h3>${customer.first_name} ${customer.last_name}</h3>
                <p>Address: ${customer.address}</p>
                <p>Contact #: ${customer.contact_number}</p>
            </div>
        `;
        card.innerHTML = cardContent;
        customerSelection.appendChild(card);


        card.addEventListener('click', function () {
            const id = card.getAttribute('data-id');
            customerId.value = id;
            const event = new Event('input', { bubbles: true });
            customerId.dispatchEvent(event);

            const modal = card.closest('.modal');
            hideModal(modal);
            console.log('Product ID set:', id);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    getAllData(custUrl, createCustomersCards, 'getAllCustomers');
});


function createCustomerCard(data) {

    console.log("this is data: ", data)

    const card = document.querySelector('.sc-card');
    card.innerHTML = '';

    if (data) {
        const cardContent = `
                <div class="cust-details">
                    <h3>${data[0].first_name} ${data[0].last_name}</h3>
                    <p>Address: ${data[0].address}</p>
                    <p>Contact #: ${data[0].contact_number}</p>
                </div>
            `;
        card.innerHTML = cardContent;

    } else {
        card.innerHTML = '<p>No Customer Selected</p>';
    }
}


customerId.addEventListener('input', () => {
    const id = customerId.value;
    if (id) {
        getData(custUrl, createCustomerCard, 'getCustomer', id);
    }
    console.log('input changed');
})






// PRODUCE LOGS
const itemSelection = document.querySelector('.item-selection');
const orderItems = document.querySelector('.order-items');

// FUNCTION TO CREATE PRODUCTS CARDS
function createItemsCards(data) {
    itemSelection.innerHTML = "";

    data.forEach(item => {
        const card = document.createElement('div');
        card.classList.add('input-item');
        card.setAttribute('data-id', item.id);

        const cardContent = `
            <div class="item-details">
                <h3>${item.name}</h3>
                <p>Size: ${item.size}</p>
                <p>Type: ${item.type}</p>
                <p>Tray Size: ${item.tray_size}</p>
                <p>Price: ${item.price}</p>
            </div>
        `;
        card.innerHTML = cardContent;
        itemSelection.appendChild(card);


        card.addEventListener('click', function () {
            const id = card.getAttribute('data-id');

            getData(prodUrl, createOrderItem, 'getProduct', id);

            const modal = card.closest('.modal');
            hideModal(modal);
            console.log('Product ID set:', id);
        });
    });
}



function createOrderItem(data) {
    console.log("this is data: ", data)

    const inputItem = document.createElement('div');
    inputItem.classList.add('order-item');

    if (data) {
        const itemContent = `
                <div class="item-details">
                    <button class="removeItem" style="padding: 0; backgroud: transparent; align-self: center;"><i class="fa-solid fa-circle-minus"></i></button>
                    <div class="product-details">
                        <h3>${data[0].name}</h3>
                        <p>Size: ${data[0].size}</p>
                        <p>Type: ${data[0].type}</p>
                        <p>Tray Size: ${data[0].tray_size}</p>
                        <p>Price: ${data[0].price}</p>
                    </div>
                    <div class="item-input">
                        <input type="hidden" class="productId" name="prod_id" value="${data[0].id}">
                        <input type="hidden" class="itemPrice" name="price" value="${data[0].price}">
                        <input type="number" class="itemQuantity" name="quantity" placeholder="Quantity">
                        <input type="number" class="subTotal" name="sub_total" placeholder="Sub Total" readonly></p>
                    </div>
                </div>
            `;
        inputItem.innerHTML = itemContent;

        const remove = inputItem.querySelector('.removeItem');
        remove.addEventListener('click', () => {
            inputItem.remove();
            showOrderTotals();
        })


        orderItems.appendChild(inputItem);

        const quantity = inputItem.querySelector('.itemQuantity');
        const subTotal = inputItem.querySelector('.subTotal');
        quantity.addEventListener('input', () => {
            const itemQuantity = parseFloat(quantity.value);
            const itemPrice = parseFloat(inputItem.querySelector('.itemPrice').value);
            subTotal.value = itemQuantity * itemPrice;

            showOrderTotals();
        });
    } else {
        inputItem.innerHTML = '<p>No items yet</p>';
        orderItems.appendChild(inputItem);
    }
}


document.addEventListener('DOMContentLoaded', () => {
    getAllData(prodUrl, createItemsCards, 'getAllProducts');
    createOrderItem();
    createCustomerCard();
});





function showOrderTotals() {
    const orderQuantity = document.getElementById('orderQ');
    const orderPrice = document.getElementById('orderP');
    const orderQs = document.querySelectorAll('.itemQuantity');
    const subTotals = document.querySelectorAll('.subTotal');

    let totalQ = 0;

    orderQs.forEach((item) => {
        totalQ += parseInt(item.value);
    });

    orderQuantity.innerText = totalQ;

    let totalP = 0;
    subTotals.forEach((item) => {
        totalP += parseFloat(item.value);
    })

    orderPrice.innerText = totalP;
}




// MODALS
const modalButtons = document.querySelectorAll('.open-modal');
const modals = document.querySelectorAll('.modal');
const closeButtons = document.querySelectorAll('.close-modal');


function showModal(modal) {

    if (modal) {
        modal.style.display = 'flex';
        modal.style.animation = 'appear .25s';
        modal.setAttribute('tabindex', '0');
        modal.focus();
    }
}

modalButtons.forEach(function (button) {
    button.onclick = function (e) {
        e.preventDefault();
        const modalId = button.getAttribute('data-modal');
        const modal = document.getElementById(modalId);
        console.log('this is the modal value: ' + modal);
        const form = modal.querySelector('form');
        if (form) {
            form.reset();
        }
        console.log(form);
        showModal(modal);
    }
});


function hideModal(modal) {
    if (modal) {
        modal.style.animation = 'disappear .25s';
        setTimeout(function () {
            modal.style.display = 'none';
        }, 250);

        modal.removeAttribute('tabindex');
    }
}


closeButtons.forEach(function (button) {
    button.onclick = function (e) {
        e.preventDefault();
        const modal = button.closest('.modal');
        hideModal(modal);
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
        hideModal(event.target);
    }
}










// TABS
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



// INNER TABS
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

    document.querySelectorAll(".c-tabs").forEach(tabsContainer => {
        tabsContainer.querySelector(".c-tab-nav .c-tab-button").click();
    })
})
// END OF SET UP CONTENTS TABS...




// MOBILE SIDEBAR
const openSidebarIcon = document.querySelector('.open-sidebar');
const closeSidebarIcon = document.querySelector('.close-sidebar');
const sideBar = document.querySelector('.tab-nav');
const overlay = document.querySelector('.overlay');
let sidebarOpen = false;

openSidebarIcon.addEventListener('click', () => {
    openSidebar();
});

closeSidebarIcon.addEventListener('click', () => {
    closeSidebar();
})

// Add event listener to the window
window.addEventListener('click', function (event) {
    // Check if the clicked element is not part of the sidebar or its toggle buttons
    if (!sideBar.contains(event.target) && event.target !== openSidebarIcon && event.target !== closeSidebarIcon && sidebarOpen) {
        closeSidebar(sideBar); // Close the sidebar if it's open
        sidebarOpen = false; // Update the flag
    }
});

function openSidebar() {
    sideBar.style.left = '0';
    sideBar.style.animation = 'slideIn .25s forwards ease';
    overlay.style.display = 'block';
    overlay.style.animation = 'appear .25s';
    sidebarOpen = true;
}

function closeSidebar() {
    if (sidebarOpen) {
        sideBar.style.left = '-200px';
        sideBar.style.animation = 'slideOut .25s forwards ease';
        overlay.style.animation = 'disappear .25s';
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 250);
    }
    sidebarOpen = false;
}




// LOG OUT PROCESS
const logOutForm = document.getElementById('logOutForm');

logOutForm.addEventListener('submit', (e) => {

    e.preventDefault();
    logOut();

});


// LOG OUT FUNCTION USING FETCH
async function logOut() {
    try {
        const response = await fetch('includes/Login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: 'logOut' })
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const data = await response.json();

        console.log(response);
        window.location.href = 'index.php';

    } catch (error) {
        console.error('Error fetching data:', error);
    }
}


function updateClock() {
    const now = new Date();
    const hours = now.getHours() % 12 || 12;
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const ampm = now.getHours() >= 12 ? 'PM' : 'AM';

    const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
    document.getElementById('clock').innerText = timeString;

    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = now.toLocaleDateString('en-US', options);
    document.getElementById('date').innerText = dateString;
}

setInterval(updateClock, 1000);