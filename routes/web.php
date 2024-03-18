<?php

use App\Models\howtoservice;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\needController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\rulesController;
use App\Http\Controllers\factorController;
use App\Http\Controllers\recordController;
use App\Http\Controllers\visionController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\generalController;
use App\Http\Controllers\generalinfomation;
use App\Http\Controllers\patientController;
use App\Http\Controllers\publishController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\buildingController;
use App\Http\Controllers\covenantsController;
use App\Http\Controllers\delivererController;
use App\Http\Controllers\relationsController;
use App\Http\Controllers\strategicController;
use App\Http\Controllers\structureController;
use App\Http\Controllers\competitionController;
use App\Http\Controllers\environmentController;
use App\Http\Controllers\outsourcingController;
use App\Http\Controllers\performanceController;
use App\Http\Controllers\howtoserviceController;

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

Route::get('/view-pdf', [PdfController::class, 'viewPdf']);

Route::get('/', [Controller::class, 'home'])->name('index');
Route::get('/structure', [Controller::class, 'structure'])->name('structure');

Route::get('/vision', [Controller::class, 'vision'])->name('vision');
Route::get('/building', [Controller::class, 'building'])->name('building');
Route::get('/environment', [Controller::class, 'environment'])->name('environment');
Route::get('/rules', [Controller::class, 'rules'])->name('rules');
Route::get('/relations', [Controller::class, 'relations'])->name('relations');
Route::get('/strategic', [Controller::class, 'strategic'])->name('strategic');
Route::get('/performance', [Controller::class, 'performance'])->name('performance');

Route::get('/patientstatistics', [Controller::class, 'PatientStatistics'])->name('patientstatistics');

Route::get('/record', [Controller::class, 'Top12Diag'])->name('record');

Route::get('/sendptcount', [Controller::class, 'SendPTCount'])->name('sendptcount');
Route::get('/patientstatisticspervisit', [Controller::class, 'PatientStatisticsPerVisit'])->name('patientstatisticspervisit');
Route::get('/lecturer', [Controller::class, 'lecturer'])->name('lecturer');
Route::get('/risk', [Controller::class, 'risk'])->name('risk');

Route::get('/academic', [Controller::class, 'academic'])->name('academic');
Route::get('/elderlygroups', [Controller::class, 'elderlygroups'])->name('elderlygroups');

Route::get('/emergency', [Controller::class, 'emergency'])->name('emergency');
Route::get('/specialpatientgroups', [Controller::class, 'specialpatientgroups'])->name('specialpatientgroups');

Route::get('/menu', [Controller::class, 'menu'])->name('menu');


Route::get('/treatmentcount', [Controller::class, 'TreatmentCount'])->name('treatmentcount');


//Welcome กิจกรรม ประชาสัมพันธ์
Route::resource('home', homeController::class);

Route::get('/generalinfomation', function () {return view('home');})->name('generalinfomation');
Route::resource('generalinfomation', generalController::class);

//บริการ
Route::get('/menu_manage', function () {return view('menu/index');})->name('menu_manage');
Route::resource('menu_manage', menuController::class);

//หน้าเพิ่มประชาสัมพันธ์
Route::get('/publish', function () {return view('home/public');})->name('publish');
Route::resource('publish', publishController::class);


//หน้า about อาคาร,โครงสร้างองค์กร,กฏระเบียบ,วิสัยทัศน์,ข้อมูลสถิติ,สภาพแวดล้อม,บริบทเชิงกลยุทธ์
//อาคารและสถานที่
Route::get('/building_manage', function () {return view('about/building/index');})->name('building_manage');
Route::resource('building_manage', buildingController::class);

//สภาพแวดล้อม
Route::get('/environment_manage', function () {return view('about/environment/index');})->name('environment_manage');
Route::resource('environment_manage', environmentController::class);
Route::get('create_growth', function(){
    return view('about.environment.create_growth');
})->name('create_growth');
Route::get('edit_growth', function(){
    return view('about.environment.edit_growth');
})->name('edit_growth');
Route::get('edit_competition', function(){
    return view('about.environment.edit_competition');
})->name('edit_competition');
Route::get('create_competition', function(){
    return view('about.environment.create_competition');
})->name('create_competition');
Route::get('edit_factor', function(){
    return view('about.environment.edit_factor');
})->name('edit_factor');
Route::get('create_factor', function(){
    return view('about.environment.create_factor');
})->name('create_factor');
//เพิ่มสภาพแวดล้อมด้านการแข่งขัน 
Route::get('/competition', function () {return view('about.environment');})->name('competition');
Route::resource('competition', competitionController::class);
//เพิ่มปัจจัยความสำเร็จ
Route::get('/factor', function () {return view('about.environment');})->name('factor');
Route::resource('factor', factorController::class);

//ระบบการปรับปรุง Performance ขององค์กร
Route::get('/performance_manage', function () {return view('about/performance/index');})->name('performance_manage');
Route::resource('performance_manage', performanceController::class);


//สถิติ
Route::get('/record_manage', function () {return view('about/record/index');})->name('record_manage');
Route::resource('record_manage', recordController::class);
Route::get('/create_elderlygroup', function () {return view('about/record/create');})->name('create_elderlygroup');


//ความสัมพันธ์
Route::get('/relations_manage', function () {return view('about/relations/index');})->name('relations_manage');
Route::resource('relations_manage', relationsController::class);

Route::get('create_governance', function(){
    return view('about/relations/create_governance');
})->name('create_governance');
Route::get('edit_governance', function(){
    return view('about/relations/edit_governance');
})->name('edit_governance');

//ผู้ส่งมอบและคู่ความร่วมมือ
Route::get('/covenants', function () {return view('about/relations');})->name('covenants');
Route::resource('covenants', covenantsController::class);
Route::get('create_covenants', function(){
    return view('about/relations/create_covenants');
})->name('create_covenants');
Route::get('edit_covenants', function(){
    return view('about/relations/edit_covenants');
})->name('edit_covenants');

//ผู้ส่งมอบและคู่ความร่วมมือ
Route::get('/deliverer', function () {return view('about/relations');})->name('deliverer');
Route::resource('deliverer', delivererController::class);
Route::get('create_deliverer', function(){
    return view('about/relations/create_deliverer');
})->name('create_deliverer');
Route::get('edit_deliverer', function(){
    return view('about/relations/edit_deliverer');
})->name('edit_deliverer');

//กลุ่มผู้ป่วย/ผู้รับบริการที่สำคัญและความต้องการ
Route::get('/need', function () {return view('about/relations');})->name('need');
Route::resource('need', needController::class);
Route::get('create_need', function(){
    return view('about/relations/create_need');
})->name('create_need');
Route::get('edit_need', function(){
    return view('about/relations/edit_need');
})->name('edit_need');

//บริการที่มีการจ้างเหมามาจากภายนอก
Route::get('/outsourcing', function () {return view('about/relations');})->name('outsourcing');
Route::resource('outsourcing', outsourcingController::class);
Route::get('create_outsourcing', function(){
    return view('about/relations/create_outsourcing');
})->name('create_outsourcing');
Route::get('edit_outsourcing', function(){
    return view('about/relations/edit_outsourcing');
})->name('edit_outsourcing');

//กลุ่มผู้ป่วย/ผู้รับบริการที่สำคัญและความต้องการ
Route::get('/patient', function () {return view('about/relations');})->name('patient');
Route::resource('patient', patientController::class);
Route::get('create_patient', function(){
    return view('about/relations/create_patient');
})->name('create_patient');
Route::get('edit_patient', function(){
    return view('about/relations/edit_patient');
})->name('edit_patient');

//โครงสร้างเครือข่ายบริการและเครือข่ายความร่วมมือ
Route::get('/service', function () {return view('about/relations');})->name('service');
Route::resource('service', serviceController::class);
Route::get('create_service', function(){
    return view('about/relations/create_service');
})->name('create_service');
Route::get('edit_service', function(){
    return view('about/relations/edit_service');
})->name('edit_service');

//กฏระเบียบ
Route::get('/rules_manage', function () {return view('about/rules/index');})->name('rules_manage');
Route::resource('rules_manage', rulesController::class);
// Route::get('rules', function(){
//     return view('about/rules/rules');
// })->name('rules');

//บริบทเชิงกลยุทธ์
Route::get('/strategic_manage', function () {return view('about/strategic/index');})->name('strategic_manage');
Route::resource('strategic_manage', strategicController::class);
Route::get('create_healthproblems', function(){
    return view('about/strategic/create_healthproblems');
})->name('create_healthproblems');
Route::get('edit_healthproblems', function(){
    return view('about/strategic/edit_healthproblems');
})->name('edit_healthproblems');

//โครงสร้างองค์กร
Route::get('/structure_manage', function () {return view('about/structure/index');})->name('structure_manage');
Route::resource('structure_manage', structureController::class);
Route::get('create_dhamma', function(){
    return view('about/structure/create_dhamma');
})->name('create_dhamma');
Route::get('create_healt', function(){
    return view('about/structure/create_healt');
})->name('create_healt');

//วิสัยทัศน์
Route::get('/vision_manage', function () {return view('about/vision/index');})->name('vision_manage');
Route::resource('vision_manage', visionController::class);



//home หน้าเพิ่มข้อมูลกิจกรรม เพิ่มข้อมูลประชาสัมพันธ์ เพิ่มข้อมูลทั่วไป
Route::get('create_activity', function(){
    return view('home/activity/create_activity');
})->name('create_activity');
Route::get('edit_activity', function(){
    return view('home/activity/edit_activity');
})->name('edit_activity');
Route::get('create_public', function(){
    return view('home/public/create_public');
})->name('create_public');
Route::get('edit_public', function(){
    return view('home/public/edit_public');
})->name('edit_public');
Route::get('edit_infomation', function(){
    return view('home/infomation/edit_infomation');
})->name('edit_infomation');


//หน้าขั้นตอนการบริการ
Route::get('edit_service', function(){
    return view('home/service/edit_service');
})->name('edit_service');
Route::get('/service', function () {return view('home/service');})->name('service');
Route::resource('service', howtoserviceController::class);

//Backend หน้ากิจกรรม
Route::get('create_menu', function(){
    return view('menu/create_menu');
})->name('create_menu');
Route::get('edit_menu', function(){
    return view('menu/edit_menu');
})->name('edit_menu');

//standard หน้ามาตรฐาน
Route::get('standard', function(){
    return view('standard/standard');
})->name('standard');

//หน้าติดต่อ
Route::get('/contact_manage', function () {return view('contact/index');})->name('contact_manage');
Route::resource('contact_manage', contactController::class);
Route::get('/contact', function(){
    return view('contact.contact');
})->name('contact');


//admin
Route::get('/admin', function () {return view('admin/index');})->name('admin');
Route::resource('admin', adminController::class);





