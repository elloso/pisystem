<div class="container justify-content-center align-items-center container_table" style="min-height: 10vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Monitoring Item (Returned, Reissue and Disposal)</div>
        </div>
        <div class="card-body">   
            <div class=""> 
                    <a href="<?php echo base_url('respi') ?>"><button type="button" class="btn btn-secondary">Back</button></a>
            </div>
                <div class="col-lg-6 col-xl-12 pt-3">
                    <div class="card" style="max-width: 1500px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablesepcdata" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Property Number</th>
                                            <th class="text-center">Assignee</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($spec_datas as $spec_data): ?>
                                            <?php if(md5($spec_data->pcid) == $this->uri->segment(3) ): ?>
                                                <tr <?php if($spec_data->Monitoring_Status == "Disposed"): ?>class="table-danger"<?php endif; ?>>
                                                    <td class="text-center"><?php echo $spec_data->mextracted_property ?></td>
                                                    <td class="text-center"><?php echo $spec_data->assignee ?></td>
                                                    <td class="text-center"><?php echo $spec_data->Monitoring_Status ?></td>
                                                    <td class="text-center">
                                                        <?php if(empty($spec_data->Monitoring_Status) || $spec_data->Monitoring_Status == "Re-issued" ): ?>
                                                            <button type="button" class="btn btn-primary rounded-circle btn-sm open-modal" 
                                                                    data-bs-toggle="modal" data-bs-target="#Modal_ReturnedRSEPI" 
                                                                    data-monid="<?php echo $spec_data->monid ?>" title="Return">
                                                                <i class="fa-solid fa-share-from-square fa-xs"></i>
                                                            </button> 
                                                        <?php endif; ?>
                                                        <?php if($spec_data->Monitoring_Status == "Returned"): ?>
                                                            <button type="button" class="btn btn-primary rounded-circle btn-sm open-modal" 
                                                                    data-bs-toggle="modal" data-bs-target="#Modal_ReissuedRSEPI" 
                                                                    data-monid="<?php echo $spec_data->monid ?>" title="Re-issued">
                                                                    <i class="fa-solid fa-recycle fa-xs"></i>
                                                            </button> 
                                                            <button type="button" class="btn btn-danger rounded-circle btn-sm open-modal" 
                                                                    data-bs-toggle="modal" data-bs-target="#Modal_DisposeRSEPI" 
                                                                    data-monid="<?php echo $spec_data->monid ?>" title="Disposed">
                                                                    <i class="fa-solid fa-trash-can fa-xs"></i>
                                                            </button> 
                                                        <?php endif; ?>
                                                        <?php if($spec_data->Monitoring_Status == "Disposed"): ?>
                                                        
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
        </div>
    </div>
<!-- For Returned, Reissued and Disposal -->
<form action="<?php echo base_url('respi-returned'); ?>" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="Modal_ReturnedRSEPI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_ReturnedRSEPILabel">Item Return</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                        <input type="hidden" name="hidden_id_tblpo_item" value="<?php echo $this->uri->segment(2) ?>">
                        <input type="hidden" name="hidden_pcid" value="<?php echo $this->uri->segment(3) ?>">
                        <input type="hidden" name="hidden_uniqueid" id="monid_input">
                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <label class="form-label fw-bold text-dark" for="">Date Returned :</label>
                                <input id="txtDateSEPC" style="text-align: center;" class="form-control" name="txtReturnedDate" type="date" required>
                            </div>
                            <div class="col-lg-8 col-xl-8">
                                <label class="form-label fw-bold text-dark" for="">Returned By :</label>
                                <input type="text" id="txtReturnedName" class="form-control" name="txtReturnedName" style="text-align: center;" value="" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="returnedconfirmButton" value="Returned" class="btn btn-primary">Returned</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo base_url('respi-reissue'); ?>" method="post" class="needs-validation" novalidate>
    <div class="modal fade" id="Modal_ReissuedRSEPI" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_ReissuedRSEPILabel">Item Reissued</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                        <input type="hidden" name="hidden_id_tblpo_item" value="<?php echo $this->uri->segment(2) ?>">
                        <input type="hidden" name="hidden_pcid" value="<?php echo $this->uri->segment(3) ?>">
                        <input type="hidden" name="hidden_uniqueid" id="monid_input">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input type="text" id="txtOfficeOfficerReissue" class="form-control" name="txtOfficeOfficerReissue" style="text-align: center;" value="" required>
                                    <label class="form-label fw-bold text-dark" for="txtOfficeOfficerReissue">Re-issued:</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="form-floating mb-2">
                                    <input id="txtDateTransfer" class="form-control" name="txtReissueDate" type="date" />
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
                                    <input type="text" id="txtSpecify" class="form-control" name="txtSpecify" style="text-align: center;" value="" required disabled>
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
<form action="<?php echo base_url('respi-dispose'); ?>" method="post" class="needs-validation" novalidate>
<div class="modal fade" id="Modal_DisposeRSEPI" tabindex="-1" aria-labelledby="Modal_DisposeRSEPILabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_DisposeRSEPILabel"><i class="text-warning fa-solid fa-triangle-exclamation mt-2"></i> Disposal confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <i>This will be remarks as a disposed once remarks already dispose, it will no longer re-issue.</i>
                <input type="hidden" name="hidden_id_tblpo_item" value="<?php echo $this->uri->segment(2) ?>">
                <input type="hidden" name="hidden_pcid" value="<?php echo $this->uri->segment(3) ?>">
                <input type="hidden" name="hidden_uniqueid" id="monid_input">
            <div class="row">
                <div class="col-lg-8 col-xl-8">
                    <label class="form-label fw-bold text-dark" for="">Reason :</label>
                    <input type="text" id="txtReasonDisposal" class="form-control" name="txtReasonDisposal" style="text-align: center;" value="" required>
                </div>
                <!-- <div class="col-lg-8 col-xl-8">
                    <div class="form-floating mb-2">
                        <input id="txtReasonDisposal" class="form-control" name="txtReasonDisposal" type="text" required>
                        <label class="form-label fw-bold text-dark" for="txtReasonDisposal">Reason :</label>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 col-xl-4">
                    <div class="form-floating mb-2">
                        <input id="txtDateDisposal" class="form-control" name="txtDateDisposal" type="date" required>
                        <label class="form-label fw-bold text-dark" for="txtDateDisposal">Date Disposed :</label>
                    </div>
                </div> -->
                <div class="col-lg-4 col-xl-4">
                    <label class="form-label fw-bold text-dark" for="">Date Dispose :</label>
                    <input id="txtDateDispose" style="text-align: center;" class="form-control" name="txtDateDisposal" type="date" required>
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


