<?php

class Form{

	private $_sFormName = null;
	private $_sFormAction = null;
	private $_aField = array();
	private $_bFlagPostBack = false;
	private $_iCntField = 0;
	private $_sFlagPostBackName = "IsPostBack";
	private $_aRequestArray = array();
	private $_smarty = null;
	private $_errorFlag = FALSE;
	private $_sError = "";

	function Form($sFormName, $sFormAction, &$smarty = null){
		$this->_sFormName = $sFormName;
		$this->_sFormAction = $sFormAction;
		$this->_smarty = $smarty;
		$this->_smarty->assign("__bFlagIsPostBack__", "IsPostBack");
		$this->_smarty->assign("Config", $this->getConfigForm());
	}

	protected function setFormName($sName){
	    $this->_sFormName = $sName;
	}

	protected function setFormAction($sAction){
	    $this->_sFormAction = $sAction;
	}

	public function addFieldText($sFieldName, $sFieldValue = null, $sFieldCaption, $Register = false){
		$this->_aField[$this->_iCntField]['Register'] = $Register;
		$this->_aField[$this->_iCntField]['Type'] = "text";
		$this->_aField[$this->_iCntField]['Name'] = $sFieldName;
		$this->_aField[$this->_iCntField]['Value'] = (isset($_REQUEST[$sFieldName]) && $_REQUEST[$sFieldName]<>'')?$_REQUEST[$sFieldName]:$sFieldValue;
		$this->_aField[$this->_iCntField]['Caption'] = $sFieldCaption;
		if($this->_smarty<>null){
			$this->_smarty->assign($sFieldName, $this->_aField[$this->_iCntField]);
		}
		$this->_iCntField++;
	}


	public function addCheckBox($sFieldName, $sFieldCaption, $sChecked = '',  $Register = false){
		$this->_aField[$this->_iCntField]['Register'] = $Register;
		$this->_aField[$this->_iCntField]['Type'] = "text";
		$this->_aField[$this->_iCntField]['Name'] = $sFieldName;
		$this->_aField[$this->_iCntField]['Caption'] = $sFieldCaption;
		$this->_aField[$this->_iCntField]['Checked'] = $sChecked;
		if($this->_smarty<>null)
			$this->_smarty->assign($sFieldName, $this->_aField[$this->_iCntField]);
		$this->_iCntField++;
	}


	public function addListBox($sFieldName, $sFieldCaption, $aArray, $sValue, $bKey = false, $iCnt = 1,  $Register = false){
		$this->_aField[$this->_iCntField]['Register'] = $Register;
		$this->_aField[$this->_iCntField]['Type'] = "listbox";
		$this->_aField[$this->_iCntField]['Name'] = $sFieldName;
		$this->_aField[$this->_iCntField]['Caption'] = $sFieldCaption;
		$sValue = (isset($_REQUEST[$sFieldName]) && $_REQUEST[$sFieldName]<>'')?$_REQUEST[$sFieldName]:$sValue;
		//$sOption = "<option value=\"\"></option>";
		$sOption = "";
		foreach($aArray as $key=>$oArray){
			if(!$bKey){
				$sSelectede = ($sValue==$oArray)?"selected":"";
				$sOption .=  "<option value=\"".$oArray."\" $sSelectede>".$oArray."</option>";
			}else{
				$sSelectede = ($sValue==$key)?"selected":"";
				$sOption .=  "<option value=\"".$key."\" $sSelectede>".$oArray."</option>";
			}
		}
		$this->_aField[$this->_iCntField]['Option'] = $sOption;
		if($iCnt>0)
			$this->_aField[$this->_iCntField]['Cnt'] = count($aArray)+1;
		else
			$this->_aField[$this->_iCntField]['Cnt'] = 0;
		if($this->_smarty<>null)
			$this->_smarty->assign($sFieldName, $this->_aField[$this->_iCntField]);
		$this->_iCntField++;
	}

	public function addRadioBox($sFieldName, $sFieldSelected, $sFieldCaption, $Register = false){
		$this->_aField[$this->_iCntField]['Register'] = $Register;
		$this->_aField[$this->_iCntField]['Type'] = "text";
		$this->_aField[$this->_iCntField]['Name'] = $sFieldName;
		$this->_aField[$this->_iCntField]['Selected'] = $sFieldSelected;
		$this->_aField[$this->_iCntField]['Caption'] = $sFieldCaption;
		if($this->_smarty<>null)
			$this->_smarty->assign($sFieldName, $this->_aField[$this->_iCntField]);
		$this->_iCntField++;
	}

	public function setError($sError){
		$this->_sError .= $sError."<br>";
	}

	public function setSmarty(&$smarty){
	    $this->_smarty = $smarty;
	}

	public function FormError($Request){
		$sError = "<font color=\"red\">";
		$sError .= $this->_sError;
		if($this->_sError<>"")
			$this->_errorFlag = TRUE;
		foreach($this->_aField as $Field){

			if(isset($Request[$Field['Name']]) && $Field['Register'] && $Request[$Field['Name']]==NULL){
				$this->_errorFlag = TRUE;
				//$sError .= "Not enter ".$Field['Caption']."<br>";
			}
		}
		$sError .= "</font>";

		$this->_smarty->assign("ERROR_LIST", $sError);
		if($this->_errorFlag)
		    $_SESSION['FORM_ERROR'] = true;
		else
		    $_SESSION['FORM_ERROR'] = false;

		return $this->_errorFlag;
	}

	public function getConfigForm(){
		return array('Name'=> $this->_sFormName, 'Action'=> $this->_sFormAction);
	}

	public function getFieldTextValue($sFieldName){
		if($this->_bFlagPostBack){
			return $_REQUEST[$sFieldName];
		}
	}

	public function isPostBackFlag(){
		if(isset($_REQUEST[$this->_sFlagPostBackName]))
			$this->_bFlagPostBack = $_REQUEST[$this->_sFlagPostBackName];

		return $this->_bFlagPostBack;
	}

	public function getField(){
		return $this->_aField;
	}

	public function setPostBackFlag($sFlagName){
		$this->_sFlagPostBackName = $sFlagName;
	}

}

?>