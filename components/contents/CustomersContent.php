<!-- CUSTOMERS COMPONENT CONTENTS -->




<div class="c-container">
    <div class="s-group">
        <button class="open-modal add-button" data-modal="addCustomer"><span class="button-text">New Customer</span> <i class="fa-solid fa-plus"></i></button>
        <input class="search" type="search" id="customer-search" name="search" placeholder="Search customer" autocomplete="off">
    </div>

    <div class="table-container">
        <table id="customers-table">

            <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Contact #</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="ct-body">

            </tbody>

        </table>
    </div>
</div>



<!-- MODALS -->


<div class="modal" id="addCustomer">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Customer Details</h4>
        </div>

        <button class="close-modal x"><i class="fa-solid fa-xmark"></i></button>

        <form class="customer-form" id="customer-form" action="./includes/Customer.php" method="post">

            <div class="input-group">
                <label for="custFirstName">First Name</label>
                <input type="text" name="firstName" id="custFirstName" placeholder="e.g. Albert" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="custLastName">Last Name</label>
                <input type="text" name="lastName" id="custLastName" placeholder="e.g. Einstein" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="custGender">Gender</label>
                <select name="gender" id="custGender">
                    <option hidden selected value="">--Select gender--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="input-group">
                <label for="custAddress">Address</label>
                <input type="text" name="address" id="custAddress" placeholder="e.g. Sta. Maria, ZC" autocomplete="off">
            </div>

            <div class="input-group">
                <label for="custContactNumber">Contact Number</label>
                <input type="text" name="contactNumber" id="custContactNumber" placeholder="e.g. 09123456789" autocomplete="off">
            </div>

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addCustomer" id="addCustomer">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>

        </form>

    </div>
</div>