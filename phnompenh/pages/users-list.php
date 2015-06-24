    <?php
        
        $usertype="";
        include_once '../functions/database.php';
        
        $users = retrieve_users();
        
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
                            List of Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                <table id="user-list" class="cell-border" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Account ID.</th>
                                            <th>Username</th>
                                            <th>Usertype</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user){?>
                                            <?php 
                                                if($user['usertype'] == 1){
                                                    $usertype = "Employer";
                                                }else if($user['usertype'] == 2){
                                                    $usertype = "Applicant";
                                                }else{
                                                    $usertype = "Administrator";
                                                }
                                            ?>
                                            <tr>
                                                <?php echo "<td>".$user['account_id']."</td>";?>
                                                <?php echo "<td>".$user['username']."</td>";?>
                                                <?php echo "<td>".$usertype."</td>";?>
                                                <?php echo "<td><a class='fa fa-envelope fa-fw'></a></td>";?>
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