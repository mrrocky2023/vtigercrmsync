<?php
ini_set('display_errors','1'); 
require_once('include/database/PearDatabase.php');

class Sync_List_View extends Vtiger_Index_View {

        public function process(Vtiger_Request $request) {
		$db = PearDatabase::getInstance();
		//$target_file = 'user_privileges/sharing_privileges_1.php';
		//$content = file_get_contents($target_file);
		//$output = Shell_exec("ls user_privileges");
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			switch ($_POST['form']) {
			case "A":
				echo 'Sync Now!';
			case "B":
			    $strQuery = $_POST['strQueryClient'];
			    break;
			}
		} else {
			$strQuery = "SELECT vtiger_contactdetails.firstname, vtiger_contactdetails.lastname,vtiger_attachments.attachmentsid,vtiger_notes.notesid,path,filename,filesize,filetype,name FROM vtiger_attachments INNER JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid INNER JOIN vtiger_notes ON vtiger_notes.notesid = vtiger_seattachmentsrel.crmid inner join vtiger_senotesrel on vtiger_senotesrel.notesid= vtiger_notes.notesid inner join vtiger_contactdetails on vtiger_senotesrel.crmid = vtiger_contactdetails.contactid limit 0,10";
		}
		
              	$records = array();
              	$rs = $db->pquery($strQuery);
              	
         	while ($data = $db->fetch_array($rs)) {
                                $records[] = $data;
                }
                
       	$viewer = $this->getViewer($request);
       	$viewer->assign('COMPLETE', $rs);
             	$viewer->assign('RECORDS', $records);
             	$viewer->assign('CONTENTS', $content);
             	$viewer->assign('OUTPUT', $output);
            	$viewer->view('List.tpl', $request->getModule());
        }

}
