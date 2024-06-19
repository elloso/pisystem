<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">User Management</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-list-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Module Changes</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr >
                                <td class="text-center">
                                    <a href="#">
                                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_ICSPropertyname">
                                        ICS Property Name
                                    </button>
                                    </a>
                                </td>
                                <td class="text-center"></td>
                            </tr>
                            <tr >
                                <td class="text-center">
                                <a href="#">
                                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_PARPropertyname" style="font-size: 13.5px;">
                                        PAR Property Name
                                    </button>
                                    </a>
                                </td>
                                <td class="text-center"></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal_ICSPropertyname" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_ICSPropertynameLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal_PARPropertyname" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_PARPropertynameLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="needs-validation" novalidate>
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




