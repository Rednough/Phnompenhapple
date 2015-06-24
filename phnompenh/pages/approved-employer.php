     <?php

        include_once '../functions/database.php';

        $verified_com = company_check(1);

     ?>


      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="page-header">EMPLOYERS</h3>
                </div>
            </div>
       <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Approved Employeers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="approved" class="cell-border" cellspacing="0" width="100%">
                                    <thead>
                                         <tr>
                                            <th>Date Created</th>
                                            <th>Company Name</th>
                                            <th>Address</th>
                                            <th>Website</th>
                                            <th>Fax No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($verified_com as $verified){?>
                                            <tr>
                                                <?php echo "<td>".$verified['date_created']."</td>"?>
                                                <?php echo "<td>".$verified['name']."</td>"?>
                                                <?php echo "<td>".$verified['street']."</td>"?>
                                                <?php echo "<td>".$verified['website']."</td>"?>
                                                <?php echo "<td>".$verified['fax_no']."</td>"?>
                                            </tr>
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