<?php

require_once("module/classes/BaseModule.class.php");

class Table{

	private $aConfTable = array();
	private $aColumn = array();
	private $aResultSQL = array();
	private $iCntRow = 0;
	private $sFunctionMotley = "motleyRow";
	private $oObject = "this";
	private $oBaseModule = null;
	private $sName = '';
	private $CntPage = 2;
	private $Page = 0;
	private  $oDB = null;
	private $count_rows = 0;
	
	private $bAct = true;
	private $bChecked = true;
	private  $counts = null;
	
	function Table($sTName = null, $bAct = true, $bChecked = true){
	    $this->sName = $sTName;
	    $this->bAct = $bAct;
	    $this->bChecked = $bChecked;
	    $this->oBaseModule = new BaseModule();	    
	    $this->Page = $_GET['page'];
	}

	public function addColumnInTable($ColumnName, $ColumnRow, $width, $bType = true, $sortable = false){
		$this->aColumn[$this->iCntRow]['ColumnName'] = $ColumnName;
		$this->aColumn[$this->iCntRow]['ColumnRow'] = $ColumnRow;
		$this->aColumn[$this->iCntRow]['width'] = $width;
		$this->aColumn[$this->iCntRow]['Type'] = $bType;
		$this->aColumn[$this->iCntRow]['Sortable'] = $sortable;
		$this->aColumn[$this->iCntRow]['Key'] = str_replace(" ", "_",strtoupper($ColumnName));
		$this->iCntRow++;
	}

	private $ot = 0;
	private $do = 10;
	private $all = 10;
	private $sorting = "";
	
	function getCount($aResultSQL){
		$ex = explode("FROM ", $aResultSQL);
		unset($ex['0']);		 
		$count = DB::query_row("SELECT COUNT(DISTINCT(".$this->count_field.")) as count FROM ".implode(" ", $ex));		
		return $count['count'];
	}
	
	public function setResultSQL($aResultSQL){		
		
		$page = ($this->Page-1)*$this->CntPage;		
		
		$this->do = $page+$this->CntPage;
		
		$this->all = $this->getCount($aResultSQL.$this->where);
		
		if ($this->all != 0)
			$this->ot = $page+1;
		if($this->all<$this->do)
			$this->do = $this->all;
		
		$aResultSQL = str_replace('ORDER BY `id` DESC', '', $aResultSQL);
		
		
		$this->counts = $this->getCount($aResultSQL.$this->where);		
		
		
		if(!isset($_REQUEST['row']))
			$this->aResultSQL = DB::query_array($aResultSQL." ".$this->where." LIMIT ".$page.", ".$this->CntPage);
		else		
			$this->aResultSQL = DB::query_array($aResultSQL." ".$this->where." ORDER BY `".$_REQUEST['row']."` ".$_REQUEST['order']." LIMIT ".$page.", ".$this->CntPage);		
		
	}
	
	public function showSort(){ 		
		$row = DB::query_array("SHOW COLUMNS FROM `".$this->table."`");		
		$query = "ALTER TABLE `".$this->table."` ADD `sort` INT( 11 ) NOT NULL ;";
		DB::query($query);
		DB::query("UPDATE `".$this->table."` SET `sort` = id WHERE `id` = id");
	}

	public function motleyRows($aRow, $oRow){	
		$table = $this->table;
		$sTable = "";
		$oRow = call_user_func(array($this->oObject, $this->sFunctionMotley), $oRow);
		foreach($aRow as $oColumn){
			if($oColumn['Type']){
				if($oColumn['ColumnRow'] == "id"){
					if($this->bChecked)
						$sTable .= "<td class='first tc' style='width:".$oColumn['width'].";'><input name='id_check[]' class='check_id' value='".$oRow[$oColumn['ColumnRow']]."' type='checkbox'></td>";
				}elseif($oColumn['ColumnRow'] == "action"){
					if($this->bAct){			
						$sTable .= '<td class="first tc" style="width:'.$oColumn['width'].';">';									
						$sTable .= '<a class="btn btn-primary btn-xs" title="Редактировать страницу" href="/admin/'.$_GET['region'].'/'.$this->class.'/Edit/?table='.$this->table.'&id='.$oRow['id'].'&req='.base64_encode(serialize($_SERVER['REQUEST_URI'])).'"><i class="fa fa-pencil"></i></a> ';	
						$sTable .= '</td>';
					}
				}else{
					if(!isset($oRow[$oColumn['ColumnRow']]))
						$oRow[$oColumn['ColumnRow']] = null;						
					$sTable .= "<td  style='width:".$oColumn['width'].";'>".$oRow[$oColumn['ColumnRow']]."</td>";
				}				
			}else{
			}
		}
		return $sTable;
	}


	public function setMotleyFunction($sClasses, $sFunction){
		$this->oObject = $sClasses;
		$this->sFunctionMotley = $sFunction;
	}

	public function setTableConfig($aResultRow){
	    $this->aResultSQL = $aResultRow;
	}



	public function setCntByPage($iCnt){
		$this->CntPage = $iCnt;
	}
	

	public function setPage($iPage){
		$this->Page = $iPage;
	}

	public function getResultSQL(){
		return $this->aResultSQL;
	}
	
	private  $order = "";

	public function render($sVisible = false, $bNavigation = true, $btn = array()){		
		$this->oBaseModule->oSmarty->assign("btn", $btn);
		//init 
		$sTable = null;
		$sTitle = null;
		$sLine = null;
		$sElLine = null;
		$iColSpan = 0;
		
		//echo $this->counts."|".$this->CntPage;die();
		$sNavigation = $this->oBaseModule->getNavigation($this->counts, $this->CntPage, "/admin/".$_GET['region']."/".$_GET['class']."/Show/", $this->Page, 15);
		
		$ex = explode('&order', $_SERVER['REQUEST_URI']);
		
		
		
		foreach($this->aColumn as $Column){
		    if($Column['Type']){
		    	$this->count_rows++;
		    	$iColSpan++;		    	
		    	$this->oBaseModule->oSmarty->assign("COLUMN", $Column);
		    	if($Column['ColumnRow'] == "id"){
		    		if($this->bChecked)
		    			$sTitle .= $this->oBaseModule->oSmarty->fetch("Web/Table/ElTitleId.tpl");
		    	}else
		    		$sTitle .= $this->oBaseModule->oSmarty->fetch("Web/Table/ElTitle.tpl");
		    }
		}	
				
		$i=0;		
		$aResultSQL = $this->getResultSQL();
		
		$z = 0;		
		foreach($aResultSQL as $aRow){						
			$aRow['z'] = $z;
			if($z == 0)
				$z = 1;
			else
				$z = 0;
			$this->oBaseModule->oSmarty->assign("El_LINE", $this->motleyRows($this->aColumn, $aRow));
			$this->oBaseModule->oSmarty->assign("class", ($z==1)?"odd":"even");
			$sLine .= $this->oBaseModule->oSmarty->fetch("Web/Table/Line.tpl");
			$i++;
		}
		
		if($i==0){
			$this->oBaseModule->oSmarty->assign("COLSPAN", $iColSpan);
			$sLine .= $this->oBaseModule->oSmarty->fetch("Web/Table/LineNull.tpl");
		}
		
		
		$this->oBaseModule->oSmarty->assign("ot", $this->ot);
		$this->oBaseModule->oSmarty->assign("do", $this->do);
		$this->oBaseModule->oSmarty->assign("all", $this->all);

		
						
		$this->oBaseModule->oSmarty->assign("NAVIGATION", $sNavigation);
		$this->oBaseModule->oSmarty->assign("LINE", $sLine);
		$this->oBaseModule->oSmarty->assign("TITLE", $sTitle);
		$this->oBaseModule->oSmarty->assign("count_rows", $this->count_rows);

		return $this->oBaseModule->oSmarty->fetch("Web/Table/Index.tpl");
	}
	
	private $table = null;
	private $where = null;
	private $class = null;
	private $count_field = "id";
	
	function getTable($obj, $class, $table, $field = array(), $cntpage = 1, $btn = array(), $where = null, $query = null, $count_field = "id"){
		
		$this->where = $where;
		$this->table = $table;
		$this->class = $class;
		$this->count_field = $count_field;
		
		$this->setCntByPage($cntpage);		
		if (!$query)
			$res = ("SELECT * FROM `".$table."` ");
		else 
			$res = $query;
			
		$this->setResultSQL($res);	
		
		$this->setMotleyFunction($obj, 'table');	
		
		$this->addColumnInTable("", "id", "5%", true);
		
		foreach ($field as $k=>$v){
			$this->addColumnInTable($v['0'], $k, $v['1'], true, $v['2']);	
		}
		if($this->bAct){
			$this->addColumnInTable("Действия", "action", "15%");
		}
		return $this->render(false, true, $btn);			
	}

}

?>