<?php return array(


/*	Debugging Error Mode should be set true only on development mode
 	WARNING! It is downright _DANGEROUS_ to use this in production, on a live website. It should *ONLY* be used for development.
	PHP Error will kill your environment at will, clear the output buffers, and allows HTML injection from exceptions. 
 	In future versions it plans to do far more then that.
	If you use it in development, awesome! If you use it in production, you're an idiot.
  	Refer : http://www.phperror.net/
  	Avoid <meta charset="utf-8"> for better performance of the error class in development mode.
*/ 


'debug'=>true,

//Specify default controller
'DefaultController'=>'home',

//Specify default function
'DefaultMethod'=>'index',

//Specify URL.
//Dont forget to add a backslash at the end.
'url' =>'http://localhost/foreach2BiSmarty_example/',


//Set default timezone.
//Use App::createdon() to display time

'timezone' =>'Asia/Calcutta',

//Use Keygenerator.php from the root folder. or 
//Any algorithm to generate your own 32 string length key. Use Only alphanumerics.
'key'=>"91ea2118bca09787e9bfb0404659b5f7",


'use_page_class'=>true,





















);
