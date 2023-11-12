<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Registry of Semi-expandable Property Issued</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="respi-data-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10%;" class="text-center">DATE</th>
                            <th style="width: 20%;" class="text-center">ICS / RRSP No.</th>
                            <th style="width: 18%;" class="text-center">SEMI-EXPANDABLE PROPERTY NO.</th>
                            <th style="width: 10%;"class="text-center">Quantity</th>
                            <th style="width: 11%;"class="text-center">AMOUNT</th>
                            <th style="width: 10%;" class="text-center">REMARKS</th>
                            <th style="width: 15%;" class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($RSEPIlists as $RSEPIlist): ?>
                         <tr>
                            <td>
                                <?php echo $RSEPIlist->date_acquired?>
                                <span style="display: none;"> <?php echo $RSEPIlist->po_id ?></span> <!-- Hide -->
                                <span style="display: none;"><?php echo $RSEPIlist->id ?></span><!-- Hide -->
                            </td>
                            <td>
                                <?php echo $RSEPIlist->ics_no?>
                            </td>
                            <td><?php echo $RSEPIlist->property_no ?></td>
                            <td><?php echo $RSEPIlist->quantity ?></td>
                            <td><?php echo $RSEPIlist->total_unit_cost ?></td>
                            <td></td>
                            <td style="width: 20%;" class="text-center">
                                <a href="#" title="Returned" class="text-primary mx-2"><i class="fa-solid fa-person-walking-arrow-loop-left"></i> Returned</a>
                                <a href="#" title="Issued" class="text-primary mx-2"><i class="fa-solid fa-person-walking-luggage"></i> Issued</a>
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
        $('#respi-data-table').DataTable({
         
        });
    });
</script>