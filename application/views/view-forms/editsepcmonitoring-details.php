<div class="container justify-content-center align-items-center container_table" style="min-height: 10vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">Monitoring Item (Returned, Reissue and Disposal)</div>
        </div>
        <div class="card-body">   
            <div class=""> 
                    <a href="<?php echo base_url('respi') ?>"><button type="button" class="btn btn-secondary">Back</button></a>
            </div>
                <div class="col-lg-6 col-xl-12 pt-3">
                    <div class="card" style="max-width: 1500px;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tablesepcdata" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Reference No.</th>
                                            <th class="text-center">Actual Qty.</th>
                                            <th class="text-center">Issued Qty.</th>
                                            <th class="text-center">Balance Qty.</th>
                                            <th class="text-center">Assignee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($spec_datas as $spec_data): ?>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">></td>
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
        </div>
    </div>
<!-- <?php foreach ($spec_details as $Data): ?>
<?php endforeach; ?> -->
