<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <div class="row">
        <span class="page-title">Overall Leads</span>
        <br/>
        <p class="sub-title-page">
            List of vendors who enrolled for subscription but not registered. 
        </p>
        <br/>
        <p id="manual_link" style="padding:10px;margin-right:50px;">
            
            
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
                        <th>Phone</th>
                        <th>Sales Market</th>
                        <th>Registration Date</th>
                        <th>Activation Link</th>
                        <th>Manual Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($leads !== NULL) {
                        $index = 0;
                        if (count($leads) > 0) {
                            foreach ($leads as $value) {
                                ?> 
                                <tr>
                                    <td class="col-sm-1"><?= ++$index ?></td>
                                    <td><?= $value->email ?></td>
                                    <td><?= $value->phone ?></td>
                                    <td><?= $value->market ?></td>
                                    <td><?= date("d-m-Y H:i:s", strtotime($value->regdate)) ?></td>
                                    <td><a href="#" onclick="sendVerificationLink('<?= $value->email?>')">Click Here</a></td>
                                    <td><a href="#" onclick="get_manual_link('<?= $value->email?>')">Click Here</a></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?> 
                        <td colspan="5">No Rows Found</td>
                        <?php
                    }
                } else {
                    ?> 
                    <td colspan="5">No Rows Found</td>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        </center>
    </div>    


</div>
