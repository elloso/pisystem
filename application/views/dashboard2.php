<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>SLSU Property Inventory System</title>
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
                <a class="navbar-brand text-white" href="<?php echo base_url(); ?>">Southern Luzon State University (Supply & Property Office)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo base_url(''); ?>">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('downloadforms'); ?>">1. Downloadable forms</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a></li>
                </ul>
            </div>
        </nav>
        <header class="bg-image-full">
            <div class="text-center my-4 mr-2">
                <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/img/slsu/slsusupportorg.png" alt="..."/>
            </div>
        </header>
        <section>
            <div class="container my-4">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2>Vision</h2>
                        <p class="mb-0" style="text-indent: 40px; text-align: justify;">Southern Luzon State University as an academic hub of excellent curricular programs, transdisciplinary researches, and responsive extension services that contributes to knowledge production, social development, and economic advancement of Quezon province and the CALABARZON Region.</p>
                    </div>
                    <div class="col-lg-6">
                        <h2>Mission</h2>
                        <p class="mb-0" style="text-indent: 40px; text-align: justify;">The university is committed to develop a sustained culture of delivering quality services and undertaking continuous interdisciplinary innovations in instruction, research and extension in the fields of agriculture, science, engineering, technology, allied health and medicine, human security, business, and the arts anchored to the development needs of Quezon province and the CALABARZON Region and national and global development goals.</p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="py-5 bg-success">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <img src="<?php echo base_url('assets/img/slsu/mislogo.png'); ?>" alt="MIS Logo" class="logo">
                    <span class="text-white">&copy; 2024 <b>SLSU</b> All Rights Reserved | Management By MIS-ICT Team</span>
                    <img src="<?php echo base_url('assets/img/slsu/slsu_logo.png'); ?>" alt="SLSU Logo" class="logo1"><br/>
                    <span class="text-white">Office Address</span><br/>
                    <span class="text-white">Supply & Property Office near CAM Bldg, SLSU  Main Campus, Lucban Quezon</span><br/>
                    <span class="text-white">Email Address: <u>slsusupply@slsu.edu.ph</u></span>
                    
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts2.js"></script>
    </body>
</html>
