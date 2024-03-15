<?php
use App\Http\Controllers\BusinessCentralController;
use App\Http\Controllers\configurationController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\organizationController;
use App\Http\Controllers\qualificationController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::get('/', function () {
    return view('admin.admin_dashboard');

});

Route::post("/add-users", [userController::class, ('addUser')])->name("add-user");
Route::get("/users", [userController::class, ('users')])->name("users");
Route::get("/get-users", [userController::class, ('getUser')])->name("get-user");
Route::get('/edit-user/{id}', [userController::class, 'editUser'])->name('edit-user');
Route::put('/update-user/{id}', [userController::class, 'updateUser'])->name('update-user');
Route::delete('/delete/{id}', [userController::class, 'delete'])->name('delete');

Route::get("/job-titles", [jobController::class, ('jobTitles')])->name("job-titles");
Route::post("/add-job-title", [jobController::class, ('storeJobTitle')])->name("store-job-title");
Route::get("/get-job-title", [jobController::class, ('jobTitle')])->name("get-job-title");
Route::get('/edit-jobTitle/{id}', [jobController::class, 'editJobTitle'])->name('edit-jobTitle');
Route::put('/update-jobTitle/{id}', [jobController::class, 'updateJobTitle'])->name('update-jobTitle');
Route::delete('/delete-jobtitle/{id}', [jobController::class, 'deleteJobTitle'])->name('delete-jobTitle');

Route::get("/pay-grades", [jobController::class, ('payGrades')])->name("pay-grades");
Route::post("/add-pay-grade", [jobController::class, ('storePayGrade')])->name("store-pay-grade");
Route::get("/get-pay-grade", [jobController::class, ('payGrade')])->name("get-pay-grade");

Route::get("/Job-category", [jobController::class, ('jobCategory')])->name("job-category");
Route::post("/add-job-category", [jobController::class, ('storeJobCategory')])->name("store-job-category");
Route::get("/get-job-category", [jobController::class, ('jobCategories')])->name("get-job-category");
Route::delete('/delete-jobCategory/{id}', [jobController::class, 'deleteJobCategory'])->name('delete');

Route::get("/employment-status", [jobController::class, ('addEmploymentStatus')])->name("employment-status");
Route::post("/add-employment-status", [jobController::class, ('storeEmploymentStatus')])->name("store-employment-status");
Route::get("/get-employment-status", [jobController::class, ('employmentStatus')])->name("get-employment-status");
Route::delete('/delete-employmentStatus/{id}', [jobController::class, 'deleteEmploymentStatus'])->name('delete-employementStatus');

Route::get("/work-shifts", [jobController::class, ('workShifts')])->name("work-shifts");

Route::get("/general-information", [organizationController::class, ('generalInformation')])->name("general-information");
Route::get("/location", [organizationController::class, ('location')])->name("location");
Route::get("/structure", [organizationController::class, ('structure')])->name("structure");
Route::get("/dashboard", [organizationController::class, ('dashboard')])->name("dashboard");

Route::get("/skills", [qualificationController::class, ('skills')])->name("skill");
Route::post("/add-skills", [qualificationController::class, ('addSkill')])->name("add-skill");
Route::get("/get-skills", [qualificationController::class, ('getSkill')])->name("get-skill");

Route::get("/education", [qualificationController::class, ('education')])->name("education");
Route::get("/licenses", [qualificationController::class, ('licenses')])->name("licenses");
Route::get("/nationalities", [qualificationController::class, ('nationalities')])->name("nationalities");
Route::get("/languages", [qualificationController::class, ('languages')])->name("languages");

Route::get("/optional-fields", [configurationController::class, ('optionalFields')])->name("optional-fields");
Route::get("/custom-fields", [configurationController::class, ('customFields')])->name("custom-fields");
Route::get("/data-imports", [configurationController::class, ('dataImports')])->name("data-imports");
Route::get("/reporting-methods", [configurationController::class, ('reportingMethods')])->name("reporting-methods");
Route::get("/termination-reason", [configurationController::class, ('terminationReason')])->name("termination-reason");

Route::post("/add-employee", [configurationController::class, ('addEmployee')])->name("add-employee");
Route::get("/add-employee", [configurationController::class, ('getEmployee')])->name("get-employee");
Route::get("/employee-list", [configurationController::class, ('employeeList')])->name("employee-list");

Route::delete('/delete-employee/{id}', [configurationController::class, 'deleteEmployee'])->name('delete-employee');
Route::get('/edit-employee/{id}', [configurationController::class, 'editEmployee'])->name('edit-employee');
Route::put('/update-employee/{id}', [configurationController::class, 'updateEmployee'])->name('update-employee');

Route::get("/reports", [configurationController::class, ('reports')])->name("reports");

//Business Central
Route::get('/business-central-employee', [BusinessCentralController::class, 'employees'])->name('BC-employee-list');
