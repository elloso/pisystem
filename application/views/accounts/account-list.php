<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title fw-bold">Manage User Account</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-list-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InspectionAcceptance">
                        Add User
                    </button>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($userlistResult as $userlist) {
                        ?>
                            <tr>
                                <td><?php echo $userlist->first_name . ' ' .  $userlist->last_name ?></td>
                                <td><?php echo $userlist->email ?></td>
                                <td><?php echo $userlist->user_type ?></td>
                                <td>
                                    <a href="<?= base_url('generate-password/' . md5($userlist->id)) ?>" onclick="return confirm('Are you sure you want to generate new password for <?php echo $userlist->first_name . ' ' .  $userlist->last_name ?>?');" class="m-1 text-primary" title="Generate new password"><i class="fa-solid fa-key"></i></a>
                                    <a href="<?php echo base_url('delete-user/' . md5($userlist->id)); ?>" onclick="return confirm('Are you sure you want to delete <?php echo $userlist->first_name . ' ' .  $userlist->last_name ?>?');" class="m-1 text-primary" title="Delete user"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal_InspectionAcceptance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_InspectionAcceptanceLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>save-user" method="post" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="form-floating mb-2">
                            <input type="text" id="rfirst_name" class="form-control " name="rfirst_name" required>
                            <label class="form-label fw-bold text-dark" for="rfirst_name">Name:</label>
                            <div class="invalid-feedback">
                                Please choose a name.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="rLast_name" class="form-control " name="rLast_name" required>
                            <label class="form-label fw-bold text-dark" for="rLast_name">Last Name:</label>
                            <div class="invalid-feedback">
                                Please choose a last name.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input id="rEmail" class="form-control" name="rEmail" type="email" pattern=".+@slsu\.edu\.ph" required>
                            <label class="form-label fw-bold text-dark" for="rEmail">Email:</label>
                            <div class="valid-feedback">
                                Looks Good!
                            </div>
                            <div class="invalid-feedback">
                                Please choose a valid email ending with @slsu.edu.ph.
                            </div>
                        </div>
                        <label class="form-label fw-bold text-dark" for="rUser_type">User Type:</label>
                        <div class="mb-2">
                            <select class="form-select" name="rUser_type" id="rUser_type" required>
                                <option value="" disabled selected>-- Please select user type --</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                            <div class="invalid-feedback">
                                Please choose a user.
                            </div>
                        </div>
                    </div>
                    <!-- End Modal body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
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