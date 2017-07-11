<?php

function converttext($text){ // idk why i put it in here but it can maybe help... in the next years... i hope xD
 $text = str_replace("ä", "&auml;", $text);
 $text = str_replace("ö", "&ouml;", $text);
 $text = str_replace("ü", "&uuml;", $text);
 $text = str_replace("Ä", "&Auml;", $text);
 $text = str_replace("Ö", "&Ouml;", $text);
 $text = str_replace("Ü", "&Uuml;", $text);
 $text = str_replace("ß", "&szlig;", $text);
 $text = str_replace("[\\", "[", $text); 
 return $text;
}
 

function maininclude(){
	$o = "";
	$page = "";
	$s = "";
	$sel = "";
	$page = isset($_GET['p']) ? $_GET['p'] : '';
	$s = array();
	
	$s[] = 'home';
	$s[] = 'check';
	if(!empty($page)){
		if(in_array($page, $s)){
			if(file_exists('./include/'.$page.'.php')){
			 	$o = $page;
			} else {
				$o = 'home';
			}
		} else {
			$o = 'home';
		}
	} else {
		$o = 'home';
	}
	return $o.'.php';
}