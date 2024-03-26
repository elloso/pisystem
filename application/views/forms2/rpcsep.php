<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Report on the Physical Count of Semi-Expendable Property</div>
        </div>
        <div>
          <a href="<?php echo base_url('print-rpcsepform'); ?>" target="_blank"><button class="bn632-hover bn23">Generate Report</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="rpcsep-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 20%;" class="text-center">Stock Number</th>
                            <th style="width: 20%;" class="text-center">Balance Per Card (Quantity)</th>
                            <th style="width: 20%;" class="text-center">On Hand Per Count (Quantity)</th>
                            <th style="width: 20%;" class="text-center">Shortage/Overage (Quantity)</th>
                            <th style="width: 20%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($RCSEPDatas as $Data):  ?>
                            <tr>
                                <td class="text-center"><?php echo $Data->property_no ?></td>
                                <?php 
                                    if($Data->remaining_quantity == 0){
                                        $issued = $Data->quantity;
                                    }else{
                                        $issued = $Data->quantity - $Data->remaining_quantity;
                                    }
                                ?>
                                <td class="text-center"><?php echo $issued ?></td>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                                <td class="text-center">
                                    <!-- <a href="<?php echo base_url('sepc-monitoring/' . md5($RSEPIlist->id_tblpo_item) .'/'. md5($RSEPIlist->pcid)) ?>" title="Assign Item" class="text-primary mx-2" onclick="return confirm('Please confirm to proceed Assignee allocation.')"><i class="fa-solid fa-user-plus"></i></a> -->
                                </td>
                            </tr>   
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>

