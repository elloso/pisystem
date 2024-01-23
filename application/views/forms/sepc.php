<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Semi-Expendable Property Card</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pc-data-table" class="table table-hover">
                    <button class="btn btn-success btn-sm mb-2">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th class="text-center">DATE</th>
                            <th class="text-center">PROPERTY NUMBER</th>
                            <th class="text-center">REFERENCE No.</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($PO_SEPCDatas as $PO_SEPCData ): ?>
                        <tr>
                            <td class="text-center"><?php echo $PO_SEPCData->ics_date ?></td>
                            <td class="text-center"><?php echo $PO_SEPCData->property_no ?></td>
                            <td class="text-center"></td>
                            <td></td>
                            <td class="text-center">
                                <a href="#" title="Edit" class="text-primary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="<?php echo base_url('print-pcform'); ?>" target="_blank" title="Print"class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#pc-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>