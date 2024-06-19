<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Services Downloadable Forms</title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/slsu/slsu_logo.png" />
<link href="<?php echo base_url(); ?>assets/css/styles2.css" rel="stylesheet" />
<style>
.logo {
    width: 70px; 
    height: auto; 
}

.logo1 {
    width: 60px; 
    height: auto; 
}
</style> 
</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-success bg-success">
            <div class="container">
                <a class="navbar-brand text-white" href="<?php echo base_url(); ?>">Supply & Property Office Downloadable Forms </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url(''); ?>">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">1. Downloadable forms</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a></li>
                </ul>
            </div>
        </nav>
        <div class="container justify-content-center align-items-center container_table p-5">
        <div class="card">
            <div class="card-header border-success" style="border-top:solid;">
                <div class="card-title fw-bold">List of Forms</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="po-data-table" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Forms</th>
                                <th class="text-center">Description</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" style="font-weight: bold;  width: 20%;">BIR Form No. 0217</td>
                                <td style="width: 70%;">This form shall be accomplished/filed by all contractors before the release of final payment by the Department of Public Works and Highway (DPWH) in regards to contracts with the DPWH.</td>
                                <td class="text-center" style="width: 10%;"><a href="" style="font-style: italic;">Download</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts2.js"></script>
    </body>
</html>
