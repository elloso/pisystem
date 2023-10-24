<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title">Inventory Custodian Slip</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="ics-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InventoryCustodian">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>ICS No.</th>
                            <th>IAR No.</th>
                            <th>ENTITY NAME</th>
                            <th>FUND</th>
                            <th>SUPPLIER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal_InventoryCustodian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_InventoryCustodianLabel">Inventory Custodian Slip Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <div class="form-floating mb-2">
                <select class="form-select" aria-label="Default select example" name="selectICSIARNo">
                    <option selected>Select IAR No.</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label class="form-label fw-bold text-dark" for="txtICSIARNo">IAR No. :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtICSFund" class="form-control" name="txtICSFund" >
                <label class="form-label fw-bold text-dark" for="txtICSFund">Fund:</label>
            </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="form-floating mb-2">
                    <input type="text" id="txtICSNo" class="form-control" name="txtICSNo" >
                    <label class="form-label fw-bold text-dark" for="txtICSNo">ICS No. :</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" id="txtUsefullife" class="form-control" name="txtUsefullife" >
                    <label class="form-label fw-bold text-dark" for="txtUsefullife">Useful Life:</label>
                </div>
            </div>
            <div class="col-lg-4 col-xl-6">
                <div class="border p-2 mb-2">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtReceivedby" class="form-control" name="txtReceivedby">
                        <label class="form-label fw-bold text-dark" for="txtReceivedby">Received By:</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input id="txtDateRecivedBy" class="form-control" name="txtDateRecivedBy" type="date" />
                        <label class="form-label fw-bold text-dark" for="txtDateRecivedBy">Date:</label>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4 col-xl-6">
                <div class="border p-2 mb-2">
                    <div class="form-floating mb-2">
                        <input type="text" id="txtReceivedfrom" class="form-control" name="txtReceivedfrom">
                        <label class="form-label fw-bold text-dark" for="txtReceivedfrom">Received From:</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input id="txtDateInspectedFrom" class="form-control" name="txtDateInspectedFrom" type="date" />
                        <label class="form-label fw-bold text-dark" for="txtDateInspectedFrom">Date:</label>
                    </div>
                </div>
            </div>
        </div>
      </div> <!-- End Modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#ics-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>