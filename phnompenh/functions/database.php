<?php



    function connection(){
        return new PDO('mysql:host=localhost;dbname=final;','root','');
    }

    // retrieve accounts table
    
    function count_users_verified(){
        $db = connection();
        
        $sql = "select count(usertype) from account where status=1 and usertype=2";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }
    
    function count_users_unverified(){
        $db = connection();
        
        $sql = "select count(usertype) from account where status=0 and usertype=2";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }

    // retrieve company table

    function count_comapny_verified(){
        $db = connection();
        
        $sql = "select count(company_id) from company where status=1";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }
    function count_comapny_unverified(){
        $db = connection();
        
        $sql = "select count(company_id) from company where status=0";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }
    function retrieve_companies(){
        $db = connection();
        
        $sql = "select * from company";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }
    
    // retrieve jobs

    function get_jobs($stat){
        $db = connection();
        
//        $sql = "select * from job";
        $sql = "select job.location, job.title, job.end_date, job.company_id, job.job_id ,job.status, company.name, company.company_id from job inner join company on job.company_id = company.company_id where job.status='".$stat."' order by job.date_posted desc";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db= null;
    }

    function count_jobs(){
        $db = connection();
        
        $sql = "select count(job_id) as count_job from job";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db= null;
    }

    // retrieve job categories sub-categories

    function get_job_categories(){
        $db = connection();
        
        $sql = "select * from category";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db= null;
    }
    
    function get_count_categories(){
        $db = connection();
        
        $sql = "select count(category_id) as count_category from category";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db= null;
    }

    function retrieve_categories($id){
        $db = connection();
        
        $sql ="select count(sub_category_id) as counter from sub_category where category_id = ?";
        $st = $db->prepare($sql);
        $st->execute(array($id));
        $result = $st->fetchAll();
        return $result;
    }

    // Add Job
    function add_job($data){
        $db = connection();
        
        if(array_key_exists("sub_category",$data)){
            
            $sql ="insert into job (company_id,category_id,sub_category,worktype,location,salary, title, detail,apply_info,status) values(?,?,?,?,?,?,?,?,?,?)";
            $st = $db->prepare($sql);
            $st->execute(array(
                $data['company'],
                $data['job_category'],
                $data['sub_category'],
                $data['work_type'],
                $data['location'],
                $data['salary'],
                $data['job_title'],
                $data['com_details'],
                $data['com_app'],
                $data['status']
            ));
            return $st;
            $db = null;
            
        }else{
            
          $sql ="insert into job (company_id,category_id,worktype,location,salary, title, detail,apply_info,status) values(?,?,?,?,?,?,?,?,?)";
            $st = $db->prepare($sql);
            $st->execute(array(
                $data['company'],
                $data['job_category'],
                $data['work_type'],
                $data['location'],
                $data['salary'],
                $data['job_title'],
                $data['com_details'],
                $data['com_app'],
                $data['status']
            ));
            return $st;
            $db = null;
        
        }
        

    }


    //retrieve registered applicants

    function unregistered_registered_applicants($id){
        $db = connection();
        
        $sql = "select * from applicant where status='".$id."'";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }


    //retrieve unverified company

    function company_check($id){
        $db = connection();
        
        $sql ="select * from company where status='".$id."'";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db=null;
     }

    //add new sub category

    function add_subcategory($data){
        $db = connection();
        $sql = "insert into sub_category (category_id, name) values(?,?)";
        $st = $db->prepare($sql);
        $flag = $st->execute(array($data['category_id'],$data['sub-category']));
        return $flag;
    }

    
    //add new category

    function add_category($data){
        $db = connection();
        $sql = "insert into category (name) values(?)";
        $st= $db->prepare($sql);
        $flag = $st->execute(array($data['new_category']));
        return $flag;
    }

    //total users

    function total_users(){
        $db = connection();
        
        $sql = "select count(account_id) as total_accounts from account";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }

    //retrieve all users

    function retrieve_users(){
        $db = connection();
        
        $sql = "select * from account";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }   

    //total logs

    function total_logs(){
        $db = connection();
        
        $sql = "select count(log_id) as total_logs from log";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }

    //get time logs

    function get_time(){
        $db = connection();
        
        $sql = "select log.account_id,account.account_id,account.username ,log.usertype, log.time_in, log.time_out from log inner join account on log.account_id = account.account_id order by time_out desc limit 10";
        $st = $db->prepare($sql);
        $st->execute();
        $result = $st->fetchAll();
        return $result;
        $db = null;
    }

    function update_job($data){
        print_r($data);
        $db = connection();
        $sql = "update job set date_posted=?, end_date=?, status=1 where job_id=?";
        $st = $db->prepare($sql);
        $result = $st->execute(array($data[1],$data[2],$data[0]));
        return $result;
        $db=null;
    }

    function delete_job($id){
        $db = connection();
        
        $sql = "delete from job where job_id=?";
        $st = $db->prepare($sql);
        $result = $st->execute(array($id));
        return $result;
        $db=null;
    }

    function delete_category($id){
        $db = connection();
        
        $sql = "delete category from category inner join sub_category on category.category_id = sub_category.category_id where category.category_id=?";
//        $sql = "delete from category where category_id=?";
        $st = $db->prepare($sql);
        $result = $st->execute(array($id));
        return $result;
        $db = null;
    }



