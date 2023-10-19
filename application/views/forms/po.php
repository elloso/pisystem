<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title">Purchase Order</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="po-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_ItemNo"  id="showModalButton">
                         New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>ITEM No.</th>
                            <th>SUPPLIER</th>
                            <th>P.O No.</th>
                            <th>DATE</th>
                            <!-- <th>MODE OF PROCUREMENT</th> -->
                            <th>PR No.</th>
                            <!-- <th>PG REF No.</th> -->
                            <th>QUANTITY</th>
                            <th>UNIT</th>
                            <th>ITEMS / <br/> DESCRIPTION</th>
                            <!-- <th>UNIT COST</th> -->
                            <th>Action</th>
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

<!-- Modal Item No -->
<div class="modal fade" id="Modal_ItemNo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Enter Item Number</h5>
                
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="itemNumber">Item Number:</label>
                        <input type="text" class="form-control" id="itemNumber" placeholder="Enter item number">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Modal_InspectionInfo">
                    Proceed
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal List input Data -->
<div class="modal fade" id="Modal_InspectionInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_InspectionInfoLabel">New Purchase Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <div class="form-floating mb-2">
                <input type="text" id="txtSupplier" class="form-control" name="txtSupplier" >
                <label class="form-label fw-bold text-dark" for="txtSupplier">Supplier :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" >
                <label class="form-label fw-bold text-dark" for="txtPONumber">P.O Number :</label>
            </div>
            <div class="form-floating mb-2">
                <input id="txtDate" class="form-control" name="txtDate" type="date" />
                <label class="form-label fw-bold text-dark" for="txtDate">Date :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtMOP" class="form-control" name="txtMOP" >
                <label class="form-label fw-bold text-dark" for="txtMOP">Mode of Procurement:</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtPRNumber" class="form-control" name="txtPRNumber" >
                <label class="form-label fw-bold text-dark" for="txtPRNumber">Purchase Request Number:</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtPGEFNumber" class="form-control" name="txtPGEFNumber" >
                <label class="form-label fw-bold text-dark" for="txtPGEFNumber">PG REF Number:</label>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <!-- <div class="form-floating mb-2">
                  <input type="text" id="txtSupplier" class="form-control" name="txtSupplier" >
                  <label class="form-label fw-bold text-dark" for="txtSupplier">Item No. :</label>
              </div> -->
              <div class="form-floating mb-2">
                  <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" >
                  <label class="form-label fw-bold text-dark" for="txtPONumber">Quantity :</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" >
                  <label class="form-label fw-bold text-dark" for="txtPONumber">Unit :</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtMOP" class="form-control" name="txtMOP" >
                  <label class="form-label fw-bold text-dark" for="txtMOP">Items / Description:</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtPRNumber" class="form-control" name="txtPRNumber" >
                  <label class="form-label fw-bold text-dark" for="txtPRNumber">Unit Cost:</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtTotaCost" class="form-control" name="txtTotaCost" >
                  <label class="form-label fw-bold text-dark" for="txtTotaCost">Total Cost:</label>
              </div>
             
          </div>
        </div>
      </div> <!-- End Modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="proceedButton">Submit</button>
      </div>
    </div>
  </div>
</div>