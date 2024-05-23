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
                    <th>Name</th>
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
        <div class="submit-message" style="display: none; opacity: 0;">
        </div>
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

            <div class="image-group">
                <div class="image-preview" id="c-image-preview">
                    <img id="c-preview-img" src="" alt="Image Preview">
                </div>
                <div class="input-group">
                    <label for="c-image-input">Customer profile picture</label>
                    <input type="file" id="c-image-input" name="image" accept="image/*">
                </div>
            </div>

            <div class="button-group">
                <button class="submit-button" type="submit" name="action" value="addCustomer" id="addCustomer">Submit</button>
                <button class="close-modal cancel-button">Cancel</button>
            </div>

        </form>

    </div>
</div>

<style>
    .image-preview {
        display: none;
        margin-top: 20px;
        align-self: center;
    }

    .image-preview img {
        width: 100px;
        height: 100px;
        border: 2px solid #d5d5ff;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<script>
    document.getElementById('c-image-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImg = document.getElementById('c-preview-img');
                previewImg.src = e.target.result;
                document.getElementById('c-image-preview').style.display = 'flex';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('c-image-preview').style.display = 'none';
        }
    });
</script>