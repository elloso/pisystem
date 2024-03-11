<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Report of Semi-Expendable Property Issued</div>
        </div>
        <button class="bn632-hover bn23">Generate Report</button>
        <div class="card-body">
            <div class="table-responsive">
                <table id="sepc-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ICS No.</th>
                            <th class="text-center">RCC</th>
                            <th class="text-center">Property No.</th>
                            <th class="text-center">DESCRIPTION</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($PO_SEPCDatas as $PO_SEPCData ): ?>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                 </table>
            </div>
        </div>
    </div>
</div>
