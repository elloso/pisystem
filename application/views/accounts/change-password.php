<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title fw-bold">Change Password</div>
        </div>
        <form action="<?php echo base_url() ?>update-password" method="post" class="needs-validation" novalidate>
            <div class="card-body">
                <div class="col-auto mt-2">
                    <label class="fw-bold" for="">Email:</label>
                    <input type="hidden" value="<?= $userDetails->id ?>" name="id" class="form-control" readonly>
                    <input type="email" class="form-control" value="<?= $user_email ?>" name="email" pattern=".+@slsu\.edu\.ph" required readonly>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-auto mt-2">
                    <label class="fw-bold" for="">New Password:</label>
                    <input type="password" class="form-control" name="newPassword" required>
                    <div class="invalid-feedback">
                        New password cannot be empty.
                    </div>
                </div>
                <div class="col-auto mt-2">
                    <label class="fw-bold" for="">Confirm Password:</label>
                    <input type="password" class="form-control" name="confirmPassword" required>
                    <div class="invalid-feedback">
                        Confirm password cannot be empty.
                    </div>
                </div>
            </div>
            <div class="p-3">
                <button class="btn btn-success">Save Changes</button>
            </div>
        </form>
    </div>
</div>
</div>
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>