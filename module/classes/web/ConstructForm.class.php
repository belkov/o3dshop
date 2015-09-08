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
		$sForm  = "";

		if($sModuleName <> null)
		    $sForm .= "<div style='width:100%;text-align:left;padding-bottom: 10px;'>".$sModuleName."</div>";
		$sForm .= "<table style='padding:5px;margin-bottom:15px;color:#FFF;text-align:right;width:98%;background-color:#FAF4E5; border:1px solid #DFD3B5;'>";

		foreach($this->aArr[$iModule] as $aFields){
		    $sValue = (!isset($_REQUEST[$aFields['Name']]) || $_REQUEST[$aFields['Name']]==null)?$aFields['Value']:$_REQUEST[$aFields['Name']];
		    $aFields['Value'] = $sValue;
		    if($aFields['Type'] == 'text'){
	    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
	    		$sForm .= $this->getFieldString($aFields);
	    	    }elseif($aFields['Type'] == 'text_pro'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getFieldStringPro($aFields);
	    	    }else if($aFields['Type'] == 'fck'){		    		
					$sForm .= $this->getFCKString($aFields);
	    	    }else if($aFields['Type'] == 'checkbox'){	    
	    	    	if($sValue == 1){
	    	    		$aFields['Text'] .= ' checked';
	    	    	}
					$this->addCheckBox($aFields['Name'], $aFields['Caption'], $aFields['Text'], $aFields['TRUE']);
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
				}elseif($aFields['Type'] == 'button'){
		    		$this->addFieldText($aFields['Name'], $sValue, $aFields['Caption'], $aFields['TRUE']);
		    		$sForm .= $this->getButton($aFields);					
				}
		}

		$sForm .="</table>";

		return $sForm;
    }

    private $funcClass = null;
    private $funcMethod = null;
    private $m = array();
    private $aArrs = array();
    
    function setField($type, $name, $caption, $true, $module, $value = null, $text=null, $var = array()){
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
    }

    function getField($module){
    	return $this->aArrs[$module];
    }
    
    public function setFunctionPostBack($class, $func){
		$this->funcClass = $class;
		$this->funcMethod = $func;
    }

    public function getForm($sFormName = null, $sAction = null){
		$sForm = "";
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
			if(!$this->FormError($_REQUEST)){							
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
    
    public function getButton($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Button.tpl");
    }

    public function getFieldString($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Field.tpl");
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
    
    public function getFieldPhoto($aField){


$height = 150;
    		$width = 200;
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Photo.tpl");
    }  
    
    public function getFieldManyPhoto($aField){
    	if (isset($aField['Text'])){
    		$ex = explode (',', $aField['Text']);
    		$height = $ex['1'];
    		$width = $ex['0'];
    	}
    	else {
    		$height = 150;
    		$width = 200;
    	}
    	$this->_smarty->assign("height", $height);
    	$this->_smarty->assign("width", $width);
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/ManyPhoto.tpl");
    }      
    
   public function getFieldTextpro($aField){
		$this->_smarty->assign("Field", $aField);
		return $this->_smarty->fetch("Web/Textpro.tpl");
    } 

}


?>