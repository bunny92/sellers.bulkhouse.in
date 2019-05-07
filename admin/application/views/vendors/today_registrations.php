<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <div class="row">
        <span class="page-title">Today's Registrations</span>
        <br/>
        <p class="sub-title-page">
            List of vendors who registered successfully. 
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
                        <th>Email ID</th>
                        <th>Phone Number</th>
                        <th>Market</th>
                        <th>Company</th>
                        <th>Firm Type</th>
                        <th>Vendor Name</th>
                        
                        <th>Reg. Date</th> 
                        <th>Agent Code</th>
                        <th>Agent Name</th>
                        <th>Assigned Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($registrations !== NULL) {
                        if (count($registrations) > 0) {
                            $id = 0;
                            foreach ($registrations as $value) {
                                ?> 
                    <tr>
                        <td class="col-sm-1"><?= ++$id?></td>
                        <td><?= $value->email?></td>
                        <td><?= $value->phone?></td>
                        <td><?= $value->market?></td>
                        <td><?= $value->company?></td>
                        <td><?= $value->firm_name?></td>
                        <td><?= $value->first_name?> &nbsp;
                        <?= $value->last_name?></td>
                        <td><?= date("d-m-Y", strtotime($value->regdate))?></td>
                        <td><?= $value->agent_code !== NULL ? $value->agent_code : "N/A"?></td>
                        <td><?= $value->agent_name !== NULL ? $value->agent_name : "N/A"?></td>
                        <td><?= $value->assigned_date !== NULL ? $value->assigned_date : "N/A"?></td>
                    </tr>
                                <?php
                            }
                        } else {
                            ?> 
                            <tr>
                                <td colspan="13">No Rows Found</td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?> 
                        <tr>
                            <td colspan="13">No Rows Found</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </center>
    </div>    


</div>