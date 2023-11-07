<div class="container justify-content-center align-items-center container_table" style="min-height: 10vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Property Acknowledgment Receipt</div>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('edit-PAR-Details') ?>" method="post">
                <?php if (!empty($this->session->flashdata('trn-error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center" style="width:100%;" role="alert">
                        <?php echo $this->session->flashdata('trn-error'); ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <input type="hidden" id="par_id" value="<?php echo $editpar_details->par_id ?>" class="form-control" name="par_id" required>
                    <input type="hidden" id="par_po_id" value="<?php echo $editpar_details->par_po_id ?>" class="form-control" name="par_po_id" required>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtIAR_PARno" value="<?php echo $editpar_details->par_iarno ?>" class="form-control" name="txtIAR_PARno" required readonly>
                            <label class="form-label fw-bold text-dark" for="txtIAR_PARno">IAR Number:</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="date" id="txtPARDate" value="<?php echo $editpar_details->par_date ?>" class="form-control" name="txtPARDate" required>
                            <label class="form-label fw-bold text-dark" for="txtPARDate">Date:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtFund" value="<?php echo $editpar_details->par_fund ?>" class="form-control" name="txtFund" required>
                            <label class="form-label fw-bold text-dark" for="txtFund">Fund:</label>
                        </div>
                        <div class="border p-2 mb-2">
                            <div class="form-floating mb-2">
                                <input id="txtReceivedby" class="form-control" value="<?php echo $editpar_details->par_receivedby ?>" name="txtReceivedby" type="text">
                                <label class="form-label fw-bold text-dark" for="txtReceivedby">Received By:</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="date" id="txtDateby" class="form-control" value="<?php echo $editpar_details->par_received_date ?>" name="txtDateby">
                                <label class="form-label fw-bold text-dark" for="txtDateby">Date:</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtPARnumber" class="form-control" value="<?php echo $editpar_details->par_no ?>" name="txtPARnumber">
                            <label class="form-label fw-bold text-dark" for="txtPARnumber">PAR Number:</label>
                        </div>
                        <div class="border p-2 mb-2">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtReceivedfrom" class="form-control" value="<?php echo $editpar_details->par_receivedfrom ?>" name="txtReceivedfrom" required>
                                <label class="form-label fw-bold text-dark" for="txtReceivedfrom">Received From:</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="date" id="txtdatefrom" class="form-control" value="<?php echo $editpar_details->par_receivedfrom_date ?>" name="txtdatefrom" required>
                                <label class="form-label fw-bold text-dark" for="txtdatefrom">Date:</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="hidden" id="parTotalCost" class="form-control" name="parTotalCost" required readonly>
                                <input type="text" id="rTotalCost" class="form-control" value="<?php echo $editpar_details->par_total_cost ?>" name="rTotalCost" required readonly>
                                <label class="form-label fw-bold text-dark" for="parTotalCost">Total Cost:</label>
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
                                        <th class="text-center" style="width: 8%;">Item No.</th>
                                        <th class="text-center" style="width: 10%;">Quantity</th>
                                        <th class="text-center" style="width: 15%;">Unit</th>
                                        <th class="text-center" style="width: 32%;">Items / Description</th>
                                        <th class="text-center" style="width: 10%;">Unit Cost</th>
                                        <th class="text-center" style="width: 10%;">Total Unit Cost</th>
                                        <th class="text-center" style="width: 10%;">Estimated Useful Life</th>
                                        <!-- <th class="text-center" style="width: 10%;">Date Acquired</th>
                                        <th class="text-center" style="width: 10%;">Property Number</th> -->
                                    </tr>
                                    <tbody>
                                        <?php foreach ($par_details as $par_detail) : ?>
                                            <tr>
                                                <td><input required type="text" value="<?php echo $par_detail->item_no ?>" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter Item No.
                                                    </div>
                                                </td>
                                                <td><input required type="number" value="<?php echo $par_detail->quantity ?>" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter Quantity.
                                                    </div>
                                                </td>
                                                <td><input required type="text" value="<?php echo $par_detail->unit ?>" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter unit.
                                                    </div>
                                                </td>
                                                <td>
                                                    <textarea required class="form-control" name="txtDescription[]" style="height: 4em;" readonly><?php echo $par_detail->item_description ?></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter item description.
                                                    </div>
                                                </td>
                                                <td>
                                                    <input required type="text" value="<?= number_format($par_detail->unit_cost, 2, '.', ',') ?>" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a unit cost.
                                                    </div>
                                                </td>
                                                <td><input type="text" value="<?= number_format($par_detail->total_unit_cost, 2, '.', ',') ?>" class="form-control" id="txtTotalUnitCost" name="txtTotalUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" required readonly>
                                                    <div class="invalid-feedback">
                                                        Please enter a total unit cost.
                                                    </div>
                                                </td>
                                                <td>
                                                    <input required type="hidden" value="<?php echo $par_detail->id ?>" class="form-control" id="txtPOItem_id" name="txtPOItem_id[]" placeholder="">
                                                    <input type="text" value="<?php echo $par_detail->useful_life ?>" class="form-control" id="txtPOItem_useful" name="txtPOItem_useful[]" placeholder="">
                                                    <div class="invalid-feedback">
                                                        Please enter estimated useful life of the item.
                                                    </div>
                                                </td>
                                                <!-- <td>
                                                    <input type="date" id="txtDateby" class="form-control" value="" name="txtDateby">
                                                </td>
                                                <td>
                                                    <input required type="text" value="" class="form-control" maxlength="28" id="" name="" size="1" readonly>
                                                </td> -->
                                            </tr>
                                        <?php endforeach ?>
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
            document.getElementById("parTotalCost").value = mtotalCost;
        });
    </script>