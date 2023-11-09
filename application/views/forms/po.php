<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Purchase Order</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="po-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_PONo" id="showModalButton">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th class="text-center">SUPPLIER</th>
                            <th class="text-center">P.O No.</th>
                            <th class="text-center">DATE</th>
                            <th class="text-center">PR No.</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($PODatas as $POData) : ?>
                            <tr>
                                <td><?php echo $POData->supplier; ?></td>
                                <td><?php echo $POData->po_number; ?></td>
                                <td><?php echo $POData->po_date; ?></td>
                                <td><?php echo $POData->pr_number; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('editpo-details/' . md5($POData->id) . '/' . md5($POData->po_id)) ?>" title='edit details' class='text-primary po-data'><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="p-2 text-danger" title="Delete" style="cursor: pointer;">
                                        <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#deletePOModal"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal List input Data -->
<div class="modal fade" id="Modal_PONo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_PONoLabel">New Purchase Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $po_id_plus_one = $po_id + 1; ?>
                <form action="<?php echo base_url() ?>submit-po" method="post" class="needs-validation" novalidate>
                    <div class="scrollable-content" style="max-height: 420px; overflow-y: auto; overflow-x: hidden;">
                        <div class="row">
                            <input type="hidden" value="<?php echo $po_id_plus_one; ?>" id="po_id" class="form-control" name="po_id" required>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtSupplier" class="form-control" name="txtSupplier" required>
                                    <label class="form-label fw-bold text-dark" for="txtSupplier">Supplier :</label>
                                    <div class="invalid-feedback">
                                        Please enter supplier.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" required>
                                    <label class="form-label fw-bold text-dark" for="txtPONumber">P.O Number :</label>
                                    <div class="invalid-feedback">
                                        Please choose a P.O. number.
                                    </div>
                                    <div id="msg"></div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDate" class="form-control" name="txtDate" type="date" required>
                                    <label class="form-label fw-bold text-dark" for="txtDate">Date :</label>
                                    <div class="invalid-feedback">
                                        Please choose a date.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtMOP" class="form-control" name="txtMOP" required>
                                    <label class="form-label fw-bold text-dark" for="txtMOP">Mode of Procurement:</label>
                                    <div class="invalid-feedback">
                                        Please choose a mode of procurement.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtPRNumber" class="form-control" name="txtPRNumber" required>
                                    <label class="form-label fw-bold text-dark" for="txtPRNumber">Purchase Request Number:</label>
                                    <div class="invalid-feedback">
                                        Please choose a purchase request number.
                                    </div>
                                    <div id="prmsg"></div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="number" id="txtPGEFNumber" class="form-control" name="txtPGEFNumber">
                                    <label class="form-label fw-bold text-dark" for="txtPGEFNumber">PG REF Number:</label>
                                    <div class="invalid-feedback">
                                        Please choose a pg ref number.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtTotalCost" class="form-control" name="txtTotalCost" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtTotalCost" readonly>Total Cost:</label>
                                    <div class="invalid-feedback">
                                        Please choose a total cost.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border shadow rounded-3">
                            <div class="col-lg-6 col-xl-12">
                                <div class="card" style="max-width: 1500px;">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <button type="button" class="btn btn-primary btn-sm mb-2" id="addRow">
                                                Add Item
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm mb-2" id="deleteRow" disabled>
                                                Delete
                                            </button>
                                            <table id="table-itemno-data" class="table table-bordered table-hover">
                                                <tr>
                                                    <th style="width: 18%;">Stock/Property No.</th>
                                                    <th style="width: 12%;">Quantity</th>
                                                    <th style="width: 14%;">Unit</th>
                                                    <th style="width: 25%;">Items / Description</th>
                                                    <th style="width: 15%;">Unit Cost</th>
                                                    <th style="width: 16%;">Total Unit Cost</th>
                                                </tr>
                                                <tr>
                                                    <td><input required type="hidden" class=" form-control" id="txtItemNo" name="txtItemNo[]" value="1" readonly>
                                                        <input required type="text" class=" form-control" id="txtPropNo" name="txtPropNo[]" required>
                                                        <div class="invalid-feedback">
                                                            Stock/Property No.
                                                        </div>
                                                    </td>
                                                    <td><input required type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" oninput="this.value = Math.abs(this.value)" value="1">
                                                        <div class="invalid-feedback">
                                                            Please enter Quantity.
                                                        </div>
                                                    </td>
                                                    <td><input required type="text" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1">
                                                        <div class="invalid-feedback">
                                                            Please enter unit.
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <textarea required class="form-control" name="txtDescription[]" style="height: 4em;"></textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter item description.
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input required type="text" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0">
                                                        <div class=" invalid-feedback">
                                                            Please enter a unit cost.
                                                        </div>
                                                    </td>
                                                    <td><input required type="number" class="form-control" id="txtTotalUnitCost" name="txtTotalUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)" readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter a total unit cost.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="proceedButton">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal for Deletion -->
<div class="modal fade" id="deletePOModal" tabindex="-1" aria-labelledby="deletePOModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePOModalLabel"><i class="text-warning fa-solid fa-triangle-exclamation mt-2"></i> Deletion confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i>Deletion of Purchase Order number data will be also delete other datas such as
                    (IAR, ICS, PAR and etc.)
                </i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="<?php echo base_url('deletepo-data/' . md5($POData->po_id)) ?>">
                    <button type="button" class="btn btn-primary">Yes</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#txtPRNumber").blur(function() {
            var txtPRNumber = $('#txtPRNumber').val();
            if (txtPRNumber !== "") {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('checkPr-number'); ?>",
                    dataType: 'json',
                    data: {
                        txtPRNumber: txtPRNumber
                    },
                    success: function(data) {
                        if (data.exists) {
                            $("#prmsg").css("color", "red").text("This Purchase Request Number already exists");
                            $("#proceedButton").css("pointer-events", "none");
                        } else {
                            $("#prmsg").css("color", "green").text("Purchase Request Number available!");
                            $("#proceedButton").css("pointer-events", "auto");
                        }
                    },
                    error: function() {
                        $("#prmsg").css("color", "red").text('Some error');
                    }
                });
            } else {
                // $("#prmsg").css("color", "red").text("Please enter a Purchase Request Number");
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#txtPONumber").blur(function() {
            var txtPONumber = $('#txtPONumber').val();
            if (txtPONumber !== "") {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('checkPo-number'); ?>",
                    dataType: 'json',
                    data: {
                        txtPONumber: txtPONumber
                    },
                    success: function(data) {
                        if (data.exists) {
                            $("#msg").css("color", "red").text("This P.O. Number already exists");
                            $("#proceedButton").css("pointer-events", "none");
                        } else {
                            $("#msg").css("color", "green").text("P.O. Number available!");
                            $("#proceedButton").css("pointer-events", "auto");
                        }
                    },
                    error: function() {
                        $("#msg").css("color", "red").text('Some error');
                    }
                });
            } else {
                // $("#msg").css("color", "red").text("Please enter a P.O. Number");
            }
        });
    });
</script>
<script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
<script>
    var table = document.getElementById("table-itemno-data");
    var button1 = document.getElementById("addRow");
    var button2 = document.getElementById("deleteRow");
    var currentItemNo = 2;
    table.addEventListener("input", updateTotalUnitCost);
    button1.addEventListener("click", function() {
        event.preventDefault();
        var newRow = table.insertRow(-1);
        var itemnoCell = newRow.insertCell(0);
        var itemquantityCell = newRow.insertCell(1);
        var itemunitCell = newRow.insertCell(2);
        var itemdescriptionCell = newRow.insertCell(3);
        var itemunitcostCell = newRow.insertCell(4);
        var itemtotalunitcostCell = newRow.insertCell(5);
        itemnoCell.innerHTML = '<input required type="hidden" value="' + currentItemNo + '" class="form-control" id="txtItemNo" name="txtItemNo[]" value="1" readonly><input required type="text" class=" form-control" id="txtPropNo" name="txtPropNo[]" required><div class="invalid-feedback">Stock/Property No.</div>';
        itemquantityCell.innerHTML = '<input required type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" value="1">';
        itemunitCell.innerHTML = '<input required type="text" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1">';
        itemdescriptionCell.innerHTML = '<textarea required class="form-control" name="txtDescription[]" style="height: 4em; width: 100%;"></textarea> <div class="invalid-feedback">Please enter item description.</div>';
        itemunitcostCell.innerHTML = '<input required type="text" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)"><div class="invalid-feedback">Please enter a unit cost.</div>';
        itemtotalunitcostCell.innerHTML = '<input required type="number" class="form-control" id="txtTotalUnitCost" name="txtTotalUnitCost[]" placeholder="0" readonly><div class="invalid-feedback">Auto-calculated total unit cost.</div>';
        currentItemNo++;
        button2.disabled = false;
    });
    button2.addEventListener("click", function() {
        event.preventDefault();
        var rowCount = table.rows.length;
        if (rowCount > 1) {
            table.deleteRow(rowCount - 1);
            currentItemNo--;
        }
        if (table.rows.length === 1) {
            button2.disabled = true;
        }
    });

    function updateTotalUnitCost() {
        var rows = table.rows;
        for (var i = 1; i < rows.length; i++) {
            var quantity = parseFloat(rows[i].querySelector('input[name^="txtItemQuantity[]"]').value) || 0;
            var unitCost = parseFloat(rows[i].querySelector('input[name^="txtItemUnitCost[]"]').value) || 0;
            var totalUnitCost = quantity * unitCost;
            rows[i].querySelector('input[name^="txtTotalUnitCost[]"]').value = totalUnitCost.toFixed(2);
        }
        updateTotalCost();
    }

    function updateTotalCost() {
        var totalCost = 0;
        var totalUnitCostInputs = document.querySelectorAll('input[name^="txtTotalUnitCost[]"]');

        totalUnitCostInputs.forEach(function(input) {
            totalCost += parseFloat(input.value) || 0;
        });
        document.getElementById('txtTotalCost').value = totalCost.toFixed(2);
    }
</script>
<script>
    document.getElementById("txtItemUnitCost").addEventListener("input", function(e) {
        this.value = this.value.replace(/[^0-9.]/g, "");
        var parts = this.value.split('.');
        if (parts.length > 2) {
            this.value = parts[0] + '.' + parts.slice(1).join('');
        }
    });
</script>