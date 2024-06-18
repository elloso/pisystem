<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SLSU Property Inventory System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/slsu/slsu_logo.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
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
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-success bg-success">
            <div class="container">
                <a class="navbar-brand text-white" href="<?php echo base_url(); ?>">Souther Luzon State University (Supply & Property Office)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo base_url(''); ?>">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('login'); ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
        <header class="bg-image-full">
            <div class="text-center my-4 mr-2">
                <img class="img-fluid mb-4" src="<?php echo base_url(); ?>assets/img/slsu/slsusupportorg.png" alt="..."/>
            </div>
        </header>
        <!-- Content section-->
        <!-- <section class="">
            <div class="container">
                <div class="row justify-content-left">
                    <div class="col-lg-6">
                        <h2>Full Width Backgrounds</h2>
                        <p class="lead">A single, lightweight helper class allows you to add engaging, full width background images to sections of your page.</p>
                        <p class="mb-0">The universe is almost 14 billion years old, and, wow! Life had no problem starting here on Earth! I think it would be inexcusably egocentric of us to suggest that we're alone in the universe.</p>
                    </div>
                </div>
            </div>
        </section> -->
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
        <!-- Footer-->
        <footer class="py-5 bg-success">
            <!-- <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div> -->
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <img src="<?php echo base_url('assets/img/slsu/mislogo.png'); ?>" alt="MIS Logo" class="logo">
                    <span class="text-white">&copy; 2024 <b>SLSU</b> All Rights Reserved | Management By MIS-ICT Team</span>
                    <img src="<?php echo base_url('assets/img/slsu/slsu_logo.png'); ?>" alt="SLSU Logo" class="logo1">
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url(); ?>assets/js/scripts2.js"></script>
    </body>
</html>
