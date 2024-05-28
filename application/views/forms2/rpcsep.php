<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Report on the Physical Count of Semi-Expendable Property</div>
        </div>
        <div>
            <!-- <a href="<?php echo base_url('print-rpcsepform'); ?>" target="_blank"><button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#semiexpendableproperty">Generate Report</button></a> -->
            <button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#semiexpendableproperty">Generate Report</button>
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
                            <?php if($Data->semi_expendable && $Data->balance_quantity == 0): ?>
                                <tr>
                                    <td class="text-center"><?php echo $Data->property_no ?></td>
                                    <td class="text-center"><?php echo $Data->quantity ?></td>
                                    <td class="text-center"><?php echo $Data->onhand_percount ?></td>
                                    <td class="text-center"><?php echo $Data->quantity-$Data->onhand_percount ?></td>
                                    <td class="text-center">
                                        <a href="#" title='edit details' class='text-primary po-data' data-bs-toggle="modal" data-bs-target="#modalRPCSEP" onclick="transferID('<?php echo $Data->id ?>', '<?php echo $Data->quantity ?>')">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
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
<form action="<?php echo base_url('update-RPCSEP') ?>" method="post">
    <div class="modal fade" id="modalRPCSEP" tabindex="-1" aria-labelledby="modalRPCSEPLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 font-weight-bold" id="modalRPCSEPLabel">RPCSEP Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editID" name="hidden_tblpoitem_id">
                <input type="hidden" id="editQuantity" name="hidden_tblpoitem_quantity">
                    <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-2">
                                    <input type="number" class="form-control" id="actualCount" name="txtactualCount" style="text-align:center" min="1" max="">
                                    <label class="form-label fw-bold text-dark">On-hand Per Count :</label>
                                </div>
                            </div>
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtWhereabouts" class="form-control" name="txtWhereabouts" style="text-align:center">
                                <label class="form-label fw-bold text-dark">Whereabouts :</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtCondition" class="form-control" name="txtCondition" style="text-align:center">
                                <label class="form-label fw-bold text-dark">Condition :</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-2">
                                <input type="text" id="txtCustodian" class="form-control" name="txtCustodian" style="text-align:center">
                                <label class="form-label fw-bold text-dark">Custodian :</label>
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
<!-- Modal For Generation Report-->
<form action="<?php echo base_url('print-rpcsepform'); ?>" method="post" target="_blank">
<div class="modal fade" id="semiexpendableproperty" tabindex="-1" aria-labelledby="semiexpendablepropertyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 font-weight-bold" id="semiexpendablepropertyLabel">Generation Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label class="badge badge-info" style="color:black;">Semi-expendable Property:</label>
                    <select class="form-control" name="PropertyDropdown" >
                        <?php foreach($TypePropertys as $Type): ?>
                            <option value="<?php echo $Type->semi_expendable ?>" class="text-center"><?php echo $Type->semi_expendable ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6">
                    <label class="badge badge-info" style="color:black;">Year:</label>
                        <select class="form-control" name="YearDropdown">
                            <?php foreach ($Years as $Year): ?>
                                <option value="<?php echo $Year->rspi_year ?>" class="text-center"><?php echo $Year->rspi_year ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Generate</button></a>
      </div>
    </div>
  </div>
</div>
</form>

