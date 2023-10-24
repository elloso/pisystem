<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">My Account</div>
        </div>
        <form action="<?php echo base_url() ?>update-account" method="post" class="needs-validation" novalidate>
            <div class="card-body">
                <div class="col-auto mt-2">
                    <label class="fw-bold" for="">Email:</label>
                    <input type="hidden" value="<?= $userDetails->id ?>" name="id" class="form-control" readonly>
                    <input type="email" class="form-control" value="<?= $user_email ?>" name="email" pattern=".+@slsu\.edu\.ph" required readonly>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <label class="fw-bold mt-2" for="">Name:</label>
                <input type="text" class="form-control" value="<?= $userDetails->first_name ?>" name="name" required>
                <div class="invalid-feedback">
                    Please choose a name.
                </div>
                <label class="fw-bold mt-2" for="">Last Name:</label>
                <input type="text" class="form-control" value="<?= $userDetails->last_name ?>" name="last_name" required>
                <div class="invalid-feedback">
                    Please choose a last name.
                </div>
            </div>
            <div class="p-3">
                <button class="btn btn-success">Save Changes</button>
            </div>
    </div>
    </form>
</div>
</div>
</div>