// SCRIPTS


window.addEventListener('load', () => showLoadingScreen());




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




// HANDLE FORM SUBMISSION

function handleFormSubmit(e, url, getData, createTable, action, element, callback) {
    e.preventDefault();
    const formData = new FormData(e.target);
    formData.append(e.submitter.name, e.submitter.value);
    //const data = Object.fromEntries(formData.entries());
    console.log(formData);

    submitForm(formData, url, getData, createTable, action, element, callback);
}


const customerFormCallback = () => {
    getAllData(custUrl, createCustomersCards, 'getAllCustomers');
    updateCount(custUrl, 'getCustomerCount', custCount);
};

const employeeFormCallback = () => {
    showEmpSelect();
    updateCount(empUrl, 'getEmployeeCount', empCount);
};

const productFormCallback = () => {
    getAllData(prodUrl, createItemsCards, 'getAllProducts');
    getAllData(prodUrl, createProductsCards, 'getAllProducts');
    updateCount(prodUrl, 'getProductCount', prodCount);
};

const produceFormCallback = () => {
    updateCount(produceUrl, 'getTodaysProduceQuantity', prodQ);
    createProductCard();
};

const userFormCallback = () => {
    updateCount(userUrl, 'getUserCount', useCount);
}




customerForm.addEventListener('submit', (e) => handleFormSubmit(e, custUrl, getAllData, createCustomersTable, 'getAllCustomers', customerForm, customerFormCallback));
customerForm1.addEventListener('submit', (e) => handleFormSubmit(e, custUrl, getAllData, createCustomersTable, 'getAllCustomers', customerForm1, customerFormCallback));
employeeForm.addEventListener('submit', (e) => handleFormSubmit(e, empUrl, getAllData, createEmployeesTable, 'getAllEmployees', employeeForm, employeeFormCallback));
productForm.addEventListener('submit', (e) => handleFormSubmit(e, prodUrl, getAllData, createProductsTable, 'getAllProducts', productForm, productFormCallback));
produceForm.addEventListener('submit', (e) => handleFormSubmit(e, produceUrl, getAllData, createProduceTable, 'getAllProduce', produceForm, produceFormCallback));
userForm.addEventListener('submit', (e) => handleFormSubmit(e, userUrl, getAllData, createUsersTable, 'getAllUsers', userForm, userFormCallback));


orderForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const orderUserId = userId;
    const ordCustId = addOrder.querySelector('.custId').value;

    const formData = new FormData();

    formData.append('user_id', orderUserId);
    formData.append('customer_id', ordCustId);

    const submitButton = orderForm.querySelector('button[type="submit"]');
    formData.append('action', submitButton.value);

    const itemInputs = document.querySelectorAll('.item-input');

    itemInputs.forEach((itemInput, index) => {
        const productId = itemInput.querySelector('.productId').value;
        const itemPrice = itemInput.querySelector('.itemPrice').value;
        const itemQuantity = itemInput.querySelector('.itemQuantity').value;
        const subTotal = itemInput.querySelector('.subTotal').value;

        formData.append(`items[${index}][prod_id]`, productId);
        formData.append(`items[${index}][price]`, itemPrice);
        formData.append(`items[${index}][quantity]`, itemQuantity);
        formData.append(`items[${index}][sub_total]`, subTotal);
    });

    console.log('order data: ', Array.from(formData.entries()));

    const submitCallback = () => {
        updateCount(orderUrl, 'getTodaysOrderQuantity', orderQ);
        updateCount(orderUrl, 'getTodaysOrderTotal', orderT);
        createCustomerCard();
        createOrderItem();
    };

    submitForm(formData, orderUrl, getAllData, createOrderTable, 'getAllOrders', orderForm, submitCallback);
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

        submitAction(formData, url);
    }
});




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


document.addEventListener('DOMContentLoaded', () => {
    // CREATING TABLES
    showCustomers();
    showEmployees();
    showProducts();
    showUsers();
    showProduces();
    showOrders();
    showEmpSelect();

    setTimeout(() => {
        hideLoadingScreen();
    }, 2000);
});





// SUBMIT FORM PROCESS AND UPDATE TABLE
async function submitForm(data, url, getData, createTable, action, form, submitCallback) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            //headers: {
            //"Content-Type": "application/json",
            //},
            body: data
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();
        console.log(response);
        console.log(result);

        if (getData) {
            getData(url, createTable, action);
        }



        const modalContent = form.parentElement;
        const modal = modalContent.parentElement;

        const message = modal.querySelector('.submit-message');
        message.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> ' + result.message;



        if (result.success === true) {
            message.innerHTML = '<i class="fa-solid fa-circle-check"></i> ' + result.message;

            message.style.display = 'block';
            message.style.opacity = '1';
            message.style.color = 'green';
            message.style.animation = 'appear .25s';

            setTimeout(() => {
                message.style.opacity = '0';
                setTimeout(() => {
                    message.style.display = 'none';
                }, 250);
                message.style.animation = 'disappear .25s';
            }, 3000);
        } else {
            message.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> ' + result.message;
            message.style.display = 'block';
            message.style.opacity = '1';
            message.style.color = 'red';
            message.style.animation = 'appear .25s';

            setTimeout(() => {
                message.style.opacity = '0';
                setTimeout(() => {
                    message.style.display = 'none';
                }, 250);
                message.style.animation = 'disappear .25s';
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
async function submitAction(formData, url) {

    const action = formData.get('action');
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();

        if (result.success === true && action === 'delete' || action === 'update') {
            switch (url) {
                case 'includes/Customer.php':
                    showCustomers();
                    getAllData(custUrl, createCustomersCards, 'getAllCustomers');
                    updateCount(custUrl, 'getCustomerCount', custCount);
                    break;

                case 'includes/Employee.php':
                    showEmployees();
                    updateCount(empUrl, 'getEmployeeCount', empCount);
                    break;

                case 'includes/Product.php':
                    showProducts();
                    getAllData(prodUrl, createItemsCards, 'getAllProducts');
                    getAllData(prodUrl, createProductsCards, 'getAllProducts');
                    updateCount(prodUrl, 'getProductCount', prodCount);
                    break;

                case 'includes/Produce.php':
                    showProduces();
                    updateCount(produceUrl, 'getTodaysProduceQuantity', prodQ);
                    break;

                case 'includes/User.php':
                    showUsers();
                    updateCount(userUrl, 'getUserCount', useCount);
                    break;

                case 'includes/Order.php':
                    showOrders();
                    updateCount(orderUrl, 'getTodaysOrderQuantity', orderQ);
                    updateCount(orderUrl, 'getTodaysOrderTotal', orderT);
                    break;

                default:
                    break;
            }
        }

    } catch (error) {
        console.error(error);
    }
}







// GET ALL DATA FROM DATABASE
async function getAllData(url, callback, action) {
    const formData = new FormData();
    formData.append('action', action);
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
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
    const formData = new FormData();
    formData.append('action', action);
    formData.append('id', id);
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
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

        const name = document.createElement('td');
        name.textContent = `${row.first_name} ${row.last_name}`;
        tr.appendChild(name);

        const gender = document.createElement('td');
        gender.textContent = `${row.gender}`;
        tr.appendChild(gender);

        const address = document.createElement('td');
        address.textContent = `${row.address}`;
        tr.appendChild(address);

        const contact = document.createElement('td');
        contact.textContent = `${row.contact_number}`;
        tr.appendChild(contact);

        const actions = document.createElement('td');
        createActions(actions, row.id, 'includes/Customer.php');
        tr.appendChild(actions);

        tableBody.appendChild(tr);
    });
}

// CREATE EMPLOYEES TABLE
function createEmployeesTable(data) {
    const tableBody = document.getElementById('et-body');
    tableBody.innerHTML = '';

    data.forEach(row => {
        const tr = document.createElement('tr');


        const name = document.createElement('td');
        name.textContent = `${row.first_name} ${row.last_name}`;
        tr.appendChild(name);

        const gender = document.createElement('td');
        gender.textContent = `${row.gender}`;
        tr.appendChild(gender);

        const address = document.createElement('td');
        address.textContent = `${row.address}`;
        tr.appendChild(address);

        const contact = document.createElement('td');
        contact.textContent = `${row.contact_number}`;
        tr.appendChild(contact);

        const actions = document.createElement('td');
        createActions(actions, row.id, 'includes/Employee.php');
        tr.appendChild(actions);

        tableBody.appendChild(tr);
    });
}

function createEmployeeSelect(data) {
    const empSelect = document.getElementById('employeeId');
    empSelect.innerHTML = "";

    const optionElement = document.createElement('option');

    optionElement.setAttribute('hidden', '');
    optionElement.setAttribute('selected', '');
    optionElement.setAttribute('value', '');

    optionElement.textContent = '--Select Employee--';

    empSelect.appendChild(optionElement);

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

        const name = document.createElement('td');
        name.textContent = `${row.name}`;
        tr.appendChild(name);

        const size = document.createElement('td');
        size.textContent = `${row.size}`;
        tr.appendChild(size);

        const type = document.createElement('td');
        type.textContent = `${row.type}`;
        tr.appendChild(type);

        const tray = document.createElement('td');
        tray.textContent = `${row.tray_size}/tray`;
        tr.appendChild(tray);

        const price = document.createElement('td');
        price.textContent = `Php ${row.price}`;
        tr.appendChild(price);

        const actions = document.createElement('td');
        createActions(actions, row.id, 'includes/Product.php');
        tr.appendChild(actions);

        tableBody.appendChild(tr);
    });
}



// CREATE PRODUCE TABLE
function createProduceTable(data) {
    const tableBody = document.getElementById('pd-body');
    tableBody.innerHTML = '';

    data.sort((a, b) => new Date(b.produce_date) - new Date(a.produce_date));

    data.forEach(row => {
        const tr = document.createElement('tr');

        const prodDate = document.createElement('td');
        prodDate.textContent = `${row.produce_date}`;
        tr.appendChild(prodDate);

        const mergedColumnCell = document.createElement('td');
        mergedColumnCell.textContent = `${row.name} ${row.size} ${row.type} ${row.tray_size}s`;
        tr.appendChild(mergedColumnCell);

        const quantity = document.createElement('td');
        quantity.textContent = `${row.quantity}`;
        tr.appendChild(quantity);

        const actions = document.createElement('td');
        createActions(actions, row.id, 'includes/Produce.php');
        tr.appendChild(actions);

        tableBody.appendChild(tr);
    });
}



// CREATE ORDER TABLE
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

        const total = document.createElement('td');
        total.textContent = `Php ${row.total}`;
        tr.appendChild(total);

        const datePaid = document.createElement('td');

        if (row.date_paid !== null) {
            datePaid.textContent = row.date_paid;
        } else {
            const button = document.createElement('button');
            button.textContent = "Unpaid";
            datePaid.appendChild(button);
        }
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

        const username = document.createElement('td');
        username.textContent = `${row.username}`;
        tr.appendChild(username);

        const role = document.createElement('td');
        role.textContent = `${row.role}`;
        tr.appendChild(role);

        const actions = document.createElement('td');
        createActions(actions, row.id, 'includes/User.php');
        tr.appendChild(actions);

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
                <h3>${product.name}</h3>
                <p>${product.size} | ${product.type} | ${product.tray_size}/tray | Php. ${product.price}</p>
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
                    <h3>${data[0].name}</h3>
                    <p>${data[0].size} | ${data[0].type} | ${data[0].tray_size}/tray | Php ${data[0].price}/tray</p>
            `;
        card.innerHTML = cardContent;
    } else {
        card.innerText = "No product selected";
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
                <h3>${customer.first_name} ${customer.last_name}</h3>
                <p>${customer.address} | ${customer.contact_number}</p>
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
                    <h3>${data[0].first_name} ${data[0].last_name}</h3>
                    <p>${data[0].address} | ${data[0].contact_number}</p>
                    `;
        card.innerHTML = cardContent;

    } else {
        card.innerText = "No customer selected"
    }
}


customerId.addEventListener('input', () => {
    const id = customerId.value;
    if (id) {
        getData(custUrl, createCustomerCard, 'getCustomer', id);
    }
    console.log('input changed');
})






// PRODUCT SELECTION
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
                <h3>${item.name}</h3>
                <p>${item.size} | ${item.type} | ${item.tray_size}/tray | Php ${item.price}/tray</p>
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
                    <div class="product-details">
                        <div>
                            <h3>${data[0].name}</h3>
                            <p>${data[0].size} | ${data[0].type} | ${data[0].tray_size}/tray | Php ${data[0].price}/tray</p>  
                        </div>  
                        <button class="removeItem">Remove</i></button>
                    </div>
                    <div class="item-input">
                        <input type="hidden" class="productId" name="prod_id" value="${data[0].id}">
                        <input type="hidden" class="itemPrice" name="price" value="${data[0].price}">
                        <label>Quantity: </label>
                        <input type="number" class="itemQuantity" name="quantity">
                        <p>Subtotal: Php <span class="subT">0</span></p>
                        <input type="hidden" class="subTotal" name="subTotal" value="0">
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
        const subT = inputItem.querySelector('.subT');
        quantity.addEventListener('input', () => {
            const itemQuantity = parseFloat(quantity.value);
            const itemPrice = parseFloat(inputItem.querySelector('.itemPrice').value);

            const subValue = (itemQuantity ? itemQuantity : 0) * (itemPrice ? itemPrice : 0);
            subTotal.value = subValue ? subValue : 0;
            subT.innerText = subValue ? subValue : "0";


            showOrderTotals();
        });
    } else {
        orderItems.innerHTML = "";
    }
}


document.addEventListener('DOMContentLoaded', () => {
    getAllData(prodUrl, createItemsCards, 'getAllProducts');
    createOrderItem();
    createCustomerCard();
    createProductCard();
});





function showOrderTotals() {
    const orderQuantity = document.getElementById('orderQ');
    const orderPrice = document.getElementById('orderP');
    const orderQs = document.querySelectorAll('.itemQuantity');
    const subTotals = document.querySelectorAll('.subTotal');

    let totalQ = 0;

    orderQs.forEach((item) => {
        totalQ += parseInt(item.value ? item.value : 0);
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
        const form = modal.querySelector('form');

        showModal(modal);

        if (form) {
            form.reset();
            createProductCard();
            createCustomerCard();
            createOrderItem();
            showOrderTotals();
        }
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


window.addEventListener('click', function (event) {
    if (!sideBar.contains(event.target) && event.target !== openSidebarIcon && event.target !== closeSidebarIcon && sidebarOpen) {
        closeSidebar(sideBar);
        sidebarOpen = false;
    }
});

function openSidebar() {
    sideBar.style.left = '0';
    sideBar.style.animation = 'slideIn .25s ease';
    overlay.style.display = 'block';
    overlay.style.animation = 'appear .25s ease';
    sidebarOpen = true;
}

function closeSidebar() {
    if (sidebarOpen) {
        sideBar.style.left = '-200px';
        sideBar.style.animation = 'slideOut .25s ease';
        overlay.style.animation = 'disappear .25s ease';
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
    const formData = new FormData();
    formData.append('action', 'logOut');
    try {
        const response = await fetch('includes/Login.php', {
            method: 'POST',
            body: formData
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




// FUNCTION TO UPDATE DATE AND CLOCK DISPLAY
function updateClock() {
    const now = new Date();
    const hours = now.getHours() % 12 || 12;
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const ampm = now.getHours() >= 12 ? 'PM' : 'AM';

    const timeString = `${hours}:${minutes} ${ampm}`;
    document.getElementById('clock').innerText = timeString;

    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = now.toLocaleDateString('en-US', options);
    document.getElementById('date').innerText = dateString;
}

setInterval(updateClock, 60000);
document.addEventListener('DOMContentLoaded', () => updateClock());




const updates = document.querySelector('.updates')
updates.addEventListener('click', () => showUpdate());

const update = document.querySelector('.u-content');
let updateShown = false;


function showUpdate() {
    const mediaQuery = window.matchMedia('(max-width: 600px)');
    if (updateShown === false) {
        if (mediaQuery.matches) {
            update.style.right = '6px';
        } else {
            update.style.right = '20px';
        }
        update.style.animation = 'slideInRight .25s ease';
        update.style.opacity = '1';

        updateCount(orderUrl, 'getTodaysOrderQuantity', orderQ);
        updateCount(orderUrl, 'getTodaysOrderTotal', orderT);
        updateCount(produceUrl, 'getTodaysProduceQuantity', prodQ);

        updateShown = true;
    } else {
        update.style.animation = 'slideOutRight .25s ease';
        update.style.right = '-200px';
        update.style.opacity = '0';
        updateShown = false;
    }
}

window.addEventListener('click', (e) => {
    if (!updates.contains(e.target) && e.target !== update && e.target !== updates) {
        update.style.animation = 'slideOutRight .25s ease';
        update.style.right = '-200px';
        update.style.opacity = '0';
        updateShown = false;
    }
});








// DASHBOARD GRAPHS


// SALES LINE GRAPH
async function setUpSalesLIne() {
    const salesLine = document.getElementById('sales-line');

    const salesLineData = await getGraphData(orderUrl, "getSalesByDate");
    salesLineData.sort((a, b) => new Date(a.produce_date) - new Date(b.produce_date));

    const salesLineX = salesLineData.map(item => item.date_created);
    const salesLineY = salesLineData.map(item => parseInt(item.total_sales));

    new Chart(salesLine, {
        type: "line",
        data: {
            labels: salesLineX,
            datasets: [{
                fill: true,
                backgroundColor: "#d5d5ff",
                pointBackgroundColor: "#2b5797",
                borderWidth: 0,
                data: salesLineY,
            }]
        },
        options: {
            plugins: {
                legend: {
                    borderWidth: '0',
                    borderColor: 'red',
                    display: false,
                    labels: {
                        color: "white",
                        text: "Amounts",
                    }
                },
                title: {
                    display: true,
                    text: "Sales",
                    color: "white"
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Change y-axis tick font color
                        color: 'white'
                    },
                    grid: {
                        color: 'transparent'
                    }
                },
                x: {
                    ticks: {
                        // Change x-axis tick font color
                        color: 'white',
                    },
                    grid: {
                        color: 'transparent'
                    }
                }
            }
        }
    });
}





// SALES PIE CHART
async function setUpSalesPie() {
    const salesPie = document.getElementById('sales-pie');

    const salesPieData = await getGraphData(orderUrl, "getSalesBySize");

    const salesPieX = salesPieData.map(item => item.size);
    const salesPieY = salesPieData.map(item => parseFloat(item.total_sales));

    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart(salesPie, {
        type: "pie",
        data: {
            labels: salesPieX,
            datasets: [{
                backgroundColor: barColors,
                data: salesPieY,
                borderWidth: '0',
                borderColor: 'transparent'
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    align: 'center',
                    labels: {
                        color: "white", // Change legend label font color
                    }
                },
                title: {
                    display: true,
                    text: "Sales",
                    color: "white", // Change chart title font color
                }
            },
            aspectRatio: 2,
            responsive: true,
            maintainAspectRatio: false
        }
    });
}





async function setUpProdPie() {
    const prodPie = document.getElementById('prod-pie');


    const prodPieData = await getGraphData(produceUrl, "getProduceBySize");


    const prodPieX = prodPieData.map(item => item.size);
    const prodPieY = prodPieData.map(item => parseInt(item.total_quantity));


    var pieColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart(prodPie, {
        type: "doughnut",
        data: {
            labels: prodPieX,
            datasets: [{
                backgroundColor: pieColors,
                data: prodPieY,
                borderWidth: '0',
                borderColor: 'transparent'
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'left',
                    align: 'center',
                    labels: {
                        color: "white", // Change legend label font color
                    }
                },
                title: {
                    display: true,
                    text: "Production",
                    color: "white", // Change chart title font color
                }
            },
            aspectRatio: 2,
            responsive: true,
            maintainAspectRatio: false
        }
    });
}





// PRODUCTION BAR GRAPH
async function setUpProdBar() {
    const prodBar = document.getElementById('prod-bar');
    const prodBarData = await getGraphData(produceUrl, "getProduceByDate");


    prodBarData.sort((a, b) => new Date(a.produce_date) - new Date(b.produce_date));

    const prodBarX = prodBarData.map(item => item.produce_date);
    const prodBarY = prodBarData.map(item => parseInt(item.total_quantity));


    new Chart(prodBar, {
        type: "bar",
        data: {
            labels: prodBarX,
            datasets: [{
                backgroundColor: '#d5d5ff',
                data: prodBarY
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: "white", // Change legend label font color
                    }
                },
                title: {
                    display: true,
                    text: "Production",
                    color: "white", // Change chart title font color
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    ticks: {
                        // Change y-axis tick font color
                        color: 'white'
                    },
                    grid: {
                        color: 'transparent'
                    }
                },
                x: {
                    ticks: {
                        // Change x-axis tick font color
                        color: 'white',
                    },
                    grid: {
                        color: 'transparent',
                        backgroundColor: 'white'
                    }
                }
            }
        }
    });
}




// FUNCTION THAT GETS GRAPH DATA FROM DATABASE
async function getGraphData(url, action) {
    const formData = new FormData();
    formData.append('action', action);
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();
        console.log(response);
        console.log(result);

        return result;

    } catch (error) {
        console.error(error);
    }
}


document.addEventListener('DOMContentLoaded', () => {
    setUpSalesLIne();
    setUpProdBar();
    setUpProdPie();
    setUpSalesPie();

    updateCount(prodUrl, 'getProductCount', prodCount);
    updateCount(custUrl, 'getCustomerCount', custCount);
    updateCount(empUrl, 'getEmployeeCount', empCount);
    updateCount(userUrl, 'getUserCount', useCount);
    updateCount(orderUrl, 'getTodaysOrderQuantity', orderQ);
    updateCount(orderUrl, 'getTodaysOrderTotal', orderT);
    updateCount(produceUrl, 'getTodaysProduceQuantity', prodQ);
})

// END OF DASHBOARD GRAPHS







// DASHBOARD INFOS

// DASHBOARD INFO ELEMENTS
const prodCount = document.getElementById('d-prod');
const custCount = document.getElementById('d-cust');
const empCount = document.getElementById('d-emp');
const useCount = document.getElementById('d-use');

const orderQ = document.querySelector('#orders-today span');
const orderT = document.querySelector('#sales-today span');
const prodQ = document.querySelector('#produce-today span');


// FUNCTION THAT UPDATES INFO COUNTS
async function updateCount(url, action, count) {
    const formData = new FormData();
    formData.append('action', action);
    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();

        count.innerHTML = (result) ? result : "0";

    } catch (error) {
        console.error(error);
    }
}

// UPDATE INFO EVERY SECOND (PROBABLY NOT A GOOD IDEA)
/*
setInterval(() => {
    updateCount(prodUrl, 'getProductCount', prodCount);
    updateCount(custUrl, 'getCustomerCount', custCount);
    updateCount(empUrl, 'getEmployeeCount', empCount);
    updateCount(userUrl, 'getUserCount', useCount);

    updateCount(orderUrl, 'getTodaysOrderQuantity', orderQ);
    updateCount(orderUrl, 'getTodaysOrderTotal', orderT);
    updateCount(produceUrl, 'getTodaysProduceQuantity', prodQ);
}, 1000);
*/

