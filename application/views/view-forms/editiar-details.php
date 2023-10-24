<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title fw-bold">Inspection / Acceptance Report</div>
        </div>
        <div class="card-body">
            <form action="#" method="post">
            <div class="row">   
                <div class="col-lg-6 col-xl-4">
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_entityname" value="<?php echo $editiar_details->entity_name ?>" class="form-control" name="edit_entityname" readonly>
                        <label class="form-label fw-bold text-dark" for="txtSupplier">Entity Name :</label>
                    </div>
                    <div class="form-floating mb-2">
                            <input type="text" id="edit_supplier" value="" class="form-control" name="edit_supplier" readonly>
                            <label class="form-label fw-bold text-dark" for="edit_supplier">Supplier :</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" id="edit_pono" value="<?php echo $editiar_details->iar_po_number ?>" class="form-control" name="edit_pono" readonly>
                            <label class="form-label fw-bold text-dark" for="edit_pono">P.O No. :</label>
                        </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_fundcluster" value="" class="form-control" name="edit_fundcluster" required>
                        <label class="form-label fw-bold text-dark" for="edit_fundcluster">Fund Cluster :</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_officedept" value="" class="form-control" name="edit_officedept" required>
                        <label class="form-label fw-bold text-dark" for="edit_officedept">Office/Dept. :</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_rcc" value="" class="form-control" name="edit_rcc" required>
                        <label class="form-label fw-bold text-dark" for="edit_rcc">RCC :</label>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-8">
                    <div class="row">
                    <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_iarno" class="form-control" name="edit_iarno">
                                    <label class="form-label fw-bold text-dark" for="edit_iarno">IAR No. :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_iardate" class="form-control" name="edit_iardate" type="date" />
                                    <label class="form-label fw-bold text-dark" for="edit_iardate">Date :</label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_invoice" class="form-control" name="edit_invoice">
                                    <label class="form-label fw-bold text-dark" for="edit_invoice">Invoice No. :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_invoicedate" class="form-control" name="edit_invoicedate" type="date" />
                                    <label class="form-label fw-bold text-dark" for="edit_invoicedate">Date :</label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <label class="form-label fw-bold text-dark">Inspection :</label>
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_inspectionofficer" class="form-control" name="edit_inspectionofficer">
                                    <label class="form-label fw-bold text-dark" for="edit_inspectionofficer">Officer :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_dateinspected" class="form-control" name="edit_dateinspected" type="date" />
                                    <label class="form-label fw-bold text-dark" for="edit_dateinspected">Date Inspected :</label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <label class="form-label fw-bold text-dark">Acceptance :</label>
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_acceptance" class="form-control" name="edit_acceptance">
                                    <label class="form-label fw-bold text-dark" for="edit_acceptance">Property Custodian :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_acceptancedate" class="form-control" name="edit_acceptancedate" type="date" />
                                    <label class="form-label fw-bold text-dark" for="edit_acceptancedate">Date Acceptance :</label>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-12">
            <div class="card" style="max-width: 1500px;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-itemno-data" class="table table-hover">
                            <tr>
                                <th style="width: 8%;">Item No.</th>
                                <th style="width: 12%;">Quantity</th>
                                <th style="width: 15%;">Unit</th>
                                <th style="width: 47%;">Items / Description</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                            <tbody>
                                    <tr>
                                        <td><input required type="text" value="" class=" form-control" id="txtItemNo" name="txtItemNo[]" readonly>
                                            <div class="invalid-feedback">
                                                Please enter Item No.
                                            </div>
                                        </td>
                                        <td><input required type="number" value="" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" readonly>
                                            <div class="invalid-feedback">
                                                Please enter Quantity.
                                            </div>
                                        </td>
                                        <td><input required type="text" value="" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1" readonly>
                                            <div class="invalid-feedback">
                                                Please enter unit.
                                            </div>
                                        </td>
                                        <td>
                                            <textarea required class="form-control" name="txtDescription[]" style="height: 4em;" readonly></textarea>
                                            <div class="invalid-feedback">
                                                Please enter item description.
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="text-primary">
                                            <i class="fa-solid fa-pen-to-square"></i> 
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <button type="button" class="btn btn-secondary mt-2" style="width: 10%;" onclick=" history.back()">Back</button>
            <button type="submit" class="btn btn-primary mt-2" style="width: 10%;">Save</button>
            </form>
        </div>
    </div>
    <div class="modal fade modal-lg" id="editRow">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Item Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>