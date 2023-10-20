<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header">
            <div class="card-title">Purchase Order</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="po-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_PONo"  id="showModalButton">
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

<!-- Modal Item No Reference for first Modal -->
<!-- <div class="modal fade" id="Modal_ItemNo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
</div> -->

<!-- Modal List input Data -->
<div class="modal fade" id="Modal_PONo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="Modal_PONoLabel">New Purchase Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="scrollable-content" style="max-height: 420px; overflow-y: auto;">
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
                    
                </div>

                <div class="col-lg-6 col-xl-6">
                        <!-- <div class="form-floating mb-2">
                        <input type="text" id="txtSupplier" class="form-control" name="txtSupplier" >
                        <label class="form-label fw-bold text-dark" for="txtSupplier">Item No. :</label>
                        </div> -->
                    <!-- <div class="form-floating mb-2">
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
                    </div> -->
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
                    <div class="form-floating mb-2">
                        <input type="text" id="txtTotaCost" class="form-control" name="txtTotaCost" readonly >
                        <label class="form-label fw-bold text-dark" for="txtTotaCost">Total Cost:</label>
                    </div>
                </div>
            </div>
            <div class="border shadow rounded-3">
                <div class="col-lg-6 col-xl-12">
                <div class="card" style="max-width: 1500px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- <table id="itemno-data-table" class="table table-hover">
                                    <button type="button" class="btn btn-primary btn-sm mb-2">
                                        Add Item
                                    </button>
                                    <thead>
                                        <tr>
                                            <th>Item No.</th>
                                            <th>Quantity</th>
                                            <th>Items / Description</th>
                                            <th>Unit Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table> -->
                            <button type="button" class="btn btn-primary btn-sm mb-2" id="addRow">
                                    Add Item
                            </button>
                            <button type="button" class="btn btn-danger btn-sm mb-2" id="deleteRow" disabled>
                                    Delete
                            </button>
                            <table id="table-itemno-data" class="table table-bordered table-hover">
                            <tr>
                                <th style="">Item No.</th>
                                <th style="">Quantity</th>
                                <th style="width: 230px;">Items / Description</th>
                                <th style="">Unit Cost</th>
                            </tr>   
                                <tr class="">
                                    <td ><input type="number" oninput="this.value = Math.abs(this.value)" class=" form-control" id="txtItemNo" name="txtItemNo[]" value="1" required>
                                        <div class="invalid-feedback">
                                            Please enter Item No.
                                        </div>
                                    </td>
                                    <td><input type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="1" value="1" required>
                                        <div class="invalid-feedback">
                                            Please enter Quantity.
                                        </div>
                                    </td>
                                    <td>
                                        <textarea id="" class="form-control" name="txtSupplier" style="height: 4em; width: 100%;" ></textarea>
                            
                                    </td>
                                    <td>
    <input type="text" class="form-control" id="txtItemUnitCost" name="txtItemUnitCost[]" placeholder="0" autocomplete="off" required oninput="formatCurrency(this)">
    <div class="invalid-feedback">
        Please enter a valid price.
    </div>
</td>

                                </tr>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Scroll Container -->
      </div> <!-- End Modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="proceedButton">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
    var table = document.getElementById("table-itemno-data");
    var button1 = document.getElementById("addRow");
    var button2 = document.getElementById("deleteRow");
    var currentItemNo = 2; 
    button1.addEventListener("click", function() {
        event.preventDefault();
        var newRow = table.insertRow(-1);
        var itemnoCell = newRow.insertCell(0);
        var itemquantityCell = newRow.insertCell(1);
        var itemdescriptionCell = newRow.insertCell(2);
        var itemunitcostCell = newRow.insertCell(3);
        itemnoCell.innerHTML = '<input type="number" oninput="this.value = Math.abs(this.value)" class="form-control" id="txtItemNo" name="txtItemNo[]" value="' + currentItemNo + '" required>';
        itemquantityCell.innerHTML = '<input type="number" class="form-control" maxlength="28" id="txtItemQuantity" name="txtItemQuantity[]" size="30" placeholder="1" required>';
        itemdescriptionCell.innerHTML = '<textarea id="" class="form-control" name="txtSupplier" style="height: 4em; width: 100%;" ></textarea>';
        itemunitcostCell.innerHTML = '<input type="textarea" class="form-control" id="txtItemUnitCost" maxlength="95" name="txtItemUnitCost[]" size="50" placeholder="0" autocomplete="off" required>';
        currentItemNo++;
        button2.disabled = false;
    });

    button2.addEventListener("click", function() {
        event.preventDefault();
        var rowCount = table.rows.length;
        if (rowCount > 1) {
            table.deleteRow(rowCount - 1);
            currentItemNo--;
        }
        if (table.rows.length === 1) {
            button2.disabled = true;
        }
    });
</script>
<script>
function formatCurrency(input) {
    const cleanedValue = input.value.replace(/[^\d.]/g, '').replace(/\./, '');
    if (cleanedValue === '' || cleanedValue === '.') {
        input.value = '0';
    } else {
        const numericValue = parseFloat(cleanedValue);
        const formattedValue = numericValue.toLocaleString('en-US', {
            style: 'currency',
            currency: 'PHP',
            minimumFractionDigits: 0
        });
        input.value = formattedValue;
    }
}
</script>


<script>
    $(document).ready(function() {
        $('#po-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>