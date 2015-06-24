    <?php 
        $usertype = "";
        
        include_once '../functions/database.php';
        
        $logs = get_time();
        
    ?>


      <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="page-header">SECURITY</h3>
                </div>
            </div>
       <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of Log Reports
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table id="logs" class="cell-border"  cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Usertype</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <?php foreach($logs as $l){?>
                                            <tr>
                                                <?php 
                                                    if($l['usertype'] == 1){
                                                        $usertype = "Employer";
                                                    }else if($l['usertype'] == 2){
                                                        $usertype = "Applicant";
                                                    }else{
                                                        $usertype = "Administrator";
                                                    }
    
                    
                                                ?>
                                                <?php echo "<td>".$l['username']."</td>"; ?>
                                                <?php echo "<td>".date('M j, Y g:i:D',strtotime($l['time_in']))."</td>"; ?>
                                                <?php echo "<td>".date('M j, Y g:i:D',strtotime($l['time_out']))."</td>"; ?>
                                                <?php echo "<td>".$usertype."</td>"; ?>
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