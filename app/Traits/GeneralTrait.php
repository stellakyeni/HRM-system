<?php

namespace App\Traits;
// use EmailTrait;
use App\CustomClasses\NTLM\NTLMSoapClient;

trait GeneralTrait
{
	public $formControlClasses = "shadow appearance-none border w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline disabled:opacity-40";
	public $validationErrorClasses = "border-red-600";
	public $formLabelClasses = "text-gray-700 text-xs mb-2";

    public function updateVariable($xScope,$varName,$varValue){
        if(strpos($varName, 'session_') !== false) {
            $sessionVariable = substr($varName, strpos($varName, "session_") + 1);
            session()->forget($sessionVariable);
        }
        elseif(strpos($varName, 'flash_') !== false) {
            $sessionVariable = substr($varName, strpos($varName, "flash_") + 1);
            session()->flash($sessionVariable,$varValue);
        }
        elseif($varName == 'validationErrors'){
            $this->resetValidation();
        }
        elseif($varName == 'validationErrors'){
            $this->resetValidation();
        }
        elseif(strpos($varName, 'session_') !== false) {
            $sessionVariable = substr($varName, strpos($varName, "session_") + 1);
            session()->forget($sessionVariable);
        }
        elseif($xScope == 'xCurrent'){
            $this->$varName = $varValue;
        }
        elseif($xScope == 'xParent'){
            $this->emitUp('xCurrent',$varName,$varValue);
        }
    }
    public function saveEmail($data){
        $service = new NTLMSoapClient(config('app.webService'));
        $params = new \stdClass();
        $params->subject = $data['subject'];
        $params->receiver = $data['receiver'];
		$params->sender = config('app.company')['email'];
		$params->noSeries = "EMAIL";
        $params->category = $data['category'];
        $params->messageDesc1 = substr($data['message'],0,250);
        $params->messageDesc2 = strlen($data['message']) > 250? substr($data['message'],250,500):'';
        $params->messageDesc3 = strlen($data['message']) > 500? substr($data['message'],500,750):'';
        $params->messageDesc4 = strlen($data['message']) > 750? substr($data['message'],750,1000):'';
        $result = $service->SaveEmail($params);
        if($result->return_value == 1){
            return true;
        }
        return false;
    }

}
