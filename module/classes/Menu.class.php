<?php

class Menu{

	function __construct(){
		
	}
	
	private $menu = array();
	private $i = 0;
	
	function setMenuParent($name, $link){
		$this->i++;
		$this->menu[$this->i]['item'] = array('name'=>$name, 'link'=>$link);
		return $this->i;
	}
	
	function setMenuSubParent($name, $link, $parent_id){
		$this->menu[$parent_id]['items'][] = array('name'=>$name, 'link'=>$link);
	}
	
	function getMenu(){
		return $this->menu;
	}
	
}


?>  