<?php
//error_reporting(E_ALL & ~E_NOTICE);
//ini_set('display_errors', '1');
require 'vendor/autoload.php';
//require_once('include/database/PearDatabase.php');
use Javanile\VtigerClient\VtigerClient;

class Sync_List_View extends Vtiger_Index_View {
	public function process(Vtiger_Request $request) {
		//$db = PearDatabase::getInstance();
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['form']) {
				case "A":
                    $client = new VtigerClient('http://192.168.99.102/_vtigercrm_2021/');
                    $client->login('superadmin', 'MFaeyxCMTmRrUZiE');
                    $entities = $client->query('SELECT id, cf_1489, cf_1491, contact_id, cf_2177, cf_2119, cf_2067, cf_2025, cf_2141, cf_2059, cf_2179, cf_2183, cf_2069, cf_2115, cf_2035, cf_2033, cf_1527, cf_1513, cf_2071, cf_1471, cf_1479, cf_1475, cf_2145, cf_2143, cf_1481, cf_2157, cf_1465, cf_1477, cf_1473, cf_2147, cf_1463, modifiedtime FROM SalesOrder WHERE modifiedtime >= \'2021-09-08 18:31:37\' ORDER BY modifiedtime DESC LIMIT 0, 100;');
                    if (false !== $entities) {
                        print "<pre>";
                        print_r($entities);
                        print "</pre>";
                    } else {    
                        $var = ('Entities doesn\'t exists!' . PHP_EOL);
                    }
					break;
			}
		} else {
			$var = 'Waiting for Sync!';
            #$var = '$Contact[id]';
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