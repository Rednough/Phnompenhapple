     
      <?php
            include_once '../functions/database.php';
            $jobs = get_jobs(1);
//            print_r($jobs)
      ?>
      
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="page-header">JOBS</h3>
                </div>
            </div>
       <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           List of Jobs Posted
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table id="example" class="cell-border" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Location</th>
                                    <th>Company</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <?php foreach($jobs as $j){?>
                                        <tr>
                                            <?php echo "<td>".$j['title']."</td>"?>
                                            <?php echo "<td>".$j['location']."</td>"?>
                                            <?php echo "<td>".$j['name']."</td>"?>
                                            <?php echo "<td>".$j['end_date']."</td>"?>
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