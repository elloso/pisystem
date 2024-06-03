<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="card" style="max-width: 1500px;">
        <div class="card-header border-success" style="border-top:solid;">
            <div class="card-title fw-bold">User Accountable List</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-accountablelist-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Custodian</th>
                            <th class="text-center">Custodian Count</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($CustodianLists as $Data): ?>
                            <?php if(!empty($Data->custodian)):?>
                                <tr>    
                                    <td class="text-center"><?php echo $Data->custodian ?></td>
                                    <td class="text-center"><?php echo $Data->custodian_count ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('Generallist/'.md5($Data->custodian)); ?>" onclick="return confirm('This will be redirect to the list are you sure you want to proceed?');">
                                            <button class="btn btn-success btn-sm mb-2" style="border-radius: 15px;">
                                                <i class="fa-solid fa-eye"></i> List of Accountable
                                            </button>
                                        </a>
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
