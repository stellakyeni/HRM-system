<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Traits\WebServicesTrait;
use Illuminate\Http\Request;
use App\CustomClasses\NTLM\NTLMSoapClient;

class BusinessCentralController extends Controller
{
    // (....)
    use WebServicesTrait;

    protected $businessCentralService;
    // public function __construct(BusinessCentralService $businessCentralService)
    // {
    //     $this->businessCentralService = $businessCentralService;

    // }

    public function employees()
    {
        $employees = $this->odataClient()
            ->from(Employee::queryname())
            ->get();

        // dd($employees);
        return view('BC.employees', compact('employees'));
    }

    public function storeEmployee(Request $request)
    {

        $request->validate([
            'idno' => 'required|string',
            'firstName' => 'required|string',
            'middleName' => 'required|string',
            'lastName' => 'required|string',
            'phone_number' => 'required',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required|same:password',
        ]);

        try {
            $service = new NTLMSoapClient(config('app.webService'));
            $params = new \stdClass();
            $params->suiteCode = uniqid();
            $params->tag = $request->idno;
            $result = $service->SetTestSuiteTag($params);
            if ($result->return_value) {
                return redirect("/login")->with('success', 'You have registered successfully. You can now login and apply for jobs.');
            }
            return redirect()->back()->with('error', config("app.errors")['default']);
        } catch (\SoapFault $e) {
            $this->InsertLog("SOAP Error", $e->faultstring, Request()->Route()->getActionName());
            $errorMsg = config("app.WS_Debug") == true ? $e->faultstring : config("app.errors")['webservice'];
            return redirect()->back()->with('error', $errorMsg);
        }

        // dd($employees);
        return view('BC.employees', compact('employees'));
    }
}