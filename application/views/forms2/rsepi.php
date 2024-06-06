<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Registry of Semi-expandable Property Issued (ICS)</div>
        </div> 
        <!-- <div class="col-lg-2 col-xl-2">
          <button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#semiexpendableproperty">Generate Report</button></a>
        </div> -->
        <div>
            <button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#semiexpendableproperty">Generate Report</button>
            <button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#individualproperty">Individual Report</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="respi-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="text-center">DATE</th>
                            <th style="width: 20%;" class="text-center">ICS / RRSP No.</th>
                            <th style="width: 20%;" class="text-center">Semi-Expendable Property No.</th>
                            <th style="width: 20%;" class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($RSEPIlists as $RSEPIlist):  ?>
                            <tr>
                                <td class="text-center"><?php echo $RSEPIlist->invoice_date ?></td>
                                <td class="text-center"><?php echo $RSEPIlist->ics_no ?>    </td>
                                <td class="text-center"><?php echo $RSEPIlist->quantity_property_no ?></td>
                                <td class="text-center">
                                    <!-- <button type="button" class="btn btn-primary rounded-circle btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_ReturnedRSEPI" title="Return">
                                        <i class="fa-solid fa-share-from-square fa-xs"></i>
                                    </button>  -->
                                    <a href="<?php echo base_url('sepc-monitoring/' . md5($RSEPIlist->id_tblpo_item) .'/'. md5($RSEPIlist->pcid)) ?>" title="Assign Item" class="text-primary mx-2" onclick="return confirm('Please confirm to proceed return item.')"><i class="fa-solid fa-user-plus"></i></a>
                                </td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <tbody>
                <?php foreach ($RSEPIlists as $RSEPIlist):  ?>
                    <?php if (!empty($RSEPIlist->ics_no)) : ?>
                    <tr>
                        <td><?php echo $RSEPIlist->date_acquired ?></td>
                        <td><?php echo $RSEPIlist->ics_no ?></td>
                        <td><?php echo $RSEPIlist->rsepi_property_no ?></td>
                        <td class="text-center"><?php echo $RSEPIlist->remarks ?></td>
                        <td class="text-center">
                            <?php
                                $formattedAmount = number_format($RSEPIlist->unit_cost, 2); 
                            ?>
                            <?php if ($RSEPIlist->remarks == "Returned"): ?>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Return" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Reissued" data-bs-target="#Modal_ReissuedRSEPI" onclick="displayEditModalReissued('<?php echo md5($RSEPIlist->id); ?>')"> 
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#Modal_DisposeRSEPI" onclick="displayEditModalDisposed('<?php echo md5($RSEPIlist->id); ?>')"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php if ($RSEPIlist->itr_no == 0): ?>
                                    <a href="<?php echo base_url('print-ptrform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-danger mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('print-ptrform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-primary mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                 <?php endif; ?>
                            <?php elseif ($RSEPIlist->remarks == "Disposed"): ?>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Return" data-bs-target="#Modal_ReturnedRSEPI" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Re-issue" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php if ($RSEPIlist->itr_no == 0): ?>
                                    <a href="<?php echo base_url('print-ptrform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-danger mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('print-ptrform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-primary mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                 <?php endif; ?>
                            <?php else: ?>
                                <a href="#" class="text-primary mx-2" data-bs-toggle="modal" title="Return" data-bs-target="#Modal_ReturnedRSEPI" onclick="displayEditModal('<?php echo md5($RSEPIlist->id); ?>','<?php echo $RSEPIlist->ics_receivedby; ?>','<?php echo $RSEPIlist->item_description; ?>','<?php echo $formattedAmount; ?>')"> 
                                    <i class="fa-solid fa-share-from-square"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Re-issue" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="text-danger mx-2" data-bs-toggle="modal" title="Dispose" data-bs-target="#" style="cursor: not-allowed; color: red;"> 
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <?php if ($RSEPIlist->remarks == "Re-issued"): ?>
                                    <a href="<?php echo base_url('print-ptrform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-primary mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo base_url('print-ptrform/'.md5($RSEPIlist->po_id) ."/".md5($RSEPIlist->id_tblpo_item) );?>" target="_blank" title="Print" class="text-danger mx-2">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                 <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    </tbody> -->
                 </table>
            </div>
        </div>
    </div>
</div>  

<!-- Modal For Generation Report-->
<form action="<?php echo base_url('print-rsepiform'); ?>" method="post" target="_blank">
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
<!-- Modal For Generation Report-->
<form action="<?php echo base_url('print-rsepiform'); ?>" method="post" target="_blank">
<div class="modal fade" id="individualproperty" tabindex="-1" aria-labelledby="individualpropertyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 font-weight-bold" id="individualpropertyLabel">Generation Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <input type="hidden" value="2" name="generalreport">
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
                <div class="col-12">
                    <label class="badge badge-info" style="color:black;">Property Number:</label>
                    <input type="text" class="form-control" id="txtSearchProperty" name="txtSearchProperty" style="text-align:center" required>
                    <div id="searchResult"></div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" id="generateButton" class="btn btn-primary">Generate</button>
      </div>  
    </div>
  </div>
</div>
</form>

<script>
    $(document).ready(function() {
        $('#respi-data-table').DataTable({
         
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#txtSearchProperty').on('keyup', function() {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "<?php echo base_url('checkProperty-number'); ?>",
                    method: "POST",
                    data: {query: query},
                    dataType: 'json',
                    success: function(data) {
                        var output = '<ul class="list-group">';
                        $.each(data, function(index, value) {
                            output += '<li class="list-group-item search-item">' + value.quantity_property_no + '</li>';
                        });
                        output += '</ul>';
                        $('#searchResult').html(output);

                        $('.search-item').on('click', function() {
                            var selectedValue = $(this).text();
                            $('#txtSearchProperty').val(selectedValue);
                            $('#searchResult').html(''); 
                        });
                    }
                });
            } else {
                $('#searchResult').html('');
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const txtSearchProperty = document.getElementById("txtSearchProperty");
        const generateButton = document.getElementById("generateButton");

        txtSearchProperty.addEventListener("input", function () {
            if (txtSearchProperty.value.trim() === "") {
                generateButton.setAttribute("type", "submit");
                generateButton.removeAttribute("data-bs-dismiss");
            } else {
                generateButton.setAttribute("data-bs-dismiss", "modal");
                generateButton.setAttribute("type", "submit");
            }
        });

        if (txtSearchProperty.value.trim() === "") {
            generateButton.setAttribute("type", "submit");
            generateButton.removeAttribute("data-bs-dismiss");
        } else {
            generateButton.setAttribute("data-bs-dismiss", "modal");
            generateButton.setAttribute("type", "submit");
        }
    });
</script>