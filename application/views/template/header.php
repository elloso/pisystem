<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Suppy Inventory System</title>

    <!-- bootstrap 5.3.1 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>
<body>
<header id="header" class="header d-flex align-items-center">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <h1>Property Inventory System</h1>
  </a>
  <nav id="navbar" class="navbar">
    <ul>
      <li><a href="#hero">Home</a></li>
      <li class="dropdown"><a href="#"><span>Stocks</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="<?php echo base_url('purchase'); ?>">Purchase Order</a></li>
          <li><a href="<?php echo base_url('inspection'); ?>">Inspection / Acceptance Form</a></li>
          <li><a href="<?php echo base_url('acknowledgement'); ?>">Property Acknowledgment List</a></li>
          <li><a href="<?php echo base_url('custodian'); ?>">Inventory Custodian List</a></li>
          <li><a href="<?php echo base_url('propertycard'); ?>">Property Card List</a></li>
          <li><a href="<?php echo base_url('stockcard'); ?>">Stock Card</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="#"><span>Equipments</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="#">Post Repair</a></li>
          <li><a href="#">Property Inspection</a></li>
          <li><a href="#">Waste Materials Reports</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="#"><span>Inventory Report</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="#">Account Ledger</a></li>
          <li><a href="#">Condemn Summary</a></li>
          <li><a href="#">Job Order Summary</a></li>
          <li><a href="#">Property List Summary</a></li>
          <li><a href="#">Disposed Asset Inventory</a></li>
          <li><a href="#">Undisposed Asset Inventory</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="#">Change Password</a></li>
          <li><a href="#">Account list</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav><!-- .navbar -->
  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
</div>
</header><!-- End Header -->



