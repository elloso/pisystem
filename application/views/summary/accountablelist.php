<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-generalaccountablelist-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Property No.</th>
                            <th class="text-center">Item</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">ICS/PAR</th>
                            <th class="text-center">Custodian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($Datas as $Data): ?>
                        <tr>    
                            <td><?php echo $Data->property_no ?></td>
                            <td><?php echo $Data->specific_description.' - ' ?><?php echo $Data->item_description ?></td>
                            <td class="text-center"><?php echo $Data->quantity ?></td>
                            <?php 
                                if($Data->unit_cost <= 49999){
                                    $textICS = "ICS";
                                }else{
                                    $textICS = "PAR";
                                }
                            ?>
                            <td class="text-center"><?php echo $textICS ?></td>
                            <th class="text-center"><?php echo $Data->custodian ?></th>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
