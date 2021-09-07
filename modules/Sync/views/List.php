<?php
ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
require 'vendor/autoload.php';
//require_once('include/database/PearDatabase.php');

use Salaros\Vtiger\VTWSCLib\WSClient;

class Sync_List_View extends Vtiger_Index_View {
	public function process(Vtiger_Request $request) {
		//$db = PearDatabase::getInstance();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['form']) {
				case "A":
                    $client = new WSClient('http://192.168.99.102/_vtigercrm_2021/webservice.php', 'superadmin', 'MFaeyxCMTmRrUZiE');
                    //$var = $client->modules->getOne('Contacts'));
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
