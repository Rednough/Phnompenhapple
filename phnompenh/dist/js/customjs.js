$(document).ready(function(){
        
    

    
    $.post('ajax_process/show_up.php',function(response){
        $('#content').html(response);
    });
    
    $('.sidebar .sidebar-nav ul.nav li a, ul li a').on('click',function(e){
        e.preventDefault();
        
        
        
        var $val = $(this).attr('href');
//        alert($val);
        $.post('ajax_process/menu_process.php',{'data': JSON.stringify($val)},function(data_return){
//            $('#content').html(data_return);
        
           if($val == 'dashboard-admin.php'){
               $('#content').empty();
               $('#content').html(data_return);
           }else if($val == '?page=pending_job_post'){
               var count = 0;
               var counter = 0;
               var table = $('#pending-jobs').DataTable();
               $('#content').empty();
               $('#content').html(data_return);
               $('#pending-jobs').dataTable({
                    responsive: true,
                    bLengthChange: false,
                    bInfo: false,
                    bSort: false
               });
//               $('#pending-jobs').DataTable().row('tr.selected').remove().draw(false);
               $('#pending-jobs tbody').on('click','tr',function(){
                   
                    $(this).toggleClass('selected');
        
                        if($('#pending-jobs').DataTable().rows('.selected').data().length == 2){
                            count++;
                            if(count == 1){
                                $('#pending-jobs_wrapper #pending-jobs_paginate').after('<div class="bot" style="padding-top:3.50px;"><button id="save_all" class="btn btn-primary pull-left">Approve Selected</button>&nbsp<button class="btn btn-danger" id="remove_all">Remove Selected</button></div>');
                                $('#pending-jobs_wrapper tbody tr.selected,button.approve,button.remove').attr('disabled','disabled');
                                $('button#save_all').click(function(){
                                    for_date();
                                    var arrays = new Array();
                                        var def_date = $('#end_date').val();
                                        var cur_date = $('#start_date').val();
                                    var values = $('tbody tr.selected td input').val();
                                        $('tbody tr.selected td input').each(function(index, element){
                                            arrays[counter++] = [element.value,cur_date,def_date];
                                        });
//                                    var json_data = JSON.stringify(arrays);
//                                    console.log(arrays);
                                    $('#myModal').modal('show');
                                  
                                    $('button#save_date').click(function(){
                                          $.post('ajax_process/approve_ajax.php',{data: arrays},function(data){
                                                if(data){
                                                    $('.modal .modal-dialog .modal-content .modal-body form code').text('New job post added!');
                                                }else{
                                                    console.log('no');
                                                }
                                          });
                                    });
                                  
                                });
                            }
                        }else if($('#pending-jobs').DataTable().rows('.selected').data().length == 1){
                            $('div.bot button#save_all, button#remove_all').remove();
                            $('#pending-jobs_wrapper tbody tr:selected,button.approve,button.remove').removeAttr('disabled');
                            count = 0;
                        }
                        
//                        if($(this).hasClass('selected')){
//                            $(this).removeClass('selected');
//                        }else{
//                            table.$('tr.selected').removeClass('selected');
//                            $(this).addClass('selected');
//                        }
//              
                    $('.approve').on('click',function(){
                        $('#myModal').modal('show');
                        for_date();
                        var job_id = $('tbody tr.selected, td button.approve').attr('data-wrapper');
                         $('button#save_date').click(function(){
                            var def_date = $('#end_date').val(),
                                cur_date = $('#start_date').val(),
                                input_value = $('tbody tr.selected td button.approve').attr('data-wrapper');
                             console.log(job_id);
                            var  data_array = [job_id,cur_date,def_date];
                            $.post('ajax_process/single_approve.php',{data: data_array},function(response){
                               if(response){
                                  window.location.reload();
                               }
                            });
                             
                         });
                    });// end of .approve
               }); // end of tr click
               
               $('.remove').click(function(){
                    var job_id = $('tbody tr.selected, td button.remove').attr('data-wrapper');
                   console.log(job_id);
               });//.remove end

           }else if($val == '?page=job_post'){
               $('#content').empty();
               $('#content').html(data_return);
               $('#example').DataTable({
                    responsive: true,
                    bLengthChange: false,
                    bInfo: false,
                    bSort: false
                
               });
           }else if($val == '?page=job_category'){
               $('#content').empty();
               $('#content').html(data_return);
               
               $('.panel .panel-heading a#add_new_category').on('click',function(){
                    $('.modal').attr('id','add_new_category');
                    $('#add_new_category').modal('toggle');
                    $('.modal .modal-dialog .modal-content .modal-header .modal-title').text('Add new category');
                    $('.modal-body .form-group').html('<input type="text" class="form-control" name="new_category" id="new_category" required>');
                    $('.modal .modal-dialog .modal-content .close').on('click',function(){
                        $('.modal').attr('id','subcat');
                        $('.modal .modal-dialog .modal-content .modal-title').empty();
                    });
               });
               
               $('#page-wrapper .panel .panel-body a.subcat').on('click',function(){
                    var $val = $(this).attr('value');
                    var $data = $(this).attr('data');
                   $('.modal .modal-dialog .modal-content .modal-title').append($val);
                   $('.modal .modal-dialog .modal-content .close').click(function(){
                        $('.modal .modal-dialog .modal-content .modal-title').empty();
                   });
                   $('.modal .modal-dialog .modal-content .modal-body').html('<input type="text" class="form-control" name="sub-category" id="sub" placeholder="add new sub category" required/><input type="hidden" name="category_id" id="category_id"/>');
                   $('.modal .modal-dialog .modal-content .modal-body input[type="hidden"]').attr('value',$data);
                   $('.modal .modal-dialog .modal-content #save').click(function(){
                       var data ={
                            subcategory: $('#sub').val(),
                            categoryid:$('#category_id').val()
                       };
//                        $.post('ajax_process/add_new_sub.php',{sub_data:JSON.stringify(data)},function(response){
//                            if(response){
//                                $('.modal .modal-dialog .modal-content .modal-footer').fadeIn().html('<span class="pull-left"><h5>New sub category added!</h5></span>');   
//                            }else{
//                                $('.modal .modal-dialog .modal-content .modal-footer').fadeIn().html('<span class="pull-left"><h5>Something wrong with the database</h5></span>');   
//                            }
//                        }); 
                   });
               });
               $('.remove_cat').on('click',function(e){
                    var div_value = $(this).parent().attr('data-wrapper');
                    $(this).parent('.cat_remove').remove();
                   $.post('ajax_process/delete_category.php',{id: div_value},function(response){
                        console.log(response);
                   });
                    e.preventDefault();
               });
           }else if($val == '?page=new_job_post'){
               $('#content').empty();
               $('#content').html(data_return);
               $('#content').find('#page-wrapper #myModal .modal-content .modal-body #job-category').change(function(){
                    var selected = $('#job-category option:selected').val();
                   $.post('ajax_process/process_dropdown.php',{'data': JSON.stringify(selected)},function(data_return){
                        if($.isEmptyObject(data_return)){
                             $('#subcategory, #subcategory-header').fadeOut().css({'display':'none'}); 
                        }else{
                            $('#subcategory, #subcategory-header').show('fast').css({'display':'block'});
                            $('#subcategory').html('<select class="form-control" required id="sub-category" name="sub-category"></select>');
                         for(var i in data_return){
                            $('#subcategory select').append('<option value="'+data_return[i].sub_category_id+'">'+data_return[i].name+'</option>');
                         }
                        }
                    
                   },'json');
               });

                
                
               //error handling & inserting data
                 $('#content').find('#page-wrapper #myModal .modal-content .modal-body form#loginForm').submit(function(event){
                    event.preventDefault();
         
                    $.post("handler.php",
                        {min:$("#min").val(),
                        max:$("#max").val(),
                        location:$("#loc").val(),
                        job:$('#job_title').val(),
                        comp_details:$('#com_details').val(),
                        app:$('#app_details').val(),
                        request:"signin"},
                           function(data,status)
                           {
                        
                                var data_wrapper = {
                                    
                                  job_category : $('#job-category').val(),
                                  sub_category : $('#sub-category').val(),
                                  salary       : $('#min').val()+"-"+$('#max').val(),
                                  work_type    : $('#work-type').val(),
                                  location     : $('#loc').val(),
                                  job_title    : $('#job_title').val(),
                                  company      : $('#company_id').val(),
                                  com_details  : $('#com_details').val(),
                                  com_app      : $('#app_details').val(),
                                  status       : $('#status').val()
                        
                                    
                                };
                        
                            if(!data.ok)
                            {
                                var message=data.message;
                                $('#error').text(message).fadeIn(500);
                                //$("#signin-email").val("");
                                //$('#signin-password').val("");
                                $("#min").focus(function(){
                                    fadeError(message);
                                });
                                $("#max").focus(function(){
                                    fadeError(message);
                                });
                                $("#loc").focus(function(){
                                    fadeError(message);
                                });
                                $("#company").focus(function(){
                                    fadeError(message);
                                });
                                $("#com_details").focus(function(){
                                    fadeError(message);
                                });
                                $("#app_details").focus(function(){
                                    fadeError(message);
                                });
                            }else{
                                $.post('ajax_process/add_job.php',{wrapper: JSON.stringify(data_wrapper)},function(response){
                                    
                                    
                                });
                            }
                           },"json");
                           $("#login-button").click(function(){
                                  clearSignin();
                             });
                    
                             function clearSignin()
                             {
                                 $('#min').val("");
                                 $('#max').val("");
                                 $('#loc').val("");
                                 $('#company').val("");
                                 $('#com_details').val("");
                                 $('#app_details').val("");
                    
                             }
                    
                             function fadeError(message)
                             {
                                 if($('#error').text()!="")
                                     $('#error').text(message).fadeOut(500);
                             }
               
                    });
               
           }else if($val == '?page=registered-applicant'){
               $('#content').empty();
               $('#content').html(data_return);
               $('#registered').dataTable({
                    responsive: true,
                    bLengthChange: false,
                    bInfo: false,
                    bSort: false
               });
           }else if($val == '?page=unregistered-applicant'){
               $('#content').empty();
               $('#content').html(data_return);
           }else if($val == '?page=pending-employer'){
               $('#content').empty();
               $('#content').html(data_return);
               $('.table').dataTable({
                    responsive: true,
                    bLengthChange: false,
                    bInfo: false,
                    bSort: false
               });
           }else if($val == '?page=approved-employer'){
               $('#content').empty();
               $('#content').html(data_return);
               $('#approved').dataTable({
                    responsive: true,
                    bLengthChange: false,
                    bSort:  false,
                    bInfo:  false
               });
           }else if($val == '?page=log-reports'){
               $('#content').empty();
               $('#content').html(data_return);
               $('#logs').dataTable({
                    responsive: true,
                    bLengthChange: false,
                    bSort:  false,
                    bInfo:  false
               });
           }else if($val == '?page=users-list'){
               $('#content').empty();
               $('#content').html(data_return);
               $('#user-list').dataTable({
                    responsive: true,
                    bLengthChange: false,
                    bInfo: false,
                    bSort: false
               });
           }else{
//               menu_ajax($val);
           }
        
        });
    });


  function for_date(){
    $('form.form-inline code').empty();
       var date = new Date();
       var get_month; 
       var get_change,default_month,get_day;
       var default_day = ("0" + date.getDate()).slice(-2);
       var default_month = ("0" + (date.getMonth() + 2)).slice(-2);
       var cur_month = ("0" + (date.getMonth() + 1)).slice(-2);
       var default_date = date.getFullYear()+"-"+(default_month)+"-"+(default_day);
       var cur_date = date.getFullYear()+"-"+(cur_month)+"-"+(default_day);
      
        default_month = default_date.substring(5,7);
       $('#end_date').val(default_date);
       $('#start_date').val(cur_date);
       $('#end_date').change(function(){
            get_change = $(this).val();
        });
        $('#save_date').click(function(){
            if(get_change != undefined){
                    get_month = get_change.substring(5,7);
                    get_day = get_change.substring(8,10);
                if(get_month <= cur_month){
                  $('form.form-inline code').text('End date must be ahead 1 month of the current date');
//                    alert('aw');
                }else if(get_month == default_month && get_day < default_day || get_day > default_day){
                   $('form.form-inline code').text('End period must be atleast 1 month');
                }else{
                  $('form.form-inline code').empty();
                    console.log('here');
                }
            }
//            console.log(default_date);
        });
  }
    
    
    
});