<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Property Acknowledgment Receipt</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="par-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_PropertyAcknowledgment">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>PAR No.</th>
                            <th>IAR No.</th>
                            <th>FUND CLUSTER</th>
                            <th>SUPPLIER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<form action="#" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="Modal_PropertyAcknowledgment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_PropertyAcknowledgmentLabel">Inventory Custodian Slip Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="form-floating mb-2">
                                <select class="form-select" aria-label="Default select example" name="selectPARIARNo" required>
                                    <option value="" disabled selected>-- Select IAR No. --</option>
                                    <option value=""></option>
                                </select>
                                <label class="form-label fw-bold text-dark" for="txtPARIARNo">IAR No. :</label>
                                <div class="invalid-feedback">
                                    Please choose a IAR no.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtPARNo" class="form-control" name="txtPARNo" required>
                                <label class="form-label fw-bold text-dark" for="txtPARNo">PAR No. :</label>
                                <div class="invalid-feedback">
                                    Please choose a fund.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="form-floating mb-2">
                                <input id="txtPARDate" class="form-control" name="txtPARDate" type="date" required>
                                <label class="form-label fw-bold text-dark" for="txtPARDate">A.Date :</label>
                                <div class="invalid-feedback">
                                    Please choose date.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtPARFund" class="form-control" name="txtPARFund" required>
                                <label class="form-label fw-bold text-dark" for="txtPARFund">Fund:</label>
                                <div class="invalid-feedback">
                                    Please choose a fund.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtUsefullife" class="form-control" name="txtUsefullife" required>
                                <label class="form-label fw-bold text-dark" for="txtUsefullife">Useful Life:</label>
                                <div class="invalid-feedback">
                                    Please choose a Usual Life.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#par-data-table').DataTable({
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