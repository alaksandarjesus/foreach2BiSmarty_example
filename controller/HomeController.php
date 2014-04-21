<?php 

class HomeController{
	
	public function index(){
		
		return View::render("home/index");
		
	
		}	
	
		public function credits(){
		
		return View::render("home/credits");
		
	
		}
	
	
	}