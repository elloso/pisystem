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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<!-- Datatables -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
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








</body>

</html>