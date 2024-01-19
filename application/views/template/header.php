<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Supply Inventory System</title>
  <!-- bootstrap 5.3.1 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
  <link href="<?php echo base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/fontawesome/all.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/slsu/slsu_logo.png" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/customstyle.css" />
  <!-- Template Main CSS File -->
  <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/customstyle.css" rel="stylesheet">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/buttons.dataTables.min.css">
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.7.0.js"></script>


  <style>
    .bn632-hover {
  width: 160px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  margin: 20px;
  height: 30px;
  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 50px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:focus {
  outline: none;
}

.bn632-hover.bn23 {
  background-image: linear-gradient(
    to right,
    #009245,
    #fcee21,
    #00a8c5,
    #d9e021
  );
  box-shadow: 0 4px 15px 0 rgba(83, 176, 57, 0.75);
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
          <li class="dropdown"><a href="#"><span>PO & IAR</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url('purchase'); ?>">Purchase Order</a></li>
              <li><a href="<?php echo base_url('inspection'); ?>">Inspection / Acceptance Report</a></li>
             
             
              <!-- <li><a href="<?php echo base_url('propertycard'); ?>">Property Card</a></li>
              <li><a href="<?php echo base_url('stockcard'); ?>">Stock Card</a></li>
              <li><a href="<?php echo base_url('suppliesledger'); ?>">Supplies Ledger Card</a></li>
              <li><a href="<?php echo base_url('countinventories'); ?>">Report on the physical count of Inventories</a></li> -->
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>ICS</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url('custodian'); ?>">Inventory Custodian Slip</a></li>
              <li><a href="<?php echo base_url('propertycard'); ?>">Semi-Expendable Property Card</a></li>
              <li><a href="#">RPCSEP</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>PAR</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
             <li><a href="<?php echo base_url('acknowledgement'); ?>">Property Acknowledgment Receipt</a></li>
             <li><a href="#">PPE Property Card</a></li>
             <li><a href="#">RPCPPE</a></li>
            </ul>
          </li> 
          <li class="dropdown"><a href="#"><span>Summary Forms</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url('respi'); ?>">Registry SPI (ICS)</a></li>
              <li><a href="<?php echo base_url('respi-par'); ?>">Registry SPI (PAR)</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Settings</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?php echo base_url(); ?>my-account">My Account</a></li>
              <li><a href="<?php echo base_url(); ?>change-password">Change Password</a></li>
              <?php
              if ($userDetails->user_type === 'Admin') {
              ?>
                <li><a href="<?php echo base_url(); ?>account-list">Account list</a></li>
              <?php } ?>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#logutModal">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header><!-- End Header -->
  <!-- Logout Modal -->
  <div class="modal fade" id="logutModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header text-muted">
          <h4 class="modal-title fw-bolder">Ready to Leave?</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body text-muted fw-semibold">
          Logout will end your current session.
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <form action="<?php echo base_url(); ?>logout-page">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>