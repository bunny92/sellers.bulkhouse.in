<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <ul class="nav nav-tabs">
        <li class="active"><a href="<?= base_url("dashboard/proprietor_pending_documents") ?>">Proprietor Documents</a></li>
        <li><a href="<?= base_url("dashboard/partner_pending_documents") ?>">Partner Documents</a></li>
        <li><a href="<?= base_url("dashboard/private_pending_documents") ?>">Private Documents</a></li>
    </ul>
    <br/>
    <div class="row main-page" >
        <span class="page-title">Proprietorship - Pending Documents</span>
        <br/>
        <p class="sub-title-page">
            List of vendors whose documents are waiting for verification and are registered for Proprietorship
        </p>
    </div>
    <br/>
    <div class="row">
        <center>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-sm-1">S.No</th>
                            <th>Vendor & Company Details</th>
                            <th>Phone Number</th>
                            <th>Photo ID Status</th>
                            <th>VAT/CST Status</th>
                            <th>PAN Status</th>
                            <th>CENVAT Status</th>
                            <th>Cancel Cheque Status</th>
                            <th>Agent</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        if ($documents !== NULL) {
                            $index = 0;
                            foreach ($documents as $value) {
                                $index ++;
                                ?>
                                <tr>
                                    <td><?= $index ?></td>
                                    <td>
                                        <span class="table-data"><b>Company:</b>&nbsp;&nbsp;<?= $value->company ?> <br/></span>
                                        <span class="table-data"><b>Name:</b>&nbsp;&nbsp;<?= $value->first_name ?>&nbsp;<?= $value->last_name ?></span>
                                        <span class="table-data"><b>Email:</b>&nbsp;&nbsp;<?= $value->email ?></span>
                                        
                                    </td>
                                    <td><?= $value->phone ?></td>
                                    <td><?php
                                            if($value->photo_status !== NULL) {
                                                echo $value->photo_status;
                                            } else {
                                                echo "Due";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($value->vat_status !== NULL) {
                                                echo $value->vat_status;
                                            } else {
                                                echo "Due";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($value->pan_status !== NULL) {
                                                echo $value->pan_status;
                                            } else {
                                                echo "Due";
                                            }
                                        ?>
                                    </td>
                                    
                                    <td>
                                        <?php
                                            if($value->cenvat_status !== NULL) {
                                                echo $value->cenvat_status;
                                            } else {
                                                echo "Due";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($value->cancel_status !== NULL) {
                                                echo $value->cancel_status;
                                            } else {
                                                echo "Due";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($value->agent_code !== NULL) {
                                                echo $value->agent_name . " &nbsp; (".$value->agent_code.") &nbsp;";
                                            } else {
                                                echo "N/A";
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </center>
    </div>    


</div>