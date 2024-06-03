<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Disposed Item List</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-disposedlist-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Property Number</th>
                            <th class="text-center">Item</th>
                            <th class="text-center">Returned By</th>
                            <th class="text-center">Date Disposed</th>
                            <th class="text-center">Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($DisposedLists as $Data): ?>
                        <tr>
                            <td><?php echo $Data->mextracted_property ?></td>
                            <td><?php echo $Data->specific_description ." - " ?><?php echo $Data->item_description ?></td>
                            <td><?php echo $Data->returned_name ?></td>
                            <td><?php echo $Data->date_disposed ?></td>
                            <td><?php echo $Data->disposal_reason ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
