<?php

namespace App\Traits;
// use EmailTrait;
//
trait QualificationTrait
{
    public $myQualifications=[],$qualifications,$qualificationDescriptions;
    public function qualifications(){
		$qualifications = [
			['no' => '0', 'name' => 'Primary School', 'desc' => 'Primary School (KCPE)'],
			['no' => '1', 'name' => 'Secondary School', 'desc' => 'Secondary School (KCSE)'],
			['no' => '2', 'name' => 'Diploma', 'desc' => 'Diploma'],
			['no' => '3', 'name' => 'Higher Diploma', 'desc' => 'Higher Diploma'],
			['no' => '4', 'name' => 'Degree', 'desc' => 'Degree/Undergraduate'],
			['no' => '5', 'name' => 'Masters', 'desc' => 'Masters'],
			['no' => '6', 'name' => 'Other', 'desc' => 'Other'],
		];
		return $qualifications;
	}
    public function addQualification(REQUEST $request){
        $this->validate($request,[
            'category' => 'required',
            'qualificationDescription' => 'required',
            'institution_name' => 'required',
            'from_year' => 'required',
            'to_year' => 'required|after:from_year',
            'mean_grade' => 'required',
            'graduation_year' => 'required|after:to_date',
            'certificate' => 'required|mimes:jpeg,bmp,png,gif,svg,pdf|max:1999',
            'kcseIndexNo' => 'nullable|required_if:category,=,KCSE',
        ],
		[
			'certificate.max' => 'Certificate file size cannot exceed 2MB',
			'kcseIndexNo.required_if' => 'KCSE index no is required',
		]
		);
        //
        if($request->category == "KCSE"){
            session(['kcseIndexNo' => $request->kcseIndexNo]);
        }
        try{
            $service2 = new NTLMSoapClient(config('app.webService'));
            if(!isset($params2)){
                $params2 = new \stdClass();
            }
            $app_no = $request->applicationNo;
            $params2->app_no = $request->applicationNo;
            $params2->institution = $request->institution_name;
            $params2->from_year = $request->from_year;
            $params2->to_year = $request->to_year;
            $params2->award = $request->mean_grade;
            $params2->graduation_year = $request->graduation_year;
            $params2->qualifications = $request->category;
            $params2->typeofstudent = "ssp";
            //storing attachment in session
            $data = ['pKey' => $app_no,'file' => $request->file('certificate'), 'description' => 'Qualification'];
            $sessionFile = session($this->sessionAttachment($data));
            //
            $params2->qualificationDesc = $sessionFile['fileName'];
            $params2->filename = $sessionFile['fileName'];
            $result2 = $service2->InsertQualification($params2);
            //upload attachment
            $tableDetails = OnlineApplication::NavTableDetails();
            $data = ['pKey' => $app_no,'tableId' => $tableDetails['tableId'],'sessionFile' => $sessionFile];
            $this->uploadAttachment($data);
        }
        catch (\SoapFault $e) {
            $this->InsertLog("SOAP Error",$e->faultstring, Request()->Route()->getActionName());
            return redirect()->back()->with('error', config("app.webServiceDebug") == true? $e->faultstring.config('app.error')['persistent']:config("app.webServiceError"));
        }
        return redirect()->back();
    }
    public function removeQualification(REQUEST $request){
        try{
            $service = new NTLMSoapClient(config('app.webService'));
            !isset($params)? $params = new \stdClass():'';
            $params->no = $request->applicationNo;
            $params->lineNo = $request->lineNo;
            $params->typeofstudent = 'ssp';
            $params->folderName = '';
            $result = $service->RemoveQualification($params);
            if($result->return_value == 1){
                $tableDetails = OnlineApplication::NavTableDetails();
                $data = ['pKey' => $request->applicationNo, 'tableId' => $tableDetails['tableId'], 'docId' => $request->docId];
                $this->deleteAttachment($data);
                // if($result->return_value == 1){
                    return redirect()->back()->with('success', "Deleted successfully");
                // }
                // return redirect()->back()->with('error', config("app.error")['general']);
            }
            return redirect()->back()->with('error', config("app.error")['general']);
        }
        catch (\SoapFault $e) {
			$this->InsertLog("SOAP Error",$e->faultstring, Request()->Route()->getActionName());
            return redirect()->back()->with('error', config("app.webServiceDebug") == true? $e->faultstring.config('app.error')['persistent']:config("app.webServiceError"));
		}
    }
}
