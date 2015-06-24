    <?php

        include_once '../functions/database.php';

        $reg_applicant = unregistered_registered_applicants(1);
        
    ?>


        
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="page-header">JOBSEEKERS</h3>
                </div>
            </div>
       <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Registered Applicants
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table id="registered" class="cell-border"  cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date Created</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($reg_applicant)){?>
                                        <?php foreach($reg_applicant as $registered){?>
                                            <?php echo "<tr>";?>
                                                <?php echo "<td>".$registered['date_created']."</td>";?>
                                                <?php echo "<td>".$registered['last_name'].",".$registered['firstname']." ".$registered['middle_name']."</td>";?>
                                                <?php echo "<td>".$registered['email']."</td>";?>
                                                <?php echo "<td>".$registered['contactno']."</td>";?>
                                                <?php echo "<td>".$registered['address']."</td>";?>
                                                <?php echo "<td>".$registered['status']."</td>";?>
                                            <?php echo "</tr>"?>
                                        <?php }?>
                                        <?php }else{ echo "<h4>No Applicants registered</h4>";}?>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>