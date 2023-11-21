<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Registry of Semi-expandable Property Issued (PAR)</div>
        </div> 
        <div class="col-lg-2 col-xl-2">
            <a href="#" target="_blank"><button class="bn632-hover bn23">Generate Report</button></a>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center"></td>
                        <td class="text-center"> </td>
                    </tr>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>  
<form action="#" method="post" class="needs-validation" novalidate>
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

<form action="#" method="post" class="needs-validation" novalidate>
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

<form action="#" method="post" class="needs-validation" novalidate>
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
                            <div class="col-lg-6 col-xl-12">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficerReissue" class="form-control" name="txtOfficeOfficerReissue" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficerReissue">Re-issued:</label>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtQuantityReissue" class="form-control" name="txtQuantityReissue" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtQuantityReissue">Quantity</label>
                                </div>
                            </div> -->
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
        // Prevent the default form submission
        event.preventDefault();

        // Show the second confirmation modal when the first modal's button is clicked
        secondModal.modal('show');
    });

    // Optional: If you want to submit the form after confirming in the second modal
    document.getElementById('returnedconfirmButton').addEventListener('click', function () {
        // Submit the form
        document.querySelector('form').submit();
    });

    // Hide the first modal when the second modal is shown
    $('#Modal_ReturnedSecondConfirmation').on('show.bs.modal', function () {
        firstModal.modal('hide');
    });

    // Show the first modal when the "Cancel" button is clicked in the second modal
    document.getElementById('cancelButton').addEventListener('click', function () {
        // Hide the second modal and show the first modal
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