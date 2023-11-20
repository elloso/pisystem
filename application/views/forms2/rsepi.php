<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Registry of Semi-expandable Property Issued</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="respi-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="text-center">DATE</th>
                            <th style="width: 20%;" class="text-center">ICS / RRSP No.</th>
                            <th style="width: 20%;" class="text-center">SEMI-EXPANDABLE PROPERTY NO.</th>
                            <th style="width: 20%;" class="text-center">REMARKS</th>
                            <th style="width: 20%;" class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php foreach ($RSEPIlists as $RSEPIlist): ?>
            <?php if (!empty($RSEPIlist->ics_no)): ?>
                <?php
                    $propertynoParts = explode('-', $RSEPIlist->property_no);
                    if (count($propertynoParts) >= 3) {
                        $start_number = (int) $propertynoParts[1];
                        $end_number = (int) $propertynoParts[2];

                        for ($i = $start_number; $i <= $end_number; $i++) {
                            $individual_property_no = 'SLSU2023-' . str_pad($i, strlen($propertynoParts[1]), '0', STR_PAD_LEFT);
                ?>
                        <tr>
                            <td><?php echo $RSEPIlist->date_acquired ?></td>
                            <td><?php echo $RSEPIlist->ics_no ?></td>
                            <td><?php echo $individual_property_no ?></td>
                            <td><?php echo $RSEPIlist->remarks ?></td>
                            <td class="text-center">
                            <?php
                                        $formattedAmount = number_format($RSEPIlist->total_unit_cost, 2); 
                                        ?>
                                        <?php if ($RSEPIlist->remarks == "Returned"): ?>
                                            <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Return" style="cursor: not-allowed; color: red;"> 
                                                <i class="fa-solid fa-share-from-square"></i>
                                            </a>
                                            <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Reissued" data-bs-target="#Modal_ReissuedRSEPI" onclick="displayEditModalReissued('<?php echo md5($RSEPIlist->id); ?>')"> 
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#Modal_DisposeRSEPI"> 
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                           
                                        <?php else: ?>
                                            <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Return" data-bs-target="#Modal_ReturnedRSEPI" onclick="displayEditModal('<?php echo md5($RSEPIlist->id); ?>','<?php echo $RSEPIlist->ics_receivedby; ?>','<?php echo $RSEPIlist->quantity; ?>','<?php echo $formattedAmount; ?>')"> 
                                                <i class="fa-solid fa-share-from-square"></i>
                                            </a>
                                            <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Re-issue" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td><?php echo $RSEPIlist->date_acquired ?></td>
                        <td><?php echo $RSEPIlist->ics_no ?></td>
                        <td><?php echo $RSEPIlist->property_no ?></td>
                        <td><?php echo $RSEPIlist->remarks ?></td>
                        <td class="text-center">
                        <?php
                                        $formattedAmount = number_format($RSEPIlist->total_unit_cost, 2); 
                                        ?>
                                        <?php if ($RSEPIlist->remarks == "Returned"): ?>
                                            <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Return" style="cursor: not-allowed; color: red;"> 
                                                <i class="fa-solid fa-share-from-square"></i>
                                            </a>
                                            <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Reissued" data-bs-target="#Modal_ReissuedRSEPI" onclick="displayEditModalReissued('<?php echo md5($RSEPIlist->id); ?>')"> 
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#Modal_DisposeRSEPI"> 
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                           
                                        <?php else: ?>
                                            <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Return" data-bs-target="#Modal_ReturnedRSEPI" onclick="displayEditModal('<?php echo md5($RSEPIlist->id); ?>','<?php echo $RSEPIlist->ics_receivedby; ?>','<?php echo $RSEPIlist->quantity; ?>','<?php echo $formattedAmount; ?>')"> 
                                                <i class="fa-solid fa-share-from-square"></i>
                                            </a>
                                            <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Re-issue" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                                <i class="fa-solid fa-user-pen"></i>
                                            </a>
                                            <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        <?php endif; ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
                   
                 </table>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo base_url('respi-returned'); ?>" method="post" class="needs-validation" novalidate>
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
                    <input type="text" id="recordId" name="recordId" value="">
                        <div class="row">
                            <div class="col-lg-3 col-xl-3">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficer" class="form-control" name="txtOfficeOfficer" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficer">Office/Officer</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtQuantity" class="form-control" name="txtQuantity" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtQuantity">Actual Quantity</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="form-floating mb-2">
                                    <input type="number" id="txtReturnedQuantity" class="form-control" name="txtReturnedQuantity" style="text-align: center;" value="" >
                                    <label class="form-label fw-bold text-dark" for="txtReturnedQuantity">Quantity</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-3">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtAmount" class="form-control" name="txtAmount" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtAmount">Amount</label>
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

<form action="<?php echo base_url('respi-dispose'); ?>" method="post" class="needs-validation" novalidate>
    <!-- Modal -->
    <div class="modal fade" id="Modal_DisposeRSEPI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_DisposeRSEPILabel">Item Dispose</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                    <input type="hidden" id="" name="" value="">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficer" class="form-control" name="txtOfficeOfficer" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficer">Office/Officer</label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-xl-2">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtQuantity" class="form-control" name="txtQuantity" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtQuantity">Quantity</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-4">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtAmount" class="form-control" name="txtAmount" style="text-align: center;" value="" readonly>
                                    <label class="form-label fw-bold text-dark" for="txtAmount">Amount</label>
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
     <div class="modal fade" id="Modal_DisposeSecondConfirmation" tabindex="-1" aria-labelledby="Modal_DisposeSecondConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modal_DisposeSecondConfirmationLabel">Return Confirmation</h5>
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

<form action="<?php echo base_url('respi-reissue'); ?>" method="post" class="needs-validation" novalidate>
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
                    <input type="text" id="recordIdReissue" name="recordIdReissue" value="">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficerReissue" class="form-control" name="txtOfficeOfficerReissue" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficerReissue">Office/Officer</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtQuantityReissue" class="form-control" name="txtQuantityReissue" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtQuantityReissue">Quantity</label>
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
        function displayEditModal(id, ics_receivedby, quantity, total_unit_cost) {
            document.getElementById('recordId').value = id;
            document.getElementById('txtOfficeOfficer').value = ics_receivedby;
            document.getElementById('txtQuantity').value = quantity;
            document.getElementById('txtAmount').value = total_unit_cost;
        }
</script>
<script>
        function displayEditModalReissued(id) {
            document.getElementById('recordIdReissue').value = id;
        }
</script>
<script>
    $(document).ready(function() {
        $('#respi-data-table').DataTable({
         
        });
    });
</script>