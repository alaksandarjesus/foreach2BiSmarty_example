<?php 
class ExampleController{
	
public function index(){
		$smarty["Welcome"]="Welcome to the Example Application.";
		return View::render("example/index",$smarty);
	}	

public function login(){
		$validate = Validator::input($_POST, array ("UserName"=>"required|alpha_numeric|does_exist:main,users,UserName",
																	  "Password"=>"required|alpha_numeric"));
																	  
		if($validate)	{
			$authenticate_user=Example::login($_POST);
			if($authenticate_user){
				$smarty['message']="Login Successful";
				 Redirect::to('example/user',$smarty);
				}
			else{
					$smarty['message']=App::message("error.login");
					return Redirect::back($smarty);
				}
			}
		else{return Redirect::back();}																  
	}
	
public function user(){

	$smarty[]=Database::get(App::DB('main'),"UserName, Email, Photo","users");
	return View::render('example/pagination',$smarty);
	}

public function logout(){
	Session::close();
	return Redirect::to("example/index");
	
	}		
		
public function forgotpwd(){
	

	return View::render('example/forgotpwd');
	
	}		

public function resetpwd(){
	
	$validate = Validator::input($_POST,array("Email"=>"required|email|does_exist:main,users,Email"));
	if($validate){
		//Get UserName and Code to reset the password.
			$usercredentials=Example::resetpwd();
		//Specify Email Parameters as sender address, subject. Uses PHP mailer. Check PHPmailer documentation.
			$mail_phpmailer['Subject']="Request to reset password";
			$mail_phpmailer['AddAddress']=array($_POST['Email'],$usercredentials['UserName'][0]);
		//Specify Email Template to send to requester.
			$mail_template['UserName']=$usercredentials['UserName'][0];
			$mail_template['Code']=$usercredentials['Code'][0];
			$sendemail=Mail::send('emails/example/forgotpwd',$mail_template,$mail_phpmailer);
			if($sendemail){
				$smarty['message']="A email has been delivered to the specified email address to reset your password";				
				return Redirect::to("example/index",$smarty);
				}else{
					$smarty['message']="Error resetting password. Contact Administrator";				
				return Redirect::to("example/index",$smarty);
					}
		}else{Redirect::back();}
	
	}
	public function register(){

	return View::render('example/register');
	
	}	
	
	public function setpwd($code){
			
			$smarty['Code']=$code[0];
			return View::render('example/setpwd',$smarty);	
		
		}	
		
	public function setnewpwd(){
			
			$validate = Validator::input($_POST,array("Password"=>"required|alpha_numeric",
																		"Code"=>"required|does_exist:main,users,Code"));
																		
			if($validate){ $setnewpwd=Example::setnewpwd();
				
								if($setnewpwd){$smarty['message']="Password successfully set";Redirect::to('example/index',$smarty);}
											else{$smarty['message']="Password successfully not set";Redirect::back();}
				}																
			else{Redirect::back();}
		}
	
	public function newuser(){
		$validate_post = Validator::input($_POST, array ("UserName"=>"required|alpha_numeric|does_not_exist:main,users,UserName",
																			 "Password"=>"required|alpha_numeric",
																			  "Email"=>"required|email|does_not_exist:main,users,Email"
																	  ));
		$validate_file = Validator::file(array("Photo"=>$_FILES["Photo"]), array("name"=>"required|does_not_exist:main,users,Photo|file_not_exists:assets/images",
																											   "type"=>"mime:jpg,gif,png","size"=>"size_between:5,55"));	
		if($validate_file && $validate_post){
			//Method 1
		/*	$_POST['Password']=Password::set($_POST['Password']);	
			$_POST['Photo']=$_FILES['Photo']['name'];
			$_POST['Code']=App::randcode();
			$_POST['CreatedOn']=App::createdon();
			$add_user = Example::add_user($_POST);*/
			
			//Method 2
			$add_user = Example::add_user();
			
			//Do not comment the below line.
			if($add_user){$uploadfile=App::file_upload("Photo","assets/images");
								 $smarty['message']="Registration Successful";
								 Redirect::to("example/index",$smarty);}
			
			}
			
		else{Redirect::back();}		
		
														  
																  
	}
		
}