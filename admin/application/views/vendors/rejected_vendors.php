<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <div class="row">
        <span class="page-title">Overall Registrations</span>
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
                            <th>Vendor Details</th>
                            <th>Purpose of Rejection</th>
                            <th>Agent Details</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($vendors !== NULL) {
                            $index = 0;
                            foreach ($vendors as $value) {
                                ?> 
                                <tr>
                                    <td><?= ( ++$index) ?></td>
                                    <td>Email : <?= $value->email ?><br/>
                                        Company : <?= $value->company ?>
                                        <br/>
                                        Phone : <?= $value->phone ?>
                                        <br/>
                                        Name : <?= $value->first_name ?> &nbsp; <?= $value->last_name ?>
                                    </td>
                                    <td>
                                        Reason :<?= $value->reason ?>
                                    </td>
                                    <td>
                                        <?= $value->name ?> (<?= $value->agent_code ?>)
                                    </td>
                                    <td>
                                        <?= date("d-m-Y H:i:s", strtotime($value->rejected_date)) ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
</div>
