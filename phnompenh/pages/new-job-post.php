    <?php 
        
        include_once '../functions/database.php';
    
        $result = get_job_categories();
        $companies = retrieve_companies();

//        if(isset($_POST['submit'])){
//            echo "<script>alert('asdsda');</script>";
//        }
        
    ?>





    <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="page-header">JOBS</h3>
                </div>
            </div>
      <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Job Post
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Create
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">JOBS</h4>
                                        </div>
                                        <div class="modal-body">
                                           
                    <div class="col-lg-13">
                               <div class="col-lg-13">
                                 <div class="panel panel-default">
                                     <div class="panel-heading">
                                         Post a Job
                                     </div>
                
                                     <div class="panel-body">
                                         <div class="row">
                                             <div class="col-lg-12">
                                                 <form role="form" method="post" id="loginForm">

                                                    <div class="form-group">
                                                         <label>Job Category</label>
                                                         <select id="job-category" class="form-control" name="job-category" required>
                                                                <option value="">Select a category</option>
                                                             <?php foreach($result as $r){?>
                                                                 <?php echo "<option value='".$r['category_id']."'>".$r['name']."</option>"?>
                                                             <?php }?>
                                                         </select>
                                                     </div>
                                                     <p class="help-block" id="subcategory-header">Sub Category</p>
                                                     <div class="form-group" id="subcategory">
                                                     </div>
                                                     
                                                     <label>Salary</label>
                                                      <div class="form-group input-group">
                                                         <span class="input-group-addon">$</span>
                                                         <input id="min" type="text" name="min" class="form-control" placeholder="Min" required>
                                                         <span class="input-group-addon">.00</span>
                                                     </div>
                                                     <div class="form-group input-group">
                                                         <span class="input-group-addon">$</span>
                                                         <input id="max" type="text" name="max" class="form-control" placeholder="Max" required>
                                                         <span class="input-group-addon">.00</span>
                                                     </div>
                
                                                      <div class="form-group">
                                                         <label>Work type</label>
                                                         <select class="form-control" id="work-type" name="work-type" required>
                                                             <option value="">Select work type</option>
                                                             <option value="casual">Casual</option>
                                                             <option value="part-time">Part-Time</option>
                                                             <option value="full-time">Full-Time</option>
                                                         </select>
                                                     </div>
                
                                                    
                                                     <div class="form-group">
                                                         <label>Location</label>
                                                         <input id="loc" class="form-control" name="location" placeholder="Full address" required>
                                                     </div>
                
                                                      <div class="form-group">
                                                         <label>Job Title</label>
                                                         <input id="job_title" class="form-control" name="job-title" placeholder="For what specific job" required>
                                                     </div>
                
                                                      <div class="form-group">
                                                        <label>Company Name</label>
                                                         <select class="form-control" id="company_id" name="company_id">
                                                             <option value="">Select a company</option>
                                                             <?php foreach($companies as $comp){?>
                                                                <?php echo "<option value='".$comp['company_id']."'>".$comp['name']."</option>"; ?>
                                                             <?php }?>
                                                         </select>
                                                     </div>
                
                
                                                     <label>Company Details</label>
                
                                                     <p class="help-block">Type your company information and job description here.</p>
                                                     <div class="form-group">
                                                         <textarea id="com_details" class="form-control" rows="3" name="company-details" placeholder="Company Details" required></textarea>
                                                     </div>
                
                                                     <label>Application Details</label>
                
                                                     <p class="help-block">Indicate instructions on how to apply.</p>
                                                     <div class="form-group">
                                                         <textarea id="app_details" class="form-control" rows="3" name="Application-details" placeholder="Application Details" required></textarea>
                                                     </div>
<!--                                                    <input type="hidden" value="<?php date()?>" name="current_date" id="current_date"/>-->
                                                     <input type="hidden" value="0" name="status" id="status">
                                                     <input type="submit" class="btn btn-primary" value="submit" name="submit"/>
                                                     <button type="reset" class="btn btn-default" >Reset Field</button>
                                                     <code><span id="error" style="display:none;color:#ED3939;font-weight:bold;padding-left:2px;"></span></code>
                                                 </form>
                                             </div>
                
                
                                         </div>
                            <!-- /.row (nested) -->
                     
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
       </div>