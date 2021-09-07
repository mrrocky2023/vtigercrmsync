<?php
ini_set('display_errors','1'); 
require_once('include/database/PearDatabase.php');

class Sync_List_View extends Vtiger_Index_View {
	public function process(Vtiger_Request $request) {
		$db = PearDatabase::getInstance();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['form']) {
				case "A":
					$var = 'Sync Now!';
			}
		} else {
			echo $var = 'Waiting for Sync!';
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
