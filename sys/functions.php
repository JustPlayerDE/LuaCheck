<?php

function converttext($text){ // idk why i put it in here but it can maybe help... in the next years... i hope xD
 $text = str_replace("�", "&auml;", $text);
 $text = str_replace("�", "&ouml;", $text);
 $text = str_replace("�", "&uuml;", $text);
 $text = str_replace("�", "&Auml;", $text);
 $text = str_replace("�", "&Ouml;", $text);
 $text = str_replace("�", "&Uuml;", $text);
 $text = str_replace("�", "&szlig;", $text);
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