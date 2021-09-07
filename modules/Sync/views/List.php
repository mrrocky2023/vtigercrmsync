<?php
ini_set('display_errors','1'); 
require_once('include/database/PearDatabase.php');

class Sync_List_View extends Vtiger_Index_View {
	public function process(Vtiger_Request $request) {
		$db = PearDatabase::getInstance();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['form']) {
				case "A":
					$AccessKey='MFaeyxCMTmRrUZiE';
					$User='superadmin';
					$URL='http://192.168.99.102/_vtigercrm_2021/webservice.php?';
					$Token='';
					$param=array("operation" => "getchallenge", "username" => $User);
      				//$result=$this->curl_execution($URL,$param,$type = "GET");
					$var = "result";
					break;
			}
		} else {
			$var = 'Waiting for Sync!';
		}
		/*
		$records = array();
        $rs = $db->pquery($strQuery);
		while ($data = $db->fetch_array($rs)) {
			$records[] = $data;
		}
		*/
       	$viewer = $this->getViewer($request);
       	$viewer->assign('VAR', $var);
		$viewer->view('List.tpl', $request->getModule());
    }
}
