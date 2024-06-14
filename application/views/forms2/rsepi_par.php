<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Registry of Semi-expandable Property Issued (PAR)</div>
        </div> 
        <div>
            <button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#semiexpendableproperty">Generate Report</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="respi-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="text-center">DATE</th>
                            <th style="width: 20%;" class="text-center">PAR / RRSP No.</th>
                            <th style="width: 20%;" class="text-center">Semi-Expendable Property No.</th>
                            <th style="width: 20%;" class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($RSEPIlists as $RSEPIlist):  ?>
                            <tr>
                                <td class="text-center"><?php echo $RSEPIlist->invoice_date ?></td>
                                <td class="text-center"><?php echo $RSEPIlist->par_no ?>    </td>
                                <td class="text-center"><?php echo $RSEPIlist->quantity_property_no ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('sepc-monitoring/' . md5($RSEPIlist->id_tblpo_item) .'/'. md5($RSEPIlist->pcid)) ?>" title="Assign Item" class="text-primary mx-2" onclick="return confirm('Please confirm to proceed return item.')"><i class="fa-solid fa-user-plus"></i></a>
                                    <a href="#" title="Details" class="text-primary mx-2" onclick="showDetails('<?php echo $RSEPIlist->id ?>')"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>  

<!-- Modal For Generation Report-->
<form action="<?php echo base_url('print-rsepiparform'); ?>" method="post" target="_blank">
<div class="modal fade" id="semiexpendableproperty" tabindex="-1" aria-labelledby="semiexpendablepropertyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 font-weight-bold" id="semiexpendablepropertyLabel">Generation Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <input type="hidden" value="1" name="generalreport">
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
        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Generate</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- View Data -->
<div class="modal fade" id="statiDatashows" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statiDatashowsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="statiDatashowsLabel">Data Additional</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#respi-data-table').DataTable({
         
        });
    });
</script>
<script>
function showDetails(ics_sepc_id) {
    $.ajax({
        url: '<?php echo base_url('rsepiAJAX') ?>', 
        type: 'POST',
        data: { pcid: ics_sepc_id },
        success: function(response) {
            $('#statiDatashows .modal-body').html(response); 
            $('#statiDatashows').modal('show'); 
        },
        error: function() {
            alert('Error fetching data.');
        }
    });
}
</script>
