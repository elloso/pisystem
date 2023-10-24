<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title fw-bold">Purchase Order Details</div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url() ?>updatepo-details" method="post">
                <?php if (!empty($this->session->flashdata('trn-error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center" style="width:100%;" role="alert">
                        <?php echo $this->session->flashdata('trn-error'); ?>
                    </div>
                <?php endif; ?>
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
                                        <th style="width: 12%;">Quantity</th>
                                        <th style="width: 15%;">Unit</th>
                                        <th style="width: 47%;">Items / Description</th>
                                        <th style="width: 13%;">Unit Cost</th>
                                        <th style="width: 5%;">Action</th>
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
                                                <td><input required type="number" value="<?php echo $poitem->quantity ?>" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter Quantity.
                                                    </div>
                                                </td>
                                                <td><input required type="text" value="<?php echo $poitem->unit ?>" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter unit.
                                                    </div>
                                                </td>
                                                <td>
                                                    <textarea required class="form-control" name="txtDescription[]" style="height: 4em;" readonly><?php echo $poitem->item_description ?></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter item description.
                                                    </div>
                                                </td>
                                                <td>
                                                    <input required type="number" value="<?php echo $poitem->unit_cost ?>" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a unit cost.
                                                    </div>
                                                </td>
                                                <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#editRow" onclick="displayEditModal('<?php echo $poitem->id ?>','<?php echo $poitem->quantity ?>', '<?php echo $poitem->unit ?>', '<?php echo $poitem->item_description ?>', '<?php echo $poitem->unit_cost ?>')" class="text-primary" title="edit item details"><i class="fa-solid fa-pen-to-square"></i></a></td>
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
    <script>
        function displayEditModal(id, quantity, unit, item_description, unit_cost) {
            document.getElementById('edit_id').value = id;
            document.getElementById('editQuantity').value = quantity;
            document.getElementById('editUnit').value = unit;
            document.getElementById('editDescription').value = item_description;
            document.getElementById('editCost').value = unit_cost;
        }
    </script>

    <div class="modal fade modal-lg" id="editRow">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Item Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>editItem-details" method="post">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="" class="fw-bold">Quantity</label>
                                <input type="hidden" class="form-control" name="id" id="edit_id" required>
                                <input type="number" class="form-control" name="quantity" oninput="this.value = Math.abs(this.value)" id="editQuantity" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="fw-bold">Unit</label>
                                <input type="text" class="form-control" maxlength="25" name="unit" id="editUnit" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="" class="fw-bold">Item Description</label>
                                <input type="text" class="form-control" maxlength="76" name="description" id="editDescription" required>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="fw-bold">Unit Cost</label>
                                <input type="text" class="form-control" maxlength="76" name="unit_cost" id="editCost" required>
                            </div>
                        </div>
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