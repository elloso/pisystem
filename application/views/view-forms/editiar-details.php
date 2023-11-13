<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title fw-bold">Inspection / Acceptance Report</div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('update-IAR-Details'); ?>" method="post">
            <div class="row">   
                <div class="col-lg-6 col-xl-4">
                    <div class="form-floating mb-2 d-none">
                        <input type="text" id="txt_iar_id" class="form-control" name="txt_iar_id" value="<?php echo $editiar_details->iar_id ?>"readonly>
                        <label class="form-label fw-bold text-dark" for="txt_iar_id">IAR AI ID :</label>
                    </div>
                    <div class="form-floating mb-2 d-none">
                        <input type="text" id="txt_ics_id" class="form-control" name="txt_ics_id" value="<?php echo $editiar_details->iar_po_id ?>"readonly>
                        <label class="form-label fw-bold text-dark" for="txt_ics_id">IAR ICS ID :</label>
                    </div>
                    <div class="form-floating mb-2 d-none">
                        <input type="text" id="edit_entityname" value="<?php echo $editiar_details->entity_name ?>" class="form-control" name="edit_entityname" readonly>
                        <label class="form-label fw-bold text-dark" for="txtSupplier">Entity Name :</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_propertyno" value="<?php echo $iar_propertyno->property_no ?>" class="form-control" name="edit_propertyno" readonly>
                        <label class="form-label fw-bold text-dark" for="txtSupplier">Stock / Property No. :</label>
                    </div>
                    <div class="form-floating mb-2">
                            <input type="text" id="edit_supplier" value="<?php echo $editiar_details->iar_supplier ?>" class="form-control" name="edit_supplier" readonly>
                            <label class="form-label fw-bold text-dark" for="edit_supplier">Supplier :</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="edit_pono" value="<?php echo $editiar_details->iar_po_number ?>" class="form-control" name="edit_pono" readonly>
                            <label class="form-label fw-bold text-dark" for="edit_pono">P.O No. :</label>
                        </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_fundcluster" value="<?php echo $editiar_details->fund_cluster ?>" class="form-control" name="edit_fundcluster" required>
                        <label class="form-label fw-bold text-dark" for="edit_fundcluster">Fund Cluster :</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_officedept" value="<?php echo $editiar_details->office_dept ?>" class="form-control" name="edit_officedept" required>
                        <label class="form-label fw-bold text-dark" for="edit_officedept">Office/Dept. :</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" id="edit_rcc" value="<?php echo $editiar_details->rcc ?>" class="form-control" name="edit_rcc" required>
                        <label class="form-label fw-bold text-dark" for="edit_rcc">RCC :</label>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-8">
                    <div class="row">
                    <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_iarno" class="form-control" name="edit_iarno" value="<?php echo $editiar_details->iar_number ?>">
                                    <label class="form-label fw-bold text-dark" for="edit_iarno">IAR No. :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_iardate" class="form-control" name="edit_iardate" type="date" value="<?php echo $editiar_details->iar_date ?>"/>
                                    <label class="form-label fw-bold text-dark" for="edit_iardate">Date :</label>
                                </div>
                            </div>
                     </div> 
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_invoice" class="form-control" name="edit_invoice" value="<?php echo $editiar_details->invoice_number ?>">
                                    <label class="form-label fw-bold text-dark" for="edit_invoice">Invoice No. :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_invoicedate" class="form-control" name="edit_invoicedate" type="date" value="<?php echo $editiar_details->invoice_date ?>"/>
                                    <label class="form-label fw-bold text-dark" for="edit_invoicedate">Date :</label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <label class="form-label fw-bold text-dark">Inspection :</label>
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_inspectionofficer" class="form-control" name="edit_inspectionofficer" value="<?php echo $editiar_details->inspection_officer ?>">
                                    <label class="form-label fw-bold text-dark" for="edit_inspectionofficer">Officer :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_dateinspected" class="form-control" name="edit_dateinspected" type="date" value="<?php echo $editiar_details->inspection_date ?>"/>
                                    <label class="form-label fw-bold text-dark" for="edit_dateinspected">Date Inspected :</label>
                                </div>
                            </div>
                        </div> 
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <label class="form-label fw-bold text-dark">Acceptance :</label>
                                <div class="form-floating mb-2">
                                    <input type="text" id="edit_acceptance" class="form-control" name="edit_acceptance" value="<?php echo $editiar_details->acceptance_custodian ?>">
                                    <label class="form-label fw-bold text-dark" for="edit_acceptance">Property Custodian :</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="edit_acceptancedate" class="form-control" name="edit_acceptancedate" type="date" value="<?php echo $editiar_details->acceptance_date ?>" />
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
                                    <th style="width: 65%;">Items / Description</th>
                                    <!-- <th style="width: 10%;">Unit Cost</th>
                                    <th style="width: 10%;">Total Unit Cost</th> -->
                                </tr>
                            <tbody>
                                <?php foreach ($iar_details as $iar_detail): ?>
                                <tr>
                                    <td><input required type="text" value="<?php echo $iar_detail->item_no ?>" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" readonly>
                                        <div class="invalid-feedback">
                                            Please enter Item No.
                                        </div>
                                    </td>
                                    <td><input required type="number" value="<?php echo $iar_detail->quantity ?>" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" readonly>
                                        <div class="invalid-feedback">
                                            Please enter Quantity.
                                        </div>
                                    </td>
                                    <td><input required type="text" value="<?php echo $iar_detail->unit ?>" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1" readonly>
                                        <div class="invalid-feedback">
                                            Please enter unit.
                                        </div>
                                    </td>
                                    <td>
                                        <textarea required class="form-control" name="txtDescription[]" style="height: 4em;" readonly><?php echo $iar_detail->item_description ?></textarea>
                                        <div class="invalid-feedback">
                                            Please enter item description.
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <input required type="text" value="" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" readonly>
                                        <div class="invalid-feedback">
                                            Please enter a unit cost.
                                        </div>
                                    </td>
                                    <td><input required type="text" value="" class="form-control" id="txtTotalUnitCost" name="txtTotalUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" readonly>
                                        <div class="invalid-feedback">
                                            Please enter a total unit cost.
                                        </div>
                                    </td> -->
                                </tr>
                                <?php endforeach ?>
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
</div>