<div class="container justify-content-center align-items-center container_table" style="min-height: 40vh;">
    <div class="row">
        <!-- First Table -->
        <div class="col-md-6">
            <div class="card" style="max-width: 100%;">
                <div class="card-header border-success ICSHeader" style="border-top:solid;">
                    <div class="card-title fw-bold" style="cursor: pointer;">ICS Property Name</div>
                </div>
                <div class="card-body ICSBody">
                    <div class="table-responsive">
                        <table id="ics-list-table" class="table table-hover">
                        <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_ICSPropertyname">
                            Add Property
                        </button>
                            <thead>
                                <tr>
                                    <th class="text-center">Property Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($ICSDatas as $Data): ?>
                                <tr>
                                    <td><?php echo $Data->P_NAME ?> </td>
                                    <td class="text-center">
                                        <a class="p-2 text-danger" title="Delete" style="cursor: pointer;">
                                            <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#deleteICSPnameModal"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Table -->
        <div class="col-md-6">
            <div class="card" style="max-width: 100%;">
                <div class="card-header border-success PARHeader" style="border-top:solid;">
                    <div class="card-title fw-bold" style="cursor: pointer;">PAR Property Name</div>
                </div>
                <div class="card-body PARBody">
                    <div class="table-responsive">
                        <table id="par-list-table" class="table table-hover">
                        <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_PARPropertyname">
                            Add Property
                        </button>
                            <thead>
                                <tr>
                                    <th class="text-center">Property Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($PARDatas as $PARData): ?>
                                <tr>
                                    <td><?php echo $PARData->P_NAME ?> </td>
                                    <td class="text-center">
                                        <a class="p-2 text-danger" title="Delete" style="cursor: pointer;">
                                            <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#deletePARPnameModal"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-success" style="border-top:solid;">
                <div class="card-title fw-bold">List of Forms</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="forms-update-table" class="table table-hover">
                    <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal_SPOForms">
                        Add Forms
                    </button>
                        <thead>
                            <tr>
                                <th class="text-center">Forms</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">File Link</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($forms as $form): ?>
                                <tr>
                                    <td class="text-center" style="font-weight: bold;  width: 20%;"><?php echo $form->form ?></td>
                                    <td style="width: 70%;"><?php echo $form->Description ?></td>
                                    <td class="text-center" style="width: 10%;"><a href="#" style="font-style: italic;"><?php echo $form->file_form ?></a></td>
                                    <td class="text-center">
                                        <a class="p-2 text-danger" title="Delete" style="cursor: pointer;">
                                            <i class="fa-solid fa-trash" data-bs-toggle="modal" data-bs-target="#deletePARPnameModal"></i>
                                        </a>
                                    </td>   
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
</div>
<form action="<?php echo base_url('submit-icspname'); ?>" method="post">
    <div class="modal fade" id="Modal_ICSPropertyname" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_ICSPropertynameLabel">New Property Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <label class="form-label fw-bold text-dark" for="">Enter New Property Name :</label>
                                <input type="text" id="txtICSPropertyname" class="form-control" name="txtICSPropertyname" style="text-align: center;"required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo base_url('submit-parpname'); ?>" method="post">
    <div class="modal fade" id="Modal_PARPropertyname" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_PARPropertynameLabel">New Property Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <label class="form-label fw-bold text-dark" for="">Enter New Property Name :</label>
                                <input type="text" id="txtPARPropertyname" class="form-control" name="txtPARPropertyname" style="text-align: center;" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?php echo base_url('uploadforms-data'); ?>" method="post">
    <div class="modal fade" id="Modal_SPOForms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="Modal_SPOFormsLabel">New Forms</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="border p-2 mb-2 rounded">
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <label class="form-label fw-bold text-dark" for="">Forms :</label>
                                <input type="text" id="txtforms" class="form-control" name="txtforms" style="text-align: center;" required>
                            </div>
                            <div class="col-lg-12 col-xl-12">
                                <label class="form-label fw-bold text-dark" for="">Description :</label>
                                <input type="text" id="txtformsdescription" class="form-control" name="txtformsdescription" style="text-align: center;" required>
                            </div>
                            <div class="col-lg-12 col-xl-12 p-2">
                                <label for="txtDocuments">Documents</label><br>
                                <input type="file" name="forms_dowload" id="forms_dowload" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="modal fade" id="deleteICSPnameModal" tabindex="-1" aria-labelledby="deleteICSPnameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteICSPnameModalLabel"><i class="text-warning fa-solid fa-triangle-exclamation mt-2"></i> Deletion confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i>Are you sure you want to remove ?</i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="<?php echo base_url('deleteicspropertyname-data/' . md5($Data->PNID)) ?>">
                    <button type="button" class="btn btn-primary">Yes</button>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deletePARPnameModal" tabindex="-1" aria-labelledby="deletePARPnameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePARPnameModalLabel"><i class="text-warning fa-solid fa-triangle-exclamation mt-2"></i> Deletion confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <i>Are you sure you want to remove ?</i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="<?php echo base_url('deleteparpropertyname-data/' . md5($PARData->PNID)) ?>">
                    <button type="button" class="btn btn-primary">Yes</button>
                </a>
            </div>
        </div>
    </div>
</div>
