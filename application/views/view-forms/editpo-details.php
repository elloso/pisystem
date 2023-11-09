<div class="container justify-content-center align-items-center container_table" style="min-height: 10vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Purchase Order Details</div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url() ?>updatepo-details" method="post" id="formPo">
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
                            <input type="text" id="txtPONumber" value="<?= $editpo_details->po_number ?>" class="form-control" name="txtPONumber" required>
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
                            <div class="p-2 mt-2 ">
                                <button class="btn btn-primary" type="button" id="addRow">Add</button>
                                <button class="btn btn-danger" type="button" id="deleteRow" disabled>Delete</button>
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
                            <input type="text" id="txtPRNumber" class="form-control" value="<?= $editpo_details->pr_number ?>" name="txtPRNumber" required>
                            <label class="form-label fw-bold text-dark" for="txtPRNumber">Purchase Request Number:</label>
                            <div class="invalid-feedback">
                                Please choose a purchase request number.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtPGEFNumber" class="form-control" value="<?= $editpo_details->pgr_number  ?>" name="txtPGEFNumber">
                            <label class="form-label fw-bold text-dark" for="txtPGEFNumber">PG REF Number:</label>
                            <div class="invalid-feedback">
                                Please choose a pg ref number.
                            </div>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="hidden" id="txtTotalCost" class="form-control" name="txtTotalCost" required readonly>
                            <input type="text" id="poTotalCost" class="form-control" value="<?= $editpo_details->total_cost  ?>" name="poTotalCost" required readonly>
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
                                <table id="table-po-data" class="table table-hover">
                                    <tr>
                                        <th style="width: 18%;">Stock / Property No.</th>
                                        <th style="width: 10%;">Quantity</th>
                                        <th style="width: 15%;">Unit</th>
                                        <th style="width: 30%;">Items / Description</th>
                                        <th style="width: 10%;">Unit Cost</th>
                                        <th style="width: 10%;">Total Unit Cost</th>
                                        <th style="width: 7%;">Action</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        $remainingRowCount = count($poitemList);
                                        $itemNoCounter = 1;
                                        foreach ($poitemList as $poitem) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <input required type="hidden" value="<?php echo $poitem->id ?>" class="form-control" id="txtPOItem_id" name="txtPOItem_id[]">
                                                    <input required type="hidden" value="<?php echo $itemNoCounter; ?>" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" readonly>
                                                    <input required type="text" value="<?php echo $poitem->property_no ?>" class=" form-control" id="txtStockProperty" name="txtStockProperty[]">
                                                    <div class="invalid-feedback">
                                                        Please enter Item No.
                                                    </div>
                                                </td>
                                                <td><input required type="number" value="<?php echo $poitem->quantity ?>" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" oninput="calculateRowTotal(this)" readonly>
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
                                                    <input required type="text" value="<?= number_format($poitem->unit_cost, 2) ?>" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a unit cost.
                                                    </div>
                                                </td>
                                                <td><input required type="text" value="<?= number_format($poitem->total_unit_cost, 2) ?>" class="form-control" id="txtTotalUnitCost" name="txtTotalUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this); calculateRowTotal(this)" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a total unit cost.
                                                    </div>
                                                </td>
                                                <td class="text-center"><a href="#" class="p-1 text-primary" data-bs-toggle="modal" data-bs-target="#editRow" onclick="displayEditModal('<?php echo $poitem->id ?>','<?php echo $poitem->quantity ?>', '<?php echo $poitem->unit ?>', '<?php echo $poitem->item_description ?>', '<?php echo $poitem->unit_cost ?>', <?php echo $poitem->total_unit_cost ?>)" class="text-primary" title="edit item details"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <?php
                                                    if ($remainingRowCount > 1) {
                                                        echo '<a href="' . base_url('deletepo-item/' . md5($poitem->id)) . '" class="p-1 text-danger" title="delete" onclick="return confirm(\'Are you sure you want to delete ' . $poitem->item_description . '?\');"><i class="fa-solid fa-trash"></i></a>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $itemNoCounter++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mt-2" style="width: 10%;" onclick=" history.back()">Back</button>
                <button type="submit" class="btn btn-primary mt-2" style="width: 10%;" id="formButton">Save</button>
            </form>
        </div>
    </div>
    <script>
        function displayEditModal(id, quantity, unit, item_description, unit_cost, total_unit_cost) {
            document.getElementById('edit_id').value = id;
            document.getElementById('editQuantity').value = quantity;
            document.getElementById('editUnit').value = unit;
            document.getElementById('editDescription').value = item_description;
            document.getElementById('editCost').value = unit_cost;
            document.getElementById('editTotalCost').value = total_unit_cost;
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
                        <input type="hidden" id="mtxtTotalCost" class="form-control" name="mtxtTotalCost" required readonly>
                        <input type="hidden" id="txtPo_id" value="<?= $editpo_details->po_id ?>" class="form-control" name="txtPo_id" required readonly>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="" class="fw-bold">Quantity</label>
                                <input type="hidden" class="form-control" name="id" id="edit_id" required>
                                <input type="number" class="form-control" name="quantity" oninput="updateTotalUnitCost()" oninput="this.value = Math.abs(this.value)" id="editQuantity" required>
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
                                <input type="text" class="form-control" oninput="updateTotalUnitCost()" maxlength="76" name="unit_cost" id="editCost" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col" style="width: 100%;">
                                <label for="" class="fw-bold">Total Unit Cost</label>
                                <input type="text" class="form-control" maxlength="76" name="total_unit_cost" id="editTotalCost" required readonly>
                            </div>
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitModalButton">Submit</button>
                </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        function updateTotalUnitCost() {
            var quantityInput = document.getElementById('editQuantity');
            var unitCostInput = document.getElementById('editCost');
            var totalUnitCostInput = document.getElementById('editTotalCost');

            var quantity = parseFloat(quantityInput.value) || 0;
            var unitCost = parseFloat(unitCostInput.value) || 0;

            var totalUnitCost = quantity * unitCost;
            totalUnitCostInput.value = totalUnitCost.toFixed(2);
        }
    </script>
    <script>
        var table = document.getElementById("table-po-data");
        var button1 = document.getElementById("addRow");
        var button2 = document.getElementById("deleteRow");
        var currentItemNo = <?php echo isset($itemNoCounter) ? $itemNoCounter : 1 ?>;
        var maxRow = currentItemNo;

        button1.addEventListener("click", function(event) {
            event.preventDefault();
            var newRow = table.insertRow(-1);
            var itemnoCell = newRow.insertCell(0);
            var itemquantityCell = newRow.insertCell(1);
            var itemunitCell = newRow.insertCell(2);
            var itemdescriptionCell = newRow.insertCell(3);
            var itemunitcostCell = newRow.insertCell(4);
            var itemtotalunitcostCell = newRow.insertCell(5);

            itemnoCell.innerHTML = '<input required type="hidden" value="' + currentItemNo + '"  oninput="this.value = Math.abs(this.value)" class="form-control" id="UtxtItemNo" name="UtxtItemNo[]" readonly><input required type="text" value="" class=" form-control" id="txtStockProperty" name="txtStockProperty[]">';
            itemquantityCell.innerHTML = '<input required type="number" class="form-control" maxlength="28" id="UtxtItemQuantity" name="UtxtItemQuantity[]" size="1" oninput="calculateTotalUnitCost(this)">';
            itemunitCell.innerHTML = '<input required type="text" class="form-control" maxlength="28" id="UtxtUnit" name="UtxtUnit[]" size="1" oninput="calculateTotalUnitCost(this)">';
            itemdescriptionCell.innerHTML = '<textarea required class="form-control" name="UtxtDescription[]" style="height: 4em;"></textarea><div class="invalid-feedback">Please enter item description.</div>';
            itemunitcostCell.innerHTML = '<input required type="text" class="form-control" id="UtxtItemUnitCost" name="UtxtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this); calculateTotalUnitCost(this)"><div class="invalid-feedback">Please enter a unit cost.</div>';
            itemtotalunitcostCell.innerHTML = '<input required type="number" class="form-control" id="UtxtTotalUnitCost" name="UtxtTotalUnitCost[]" placeholder="0" readonly><div class="invalid-feedback">Auto-calculated total unit cost.</div>';

            currentItemNo++;
            maxRow++;
            button2.disabled = false;
        });

        function calculateTotalUnitCost(inputElement) {
            var row = inputElement.parentNode.parentNode;
            var quantity = parseFloat(row.querySelector('#UtxtItemQuantity').value) || 0;
            var unitCost = parseFloat(row.querySelector('#UtxtItemUnitCost').value) || 0;
            var totalUnitCost = quantity * unitCost;
            totalUnitCost = totalUnitCost.toFixed(2);
            row.querySelector('#UtxtTotalUnitCost').value = totalUnitCost;
        }

        function formatCurrency(inputElement) {
            // You can implement your currency formatting logic here if needed.
            // This function can be used to format the input as a currency value.
        }
    </script>
    <script>
        button2.addEventListener("click", function() {
            event.preventDefault();
            var rowCount = table.rows.length;
            var maxRow = <?php echo $poitem->item_no + 1 ?>;

            if (rowCount > 1) {
                if (rowCount > maxRow) {
                    table.deleteRow(rowCount - 1);
                    currentItemNo--;
                }
            }

            if (rowCount === maxRow + 1) {
                button2.disabled = true;
            }
        });
    </script>
    <script>
        function calculateTotal() {
            var total = 0;
            var txtTotalUnitCostElements = document.getElementsByName("txtTotalUnitCost[]");
            for (var i = 0; i < txtTotalUnitCostElements.length; i++) {
                var value = parseFloat(txtTotalUnitCostElements[i].value.replace(/[^0-9.-]+/g, ''));
                if (!isNaN(value)) {
                    total += value;
                }
            }
            return total.toLocaleString('en-US', {
                style: 'decimal',
                minimumFractionDigits: 2
            });
        }
        window.addEventListener('DOMContentLoaded', function() {
            var totalCost = calculateTotal();
            document.getElementById("txtTotalCost").value = totalCost;
            var mtotalCost = calculateTotal();
            document.getElementById("mtxtTotalCost").value = mtotalCost;
        });
    </script>
    <script>
        document.getElementById("editCost").addEventListener("input", function(e) {
            this.value = this.value.replace(/[^0-9.]/g, "");
            var parts = this.value.split('.');
            if (parts.length > 2) {
                this.value = parts[0] + '.' + parts.slice(1).join('');
            }
        });
    </script>