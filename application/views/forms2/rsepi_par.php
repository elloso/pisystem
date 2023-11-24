<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Registry of Semi-expandable Property Issued (PAR)</div>
        </div> 
        <div class="col-lg-2 col-xl-2">
            <a href="<?php echo base_url('print-rsepiparform'); ?> " target="_blank"><button class="bn632-hover bn23">Generate Report</button></a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="respi-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="text-center">DATE</th>
                            <th style="width: 20%;" class="text-center">PAR / RRSP No.</th>
                            <th style="width: 20%;" class="text-center">SEMI-EXPANDABLE PROPERTY NO.</th>
                            <th style="width: 20%;" class="text-center">REMARKS</th>
                            <th style="width: 20%;" class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($RSEPIlists as $RSEPIlist):  ?>
                    <?php if (!empty($RSEPIlist->par_no)) : ?>
                    <tr>
                        <td><?php echo $RSEPIlist->date_acquired ?></td>
                        <td><?php echo $RSEPIlist->par_no ?></td>
                        <td><?php echo $RSEPIlist->rsepi_property_no ?></td>
                        <td class="text-center"><?php echo $RSEPIlist->remarks ?></td>
                        <td class="text-center">
                            <?php
                                $formattedAmount = number_format($RSEPIlist->unit_cost, 2); 
                            ?>
                            <?php if ($RSEPIlist->remarks == "Returned"): ?>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Return" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Reissued" data-bs-target="#Modal_ReissuedRSEPI" onclick="displayEditModalReissued('<?php echo md5($RSEPIlist->id); ?>')"> 
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#Modal_DisposeRSEPI" onclick="displayEditModalDisposed('<?php echo md5($RSEPIlist->id); ?>')"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php if ($RSEPIlist->itr_no == 0): ?>
                                    <a href="<?php echo base_url('print-ptrparform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-danger mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('print-ptrparform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-primary mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                 <?php endif; ?>
                            <?php elseif ($RSEPIlist->remarks == "Disposed"): ?>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Return" data-bs-target="#Modal_ReturnedRSEPI" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Re-issue" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php if ($RSEPIlist->itr_no == 0): ?>
                                    <a href="<?php echo base_url('print-ptrparform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-danger mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('print-ptrparform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-primary mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                 <?php endif; ?>
                            <?php else: ?>
                                <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Return" data-bs-target="#Modal_ReturnedRSEPI" onclick="displayEditModal('<?php echo md5($RSEPIlist->id); ?>','<?php echo $RSEPIlist->par_receivedby; ?>','<?php echo $RSEPIlist->item_description; ?>','<?php echo $formattedAmount; ?>')"> 
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Re-issue" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php if ($RSEPIlist->remarks == "Re-issued"): ?>
                                    <a href="<?php echo base_url('print-ptrparform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-primary mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('print-ptrparform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-danger mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                 <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>  
<form action="<?php echo base_url('respi-returnedPAR'); ?>" method="post" class="needs-validation" novalidate>
    <!-- Modal -->
    <div class="modal fade" id="Modal_ReturnedRSEPI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_ReturnedRSEPILabel">Item Return</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                    <input type="hidden" id="recordId" name="recordId" value="">
                        <div class="row">
                            <div class="col-lg-3 col-xl-3">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficer" class="form-control" name="txtOfficeOfficer" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficer">Issued:</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtQuantity" class="form-control" name="txtQuantity" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtQuantity">Description:</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReturnedName" class="form-control" name="txtReturnedName" style="text-align: center;" value="" >
                                    <label class="form-label fw-bold text-dark" for="txtReturnedName">Returned:</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xl-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtAmount" class="form-control" name="txtAmount" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtAmount">Amount:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="proceedButton" class="btn btn-primary">Returned</button>
                </div>
            </div>
        </div>
    </div>
     <!-- Second Modal for Additional Confirmation -->
     <div class="modal fade" id="Modal_ReturnedSecondConfirmation" tabindex="-1" aria-labelledby="Modal_ReturnedSecondConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modal_ReturnedSecondConfirmationLabel">Return Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to marks this item as return?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" id="returnedconfirmButton" class="btn btn-primary" name="returnedconfirmButton" value="Returned">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="<?php echo base_url('respi-disposePAR'); ?>" method="post" class="needs-validation" novalidate>
<!-- Modal for Deletion -->
<div class="modal fade" id="Modal_DisposeRSEPI" tabindex="-1" aria-labelledby="Modal_DisposeRSEPILabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_DisposeRSEPILabel"><i class="text-warning fa-solid fa-triangle-exclamation mt-2"></i> Disposal confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <i>This will be remarks as a disposed once remarks already dispose, it will no longer re-issue.</i>
            <div class="row">
                <input type="hidden" id="recordIdDisposed" name="recordIdDisposed" value="">
                <div class="col-lg-8 col-xl-8">
                    <div class="form-floating mb-2">
                        <input id="txtReasonDisposal" class="form-control" name="txtReasonDisposal" type="text" required>
                        <label class="form-label fw-bold text-dark" for="txtReasonDisposal">Reason :</label>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="form-floating mb-2">
                        <input id="txtDateDisposal" class="form-control" name="txtDateDisposal" type="date" required>
                        <label class="form-label fw-bold text-dark" for="txtDateDisposal">Date Disposed :</label>
                    </div>
                </div>
            </div>                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary" name="txtDisposed" value="Disposed">Yes</button>
            </div>
        </div>
    </div>
</div>
</form>

<form action="<?php echo base_url('respi-reissuePAR'); ?>" method="post" class="needs-validation" novalidate>
    <!-- Modal -->
    <div class="modal fade" id="Modal_ReissuedRSEPI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_ReissuedRSEPILabel">Item Reissued</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                    <input type="hidden" id="recordIdReissue" name="recordIdReissue" value="">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficerReissue" class="form-control" name="txtOfficeOfficerReissue" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficerReissue">Re-issued:</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input id="txtReissueDate" class="form-control" name="txtReissueDate" type="date" />
                                    <label class="form-label fw-bold text-dark" for="txtReissueDate">Date of Transfer :</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div>
                                    <select class="form-select " aria-label="Default select example" name="OptionTT" id="OptionTT">
                                        <option disabled selected style="text-align:center">Select Transfer Type</option>
                                        <option value="Donation">Donation</option>
                                        <option value="Reassignment">Reassignment</option>
                                        <option value="Relocate">Relocate</option>
                                        <option value="Others (Specify)">Others (Specify)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="number" id="txtITRNo" class="form-control" name="txtITRNo" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtITRNo">ITR No.</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtSpecify" class="form-control" name="txtSpecify" style="text-align: center;" value="" required>
                                    <label class="form-label text-dark" for="txtSpecify"><i>Please Specify</i></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <select class="form-select " aria-label="Default select example" name="OptionCondiditon" id="OptionCondiditon">
                                    <option disabled selected style="text-align:center">Condition of Inventory</option>
                                    <option value="Good">Good</option>
                                    <option value="Serviceable">Serviceable</option>
                                    <option value="Unserviceable">Unserviceable</option>
                                    <option value="Obsolete">Obsolete</option>
                                    <option value="Not needed">Not needed</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <label class="form-label text-dark" for="txtReasontransfer"><i>Reason/s for Transfer:</i></label>
                                <div class="form-floating mb-2">
                                    <textarea name="txtReason" id="" cols="46" rows="6.5"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtApproved" class="form-control" name="txtApproved" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtApproved">Approved by:</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReleased" class="form-control" name="txtReleased" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtReleased">Released/Issued by:</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtReceived" class="form-control" name="txtReceived" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtReceived">Received by:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="reissuedconfirmButton" name="reissuedconfirmButton" class="btn btn-primary" value="Re-issued">Re-issued</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
var firstModal = $('#Modal_ReturnedRSEPI');
var secondModal = $('#Modal_ReturnedSecondConfirmation');

document.getElementById('proceedButton').addEventListener('click', function (event) {
    event.preventDefault();

    var nameInput = document.getElementById('txtReturnedName').value; 
    if (nameInput.trim() === "") {
        alert("Please enter a name before proceeding.");
    } else {
        secondModal.modal('show');
    }
});

document.getElementById('returnedconfirmButton').addEventListener('click', function () {
    document.querySelector('form').submit();
});

$('#Modal_ReturnedSecondConfirmation').on('show.bs.modal', function () {
    firstModal.modal('hide');
});

document.getElementById('cancelButton').addEventListener('click', function () {
    secondModal.modal('hide');
    firstModal.modal('show');
});

</script>

<script>
        function displayEditModal(id, ics_receivedby, item_description, total_unit_cost) {
            document.getElementById('recordId').value = id;
            document.getElementById('txtOfficeOfficer').value = ics_receivedby;
            document.getElementById('txtQuantity').value = item_description;
            document.getElementById('txtAmount').value = total_unit_cost;
        }
</script>
<script>
        function displayEditModalReissued(id) {
            document.getElementById('recordIdReissue').value = id;
        }
</script>
<script>
        function displayEditModalDisposed(id) {
            document.getElementById('recordIdDisposed').value = id;
        }
</script>

<script>
    $(document).ready(function() {
        $('#respi-data-table').DataTable({
         
        });
    });
</script>