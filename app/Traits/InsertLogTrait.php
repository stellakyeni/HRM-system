<?php

namespace App\Traits;
// use EmailTrait;
//
trait InsertLogTrait
{
	public function InsertLog($type, $message, $section){
		$victim = "";
		if(session('authUser') != null && session('authUser')['userCategory'] != null){
			if(session('authUser')['userCategory'] == "gsp"){
				$victim = "(GSP ADM NO-".session('authUser')['Admission No_'].")";
			}
			elseif(session('authUser')['userCategory'] == "ssp"){
				$victim = "(SSP APP NO-".session('authUser')['Applicant Id Number'].")";
			}
		}
		$errorMessage = $message.$victim;
        error_log("\n[".date('d/m/Y h:i:s')."] Error type = ".$type.", Section = ".$section.", Error Message = ".$errorMessage, 3, "../storage/logs/custom-log.log");
		// //send email to IT administrator
		// $email = [
		// 	'subject' => 'Online Ap  plication Portal Error',
		// 	'receiver' => config('app.errorsReceiver'),
		// 	'message' => date('d/m/Y h:i:s').': '.$errorMessage,
		// 	'category' => 1
		// ];
		// $isEmailSent = $this->saveEmail($email);
	}
}
