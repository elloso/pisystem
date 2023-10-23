<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title fw-bold">Purchase Order Details</div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url() ?>updatepo-details" method="post">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <input type="hidden" id="poid" value="<?= $editpo_details->id ?>" class="form-control" name="poid" required>
                        <input type="hidden" id="po_id" value="<?= $editpo_details->po_id ?>" class="form-control" name="po_id" required>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtSupplier" value="<?= $editpo_details->supplier ?>" class="form-control" name="txtSupplier" required>
                            <label class="form-label fw-bold text-dark" for="txtSupplier">Supplier :</label>
                            <div class="invalid-feedback">
                                Please choose a supplier.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" id="txtPONumber" value="<?= $editpo_details->po_number ?>" class="form-control" name="txtPONumber" required>
                            <label class="form-label fw-bold text-dark" for="txtPONumber">P.O Number :</label>
                            <div class="invalid-feedback">
                                Please choose a p.o number.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input id="txtDate" class="form-control" value="<?= $editpo_details->po_date ?>" name="txtDate" type="date" required>
                            <label class="form-label fw-bold text-dark" for="txtDate">Date :</label>
                            <div class="invalid-feedback">
                                Please choose a date.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtMOP" class="form-control" value="<?= $editpo_details->made_of_procurment ?>" name="txtMOP" required>
                            <label class="form-label fw-bold text-dark" for="txtMOP">Mode of Procurement:</label>
                            <div class="invalid-feedback">
                                Please choose a mode of procurement.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" id="txtPRNumber" class="form-control" value="<?= $editpo_details->pr_number ?>" name="txtPRNumber" required>
                            <label class="form-label fw-bold text-dark" for="txtPRNumber">Purchase Request Number:</label>
                            <div class="invalid-feedback">
                                Please choose a purchase request number.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="number" id="txtPGEFNumber" class="form-control" value="<?= $editpo_details->pgr_number  ?>" name="txtPGEFNumber">
                            <label class="form-label fw-bold text-dark" for="txtPGEFNumber">PG REF Number:</label>
                            <div class="invalid-feedback">
                                Please choose a pg ref number.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtTotaCost" class="form-control" value="<?= $editpo_details->total_cost ?>" name="txtTotalCost" required>
                            <label class="form-label fw-bold text-dark" for="txtTotaCost">Total Cost:</label>
                            <div class="invalid-feedback">
                                Please choose a total cost.
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
                                        <th style="width: 15%;">Quantity</th>
                                        <th style="width: 15%;">Unit</th>
                                        <th style="width: 47%;">Items / Description</th>
                                        <th style="width: 15%;">Unit Cost</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        foreach ($poitemList as $poitem) {
                                        ?>
                                            <tr>
                                                <td><input required type="text" value="<?php echo $poitem->item_no ?>" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter Item No.
                                                    </div>
                                                </td>
                                                <td><input required type="number" value="<?php echo $poitem->quantity ?>" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1">
                                                    <div class="invalid-feedback">
                                                        Please enter Quantity.
                                                    </div>
                                                </td>
                                                <td><input required type="text" value="<?php echo $poitem->unit ?>" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1">
                                                    <div class="invalid-feedback">
                                                        Please enter unit.
                                                    </div>
                                                </td>
                                                <td>
                                                    <textarea required class="form-control" name="txtDescription[]" style="height: 4em;"><?php echo $poitem->item_description ?></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter item description.
                                                    </div>
                                                </td>
                                                <td>
                                                    <input required type="number" value="<?php echo $poitem->unit_cost ?>" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)">
                                                    <div class="invalid-feedback">
                                                        Please enter a unit cost.
                                                    </div>
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
                <button type="button" class="btn btn-secondary mt-2" style="width: 10%;" onclick=" history.back()">Back</button>
                <button type="submit" class="btn btn-primary mt-2" style="width: 10%;">Save</button>
            </form>
        </div>
    </div>