<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Inspection / Acceptance Form</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="iar-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InspectionAcceptance">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th class="text-center">DATE</th>
                            <th class="text-center">ENTITY NAME</th>
                            <th class="text-center">IAR#</th>
                            <th class="text-center">FUND CLUSTER</th>
                            <th class="text-center">SUPPLIER</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($IARDatas as $IARData): ?>
                        <tr>
                            <td><?php echo $IARData->iar_date; ?></td>
                            <td><?php echo $IARData->entity_name; ?></td>
                            <td><?php echo $IARData->iar_number; ?></td>
                            <td><?php echo $IARData->fund_cluster; ?></td>
                            <td><?php echo $IARData->iar_supplier; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url('editiar-details/'. md5($IARData->iar_id).'/'.md5($IARData->iar_po_id)) ?>" class="text-primary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#" class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo base_url('submit-iar'); ?>" method="post">
<!-- Modal -->
<div class="modal fade" id="Modal_InspectionAcceptance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="Modal_InspectionAcceptanceLabel">New Acceptance / Inspection Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="form-floating mb-2">
                            <input type="text" id="txtEntityName" class="form-control" name="txtEntityName" style="text-align: center;" value="SLSU" readonly>
                            <label class="form-label fw-bold text-dark" for="txtEntityName">Entity Name :</label>
                        </div>
                        <div class="form-floating mb-2">
                            <textarea id="txtSupplier" class="form-control" name="txtSupplier" style="height: 9.5em; width: 100%;" id="selectedData" readonly></textarea>
                            <label class="form-label fw-bold text-dark" for="txtSupplier">Supplier:</label>
                        </div>
                        <div class="form-floating mb-2 d-none">
                            <textarea id="txtIARPOID" class="form-control" name="txtIARPOID" style="height: 9.5em; width: 100%;" id="selectedData" readonly></textarea>
                            <label class="form-label fw-bold text-dark" for="txtIARPOID">IAR P.O ID:</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" id="txtFundcluster" class="form-control" name="txtFundcluster">
                            <label class="form-label fw-bold text-dark" for="txtFundcluster">Fund Cluster:</label>
                        </div>  
                    </div>
                    <div class="col-lg-4 col-xl-8">
                        <div class="form-floating mb-2">
                        <select class="form-select" aria-label="Default select example" name="txtPONo" id="txtPONo">
                            <option selected>Select Purchase Order</option>
                            <?php foreach ($PO_IARDatas as $PO_IARData): ?>
                                <?php if ($PO_IARData->iar_number == 0): ?>
                                    <option value="<?php echo $PO_IARData->iar_po_number; ?>"><?php echo $PO_IARData->iar_po_number; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
>
                        </select>
                            <label class="form-label fw-bold text-dark" for="txtPONo">P.O No. :</label>
                         </div>
                        <div class="row">
                            <div class="col-lg-4 col-xl-6">
                                <div class="border p-2 mb-2">
                                    <div class="form-floating mb-2">
                                        <input type="number" id="txtIARNo" class="form-control" name="txtIARNo">
                                        <label class="form-label fw-bold text-dark" for="txtIARNo">IAR No. :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input id="txtIARDate" class="form-control" name="txtIARDate" type="date" />
                                        <label class="form-label fw-bold text-dark" for="txtIARDate">Date :</label>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-12">
                                    <div class="form-floating mb-2">
                                        <input type="text" id="txtMOP" class="form-control" name="txtMOPD">
                                        <label class="form-label fw-bold text-dark" for="txtMOP">Office/Dept.:</label>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-6">
                                <div class="border p-2 mb-2">
                                    <div class="form-floating mb-2">
                                        <input type="number" id="txtInvoice" class="form-control" name="txtInvoice">
                                        <label class="form-label fw-bold text-dark" for="txtInvoice">Invoice No. :</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input id="txtInvoiceDate" class="form-control" name="txtInvoiceDate" type="date" />
                                        <label class="form-label fw-bold text-dark" for="txtInvoiceDate">Date :</label>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xl-12">
                                    <div class="form-floating mb-2">
                                        <input type="text" id="txtRCC" class="form-control" name="txtRCC">
                                        <label class="form-label fw-bold text-dark" for="txtRCC">RCC:</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-6">
                        <div class="border p-2 mb-2">
                            <label class="form-label fw-bold text-dark" for="txtIARDate">Inspection :</label>
                            <div class="form-floating mb-2">
                                <input type="text" id="txtInspectionOfficer" class="form-control" name="txtInspectionOfficer">
                                <label class="form-label fw-bold text-dark" for="txtInspectionOfficer">Officer:</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input id="txtDateInspected" class="form-control" name="txtDateInspected" type="date" />
                                <label class="form-label fw-bold text-dark" for="txtDateInspected">Date Inspected :</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4 col-xl-6">
                        <div class="border p-2 mb-2">
                            <label class="form-label fw-bold text-dark" for="txtIARDate">Acceptance:</label>
                            <div class="form-floating mb-2">
                                <input type="text" id="txtAccepted" class="form-control" name="txtAccepted">
                                <label class="form-label fw-bold text-dark" for="txtAccepted">Property Custodian:</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input id="txtAcceptedDate" class="form-control" name="txtAcceptedDate" type="date" />
                                <label class="form-label fw-bold text-dark" for="txtAcceptedDate">Date Received :</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        $('#iar-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>
<script>
$(document).ready(function() {
    $("#txtPONo").change(function() {
        var selectedPONo = $(this).val();
        $.ajax({
            type: "POST",
            url: "Post_Controller/getSupplierName",
            data: {
                iar_po_number: selectedPONo
            },
            dataType: "json",
            success: function(response) {
                $("#txtSupplier").val(response.iar_supplier);
                $("#txtIARPOID").val(response.iar_po_id);
            }
        });
    });
});

</script>