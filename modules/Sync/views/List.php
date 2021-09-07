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
      				$result=$this->curl_execution($URL,$param,$type = "GET");
					$var = $result;
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
	public static function curl_execution($url, $params, $type = "GET") {
		$is_post = 0;
		$return = null;
		// Set the url by identifying the type: GET or POST
		if ($type == "POST") {
			$is_post = 1;
		} else {
			 $url = $url . "?" . http_build_query($params);
		}
 
		try {
			 $ch = curl_init($url);  // initialize curl handle
 
			 if ($is_post) {    // POST Operation
 
				  if($params['operation'] == 'update'){
 
					  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					  curl_setopt($ch, CURLOPT_POST, $is_post);
					  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);  // For update operation : Passing the parameters here
				  } else{
					  curl_setopt($ch, CURLOPT_POST, $is_post);
					  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
				  }
 
			  }
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  $data = curl_exec($ch);
 
			  if ($data === false) {
				  $return = " Curl Error : ".curl_error($ch);
			  } else {
				  $return = json_decode($data, true);  // decode the output from curl
			  }
			  curl_close($ch);   // Close curl handle
	   }
	   catch(Exception $e){
 
			 $return='Error: Invalid URL' . $e->getMessage();
	   }
 
	   return $return;
	}
}
