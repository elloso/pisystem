<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Manage User Account</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-list-table" class="table table-hover">
                    <div>
                        <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InspectionAcceptance">
                            Add User
                        </button>
                        <button type="button" class="btn btn-success btn-sm mb-2"  data-bs-toggle="modal" data-bs-target="#Modal_SupplyHead" >
                            Supply Head
                        </button>   
                    </div>
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">User Type</th>
                            <th class="text-center">Action</th>
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
                                <td class="text-center">
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
<form action="<?php echo base_url('Transfer-SupplyHead'); ?>" method="post">
    <div class="modal fade" id="Modal_SupplyHead" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_SupplyHeadLabel">Item Return</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <label class="form-label fw-bold text-dark" for="">Date Changed :</label>
                                <input id="txtDateSupplyHead" style="text-align: center;" class="form-control" name="txtDateChangeHead" type="date" required>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <label class="form-label fw-bold text-dark" for="">Supply Head :</label>
                                <input type="text" id="txtSupplyHead" class="form-control" name="txtSupplyHead" style="text-align: center;" value="<?php echo $HeadName->Supply_Head; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="txtNewSupplyhead" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
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