<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Semi-Expendable Property Card</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pc-data-table" class="table table-hover">
                    <!-- <button class="btn btn-success btn-sm mb-2">
                        New Entry
                    </button> -->
                    <thead>
                        <tr>
                            <th class="text-center">PROPERTY NUMBER</th>
                            <th class="text-center">REFERENCE No.</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">Remaining Quantity</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($PO_SEPCDatas as $PO_SEPCData ): ?>
                        <tr>
                            <td class="text-center"><?php echo $PO_SEPCData->property_no ?></td>
                            <td class="text-center"><?php echo $PO_SEPCData->ics_no ?></td>
                            <td class="text-center"><?php echo $PO_SEPCData->item_description ?></td>
                            <th class="text-center"><?php echo $PO_SEPCData->quantity ?></th>
                            <th class="text-center"><?php echo $PO_SEPCData->balance_quantity ?></th>
                            <td class="text-center">
                                <a href="#" title="Assignee" class="text-primary mx-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user-plus"></i></a>
                                <a href="<?php echo base_url('print-pcform'); ?>" target="_blank" title="Print"class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Assign Item</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
                <div class="col-lg-5 col-xl-5">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtOfficeOfficer" class="form-control" name="txtOfficeOfficer" style="text-align: center;" value="" readonly>
                        <label class="form-label fw-bold text-dark" for="txtOfficeOfficer">Assignee:</label>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtOfficeOfficer" class="form-control" name="txtOfficeOfficer" style="text-align: center;" value="" readonly>
                        <label class="form-label fw-bold text-dark" for="txtOfficeOfficer">Quantity:</label>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtOfficeOfficer" class="form-control" name="txtOfficeOfficer" style="text-align: center;" value="" readonly>
                        <label class="form-label fw-bold text-dark" for="txtOfficeOfficer">Balance:</label>
                    </div>
                </div>
            <!-- <div class="col-lg-4 col-xl-4">
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
            </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#pc-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>