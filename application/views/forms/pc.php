<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title">Property Card</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pc-data-table" class="table table-hover">
                    <button class="btn btn-success btn-sm mb-2">
                        New Entry
                    </button>
                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>ENTITY NAME</th>
                            <th>IAR#</th>
                            <th>FUND CLUSTER</th>
                            <th>SUPPLIER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>Sample 1</td>
                            <td>
                                <a href="#" title="Edit" class="text-primary mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="<?php echo base_url('print-pcform'); ?>" target="_blank" title="Print"class="text-primary mx-2"><i class="fa-solid fa-print"></i></a>
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
        $('#pc-data-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>