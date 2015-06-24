     
      <?php

            $status = "";
            include_once '../functions/database.php';
            $jobs = get_jobs(0);
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
                           List of Pending Jobs Posted
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table id="pending-jobs" class="cell-border" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Location</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($jobs as $job){?>
                                    <tr data-wrapper="<?php echo $job['job_id']?>">
                                        <?php echo "<td>".$job['title']."</td>";?>                                    
                                        <?php echo "<td>".$job['location']."</td>";?>                                    
                                        <?php echo "<td>".$job['name']."</td>";?>                                    
                                        <?php echo "<td>Pending</td>";?>                                    
                                        <?php echo "<td>"."<input name='job_id' id='job_id' type='hidden' value='".$job['job_id']."'>"."<button id='approve' data-wrapper='".$job['job_id']."' data-toggle='modal' class='btn btn-primary approve'>Approve</button> <button id='remove' data-toggle='modal' class='btn btn-danger remove' data-wrapper='".$job['job_id']."'>Remove</button></td>";?>                                    
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                       
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>

            <div class="modal fade" id="myModal" data-backdrop="static">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Set End Period</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-inline" style="text-align:center;">
                                
                            <p class="help-block">Default end date </p>
                                <input type="date" id="start_date" name="start_date" style="display:none;"/>
                                <input type="date" id="end_date" class="form-control" name="end_date"/><br/>
                                <code></code>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="save_date" type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


