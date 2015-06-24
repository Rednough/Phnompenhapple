    <?php

        include_once '../functions/database.php';

        $unreg_applicant = unregistered_registered_applicants(0);


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
                            Unregistered Applicants
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date Created</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($unreg_applicant as $unregistered){?>
                                            <?php echo "<tr>";?>
                                                <?php echo "<td>".$unregistered['date_created']."</td>";?>
                                                <?php echo "<td>".$unregistered['last_name'].",".$unregistered['firstname']." ".$unregistered['middle_name']."</td>";?>
                                                <?php echo "<td>".$unregistered['email']."</td>";?>
                                                <td><a href="#" id="option"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <?php echo "</tr>"?>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>