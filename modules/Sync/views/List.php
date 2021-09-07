<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require 'vendor/autoload.php';
use Salaros\Vtiger\VTWSCLib\WSClient;
//require_once('include/database/PearDatabase.php');

class Sync_List_View extends Vtiger_Index_View {
    $client = new WSClient('http://192.168.99.102/_vtigercrm_2021/', 'superadmin', 'MFaeyxCMTmRrUZiE');
	public function process(Vtiger_Request $request) {
		//$db = PearDatabase::getInstance();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['form']) {
				case "A":
                    $var = $client->entities->findOne('Contacts', [
                        'firstname'             => 'HAYDEE',
                        'lastname'              => 'VILLARREAL',
                    ], [
                        'id',
                        'salutationtype',
                        'firstname',
                        'lastname',
                        'email',
                        'phone'
                    ]);
                    if (false !== $var) {
                        print_r($var);
                    } else {
                        echo('John Smith\'s record doesn\'t exists!' . PHP_EOL);
                    }
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
