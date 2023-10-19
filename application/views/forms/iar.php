<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title">Inspection / Acceptance Form</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="iar-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InspectionAcceptance">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>ENTITY NAME</th>
                            <th>IAR#</th>
                            <th>FUND CLUSTER</th>
                            <th>SUPPLIER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                        </tr>
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
                <h1 class="modal-title fs-5" id="Modal_InspectionAcceptanceLabel">New Acceptance / Inspection Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-2 col-xl-12">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtEntityName" class="form-control" name="txtEntityName" style="text-align: center;" readonly>
                        <label class="form-label" for="txtEntityName"><strong>Entity Name :</strong></label>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtFundcluster" class="form-control" name="txtFundcluster">
                        <label class="form-label" for="txtFundcluster">Fund Cluster:</label>
                    </div>
                    <!-- <div class="form-floating mb-2">
                <input id="txtDate" class="form-control" name="txtDate" type="date" />
                <label class="form-label" for="txtDate">Date :</label>
            </div> -->
                    <div class="form-floating mb-2">
                        <input type="text" id="txtPONumber" class="form-control" name="txtPONumber">
                        <label class="form-label" for="txtPONumber">P.O No.:</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="txtMOP" class="form-control" name="txtMOP">
                        <label class="form-label" for="txtMOP">Requisitioning Office/Dept.:</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="txtPRNumber" class="form-control" name="txtPRNumber">
                        <label class="form-label" for="txtPRNumber">Purchase Request Number:</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="txtPGEFNumber" class="form-control" name="txtPGEFNumber">
                        <label class="form-label" for="txtPGEFNumber">PG REF Number:</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>