<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Purchase Order</div>
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
                                    <a href="#" class="p-2 text-primary" title="print"><i class="fa-solid fa-print"></i></a>
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
                                        Please choose a supplier.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="number" id="txtPONumber" class="form-control" name="txtPONumber" required>
                                    <label class="form-label fw-bold text-dark" for="txtPONumber">P.O Number :</label>
                                    <div class="invalid-feedback">
                                        Please choose a p.o number.
                                    </div>
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
                                    <input type="number" id="txtPRNumber" class="form-control" name="txtPRNumber" required>
                                    <label class="form-label fw-bold text-dark" for="txtPRNumber">Purchase Request Number:</label>
                                    <div class="invalid-feedback">
                                        Please choose a purchase request number.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="number" id="txtPGEFNumber" class="form-control" name="txtPGEFNumber">
                                    <label class="form-label fw-bold text-dark" for="txtPGEFNumber">PG REF Number:</label>
                                    <div class="invalid-feedback">
                                        Please choose a pg ref number.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtTotaCost" class="form-control" name="txtTotaCost" required>
                                    <label class="form-label fw-bold text-dark" for="txtTotaCost">Total Cost:</label>
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
                                                    <th style="width: 8%;">Item No.</th>
                                                    <th style="width: 15%;">Quantity</th>
                                                    <th style="width: 15%;">Unit</th>
                                                    <th style="width: 47%;">Items / Description</th>
                                                    <th style="width: 15%;">Unit Cost</th>
                                                </tr>
                                                <tr>
                                                    <td><input required type="text" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" value="1" readonly>
                                                        <div class="invalid-feedback">
                                                            Please enter Item No.
                                                        </div>
                                                    </td>
                                                    <td><input required type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" value="1">
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
                                                        <input required type="number" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)">
                                                        <div class="invalid-feedback">
                                                            Please enter a unit cost.
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Scroll Container -->
            </div> <!-- End Modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="proceedButton">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
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
    button1.addEventListener("click", function() {
        event.preventDefault();
        var newRow = table.insertRow(-1);
        var itemnoCell = newRow.insertCell(0);
        var itemquantityCell = newRow.insertCell(1);
        var itemunitCell = newRow.insertCell(2);
        var itemdescriptionCell = newRow.insertCell(3);
        var itemunitcostCell = newRow.insertCell(4);
        itemnoCell.innerHTML = '<input required type="text"  value="' + currentItemNo + '" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" value="1" readonly>';
        itemquantityCell.innerHTML = '<input required type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" value="1">';
        itemunitCell.innerHTML = '<input required type="text" class="form-control" maxlength="28" id="txtUnit" name="txtUnit[]" size="1">';
        itemdescriptionCell.innerHTML = '<textarea required class="form-control" name="txtDescription[]" style="height: 4em; width: 100%;"></textarea> <div class="invalid-feedback">Please enter item description.</div>';
        itemunitcostCell.innerHTML = ' <input required type="number" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" oninput="formatCurrency(this)"><div class="invalid-feedback">Please enter a unit cost.</div>';
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
</script>