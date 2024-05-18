<!-- DASHBOARD COMPONENT CONTENTS -->


<div class="c-container dashboard">

    <div class="dboard">
        <div class="charts">
            <div class="d-sales">
                <div class="ds-group s-line">
                    <canvas id="sales-line" style="max-height: 100%; max-width: 100%;"></canvas>
                </div>
                <div class="ds-group s-pie">
                    <canvas id="sales-pie" style="max-height: 100%; max-width: 100%;"></canvas>
                </div>
            </div>
            <div class="d-inv">
                <div class="di-group i-pie">
                    <canvas id="prod-pie" style="max-height: 100%; max-width: 100%;"></canvas>
                </div>
                <div class="di-group i-bar">
                    <canvas id="prod-bar" style="max-height: 100%; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <div class="d-group d-misc">
            <div class="dm-group">
                <h3 class="dm-text">Products</h3>
                <p id="d-prod">0</p>
                <i class="fa-solid fa-egg"></i>
            </div>
            <div class="dm-group">
                <h3 class="dm-text">Customers</h3>
                <p id="d-cust">0</p>
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="dm-group">
                <h3 class="dm-text">Employees</h3>
                <p id="d-emp">0</p>
                <i class="fa-solid fa-user-tie"></i>
            </div>
            <div class="dm-group">
                <h3 class="dm-text">Users</h3>
                <p id="d-use">0</p>
                <i class="fa-solid fa-user"></i>
            </div>
        </div>

    </div>
</div>