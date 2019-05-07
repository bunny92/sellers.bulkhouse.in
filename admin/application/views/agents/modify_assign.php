<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <div class="row">
        <span class="page-title">Modify Allocated Vendors</span>
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
                        <th>Re-Assign</th>
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
                        <td><a href="#" onclick="assign_agent_to_vendor('<?=$value->id ?>','<?= $value->email?>')" data-toggle="modal" data-target="#myModal">Click Here</a></td>
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




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Assign Agent</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url("agents/re_allocate_agent_to_vendor") ?>" method="post"   onsubmit="return validate_assign()">
                    <input type="hidden" name="vendor_id" id="vendor_id"/>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="vendor_email">Vendor Email-ID:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly="true" class="form-control" id="vendor_email" name="vendor_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4" for="agent">Agent:</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="agent" name="agent_code">
                                <option value="no">--Choose Agent--</option>
                                <?php
                                if ($agent_cred !== NULL) {
                                    foreach ($agent_cred as $value) {
                                        ?> 
                                        <option value="<?= $value->agent_code ?>"><?= $value->agent_code ?> - <?= $value->name ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                            <input type="submit" value="Re-Assign Agent" class="btn btn-default"/>
                        </div>
                    </div>
                </form>
                <p style="color:red;font-size: .9em; float:right" id="assign_error"></p>
                <br/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
