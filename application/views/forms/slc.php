<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Supplies Ledger Card</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="slc-data-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_InspectionAcceptance">
                         New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>ENTITY NAME</th>
                            <th>IAR#</th>
                            <th>FUND CLUSTER</th>
                            <th>SUPPLIER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
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
        <h1 class="modal-title fs-5" id="Modal_InspectionAcceptanceLabel">New Acceptance / Inspection Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $('#slc-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>