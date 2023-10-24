<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title">Inventory Custodian Slip</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="ics-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InventoryCustodian">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>ICS No.</th>
                            <th>IAR No.</th>
                            <th>ENTITY NAME</th>
                            <th>FUND</th>
                            <th>SUPPLIER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
                <form action="#" method="post" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <select class="form-select" aria-label="Default select example" name="selectICSIARNo" required>
                                    <option value="" disabled selected>-- Select IAR No. --</option>
                                    <?php foreach ($PO_ICSDatas as $PO_ICSData) : ?>
                                        <?php if ($PO_ICSData->iar_number == 0) : ?>
                                            <option value="<?php echo $PO_ICSData->ics_iar_no; ?>"><?php echo $PO_ICSData->ics_iar_no; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <label class="form-label fw-bold text-dark" for="txtICSIARNo">IAR No. :</label>
                                <div class="invalid-feedback">
                                    Please choose a IAR no.
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" id="txtICSFund" class="form-control" name="txtICSFund" required>
                                <label class="form-label fw-bold text-dark" for="txtICSFund">Fund:</label>
                                <div class="invalid-feedback">
                                    Please choose a fund.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtICSNo" class="form-control" name="txtICSNo" required>
                                <label class="form-label fw-bold text-dark" for="txtICSNo">ICS No. :</label>
                                <div class="invalid-feedback">
                                    Please choose a ICS no.
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="text" id="txtUsefullife" class="form-control" name="txtUsefullife" required>
                                <label class="form-label fw-bold text-dark" for="txtUsefullife">Useful Life:</label>
                                <div class="invalid-feedback">
                                    Please choose a Usual Life.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReceivedby" class="form-control" name="txtReceivedby" required>
                                    <label class="form-label fw-bold text-dark" for="txtReceivedby">Received By:</label>
                                    <div class="invalid-feedback">
                                        Please choose a received by.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDateRecivedBy" class="form-control" name="txtDateRecivedBy" type="date" required>
                                    <label class="form-label fw-bold text-dark" for="txtDateRecivedBy">Date:</label>
                                    <div class="invalid-feedback">
                                        Please choose a date.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-6">
                            <div class="border p-2 mb-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReceivedfrom" class="form-control" name="txtReceivedfrom" required>
                                    <label class="form-label fw-bold text-dark" for="txtReceivedfrom">Received From:</label>
                                    <div class="invalid-feedback">
                                        Please choose received from.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDateInspectedFrom" class="form-control" name="txtDateInspectedFrom" type="date" required>
                                    <label class="form-label fw-bold text-dark" for="txtDateInspectedFrom">Date:</label>
                                    <div class="invalid-feedback">
                                        Please choose date.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> <!-- End Modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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