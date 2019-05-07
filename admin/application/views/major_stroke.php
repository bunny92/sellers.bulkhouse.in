<table style="width:100%;" >
    <thead>
        <tr>
            <td><b>Company</b></td>
            <td><b>Email</b></td>
            <td><b>Password</b></td>
            </tr>
    </thead>
    <tbody>
        <?php 
            if($list !== NULL) {
                foreach($list as $value) {
                    ?> 
        <tr>
            <td><?= $value->company?></td>
            <td><?= $value->email?></td>
            <td><?= $value->pwd?></td>
        </tr>
                        
                        <?php
                }
            }
        ?>
    </tbody>
</table>