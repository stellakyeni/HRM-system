<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class BusinessCentralService
{
    private $baseUrl;
    private $username;
    private $password;

    public function __construct()
    {

        $this->baseUrl = config('business_central.api_base_url', 'http://localhost:8080/BC220');
        $this->username = config('business_central.username', '');
        $this->password = config('business_central.password', '');

    }

    // Add other methods for different API endpoints
    public function getEmployees()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
        ])->get($this->baseUrl . '/Employees');

        return $response->json()['data'] ?? [];

    }
}