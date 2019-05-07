<link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
<div class="main-content">
    <div class="row">
        <span class="page-title">Agent Credentials</span>
        <br/>
        <p class="sub-title-page">
            This page will allow you to register agent, view agent registration credentials and delete agent credentials
        </p>
    </div>
    <br/>
    <div class="row">    
        <span class="page-title">Agents Registration</span>
        <br/>
        <p class="sub-title-page">
            Default Password at the time of registration is : <b>bulk@lwyz123</b>
        </p>
        <br/>
        <form class="form-horizontal" role="form" method="post" action="<?= base_url("agents/register_agent") ?>">
            <div class="form-group">
                <label class="control-label col-sm-2" for="agent_code">Agent Code:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="agent_code" name="agent_code" required="true" placeholder="Enter agent code">
                </div>
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" required="true" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="login_id">Login ID:</label>
                <div class="col-sm-4"> 
                    <input type="text" class="form-control" id="login_id" name="login_id" required="true" placeholder="Enter Login ID">
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-2">
                    <span style="color:red; font-size:.9em;"><?php
                        if ($this->session->flashdata("failure_message") !== NULL) {
                            echo $this->session->flashdata("failure_message");
                        }
                        ?></span>

                    <span style="color:green; font-size:.9em;"><?php
                        if ($this->session->flashdata("success_message") !== NULL) {
                            echo $this->session->flashdata("success_message");
                        }
                        ?></span>
                </div>
            </div>
        </form>
    </div>
    <br/>
    <div class="row">
        <center>
            <div class="table-responsive">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-sm-1">S.No</th>
                            <th>Agent Code</th>
                            <th>Name</th>
                            <th>Login ID</th>
                            <th>Registered Date</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($agent_cred !== NULL) {
                            $index = 0;
                            foreach ($agent_cred as $value) {
                                ?>
                        <tr>
                            <td><?= ++$index?></td>
                            <td><?= $value->agent_code?></td>
                            <td><?= $value->name?></td>
                            <td><?= $value->login_id?></td>
                            <td><?= date("d-m-Y H:i:s", strtotime($value->regdate)) ?></td>
                            <td><a href="<?= base_url('agents/delete_agent?id='.$value->id)?>" class="btn btn-default"><span class="fa fa-trash"></span></a></td>
                        </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
