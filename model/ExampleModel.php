<?php 
class Example{
	
private static $table="users";

public static function login($params=null){
	$user=Database::get(App::DB('main'),'UserName,Password',self::$table,"WHERE UserName = ?",array($params['UserName']));
	if(Password::equals($params['Password'],$user['Password'][0])){Session::write("User",$user['UserName'][0]);return true;}
	else{return false;}
	
	
	}	
	
public static function add_user($params=null){
	//Method 1
	//$add_user=Database::insert(App::DB('main'),self::$table,$params);	
	
	//Method 2 ---> The $params was not passed which can be deleted on your code if using method 2.
	$params =array ("UserName"=>$_POST['UserName'],"Password"=>Password::set($_POST['Password']),"Email"=>$_POST['Email'],
						  "Code"=>App::randcode(),"Photo"=>$_FILES['Photo']['name'],"CreatedOn"=>App::createdon());
	$add_user=Database::insert(App::DB('main'),self::$table,$params);
	
	//Do not comment the below lines.
	return $add_user;
	}
	
public static function resetpwd(){
	
	$resetpwd=Database::get(App::DB('main'),"UserName, Code",self::$table,"WHERE Email = ?",array($_POST['Email']));
	return $resetpwd;
	
	
	}	
	
public  static function setnewpwd(){
	
	$setnewpwd=Database::update(App::DB('main'),self::$table,'Password',Password::set($_POST['Password']), array('Code','=',$_POST['Code']));
	$setnewpwd=Database::update(App::DB('main'),self::$table,'Code',App::randcode(), array('Code','=',$_POST['Code']));
	return $setnewpwd;
	
	}	
	
	}