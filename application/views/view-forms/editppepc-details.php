<div class="container justify-content-center align-items-center container_table" style="min-height: 10vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">PPEPC Assignee Tracking</div>
        </div>
        <div class="card-body">   
            <div class=""> 
                <!-- <button type="button" class="btn btn-secondary" style="width: 6%;" onclick="history.back()">Back</button> -->
                <?php if($remaining->remaining_quantity == 0){ ?>
                    <a href="<?php echo base_url('propertycardpar') ?>"><button type="button" class="btn btn-secondary">Back</button></a>
                    <button type="button" class="btn btn-danger"style="cursor:not-allowed"  >Assign Item</button>
                <?php }else{ ?>
                    <a href="<?php echo base_url('propertycardpar') ?>"><button type="button" class="btn btn-secondary">Back</button></a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Assign Item</button>
                <?php } ?>
            </div>
                <div class="col-lg-6 col-xl-12 pt-3">
                    <div class="card" style="max-width: 1500px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablesepcdata" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Reference No.</th>
                                            <th class="text-center">Actual Qty.</th>
                                            <th class="text-center">Issued Qty.</th>
                                            <th class="text-center">Balance Qty.</th>
                                            <th class="text-center">Assignee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                        <?php foreach ($ppepc_datas as $ppepc_data): ?>
                                            <?php if(md5($ppepc_data->ics_sepc_id) == $this->uri->segment(3)): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $ppepc_data->date ?></td>
                                                    <td class="text-center"><?php echo $ppepc_data->par_no ?></td>
                                                    <td class="text-center"><?php echo $ppepc_data->quantity ?></td>
                                                    <td class="text-center"><?php echo $ppepc_data->issued_quantity ?></td>
                                                    <td class="text-center"><?php echo $ppepc_data->balance_quantity ?></td>
                                                    <td class="text-center"><?php echo $ppepc_data->assignee ?></td>
                                                </tr>
                                            <?php endif; ?>    
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php foreach ($ppepc_details as $Data): ?>
<?php endforeach; ?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Assign User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo base_url('submit-PPEPCAssignee'); ?>" method="post">
            <div class="modal-body">
                <input type="hidden" name="hidden_po_id" value="<?php echo $this->uri->segment(2); ?>">
                <input type="hidden" name="hidden_tblepoitem_id" value="<?php echo $this->uri->segment(3); ?>">
                <?php
                    $quantity = $this->Post_model->getQuantityById($this->uri->segment(3));
                    $rquantity = $this->Post_model->RgetQuantityById($this->uri->segment(3));
                ?>
                <input type="hidden" name="hidden_quantity" value="<?php echo $quantity; ?>">
                <input type="hidden" name="hidden_rquantity" value="<?php echo $rquantity; ?>">
                <input type="hidden" name="hidden_poid" value="<?php echo $Data->po_id; ?>">
                <input type="hidden" name="hidden_id" value="<?php echo $Data->id; ?>">
                <input type="hidden" name="hidden_property_no" value="<?php echo $Data->property_no; ?>">
                <?php if (!$this->Function_Model->checkExistingRecord($Data->id)): ?>
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <label class="form-label fw-bold text-dark">Semi-Expendable Property:</label>
                            <input type="text" id="txtSemiExpendable" class="form-control" name="txtSemiExpendable" required>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <label class="form-label fw-bold text-dark">Remarks Fund Cluster:</label>
                            <input type="text" id="txtRemarksFC" class="form-control" name="txtRemarksFC" required>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-3 col-xl-3">
                        <label class="form-label fw-bold text-dark" for="txtDate">Date :</label>
                        <input id="txtDateSEPC" class="form-control" name="txtDate" type="date" required>
                    </div>
                    <?php if($Data->quantity == $Data->remaining_quantity){ ?>
                        <div class="col-lg-2 col-xl-2">
                            <label class="form-label fw-bold text-dark">Quantity :</label>
                            <input type="number" id="txtQuantitySEPC" min="1" max="<?php echo $quantity; ?>" class="form-control" name="txtQuantity" required>
                        </div>
                    <?php }else{ ?>
                        <div class="col-lg-2 col-xl-2">
                            <label class="form-label fw-bold text-dark">Quantity :</label>
                            <input type="number" id="txtQuantitySEPC" min="1" max="<?php echo $Data->remaining_quantity; ?>" class="form-control" name="txtQuantity" required>
                        </div>
                    <?php }?>
                    <div class="col-lg-7 col-xl-7">
                        <label class="form-label fw-bold text-dark">Assignee :</label>
                        <input type="text" id="txtAssignee" class="form-control" name="txtAssignee" required>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="width: 15%;">Save</button>
                </div>
        </form>
    </div>
  </div>
</div>
