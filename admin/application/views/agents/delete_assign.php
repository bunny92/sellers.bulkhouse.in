<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <div class="row">
        <span class="page-title">Delete Allocation</span>
        <br/>
        <p class="sub-title-page">
            List of vendors who are assigned to agents are displayed.
        </p>
    </div>
    <br/>
    <div class="row">
        <p class="sub-title-page">
            <span style="color:blue"><?php
                if ($this->session->flashdata("success_message") !== NULL) {
                    echo $this->session->flashdata("success_message");
                }
                ?></span>
            <span style="color:blue"><?php
                if ($this->session->flashdata("failure_message") !== NULL) {
                    echo $this->session->flashdata("failure_message");
                }
                ?></span>
        </p>
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
                        <th>Agent</th>
                        <th>Assigned Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($allocated_vendors !== NULL) {
                        if (count($allocated_vendors) > 0) {
                            $id = 0;
                            foreach ($allocated_vendors as $value) {
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
                        <td>
                        <?= $value->agent_name !== NULL ? $value->agent_name : "N/A"?> (<?= $value->agent_code !== NULL ? $value->agent_code : "N/A"?>)</td>
                        <td><?= $value->assigned_date !== NULL ? date("d-m-Y H:i:s", strtotime($value->assigned_date)) : "N/A"?></td>
                        <td><a class="btn btn-default" href="<?= base_url("agents/delete_allocation?vendor_id=".$value->id)?>"><span class="fa fa-trash"></span></a></td>
                    </tr>
                                <?php
                            }
                        }
                    }?>
                </tbody>
            </table>
        </div>
        </center>
    </div>    


</div>


