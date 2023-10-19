<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title">Purchase Order</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="po-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InspectionAcceptance">
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

<!-- Modal -->
<div class="modal fade" id="Modal_InspectionAcceptance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_InspectionAcceptanceLabel">New Purchase Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-xl-6">
            <div class="form-floating mb-2">
                <input type="text" id="txtSupplier" class="form-control" name="txtSupplier" >
                <label class="form-label" for="txtSupplier">Supplier :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" >
                <label class="form-label" for="txtPONumber">P.O Number :</label>
            </div>
            <div class="form-floating mb-2">
                <input id="txtDate" class="form-control" name="txtDate" type="date" />
                <label class="form-label" for="txtDate">Date :</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtMOP" class="form-control" name="txtMOP" >
                <label class="form-label" for="txtMOP">Mode of Procurement:</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtPRNumber" class="form-control" name="txtPRNumber" >
                <label class="form-label" for="txtPRNumber">Purchase Request Number:</label>
            </div>
            <div class="form-floating mb-2">
                <input type="text" id="txtPGEFNumber" class="form-control" name="txtPGEFNumber" >
                <label class="form-label" for="txtPGEFNumber">PG REF Number:</label>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <div class="form-floating mb-2">
                  <input type="text" id="txtSupplier" class="form-control" name="txtSupplier" >
                  <label class="form-label" for="txtSupplier">Item No. :</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" >
                  <label class="form-label" for="txtPONumber">Quantity :</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtPONumber" class="form-control" name="txtPONumber" >
                  <label class="form-label" for="txtPONumber">Unit :</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtMOP" class="form-control" name="txtMOP" >
                  <label class="form-label" for="txtMOP">Items / Description:</label>
              </div>
              <div class="form-floating mb-2">
                  <input type="text" id="txtPRNumber" class="form-control" name="txtPRNumber" >
                  <label class="form-label" for="txtPRNumber">Unit Cost:</label>
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