<?php
namespace App\CustomClasses\NTLM;
require_once("NTLMStream.php");
stream_wrapper_unregister('http');
stream_wrapper_register('http', 'NTLMStream') or die("Failed to register protocol");
date_default_timezone_set('Africa/Nairobi');
require_once("NTLMUserID.php");

class NTLMSoapClient extends \SoapClient{
    function __doRequest($request, $location, $action, $version, $one_way = NULL) { 
        $headers = array(
            'Method: POST', 
            'Connection: Keep-Alive', 
            'User-Agent: PHP-SOAP-CURL', 
            'Content-Type: text/xml; charset=utf-8', 
            'SOAPAction: "'.$action.'"', 
        );
        $this->__last_request_headers = $headers;
        $ch = curl_init($location); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($ch, CURLOPT_POST, true ); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request); 
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM); 
        curl_setopt($ch, CURLOPT_USERPWD, USERPWD); 
        $response = curl_exec($ch); 
        return $response; 
    }
    function __getLastRequestHeaders() { 
        return implode("\n", $this->__last_request_headers)."\n"; 
    } 
}

?>



