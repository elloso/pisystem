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
                            <th class="text-center">ICS No.</th>
                            <th class="text-center">IAR No.</th>
                            <th class="text-center">SUPPLIER</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($PO_SEPCDatas as $PO_SEPCData ): ?>
                        <tr>
                            <td class="text-center"><?php echo $PO_SEPCData->property_no ?></td>
                            <td class="text-center"><?php echo $PO_SEPCData->ics_no ?></td>
                            <td class="text-center"><?php echo $PO_SEPCData->ics_iar_no ?></td>
                            <td><?php echo $PO_SEPCData->ics_supplier ?></td>
                            <td><?php echo $PO_SEPCData->item_description ?></td>
                            <td class="text-center">
                                <!-- <a href="#" title="Assignee" class="text-primary mx-2"><i class="fa-solid fa-user-plus"></i></a> -->
                                <a href="<?php echo base_url('sepc-assignee/' . md5($PO_SEPCData->ics_po_id)) ?>" title="Assign Item" class="text-primary mx-2"><i class="fa-solid fa-user-plus"></i></a>
                                <?php if($PO_SEPCData->remaining_quantity == 0){ ?>
                                    <a href="<?php echo base_url('print-pcform/'.md5($PO_SEPCData->ics_po_id)); ?>" target="_blank" title="Print"class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
                                <?php }else{ ?>
                                    <a target="_blank" title="Print" class="text-danger mx-2" style="cursor:not-allowed"><i class="fa-solid fa-print"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
