<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Semi-Expendable Property Card</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="sepc-data-table" class="table table-hover">
                    <!-- <button class="btn btn-success btn-sm mb-2">
                        New Entry
                    </button> -->
                    <thead>
                        <tr>
                            <th class="text-center">PROPERTY NUMBER</th>
                            <th class="text-center">PAR No.</th>
                            <th class="text-center">IAR No.</th>
                            <th class="text-center">SUPPLIER</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($PO_PPEPCDatas as $PO_PPEPCData ): ?>
                            <?php if (!empty($PO_PPEPCData->par_no)): ?>
                        <tr>
                            <td class="text-center"><?php echo $PO_PPEPCData->property_no ?></td>
                            <td class="text-center"><?php echo $PO_PPEPCData->par_no ?></td>
                            <td class="text-center"><?php echo $PO_PPEPCData->par_iarno ?></td>
                            <td><?php echo $PO_PPEPCData->par_supplier ?></td>
                            <td><?php echo $PO_PPEPCData->item_description ?></td>
                            <td class="text-center">
                                <!-- <a href="#" title="Assignee" class="text-primary mx-2"><i class="fa-solid fa-user-plus"></i></a> -->
                                <a href="<?php echo base_url('ppepc-assignee/' . md5($PO_PPEPCData->par_po_id) .'/'. md5($PO_PPEPCData->id)) ?>" title="Assign Item" class="text-primary mx-2" onclick="return confirm('Please confirm to proceed Assignee allocation.')"><i class="fa-solid fa-user-plus"></i></a>
                            <?php if($PO_PPEPCData->quantity != $PO_PPEPCData->remaining_quantity): ?>
                                <a href="<?php echo base_url('print-ppepcform/'.md5($PO_PPEPCData->par_po_id) .'/'. md5($PO_PPEPCData->id)); ?>" target="_blank" title="Print"class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
                            <?php endif; ?>
                            </td>
                        </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
