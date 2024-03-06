<!-- Vendor JS Files -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- Sweet Alert -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert211.js"></script>
<?php if (!empty($this->session->flashdata('success'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('success'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php elseif (!empty($this->session->flashdata('error'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('error'); ?>",
            icon: 'error',
            showCloseButton: true
        });
    </script>
<?php endif; ?>
<?php if (!empty($this->session->flashdata('poedit-success'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('poedit-success'); ?>",
            icon: 'success',
        });
    </script>
<?php endif; ?>
<?php if (!empty($this->session->flashdata('info-success'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('info-success'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php elseif (!empty($this->session->flashdata('info-error'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('info-error'); ?>",
            icon: 'info',
            showCloseButton: true
        });
    </script>
<?php endif; ?>
<?php if (!empty($this->session->flashdata('delete'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('delete'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php endif; ?>
<?php if (!empty($this->session->flashdata('returned'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('returned'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php endif; ?>
<?php if (!empty($this->session->flashdata('reissued'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('reissued'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php endif; ?>
<?php if (!empty($this->session->flashdata('dispose'))) : ?>
    <script>
        Swal.fire({
            title: "<?php echo $this->session->flashdata('dispose'); ?>",
            icon: 'success',
            showCloseButton: true
        });
    </script>
<?php endif; ?>



<!-- Datatables -->

<script src="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fontawesome.all.js" crossorigin="anonymous"></script>

<!-- <script>
    var table = document.getElementById("table2");
    var button1 = document.getElementById("addRow");
    button1.addEventListener("click", function() {
        event.preventDefault();
        var newRow = table.insertRow(-1);
        var itemnoCell = newRow.insertCell(0);
        var itemquantityCell = newRow.insertCell(1);
        var itemdescriptionCell = newRow.insertCell(2);
        var itemunitcostCell = newRow.insertCell(3);
        itemnoCell.innerHTML = '<input type="number" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" placeholder="1" required>';
        itemquantityCell.innerHTML = '<input type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="30" placeholder="1" required>';
        itemdescriptionCell.innerHTML = '<input type="textarea" class="form-control" id="item_description" maxlength="95" name="item_description[]" size="50" placeholder="Supply Description" autocomplete="off" required>';
        itemunitcostCell.innerHTML = '<input type="textarea" class="form-control" id="txtItemUnitCost" maxlength="95" name="txtItemUnitCost[]" size="50" placeholder="0" autocomplete="off" required>';
        


    });
</script> -->
<script>
    $(document).ready(function() {
        $('#user-list-table').DataTable({});
    });
</script>
<script>
    $(document).ready(function() {
        $('#po-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>
<!-- editsepc-details -->
<script>
    $(document).ready(function() {
        $('#tablesepcdata').DataTable({
        });
    });
</script>
<script>
    var today = new Date().toISOString().substr(0, 10);
    document.getElementById("txtDateSEPC").value = today;
</script>
<script>
    $(document).ready(function() {
        $('#sepc-data-table').DataTable({
         
        });
    });
</script>
<!-- <script>
    var originalQuantity = parseInt(document.querySelector('input[name="hidden_quantity"]').value);
    var remainingQuantity = parseInt(document.querySelector('input[name="hidden_rquantity"]').value);
    var quantityInput = document.getElementById("txtQuantitySEPC");
    if (originalQuantity === remainingQuantity) {
        quantityInput.setAttribute("max", originalQuantity);
    } else {
        quantityInput.setAttribute("max", remainingQuantity);
    }
    quantityInput.addEventListener('input', function() {
        if (parseInt(this.value) > parseInt(this.getAttribute("max"))) {
            this.value = this.getAttribute("max");
        }
        if (parseInt(this.value) <= 0) {
            this.value = 1;
        }
    });
</script> -->
<script>
    var originalQuantity = parseInt(document.querySelector('input[name="hidden_quantity"]').value);
    var remainingQuantity = parseInt(document.querySelector('input[name="hidden_rquantity"]').value);
    var quantityInput = document.getElementById("txtQuantitySEPC");
    if (originalQuantity === remainingQuantity) {
        quantityInput.setAttribute("max", originalQuantity);
    } else {
        quantityInput.setAttribute("max", remainingQuantity);
    }

    quantityInput.addEventListener('input', function() {
        if (parseInt(this.value) > parseInt(this.getAttribute("max"))) {
            this.value = this.getAttribute("max");
        }
        if (parseInt(this.value) <= 0) {
            this.value = 1;
        }
    });
</script>


<!-- End    editsepc-details -->

</body>

</html>