<div class="container justify-content-center align-items-center container_table" style="min-height: 10vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Inventory Custodian Slip Details</div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url() ?>updateics-details" method="post">
                <?php if (!empty($this->session->flashdata('trn-error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center" style="width:100%;" role="alert">
                        <?php echo $this->session->flashdata('trn-error'); ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <input type="hidden" id="icsid" value="<?= $editicsdetails->ics_id ?>" class="form-control" name="icsid" required>
                    <input type="hidden" id="ics_id" value="<?= $editicsdetails->ics_po_id ?>" class="form-control" name="ics_id" required>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtIarno" value="<?= $editicsdetails->ics_iar_no ?>" class="form-control" name="txtIarno" required readonly>
                            <label class="form-label fw-bold text-dark" for="txtIarno">IAR Number:</label>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="date" id="txtICSDate" value="<?= $editicsdetails->ics_date ?>" class="form-control" name="txtICSDate" >
                            <label class="form-label fw-bold text-dark" for="txtICSDate">Date:</label>
                        </div>
                    </div> -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtICSnumber" class="form-control" value="<?= $editicsdetails->ics_no ?>" name="txtICSnumber">
                            <label class="form-label fw-bold text-dark" for="txtICSnumber">ICS Number:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtFund" value="<?= $editicsdetails->ics_fund ?>" class="form-control" name="txtFund" required>
                            <label class="form-label fw-bold text-dark" for="txtFund">Fund:</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="hidden" id="icsTotalCost" class="form-control" name="icsTotalCost" required readonly>
                            <input type="text" id="TotalCost" class="form-control" value="<?= $editicsdetails->ics_total_cost ?>" name="TotalCost" required readonly>
                            <label class="form-label fw-bold text-dark" for="icsTotalCost">Total Cost:</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="border p-2 mb-2">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtReceivedfrom" class="form-control" value="<?= $editicsdetails->ics_receivedfrom ?>" name="txtReceivedfrom">
                                <label class="form-label fw-bold text-dark" for="txtReceivedfrom">Received From:</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="date" id="txtdatefrom" class="form-control" value="<?= $editicsdetails->ics_receivedfrom_date ?>" name="txtdatefrom" >
                                <label class="form-label fw-bold text-dark" for="txtdatefrom">Date:</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="border p-2 mb-2">
                            <div class="form-floating mb-2">
                                <input id="txtReceivedby" class="form-control" value="<?= $editicsdetails->ics_receivedby ?>" name="txtReceivedby" type="text">
                                <label class="form-label fw-bold text-dark" for="txtReceivedby">Received By:</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="date" id="txtDateby" class="form-control" value="<?= $editicsdetails->ics_received_date ?>" name="txtDateby">
                                <label class="form-label fw-bold text-dark" for="txtDateby">Date:</label>
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
                                        <th class="text-center" style="width: 10%;">Quantity</th>
                                        <th class="text-center" style="width: 15%;">Unit</th>
                                        <th class="text-center" style="width: 32%;">Items / Description</th>
                                        <th class="text-center" style="width: 10%;">Unit Cost</th>
                                        <th class="text-center" style="width: 10%;">Total Unit Cost</th>
                                        <th class="text-center" style="width: 8%;">Date Acquired</th>
                                        <th class="text-center" style="width: 10%;">Estimated Useful Life</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                        foreach ($icsitemList as $icsitem) {
                                        ?>
                                            <tr>

                                                <td><input required type="number" value="<?= $icsitem->quantity ?>" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter Quantity.
                                                    </div>
                                                </td>
                                                <td><input required type="text" value="<?= $icsitem->unit ?>" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter unit.
                                                    </div>
                                                </td>
                                                <td>
                                                    <textarea required class="form-control" name="txtDescription[]" style="height: 4em;" readonly><?= $icsitem->item_description ?></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter item description.
                                                    </div>
                                                </td>
                                                <td>
                                                    <input required type="text" value="<?= number_format($icsitem->unit_cost, 2, '.', ',') ?>" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a unit cost.
                                                    </div>
                                                </td>
                                                <td><input required type="text" value="<?= number_format($icsitem->total_unit_cost, 2, '.', ',') ?>" class="form-control" id="txtTotalUnitCost" name="txtTotalUnitCost[]" placeholder="0" autocomplete="off" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a total unit cost.
                                                    </div>
                                                </td>
                                                <td><input required type="hidden" value="<?= $icsitem->item_no ?>" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" readonly>
                                                    <input type="date" value="<?= $icsitem->date_acquired ?>" class=" form-control" id="txtDateacq" name="txtDateacq[]">
                                                </td>
                                                <td>
                                                    <input required type="hidden" value="<?php echo $icsitem->id ?>" class="form-control" id="txtPOItem_id" name="txtPOItem_id[]" placeholder="">
                                                    <input type="text" value="<?php echo $icsitem->useful_life ?>" class="form-control" id="txtPOItem_useful" name="txtPOItem_useful[]" placeholder="">
                                                    <div class="invalid-feedback">
                                                        Please enter estimated useful life of the item.
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
                <button type="button" class="btn btn-secondary mt-2" style="width: 10%;" onclick="history.back()">Back</button>
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
                    <form action="#" method="post">
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
                        <div class="row mb-3">
                            <div class="col" style="width: 100%;">
                                <label for="" class="fw-bold">Total Unit Cost</label>
                                <input type="text" class="form-control" maxlength="76" name="total_unit_cost" id="editTotalCost" required>
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
            document.getElementById("txtTotalUnitCost").value = totalCost;
            var mtotalCost = calculateTotal();
            document.getElementById("icsTotalCost").value = mtotalCost;
        });
    </script>