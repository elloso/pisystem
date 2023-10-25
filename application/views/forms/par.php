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
                            <th class="text-center">PAR No.</th>
                            <th class="text-center">IAR No.</th>
                            <th class="text-center">FUND CLUSTER</th>
                            <th class="text-center">SUPPLIER</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($PARDatas as $PARData): ?>
                        <tr>
                            <td><?php echo $PARData->par_no ?></td>
                            <td><?php echo $PARData->par_iarno ?></td>
                            <td><?php echo $PARData->par_fund ?></td>
                            <td><?php echo $PARData->par_supplier ?></td>
                            <td class="text-center">
                            <?php if (empty($PARData->par_no)): ?>
                                    <a href="" class="text-danger mx-2" onclick="return false;" style="pointer-events: none;"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" class="text-danger mx-2" onclick="return false;" style="cursor: not-allowed;"><i class="fa-solid fa-print"></i></a>
                                <?php else: ?>
                                    <a href="" class="text-primary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
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
<form action="#" method="post" class="needs-validation" novalidate>
<div class="modal fade" id="Modal_PropertyAcknowledgment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_PropertyAcknowledgmentLabel">Property Acknowledgment Receipt</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="form-floating mb-2">
                                <select class="form-select" aria-label="Default select example" name="selectPARIARNo" required>
                                    <option value="" selected>-- Select IAR No. --</option>
                                    <?php foreach ($IAR_PARDatas as $IAR_PARData) : ?>
                                        <?php if (empty($IAR_PARData->par_no)) : ?>
                                            <option value="<?php echo $IAR_PARData->par_iarno; ?>"><?php echo $IAR_PARData->par_iarno; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <label class="form-label fw-bold text-dark" for="txtPARIARNo">IAR No. :</label>
                                <div class="invalid-feedback">
                                    Please select IAR no.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtPARNo" class="form-control" name="txtPARNo" required>
                                <label class="form-label fw-bold text-dark" for="txtPARNo">PAR No. :</label>
                                <div class="invalid-feedback">
                                    Please enter PAR Number.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="form-floating mb-2">
                                <input id="txtPARDate" class="form-control" name="txtPARDate" type="date" required>
                                <label class="form-label fw-bold text-dark" for="txtPARDate">Date :</label>
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
                                    Please enter fund.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtUsefullife" class="form-control" name="txtUsefullife" required>
                                <label class="form-label fw-bold text-dark" for="txtUsefullife">Useful Life:</label>
                                <div class="invalid-feedback">
                                    Please enter a Useful Life.
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
                                        Please enter Name of the receiver.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDateRecivedBy" class="form-control" name="txtDateRecivedBy" type="date" required>
                                    <label class="form-label fw-bold text-dark" for="txtDateRecivedBy">Date:</label>
                                    <div class="invalid-feedback">
                                        Please choose date.
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
                                        Please enter Name acquired from.
                                    </div>
                                </div>
                                <div class="form-floating mb-2">
                                    <input id="txtDateReceivedfrom" class="form-control" name="txtDateReceivedfrom" type="date" required>
                                    <label class="form-label fw-bold text-dark" for="txtDateReceivedfrom">Date:</label>
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