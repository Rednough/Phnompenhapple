    <?php
        
        include_once '../functions/database.php';
        
        $result = count_users_verified();
        $result_users = count_users_unverified();
        $company_verified = count_comapny_verified();
        $company_unverified = count_comapny_unverified();
        $count_categories = get_count_categories();
        $count_jobs = count_jobs();
        $total_users = total_users();
        $total_logs = total_logs();
        $time = get_time();
//        print_r($time);
      
    ?>


    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
              <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $result[0][0];?></div> 
                                             <div>Registered</div>
                                               <div class="huge"><?php echo $result_users[0][0];?></div> 
                                    <div>Unregistered</div>
                                </div>
                            </div>
                        </div>

                        <a href="#">
                            <div class="panel-footer">
                              <div class="pull-left">Jobseekers</div>
                                <span class="pull-right">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                     <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_categories[0][0]; ?></div>
                                    <div>Job Categories</div>
                                    <div class="huge"><?php echo $count_jobs[0][0];?></div>
                                     <div>Job Ads</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <div class="pull-left">Job Ads</div>
                                <span class="pull-right">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-building fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $company_verified[0][0];?></div>
                                    <div>Pending</div>
                                    <div class="huge"><?php echo $company_unverified[0][0];?></div>
                                    <div>Approved</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                              <div class="pull-left">Employer</div>
                                <span class="pull-right">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                      <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $total_logs[0][0]?></div>
                                    <div>Log Reports</div>
                                    <div class="huge"><?php echo $total_users[0][0]?></div>
                                    <div>Total Registered Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                 <span class="pull-left">Users</span>
                                <span class="pull-right">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                

            
                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-key"></i> User Logs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
<!--
                                <div class="message">
                                    <h4>No entries are available</h4>

                                </div>
-->
                                <?php if($time){?>
                                    <?php foreach($time as $t){?>
                                        <?php echo "<a href='#' class='list-group-item'>";?>
                                            <?php echo "<i class='fa fa-user'></i> ".$t['username'];?>
                                            <?php echo "<span class='pull-right text-muted small'><em>".date('M j, Y g:i:D',strtotime($t['time_in']))."</em></span>";?>
                                        <?php echo "</a>";?>
                                    <?php }?>
                                <?php }else{?>
                                <?php echo "<div class='message'>";?>
                                    <?php echo "<h4>No entries are available</h4>";?>
                                <?php echo "</div>"; }?>
                            </div>
                            <!-- /.list-group -->
<!--                            <a href="logrep.php" class="btn btn-default btn-block">View All Logs</a>-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                 </div>

            </div>
                            <!-- /.row (nested) -->
        </div>