<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Inventory Custodian Slip</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="ics-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InventoryCustodian">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th class="text-center">ICS No.</th>
                            <th class="text-center">IAR No.</th>
                            <th class="text-center">FUND</th>
                            <th class="text-center">SUPPLIER</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($PO_ICSDatas as $PO_ICSData) : ?>
                            <tr>
                                <td><?php echo $PO_ICSData->ics_no ?></td>
                                <td><?php echo $PO_ICSData->ics_iar_no ?></td>
                                <td><?php echo $PO_ICSData->ics_fund ?></td>
                                <td><?php echo $PO_ICSData->ics_supplier ?></td>
                                <td class="text-center"><?php if (empty($PO_ICSData->ics_no)) : ?>
                                        <a href="<?= base_url('editics-details/' . md5($PO_ICSData->ics_id) . '/' . md5($PO_ICSData->ics_po_id)) ?>" class="text-danger mx-2" onclick="return false;" style="cursor: not-allowed;"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" class="text-danger mx-2" onclick="return false;" style="cursor: not-allowed;"><i class="fa-solid fa-print"></i></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('editics-details/' . md5($PO_ICSData->ics_id) . '/' . md5($PO_ICSData->ics_po_id)) ?>" title="Edit" class="text-primary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="<?= base_url('print-icsform/' . md5($PO_ICSData->ics_po_id)); ?>" class="text-primary mx-2" title="Print" target="_blank"><i class="fa-solid fa-print"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal_InventoryCustodian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_InventoryCustodianLabel">Inventory Custodian Slip Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>update-ics" method="post" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <select class="form-select" aria-label="Default select example" name="selectICSIARNo" required>
                                    <option value="" disabled selected>-- Select IAR No. --</option>
                                    <?php foreach ($PO_ICSDatas as $PO_ICSData) : ?>
                                        <?php if (empty($PO_ICSData->ics_no)) : ?>
                                            <option value="<?php echo $PO_ICSData->ics_iar_no; ?>"><?php echo $PO_ICSData->ics_iar_no; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <label class="form-label fw-bold text-dark" for="txtPARIARNo">IAR No. :</label>
                                <div class="invalid-feedback">
                                    Please select IAR no.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtICSNo" class="form-control" name="txtICSNo" required>
                                <label class="form-label fw-bold text-dark" for="txtICSNo">ICS No. :</label>
                                <div class="invalid-feedback">
                                    Please enter ICS Number.
                                </div>
                                <small><div id="icsmsg"></div></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReceivedfrom" class="form-control" name="txtReceivedfrom" value="<?php echo $S_Head->Supply_Head ?>" style="text-align:center;">
                                    <label class="form-label fw-bold text-dark" for="txtReceivedfrom">Received From:</label>
                                    <div class="invalid-feedback">
                                        Please choose received from.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDateInspectedFrom" class="form-control" name="txtDateInspectedFrom" type="date">
                                    <label class="form-label fw-bold text-dark" for="txtDateInspectedFrom">Date:</label>
                                    <div class="invalid-feedback">
                                        Please choose date.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReceivedby" class="form-control" name="txtReceivedby" style="text-align:center;">
                                    <label class="form-label fw-bold text-dark" for="txtReceivedby">Received By:</label>
                                    <div class="invalid-feedback">
                                        Please choose a received by.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDateRecivedBy" class="form-control" name="txtDateRecivedBy" type="date">
                                    <label class="form-label fw-bold text-dark" for="txtDateRecivedBy">Date:</label>
                                    <div class="invalid-feedback">
                                        Please choose a date.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtRole" class="form-control" name="txtRole">
                                    <label class="form-label fw-bold text-dark" for="txtRole">Specified role:</label>
                                    <div class="invalid-feedback">
                                        Please enter role/position.
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
            </div> <!-- End Modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="proceedButton" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#ics-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
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
    $(document).ready(function() {
        $("#txtICSNo").blur(function() {
            var txtICSNo = $('#txtICSNo').val();
            if (txtICSNo !== "") {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('checkICS-number'); ?>",
                    dataType: 'json',
                    data: {
                        txtICSNo: txtICSNo
                    },
                    success: function(data) {
                        if (data.exists) {
                            $("#icsmsg").css("color", "red").text("ICS Number already exists.");
                            $("#proceedButton").css("pointer-events", "none");
                        } else {
                            $("#icsmsg").css("color", "green").text("ICS Number available.");
                            $("#proceedButton").css("pointer-events", "auto");
                        }
                    },
                    error: function() {
                        $("#icsmsg").css("color", "red").text('Some error');
                    }
                });
            } else {
                // $("#prmsg").css("color", "red").text("Please enter a Purchase Request Number");
            }
        });
    });
</script>