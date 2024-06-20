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
  <!-- Datatables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/buttons.dataTables.min.css">
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
                                <th class="text-center">File Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($forms as $form): ?>
                                <tr>
                                    <td class="text-center" style="font-weight: bold;  width: 20%;"><?php echo $form->form ?></td>
                                    <td style="width: 50%;"><?php echo $form->Description ?></td>
                                    <!-- <td class="text-center" style="width: 10%;"><a href="#" style="font-style: italic;"><?php echo $form->file_form ?></a></td> -->
                                    <td class="text-center" style="width: 30%; font-style: italic;">
                                        <?php
                                            $fileNames = explode(",", $form->file_form);
                                            $fileNames = array_filter($fileNames, 'strlen');
                                            ?>
                                            <?php if (!empty($fileNames)) : ?>
                                                <ul>
                                                    <?php foreach ($fileNames as $fileName) : ?>
                                                        <?php
                                                        $filePath = "assets/uploads/" . $fileName;
                                                        ?>
                                                        <i class="fa-regular fa-file p-1"></i> <a href="<?php echo $filePath; ?>" target="_blank"><?php echo $fileName; ?></a><br/>
                                                    <?php endforeach; ?>
                                                </ul>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.7.0.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts2.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#po-data-table').DataTable({
        });
    });
</script>
    </body>
</html>
