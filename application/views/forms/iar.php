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
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtEntityName" class="form-control" name="txtEntityName" style="text-align: center;" value="SLSU" readonly>
                            <label class="form-label fw-bold text-dark" for="txtEntityName">Entity Name :</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea id="txtSupplier" class="form-control" name="txtSupplier" style="height: 13.5em; width: 100%;" readonly>
                            
                            </textarea>
                            <label class="form-label fw-bold text-dark" for="txtSupplier">Supplier:</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtFundcluster" class="form-control" name="txtFundcluster">
                            <label class="form-label fw-bold text-dark" for="txtFundcluster">Fund Cluster:</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtMOP" class="form-control" name="txtMOPD">
                            <label class="form-label fw-bold text-dark" for="txtMOP">Requisitioning Office/Dept.:</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtRCC" class="form-control" name="txtRCC">
                            <label class="form-label fw-bold text-dark" for="txtRCC">RCC:</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-8">
                        <div class="form-floating mb-2">
                            <select class="form-select" aria-label="Default select example" name="txtPONo">
                                <option selected>Select Purchase Order</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <label class="form-label fw-bold text-dark" for="txtPONo">P.O No. :</label>
                         </div>
                        <div class="row">
                            <div class="col-lg-4 col-xl-6">
                                <div class="border p-2 mb-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" id="txtIARNo" class="form-control" name="txtIARNo">
                                        <label class="form-label fw-bold text-dark" for="txtIARNo">IAR No. :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input id="txtIARDate" class="form-control" name="txtIARDate" type="date" />
                                        <label class="form-label fw-bold text-dark" for="txtIARDate">Date :</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-12">
                                    <div class="form-floating mb-2">
                                            <input type="text" id="txtStock" class="form-control" name="txtStock" readonly>
                                            <label class="form-label fw-bold text-dark" for="txtStock">Stock/Item No.:</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                            <input type="text" id="txtQuantity" class="form-control" name="txtQuantity" readonly>
                                            <label class="form-label fw-bold text-dark" for="txtQuantity">Quantity:</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                            <input type="text" id="txtUnit" class="form-control" name="txtUnit" readonly>
                                            <label class="form-label fw-bold text-dark" for="txtUnit">Unit:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-6">
                                <div class="border p-2 mb-2">
                                    <div class="form-floating mb-2">
                                        <input type="text" id="txtInvoice" class="form-control" name="txtInvoice">
                                        <label class="form-label fw-bold text-dark" for="txtInvoice">Invoice No. :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input id="txtInvoiceDate" class="form-control" name="txtInvoiceDate" type="date" />
                                        <label class="form-label fw-bold text-dark" for="txtInvoiceDate">Date :</label>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-12">
                                <div class="form-floating mb-2">
                                    <textarea id="txtStock" class="form-control" name="txtStock" style="height: 16em; width: 100%;">
                                   
                                    </textarea>
                                    <label class="form-label fw-bold text-dark" for="txtStock">Item Description:</label>
                                </div>
                                </div>
                            </div>
                        </div>
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