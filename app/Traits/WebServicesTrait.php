<?php

namespace App\Traits;

use App\Traits\InsertLogTrait;
use SaintSystems\OData\ODataClient;

trait WebServicesTrait
{
    use InsertLogTrait;
    public function odataClient()
    {
        $odataClient = new ODataClient(config('app.odataBaseUrl'));
        return $odataClient;
    }

    public function curlSave($data)
    {
        $url = config('app.odataBaseUrl') . $data['wsName'];
        $jsonDataEncoded = json_encode($data['parameters']);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
        curl_setopt($ch, CURLOPT_USERPWD, config("app.domainUser"));
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt ($curl_handle, CURLOPT_WRITEFUNCTION, 'limit_function');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Connection: Keep-Alive',
            'Accept: application/json',
            'Content-Type: application/json; charset=utf-8',
            "Accept: */*",
        ]);
        $response = curl_exec($ch);
        $jdata = json_decode($response, true);
        $errormessage = '';
        if (curl_errno($ch)) {
            session()->flash('error', "curl Error: " . curl_error($ch));
            $this->InsertLog("Query Error", session('error'), Request()->Route()->getActionName());
            die;
        } else {
            $jdata = json_decode($response, true);
            if (isset($jdata['odata.error']) || isset($jdata['error'])) {
                $errorMessage = isset($jdata['odata.error']) ? $jdata['odata.error']['message']['value'] : $jdata['error']['message'];
                session()->flash('error', "ODATA Error: " . $errorMessage);
                return false;
            } elseif (isset($jdata[0]['Message'])) {
                $errorMessage = $jdata[0]['Message'];
                session()->flash('error', "ODATA Error: " . $errorMessage);
                return false;
            }
            session()->flash('success', 'Updated successfully');
            return true;
        }
        curl_close($ch);
    }
}
