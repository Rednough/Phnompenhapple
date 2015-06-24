     <?php

        include_once '../functions/database.php';

        $unverified_com = company_check(0);

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
                            List of Pending Employers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table class="table cell-border"  cellspacing="0" width="100%">
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
                                        
                                        <?php foreach($unverified_com as $unverified){?>
                                            <tr>
                                                <?php echo "<td>".$unverified['date_created']."</td>"?>
                                                <?php echo "<td>".$unverified['name']."</td>"?>
                                                <?php echo "<td>".$unverified['street']."</td>"?>
                                                <?php echo "<td>".$unverified['website']."</td>"?>
                                                <?php echo "<td>".$unverified['fax_no']."</td>"?>
                                            </tr>
                                        <?php }?>
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