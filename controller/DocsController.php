<?php 

class DocsController{
	
	public function index(){
		
		return View::render("docs/index/installation");
		
		}	
	
	public function config(){
		
		return View::render("docs/index/configuration");
		
		}	
		
		public function database(){
		
		return View::render("docs/index/database");
		
		}
	public function mail(){
		
		return View::render("docs/index/mail");
		
		}
		
	public function mime(){
		
		return View::render("docs/index/mime");
		
		}	
		
	public function page(){
		
		return View::render("docs/index/page");
		
		}
		
	public function message(){
		
		return View::render("docs/index/message");
		
		}
	
	public function smarty(){
		
		return View::render("docs/index/smarty");
		
		}	
	
	public function controller(){
						
			return View::render("docs/controller");
	
	}		
	
	public function view (){
			
			$smarty['var1'] = "Variable 1";
			$smarty[]=array("var2"=>"Variable 2");			
			$smarty[]=array("var3"=>array("Variable 3"));	
			$smarty[]=array("var4"=>array("var4a"=>"Variable 4"),"var5"=>"Variable 5");	
			$smarty[]=array("var6"=>array("var6a"=>array("Variable 6","Variable 7")),"var8"=>"Variable 8");	
			
			return View::render("docs/view",$smarty);
		
		}
	public function form(){
		
				return View::render("docs/html/form");
						
			}
	public function validation(){
		
				return View::render("docs/html/validation");
						
			}		
	public function redirect(){
		
				return View::render("docs/html/redirect");
						
			}
		
	public function pagination(){
		
				return View::render("docs/html/pagination");
						
			}
		
	public function model(){
		
				return View::render("docs/model");
						
			}		
	public function helpers(){
		
				return View::render("docs/html/helpers");
						
			}		

}	
	
	
	