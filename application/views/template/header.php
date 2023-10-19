<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Suppy Inventory System</title>

  <!-- bootstrap 5.3.1 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
  <style>
    th {
      font-family: "Bahnschrift SemiCondensed", sans-serif;
      font-size: 18px;
      text-align: Center;
    }

    .container_table {
      margin-top: 8rem;

    }
  </style>
</head>

<body>
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url('dashboard'); ?>" class="logo d-flex align-items-center">
        <h1>Property Inventory System</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
          <li class="dropdown"><a href="#"><span>Forms</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url('purchase'); ?>">Purchase Order</a></li>
              <li><a href="<?php echo base_url('inspection'); ?>">Inspection / Acceptance Form</a></li>
              <li><a href="<?php echo base_url('acknowledgement'); ?>">Property Acknowledgment List</a></li>
              <li><a href="<?php echo base_url('custodian'); ?>">Inventory Custodian List</a></li>
              <li><a href="<?php echo base_url('propertycard'); ?>">Property Card List</a></li>
              <li><a href="<?php echo base_url('stockcard'); ?>">Stock Card</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>RPCPPE</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Report 1</a></li>
              <li><a href="#">Report 2</a></li>
              <li><a href="#">Report 3</a></li>
            </ul>
          </li>
          <!-- <li class="dropdown"><a href="#"><span>Inventory Report</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="#">Account Ledger</a></li>
          <li><a href="#">Condemn Summary</a></li>
          <li><a href="#">Job Order Summary</a></li>
          <li><a href="#">Property List Summary</a></li>
          <li><a href="#">Disposed Asset Inventory</a></li>
          <li><a href="#">Undisposed Asset Inventory</a></li>
        </ul>
      </li> -->
          <li class="dropdown"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url(); ?>change-password">Change Password</a></li>
              <li><a href="<?php echo base_url(); ?>account-list">Account list</a></li>
              <li><a href="<?php echo base_url(); ?>logout-page">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->