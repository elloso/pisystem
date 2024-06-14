<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo $record->property_no ?>" readonly>
            <label class="form-label fw-bold text-dark">Property Number:</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo $record->quantity ?>" readonly> 
            <label class="form-label fw-bold text-dark" style="font-size: 12px; text-align:center;">Total Quantity:</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo $record->remaining_quantity ?>" readonly> 
            <label class="form-label fw-bold text-dark" style="font-size: 12px; text-align:center;">Remaining Qty:</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo $record->po_number ?>" readonly>
            <label class="form-label fw-bold text-dark">Purchase Order Number:</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo $record->pr_number ?>" readonly> 
            <label class="form-label fw-bold text-dark">Purchase Request Number:</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo number_format($record->unit_cost, 2) ?>" readonly>
            <label class="form-label fw-bold text-dark">Unit Cost:</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-floating mb-2">
            <input type="text" class="form-control" style="text-align:center;" value="<?php echo $record->total_unit_cost ?>" readonly> 
            <label class="form-label fw-bold text-dark">Total Cost:</label>
        </div>
    </div>
</div>
  <!-- <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" style="text-align:center; color: red;" value="<?php echo $record->date_disposed ?>" readonly> 
                <label class="form-label fw-bold text-dark">Date Disposed:</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" class="form-control" style="text-align:center; color: red;" value="<?php echo $record->Monitoring_Status ?>" readonly> 
                <label class="form-label fw-bold text-dark">Status:</label>
            </div>
        </div>
    </div> -->
    <?php
$showTable = false;
if ($record !== false) {
    // First, check if any row has the required status
    foreach ($datas as $row) {
        if (!empty($row->Monitoring_Status)) {
            $showTable = true;
            break;
        }
    }
}
?>

<?php if ($showTable): ?>
<div class="col-md-12 mb-2">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Property Number</th>
                            <th>Date Disposed</th>
                            <th>Status</th>
                            <th>Disposed Reason</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($datas as $row): ?>
                            <?php if ($row->Monitoring_Status == "Disposed" || $row->Monitoring_Status == "Returned"): ?>
                                <tr>
                                    <td><?php echo $row->mextracted_property; ?></td>
                                    <td><?php echo $row->date_disposed; ?></td>
                                    <td><?php echo $row->Monitoring_Status; ?></td>
                                    <td><?php echo $row->disposal_reason; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="col-md-12 "> 
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="<?php echo $record->specific_description.' - ' ?><?php echo $record->item_description ?>" readonly>
        <label class="form-label fw-bold text-dark">Item:</label>
    </div>
</div>
