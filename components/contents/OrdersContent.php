<!-- ORDERS COMPONENT CONTENTS -->


<div class="c-container ord">
    <h2>Orders</h2>
    <div class="s-group">
        <button class="open-modal add-button" data-modal="addOrder"><span class="button-text">New Order</span> <i class="fa-solid fa-plus"></i></button>
        <input class="search" type="search" id="order-search" name="search" placeholder="Search orders" autocomplete="off">
    </div>


    <div class="table-container">
        <table id="orders-table">

            <thead>
                <tr>
                    <th>Order date</th>
                    <th>Customer</th>
                    <th>User/Employee</th>
                    <th>Paid date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="or-body">

            </tbody>

        </table>
    </div>
</div>


<!-- ADD ORDER MODAL -->
<div class="modal" id="addOrder">
    <div class="modal-content order">

        <div class="modal-header">
            <h4>Order Details</h4>
        </div>

        <button class="close-modal x"><i class="fa-solid fa-xmark"></i></button>

        <button class="open-modal" data-modal="selectCustomer">Select customer</button>
        <form class="order-form" id="order-form" action="./includes/Order.php" method="post">



            <div class="sc-card">
            </div>
            <input class="custId" type="hidden" name="cust-id" id="cust-id">


            <div class="order-details">
                <h4>Order Items</h4>

                <div class="order-items">

                </div>

                <div class="st-group">

                    <div class="order-total">
                        <p>Total Quantity: <span id="orderQ">0</span> Trays</p>
                        <p>Total Price: <span id="orderP">0.00</span> Php</p>
                    </div>
                    <button class="open-modal" data-modal="selectItem" style="align-self: end;">New Item</button>
                </div>

            </div>


            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addOrder">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>
        </form>
    </div>
</div>



<!-- SELECT CUSTOMER MODAL -->
<div class="modal" id="selectCustomer">
    <div class="modal-content">

        <div class="modal-header">
            <h4>Select customer</h4>
        </div>

        <button class="x close-modal"><i class=" fa-solid fa-xmark"></i></button>

        <button class="open-modal add-button" data-modal="addCustomer1"><span class="button-text">New Customer</span> <i class="fa-solid fa-plus"></i></button>
        <div class="customer-selection">

        </div>
    </div>
</div>


<!-- ADD ITEM MODAL FOR ORDERS -->
<div class="modal" id="selectItem">
    <div class="modal-content">

        <div class="modal-header">
            <h4>Select product</h4>
        </div>

        <button class="x close-modal"><i class=" fa-solid fa-xmark"></i></button>

        <div class="item-selection">

        </div>
    </div>
</div>



<!-- ADD CUSTOMERS MODAL FOR ORDERS -->
<div class="modal" id="addCustomer1">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Customer Details</h4>
        </div>

        <button class="close-modal x"><i class="fa-solid fa-xmark"></i></button>

        <form class="customer-form" id="customer-form1" action="./includes/Customer.php" method="post">

            <div class="input-group">
                <label for="custFirstName1">First Name</label>
                <input type="text" name="firstName" id="custFirstName1" placeholder="e.g. Albert" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="custLastName1">Last Name</label>
                <input type="text" name="lastName" id="custLastName1" placeholder="e.g. Einstein" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="custGender1">Gender</label>
                <select name="gender" id="custGender1">
                    <option hidden selected value="">--Select gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="input-group">
                <label for="custAddress1">Address</label>
                <input type="text" name="address" id="custAddress1" placeholder="e.g. Sta. Maria, ZC" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="custContactNumber1">Contact Number</label>
                <input type="text" name="contactNumber" id="custContactNumber1" placeholder="e.g. 09123456789" autocomplete="off">
            </div>

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addCustomer" id="addCustomer1">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>

        </form>

    </div>
</div>