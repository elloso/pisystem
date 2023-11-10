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
                            <th class="text-center">DATE</th>
                            <th class="text-center">ICS / RRSP No.</th>
                            <th class="text-center">SEMI-EXPANDABLE PROPERTY NO.</th>
                            <th class="text-center">AMOUNT</th>
                            <th class="text-center">REMARKS</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="width: 20%;" class="text-center">
                                <a href="#" title="Returned" class="text-primary mx-2"><i class="fa-solid fa-person-walking-arrow-loop-left"></i> Returned</a>
                                <a href="#" title="Issued" class="text-primary mx-2"><i class="fa-solid fa-person-walking-luggage"></i> Issued</a>
                            </td>
                        </tr>
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