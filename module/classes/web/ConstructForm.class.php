<?php

require_once("module/classes/web/Form.class.php");

class ConstructForm extends Form{

    private  $_aArrFields = array();
    private $_smarty = null;
    private $aArr = array();
    private $aArrModule = array();
    private $aArrTitle = array();
	private $sName = null;
	private $sEditName = null;
	
    
    
    public function ConstructForm($smarty, $name = null){
    	$this->_errorFlag = false;
		 $this->_smarty = $smarty;
		 $this->sName = $name;
    }
    
    public function setEditName($name){
    	$this->sEditName = $name;
    }
    
    public function getEditName(){
    	return $this->sEditName;
    }

    
    public function getFormName(){
    	return $this->sName;
    }

    public function setFields($aArr, $iModule = null, $sTitle = null){
		$this->aArrModule[] = $iModule;
		$this->aArrTitle[] = $sTitle;
		$this->aArr[$iModule] = $aArr;
    }

    function setFields2($module, $title){    	
    	$this->aArrTitle[] = $title;    	    	
    	$this->aArr[$module] = $this->aArrs[$module];
    }
    
    public function getFormModule($iModule, $sModuleName = null){
		$sFormReturn  = null;
		$sForm = null;
		
		foreach($this->aArr[$iModule] as $aFields){
		    $sValue = (!isset($_REQUEST[$aFields['Name']]) || $_REQUEST[$aFields['Name']]==null)?$aFields['Value']:$_REQUEST[$aFields['Name']];
		    $aFields['Value'] = $sValue;
		    	if($aFields['Type'] == 'text'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldString($aFields);
	    	    }elseif($aFields['Type'] == 'mtext'){	    	    	
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldStringM($aFields);
	    	    }elseif($aFields['Type'] == 'text_pro'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldStringPro($aFields);
	    	    }else if($aFields['Type'] == 'fck'){		    		
					$sForm .= $this->getFCKString($aFields);
	    	    }else if($aFields['Type'] == 'checkbox'){	    	    	
	    	    	
					$this->addCheckBox($aFields['Name'], $aFields['Caption'], $sValue, $aFields['TRUE']);
					$sForm .= $this->getCheckBoxString($aFields);
				}else if($aFields['Type'] == 'select'){
					$this->addListBox($aFields['Name'], $aFields['Caption'], $aFields['Arr'], (isset($_REQUEST[$aFields['Name']]))?$_REQUEST[$aFields['Name']]:array(),false, $iCnt = 1,  $aFields['TRUE']);
					$sForm .= $this->getSelectString($aFields, $aFields['Arr']);
				}else if($aFields['Type'] == 'select_m'){
					$this->addListBox($aFields['Name'], $aFields['Caption'], $aFields['Arr'], (isset($_REQUEST[$aFields['Name']]))?$_REQUEST[$aFields['Name']]:array(),false, $iCnt = 1,  $aFields['TRUE']);
					$sForm .= $this->getSelectMany($aFields, $aFields['Arr']);
				}elseif($aFields['Type'] == 'upload'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldUpload($aFields);					
				}elseif($aFields['Type'] == 'photo'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldPhoto($aFields);					
				}elseif($aFields['Type'] == 'manyphoto'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldManyPhoto($aFields); 					
				}elseif($aFields['Type'] == 'textpro'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldTextpro($aFields);									
				}elseif($aFields['Type'] == 'date'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getDatepicker($aFields);					
				}elseif($aFields['Type'] == 'hidden'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getHidden($aFields);					
				}elseif($aFields['Type'] == 'textt'){ 
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getText($aFields);					
				}
		}
		$this->_smarty->assign("iModule", $iModule);
		$this->_smarty->assign("sForm", $sForm);
		$sFormReturn .= $this->_smarty->fetch("Web/iTabForm.tpl");
		
		return $sFormReturn;
    }

    private $funcClass = null;
    private $funcMethod = null;
    private $m = array();
    private $aArrs = array();
    
    function setField($type, $name, $caption, $true, $module, $value = null, $text=null, $var = array(), $filter = null){
    	if(!isset($this->m[$module]))
    		$this->m[$module] = 0;
    	else
    		$this->m[$module]++;       	
	 		 	
    	$this->aArrs[$module][$this->m[$module]]['Text'] = $text;
    	$this->aArrs[$module][$this->m[$module]]['Arr'] = $var;
	    $this->aArrs[$module][$this->m[$module]]['Type'] = $type;
	    $this->aArrs[$module][$this->m[$module]]['Name'] = $name;
	    $this->aArrs[$module][$this->m[$module]]['Caption'] = $caption;
	    $this->aArrs[$module][$this->m[$module]]['TRUE'] = $true; 
	    if(!isset($value[$name]))
	    	$value[$name] = null;
	    $this->aArrs[$module][$this->m[$module]]['Value'] = (isset($_REQUEST[$name]))?$_REQUEST[$name]:$value[$name];	    		    
	    
	    if(count($_POST) > 0){	    	
		    if($filter != null){	    		    		    		    	
	    		if(!call_user_func(array("Filter", $filter), $this->aArrs[$module][$this->m[$module]]['Value'])){    			
	    			$this->_errorFlag = TRUE;
	    			$this->aArrs[$module][$this->m[$module]]['Error'] = true; 
	    		}
	    	}    	
	    	if(trim($this->aArrs[$module][$this->m[$module]]['Value']) == '' && $true){
	    		$this->_errorFlag = TRUE;
	    		$this->aArrs[$module][$this->m[$module]]['Error'] = true; 
	    	}
	    } 
	    
    }

    function getField($module){
    	return $this->aArrs[$module];
    }
    
    public function setFunctionPostBack($class, $func){
		$this->funcClass = $class;
		$this->funcMethod = $func;
    }

    public function getForm($sFormName = null, $sAction = null){
		$sForm = "<div style='border-bottom:1px solid #CCC;height:30px;'>
		";
		$i = 0;
		
		if(count($this->aArrModule) > 1){
			foreach($this->aArrModule as $iModule){	
				if($this->aArrTitle[$i] != ''){
					$this->_smarty->assign("itab", array('name'=>$this->aArrTitle[$i], 'id'=>$i));
					$sForm  .= $this->_smarty->fetch("Web/iTab.tpl");
				}
				$i++;			
			}
		}
		
		$sForm .= "</div>
		";
		$i = 0;
		foreach($this->aArrModule as $iModule){
		    $sForm .= $this->getFormModule($iModule, $this->aArrTitle[$i]);
		    $i++;
		}

		$this->setPostBackFlag('bFlagIsPostBack');

		$this->_smarty->assign("__bFlagIsPostBack__", "bFlagIsPostBack");
		$this->setFormName($sFormName);
		$this->setFormAction($sAction);
		$this->_smarty->assign("frmConfig", $this->getConfigForm());
		$this->setSmarty(&$this->_smarty);
		if($this->isPostBackFlag()){
			
			if(!$this->_errorFlag){							
			    call_user_func(array($this->funcClass, $this->funcMethod));
			}else{
				$this->_smarty->assign("ERROR", 1);
			}
		}
		$this->_smarty->assign("FORM", $sForm);
		return $this->_smarty->fetch("Web/Form.tpl");
    }

    public function getFCKString($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/FCK.tpl");
    }
    
    public function getHidden($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/FieldHidden.tpl");
    }

    public function getFieldString($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Field.tpl");
    }
    
    public function getFieldStringM($aField){
    	$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/FieldM.tpl");
    }

    public function getFieldStringPro($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/FieldPro.tpl");
    }    
    
    public function getCheckBoxString($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/CheckBox.tpl");
    }
    
    public function getDatepicker($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Datepicker.tpl");
    }

    public function getSelectString($aField, $aArr){
		$this->_smarty->assign("Field", $aField);
		$this->_smarty->assign("Option", $aArr);
		return $this->_smarty->fetch("Web/Select.tpl");
    }
    
    public function getSelectMany($aField, $aArr){
		$this->_smarty->assign("Field", $aField);
		$this->_smarty->assign("Option", $aArr);
		return $this->_smarty->fetch("Web/SelectMany.tpl");
    }
    
    public function getFieldUpload($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Upload.tpl");
    }    
    
    public function getText($aField){
    	$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Text.tpl");
    }
    
    public function getFieldPhoto($aField){
		$height = 150;
    	$width = 200;
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Photo.tpl");
    }  
    
    public function getFieldManyPhoto($aField){    	    
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/ManyPhoto.tpl");
    }      
    
   public function getFieldTextpro($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Textpro.tpl");
    } 

}


?>