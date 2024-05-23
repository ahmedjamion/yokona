<?php
require_once 'views/LogInView.php';
?>
<!-- HEADER -->




<div class="main-header">
    <i class="fa-solid fa-bars open-sidebar"></i>
    <h1>Eggcellent</h1>
    <div class="updates">
        <h3><i class="fa-solid fa-circle-exclamation"></i> Updates</h3>
        <div class="heads-up dtime" id="date">Monday, May 13, 2024</div>
        <div class="heads-up dtime" id="clock">12:00:00 AM</div>
    </div>

    <div class="u-content">
        <h4>Todays Updates</h4>
        <div class="heads-up todays" id="orders-today"><i class="fa-solid fa-receipt"></i> Orders: <span id="ordQ">0</span> Trays</div>
        <div class="heads-up todays" id="sales-today"><i class="fa-solid fa-peso-sign"></i> Sales: <span id="salQ">0</span> Php</div>
        <div class="heads-up todays" id="produce-today"><i class="fa-solid fa-egg"></i> Produce: <span id="proQ">0</span> Trays</div>
    </div>
</div>