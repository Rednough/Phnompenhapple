    <?php
        
        include_once '../functions/database.php';

        $result = get_job_categories();


       
    ?>
       
        <div class="modal fade" id="subcat" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <form method="post">
                        <div class="modal-body">
                          <div class="form-group">
<!--
                            <input type="text" class="form-control" name="sub-category" id="sub" placeholder="add new sub category" required/>
                            <input type="hidden" name="category_id" id="category_id"/>
-->
                          </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="save" id="save" class="btn btn-primary" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      

     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="page-header">JOBS</h3>
                </div>
            </div>
       <div class="col-lg-13">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Job Categories
                            <span class="pull-right"><a id="add_new_category"><i class="glyphicon glyphicon-plus"></i> Add new category</a></span>
                        </div>
                        <!-- /.panel-heading -->
                         <div class="panel-body">
                             <?php foreach($result as $r){?>
                                <?php $categories = retrieve_categories($r['category_id']);?>
                                    <?php foreach($categories as $c){?>
                                <?php echo "<div class='alert alert-success cat_remove' data-wrapper='".$r['category_id']."'>"; ?>
                                    <?php echo "<a class='alert-link categories'>".$r['name']." (".$c['counter'].")"."</a>"."<a class='pull-right remove_cat' data-wrapper='".$r['category_id']."'  style='margin-left:5px;'><span class='glyphicon glyphicon-remove' alt='remove the current category'></span> </a> <a data-toggle='modal' data-target='#subcat' class='pull-right subcat' data='".$r['category_id']."' value='".$r['name']."'><span class='glyphicon glyphicon-plus' alt='add a subcategory'></span></a>"; ?>
                                <?php echo "</div>"; ?>
                             <div id="dropdown-sub">
                             
                             </div>
                             <?php }?>
          
                            <?php }?>
             
                           
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>

        </div>

