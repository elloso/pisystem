<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Report of Semi-Expendable Property Issued</div>
        </div>
        <div>
            <!-- <a href="<?php echo base_url('print-rspiicsform'); ?>" title="Generate" target="_blank"><button class="bn632-hover bn23">Generate Report</button></a> -->
          <button class="bn632-hover bn23" data-bs-toggle="modal" data-bs-target="#yearandmonth">Generate Report</button>
        </div>
        <!-- <div class="card-body">
            <div class="table-responsive">
                <table id="sepc-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ICS No.</th>
                            <th class="text-center">RCC</th>
                            <th class="text-center">Property No.</th>
                            <th class="text-center">Item Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                 </table>
            </div>
        </div> -->
    </div>
</div>
<!-- Modal -->
<form action="<?php echo base_url('print-rspiicsform'); ?>" method="post" target="_blank">
<div class="modal fade" id="yearandmonth" tabindex="-1" aria-labelledby="eyearandmonthLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 font-weight-bold" id="yearandmonthLabel">Generation Report</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-6">
                <label class="badge badge-info" style="color:black;">Month:</label>
                    <select class="form-control" name="MonthDropdown" >
                        <?php foreach($Months as $Month): ?>
                            <?php 
                                if($Month->rspi_month == 1){
                                    $txtMonth = "January";
                                }
                                elseif ($Month->rspi_month == 2){
                                    $txtMonth = "February";
                                }
                                elseif ($Month->rspi_month == 3){
                                    $txtMonth = "March";
                                }
                                elseif ($Month->rspi_month == 4){
                                    $txtMonth = "April";
                                }
                                elseif ($Month->rspi_month == 5){
                                    $txtMonth = "May";
                                }
                                elseif ($Month->rspi_month == 6){
                                    $txtMonth = "June";
                                }
                                elseif ($Month->rspi_month == 7){
                                    $txtMonth = "July";
                                }
                                elseif ($Month->rspi_month == 8){
                                    $txtMonth = "August";
                                }
                                elseif ($Month->rspi_month == 9){
                                    $txtMonth = "September";
                                }
                                elseif ($Month->rspi_month == 10){
                                    $txtMonth = "October";
                                }
                                elseif ($Month->rspi_month == 11){
                                    $txtMonth = "November";
                                }
                                elseif ($Month->rspi_month == 12){
                                    $txtMonth = "December";
                                }
                                else {
                                    $txtMonth = "";
                                }
                            ?>
                            <option value="<?php echo $Month->rspi_month ?>" class="text-center"><?php echo $txtMonth; ?></option>
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
        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Generate</button></a>
      </div>
    </div>
  </div>
</div>
</form>
