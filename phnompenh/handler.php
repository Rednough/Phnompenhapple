<?php

	if(isset($_POST["request"]))
	{
//        print_r($_POST);
	        $request=$_POST["request"];
	        if($request=="signin")
	        {
	        	echo json_encode(login($_POST['min'],$_POST['max'],$_POST['location'],$_POST['job'],$_POST['comp_details'],$_POST['app']));
	        }
	}


	function login($min,$max,$loc,$job,$com_details,$app_details)
	{
				if($min == "")
		        {
		            $info["ok"]=false;
		            $info["message"]="Minimum salary is required!";
		            return $info;
		        }
		        else if(!is_numeric($min))
		        {
		        	$info["ok"]=false;
		            $info["message"]="Minimum salary must be a number!";
		            return $info;
		        }
                else if($min < 128){
                    $info["ok"]=false;
                    $info["message"]="Minimum salary must not less than to 128 dollar";
                    return $info; 
                }
        //max error handling 
		        else if($max == "")
		        {
		            $info["ok"]=false;
		            $info["message"]="Maximum salary is required!";
		            return $info;
		        }

		       	else if(!is_numeric($max))
		        {
		        	$info["ok"]=false;
		            $info["message"]="Maximum salary must be a number!";
		            return $info;
		        }

		        else if($min > $max)
		        {
		        	$info["ok"]=false;
		            $info["message"]="Maximum salary must be greater!";
		            return $info;
		        }
                //location error handling

		       	else if($loc == "")
		        {
		            $info["ok"]=false;
		            $info["message"]="Location is required!";
		            return $info;
		        }
                else if(strlen($loc) <= 10){
                    
                    $info["ok"]=false;
		            $info["message"]="Location is invalid. Please type a full correct location!";
		            return $info;
                }

		        else if($job == "")
		        {
		            $info["ok"]=false;
		            $info["message"]="Job is required!";
		            return $info;
		        }
                else if(strlen($job) < 5){
                    
                    $info["ok"]=false;
		            $info["message"]="Please enter a correct job name!";
		            return $info;
                }

		        else if($com_details == "")
		        {
		            $info["ok"]=false;
		            $info["message"]="Company details are required!";
		            return $info;
		        }
                else if(strlen($com_details) <=10){
                    $info["ok"]=false;
		            $info["message"]="Company details must have atleast 10 above characters!";
		            return $info;
                }

		     	else if($app_details == "")
		        {
		            $info["ok"]=false;
		            $info["message"]="Application details are required!";
		            return $info;
		        }
                else if(strlen($app_details) <=10){
                    $info["ok"]=false;
		            $info["message"]="Application details must have atleast 10 above characters!";
		            return $info;
                }
        else{
            $info['ok'] = true;
            return $info;
        }
	}
?>
