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
</body>

</html>