<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Report on the Physical Count of Semi-Expendable Property</div>
        </div>
        <div>
          <a href="<?php echo base_url('print-rpcsepform'); ?>" target="_blank"><button class="bn632-hover bn23">Generate Report</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="rpcsep-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="text-center">Stock Number</th>
                            <th style="width: 20%;" class="text-center">Balance Per Card (Quantity)</th>
                            <th style="width: 20%;" class="text-center">On Hand Per Count (Quantity)</th>
                            <th style="width: 20%;" class="text-center">Shortage/Overage (Quantity)</th>
                            <th style="width: 20%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($RCSEPDatas as $Data):  ?>
                            <tr>
                                <td class="text-center"><?php echo $Data->property_no ?></td>
                                <td class="text-center"><?php echo $Data->quantity ?></td>
                                <td class="text-center"><?php echo $Data->quantity ?></td>
                                <td class="text-center"><?php echo $Data->quantity-$Data->quantity ?></td>
                                <td class="text-center">
                                    <a href="#" title='edit details' class='text-primary po-data' data-bs-toggle="modal" data-bs-target="#modalRPCSEP" onclick="transferID('<?php echo $Data->id ?>')"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo base_url('') ?>" method="post" target="_blank">
    <div class="modal fade" id="modalRPCSEP" tabindex="-1" aria-labelledby="modalRPCSEPLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-weight-bold" id="modalRPCSEPLabel">RPCSEP Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editID" name="hidden_tblpoitem_id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtWhereabouts" class="form-control" name="txtWhereabouts" required>
                                <label class="form-label fw-bold text-dark" for="txtWhereabouts">Whereabouts :</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtCondition" class="form-control" name="txtCondition" required>
                                <label class="form-label fw-bold text-dark" for="txtCondition">Condition :</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtCustodian" class="form-control" name="txtCustodian" required>
                                <label class="form-label fw-bold text-dark" for="txtCustodian">Custodian :</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Update</button></a>
            </div>
            </div>
        </div>
    </div>
</form>
<script>
    function transferID(id) {
        document.getElementById('editID').value = id;
    }
</script>
