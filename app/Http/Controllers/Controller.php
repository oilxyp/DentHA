<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\menu;
use App\Models\need;
use App\Models\rules;
use App\Models\train;
use App\Models\factor;
use App\Models\vision;
use GuzzleHttp\Client;
use App\Models\general;
use App\Models\patient;
use App\Models\publish;
use App\Models\building;
use App\Models\lecturer;
use App\Models\services;
use App\Models\activitys;
use App\Models\covenants;
use App\Models\deliverer;
use App\Models\emergency;
use App\Models\lecturers;
use App\Models\top12diag;
use App\Models\advantages;
use App\Models\challenges;
use App\Models\devquality;
use App\Models\governance;
use App\Models\management;
use App\Models\competition;
use App\Models\cooperation;
use App\Models\environment;
use App\Models\externalenv;

use App\Models\outsourcing;
use App\Models\outstanding;
use App\Models\elderlygroup;
use App\Models\howtoservice;
use Illuminate\Http\Request;
use App\Models\process_commu;

use App\Models\process_learn;
use App\Models\sentpt_counts;
use App\Models\problemsinarea;
use App\Models\problemstrying;
use App\Models\treatmentcount;
use App\Models\problemsdevelop;
use App\Models\problemsforward;
use App\Models\risk_management;
use App\Models\patientstatistics;
use App\Models\relation_customers;
use Illuminate\Support\Facades\DB;
use App\Models\statisticspervisits;
use App\Models\special_patientgroup;
use App\Models\coordinate_structure;
use Illuminate\Support\Facades\Http;
use App\Models\administer_structture;
use App\Models\ggovernance_structure;
use App\Models\denthospital_structture;
use App\Models\process_createinnovation;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        // $activitys = activitys::all();
        // $picture = activitys::select('id', 'picture')
        //     ->orderBy('id')
        //     ->get();

        $activitys = activitys::orderBy('updated_at', 'desc')
            ->orderBy('id')
            ->take(2)
            ->get();

        $first_group = [];
        $second_group = [];

        foreach ($activitys as $key => $value) {
            if ($key == 0) {
                // กลุ่มแรก
                if (strpos($value->picture, ',') !== false) {
                    // ถ้ามี , ในรูปภาพในฐานข้อมูล ให้แยกเป็นรูปภาพหลายรูป
                    $images = explode(',', $value->picture);
                    foreach ($images as $image) {
                        $first_group[] = trim($image);
                    }
                } else {
                    // ถ้าไม่มี , ในรูปภาพในฐานข้อมูล
                    $first_group[] = $value->picture;
                }
            } else {
                // กลุ่มที่สอง
                if (strpos($value->picture, ',') !== false) {
                    // ถ้ามี , ในรูปภาพในฐานข้อมูล ให้แยกเป็นรูปภาพหลายรูป
                    $images = explode(',', $value->picture);
                    foreach ($images as $image) {
                        $second_group[] = trim($image);
                    }
                } else {
                    // ถ้าไม่มี , ในรูปภาพในฐานข้อมูล
                    $second_group[] = $value->picture;
                }
            }
        }
        $array_picture = [
            $first_group,
            $second_group
        ];
        // dd($array_picture);

        $publish = Publish::orderBy('updated_at', 'desc')->take(2)->get();
        $general = general::all();
        $management = management::all();
        $howtoservice = howtoservice::all();
        // dd($activitys,$publish);
        return view('home.home', compact('array_picture', 'activitys', 'publish', 'general', 'management', 'howtoservice'));
    }

    public function vision()
    {
        $vision = vision::all();
        // dd(111);
        return view('about.vision.vision', compact('vision'));
    }

    public function menu()
    {
        $menu = menu::orderBy('updated_at', 'desc')->take(6)->get();

        // dd(111);
        return view('menu.menu', compact('menu'));
    }

    public function building()
    {
        $buildings = building::all();
        // dd('111');
        return view('about.building.building', compact('buildings'));
    }

    public function structure()
    {
        $administer = administer_structture::all();
        $coordinate = coordinate_structure::all();
        $denthospital = denthospital_structture::all();
        $ggovernance = ggovernance_structure::all();
        return view('about.structure.structure', compact('administer', 'coordinate', 'denthospital', 'ggovernance'));
    }
    public function environment()
    {
        $environment = environment::all();
        $competition = competition::all();
        $factor = factor::all();
        return view('about.environment.environment', compact('environment', 'competition', 'factor'));
    }
    public function rules()
    {
        $rules = rules::all();
        return view('about.rules.rules', compact('rules'));
    }
    public function relations()
    {
        $governance = governance::all();
        $need = need::all();
        $patient = patient::all();
        $service = services::all();
        $deliverer = deliverer::all();
        $outsourcing = outsourcing::all();
        $covenants = covenants::all();
        $cooperation = cooperation::all();
        $train = train::all();
        $customers = relation_customers::all();
        return view('about.relations.relations', compact('governance', 'need', 'patient', 'service', 'deliverer', 'outsourcing', 'covenants', 'cooperation', 'train', 'customers'));
    }
    public function strategic()
    {
        $problemsinarea = problemsinarea::all();
        $problemsdevelop = problemsdevelop::all();
        $problemsforward = problemsforward::all();
        $challenges = challenges::all();
        $externalenv = externalenv::all();
        $problemstrying = problemstrying::all();
        $advantages = advantages::all();
        return view('about.strategic.strategic', compact('problemsinarea', 'problemsdevelop', 'problemsforward', 'challenges', 'externalenv', 'problemstrying', 'advantages'));
    }
    public function performance()
    {
        $devquality = devquality::all();
        $outstanding = outstanding::all();
        $process_commu = process_commu::all();
        $process_createinnovation = process_createinnovation::all();
        $process_learn = process_learn::all();
        return view('about.performance.performance', compact('devquality', 'outstanding', 'process_commu', 'process_createinnovation', 'process_learn'));
    }

    public function PatientStatistics()
    {
        $PatientTypes = [0, 1]; // ประเภทผู้ป่วย (0 = เก่า, 1 = ใหม่)

        $totalData = [];

        // หาวันที่ปัจจุบันและวันที่ประมาณ 6 เดือนที่แล้ว
        $currentDate = strtotime(date("Y-m-d"));
        $sixMonthsAgo = strtotime("-6 months", $currentDate);

        // เปลี่ยนวันที่ในรูปแบบ Y-m-d เป็นรูปแบบ Y-m-01 เพื่อให้ได้วันแรกของเดือน
        $startDate = date("Y-m-01", $sixMonthsAgo);
        $endDate = date("Y-m-t", $sixMonthsAgo);

        $PatientStatistics = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/PatientStatistics/1?date_start=$startDate-01-01&date_end=$endDate-01-31&TypePT=1";
        $client = new Client(['base_uri' => $PatientStatistics]);

        $monthTranslations = [
            'January' => 'มกราคม',
            'February' => 'กุมภาพันธ์',
            'March' => 'มีนาคม',
            'April' => 'เมษายน',
            'May' => 'พฤษภาคม',
            'June' => 'มิถุนายน',
            'July' => 'กรกฎาคม',
            'August' => 'สิงหาคม',
            'September' => 'กันยายน',
            'October' => 'ตุลาคม',
            'November' => 'พฤศจิกายน',
            'December' => 'ธันวาคม',
        ];

        for ($i = 0; $i < 6; $i++) {
            $monthlyData = [];
            foreach ($PatientTypes as $TypePT) {
                $response = $client->request('GET', '?' . http_build_query([
                    'date_start' => $startDate,
                    'date_end' => $endDate,
                    'TypePT' => $TypePT
                ]), [
                    'headers' => [
                        'Accept' => 'application/json',
                        'cache-control' => 'no-cache',
                    ],
                ]);

                $body = $response->getBody();
                $data = json_decode($body, true);

                $month = date('F', strtotime($startDate));

                // ตรวจสอบว่ามีข้อมูลสำหรับเดือนนี้แล้วหรือไม่
                $existingData = patientstatistics::where('month', $month)
                    ->where('patient_type', $TypePT)
                    ->first();

                if ($existingData) {
                    // มีข้อมูลแล้วให้อัปเดต
                    $existingData->update([
                        'data' => $data[0],
                        'total' => array_sum(array_column($data, 0))
                    ]);
                } else {
                    // ไม่มีข้อมูลให้สร้างข้อมูลใหม่
                    patientstatistics::create([
                        'month' => $month,
                        'patient_type' => $TypePT,
                        'data' => $data[0],
                        'total' => array_sum(array_column($data, 0))
                    ]);
                }
            }

            $monthName = date('F', strtotime($startDate));

            $totalData[$monthName] = [
                'data' => $monthlyData,
                'total' => array_sum(array_column($monthlyData, 0))
            ];

            // ย้ายวันเริ่มต้นและสิ้นสุดไปยังเดือนถัดไป
            $startDate = date('Y-m-01', strtotime('+1 month', strtotime($startDate)));
            $endDate = date('Y-m-t', strtotime($startDate));
        }

        // dd($totalData);
        // $patientstatistics = patientstatistics::all();
        $patientstatistics = patientstatistics::select('id', 'month', 'patient_type', 'data', 'total')
            ->orderBy('id', 'DESC')
            ->limit(12)
            ->get();
        return view('about.record.patientstatistics', compact('totalData', 'monthTranslations', 'patientstatistics'));
    }

    public function Top12Diag()
    {
        $baseUrl = 'https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/Top12Diag/1';
        $ICD10 = ['k01', 'k07', 'k05', 'k04', 'k02', 'k08', 'L43', 'k03', 'k06', 'Q37', 'G50', 'B37'];
        $ICD10_names = [
            'k01' => 'ฟันคุด',
            'k07' => 'TMD',
            'k05' => 'เหงือกอักเสบ',
            'k04' => 'โรคของเนื้อเยื่อในโพรงฟัน',
            'k02' => 'ฟันผุ',
            'k08' => 'ความผิดปกติของฟันและโครงสรัางที่พยุงฟัน',
            'L43' => 'ไลเคนแพลนัสช่องปาก',
            'k03' => 'ฟันสึก',
            'k06' => 'เหงือกร่น',
            'Q37' => 'Cleft',
            'G50' => 'TN',
            'B37' => 'แคนดิดาช่องปาก'
        ];

        $diagnosisData = new \stdClass();

        // สร้าง HTTP client
        $client = new Client();

        // วนลูปเพื่อดึงข้อมูลของแต่ละปี
        for ($i = 0; $i < 4; $i++) {
            $year = date('Y') - $i;
            $yearData = new \stdClass();
            $yearData->year = $year;
            foreach ($ICD10 as $TypePT) {
                $existingData = top12diag::where('year', $year)
                    ->where('ICD10', $TypePT)
                    ->exists();
                if (!$existingData) {
                    // ถ้าข้อมูลยังไม่มีอยู่ในฐานข้อมูล ให้ดึงข้อมูลจาก API และเพิ่มข้อมูลใหม่ลงในฐานข้อมูล
                    $response = $client->request('GET', $baseUrl, [
                        'query' => [
                            'year' => $year,
                            'ICD10' => $TypePT
                        ],
                        'headers' => [
                            'Accept' => 'application/json',
                            'cache-control' => 'no-cache',
                        ],
                    ]);
                    // ดึงข้อมูลและเก็บไว้ในตัวแปร
                    $data = json_decode($response->getBody(), true);
                    Top12Diag::create([
                        'year' => $year,
                        'ICD10' => $TypePT,
                        'ICD10_names' => $ICD10_names[$TypePT], // เพิ่มชื่อ ICD10
                        'diagnosisData' => $data[0], // เก็บข้อมูลเป็น JSON string
                    ]);
                    $yearData->$TypePT = $data[0];
                } else {
                    // ถ้าข้อมูลมีอยู่แล้ว ไม่ต้องทำอะไรเพิ่มเติม 
                }
            }
            // เก็บข้อมูลของปีนี้ใน object หลัก
            $diagnosisData->$year = $yearData;
        }

        $ICD10_names = top12diag::select('ICD10_names')
            ->groupBy('ICD10_names')
            ->orderBy('id')
            ->get();

        $arrary_ICD10_namese = array();
        foreach ($ICD10_names as $key => $value) {
            array_push($arrary_ICD10_namese, $value->ICD10_names);
        }

        $jsonData = [];

        for ($i = 0; $i < 4; $i++) {
            $year = date("Y") - $i;

            $diagnosisData = top12diag::select('diagnosisData')
                ->where('year', $year)
                ->get();

            $array_diagnosisData = [];
            foreach ($diagnosisData as $key => $value) {
                array_push($array_diagnosisData, $value->diagnosisData);
            }

            $jsonData[] = [
                'name' => 'ปี' . $year,
                'data' => $array_diagnosisData,
            ];
        }

        // dd($jsonData);
        $top12diag = top12diag::all();
        return view('about.record.record', compact(
            'top12diag',
            'arrary_ICD10_namese',
            'jsonData'
        ));
    }

    public function SendPTCount()
    {
        $year = date('Y');
        $url = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/SendPTCount/1?year=$year";
        
        $client = new Client([
            'base_uri' =>  $url,
        ]);
        
        $currentYear = $year;
        
        // เก็บข้อมูลในปีปัจจุบัน
        $response = $client->request('GET', '?' . http_build_query([
            'year' => $currentYear
        ]), [
            'headers' => [
                'Accept' => 'application/json',
                'cache-control' => 'no-cache',
            ],
        ]);
        
        $body = $response->getBody();
        $responseData = json_decode($body);
        
        foreach ($responseData as $data) {
            foreach ($data as $item) {
                // ตรวจสอบว่า 'dname' ไม่เป็น 'US'
                if ($item->dname !== 'US') {
                    $existingRecord = sentpt_counts::where([
                        'year' => $currentYear,
                        'dname' => $item->dname,
                        'numberperson' => $item->numperson,
                        'numtime' => $item->numtime
                    ])->exists();
        
                    if (!$existingRecord) {
                        sentpt_counts::create([
                            'year' => $currentYear,
                            'dname' => $item->dname,
                            'numberperson' => $item->numperson,
                            'numtime' => $item->numtime
                        ]);
                    }
                }
            }
        }
        
        // เช็คข้อมูลใน 3 ปีย้อนหลัง (ไม่รวมปีปัจจุบัน)
        for ($i = 1; $i <= 3; $i++) {
            $previousYear = $year - $i;
            $existingRecords = sentpt_counts::where('year', $previousYear)->exists();
        
            // ถ้ามีข้อมูลในปีนี้ ไม่ต้องเช็คข้อมูลในปีนี้อีก
            if ($existingRecords) {
                break;
            }
        
            // เก็บข้อมูลในปีนี้
            $response = $client->request('GET', '?' . http_build_query([
                'year' => $previousYear
            ]), [
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                ],
            ]);
        
            $body = $response->getBody();
            $responseData = json_decode($body);
        
            foreach ($responseData as $data) {
                foreach ($data as $item) {
                    // ตรวจสอบว่า 'dname' ไม่เป็น 'US'
                    if ($item->dname !== 'US') {
                        sentpt_counts::create([
                            'year' => $previousYear,
                            'dname' => $item->dname,
                            'numberperson' => $item->numperson,
                            'numtime' => $item->numtime
                        ]);
                    }
                }
            }
        }
        
        $dname = sentpt_counts::select('dname')
            ->groupBy('dname')
            ->orderBy('id')
            ->get();
        $arrary_dname = array();
        foreach ($dname as $key => $value) {
            array_push($arrary_dname, $value->dname);
        }

        $jsonData = [];

        for ($i = 0; $i < 4; $i++) {
            $year = date("Y") - $i;

            $numTreat_Name = sentpt_counts::select('dname', 'numberperson')
                ->where('year', $year)
                ->get();

            $array_numberperson = [];
            foreach ($numTreat_Name as $key => $value) {
                array_push($array_numberperson, $value->numberperson);
            }
            $jsonData[] = [
                'name' => 'ปี ' . $year,
                'data' => $array_numberperson,
            ];
        }
        // dd('end');
        // dd($jsonData);
        $sentptcounts = sentpt_counts::all();
        return view('about.record.sendptcount', compact('jsonData', 'arrary_dname', 'sentptcounts'));
    }

    public function PatientStatisticsPerVisit()
    {
        $PatientTypes = [0, 1];
        $client = new Client();
        $yearlyData = [];
        for ($i = 0; $i < 4; $i++) {
            $startYear = date("Y", strtotime("-$i year"));
            $endYear = $startYear;
            $baseUrl = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/PatientStatisticsPerVisit/1?date_start=$startYear-01-01&date_end=$endYear-12-31&TypePT=1";
            $yearlyData[$startYear] = [];
            foreach ($PatientTypes as $TypePT) {
                $existingData = StatisticsPerVisits::where('year', $startYear)
                    ->where('patient_type', $TypePT)
                    ->first();

                if ($existingData) {
                    $response = $client->request('GET', $baseUrl, [
                        'query' => [
                            'date_start' => "$startYear-01-01",
                            'date_end' => "$endYear-12-31",
                            'TypePT' => $TypePT
                        ],
                        'headers' => [
                            'Accept' => 'application/json',
                            'cache-control' => 'no-cache',
                        ],
                    ]);

                    $data = json_decode($response->getBody(), true);
                    $existingData->update([
                        'data' => $data[0],
                        'total' => array_sum(array_column($data, 0))
                    ]);

                    $yearlyData[$startYear][$TypePT] = $data;
                } else {
                    $response = $client->request('GET', $baseUrl, [
                        'query' => [
                            'date_start' => "$startYear-01-01",
                            'date_end' => "$endYear-12-31",
                            'TypePT' => $TypePT
                        ],
                        'headers' => [
                            'Accept' => 'application/json',
                            'cache-control' => 'no-cache',
                        ],
                    ]);

                    $data = json_decode($response->getBody(), true);
                    StatisticsPerVisits::create([
                        'year' => $startYear,
                        'patient_type' => $TypePT,
                        'data' => $data[0],
                        'total' => array_sum(array_column($data, 0))
                    ]);

                    $yearlyData[$startYear][$TypePT] = $data;
                }
            }
        }
        // $statisticspervisits = StatisticsPerVisits::all();

        $statisticspervisits = StatisticsPerVisits::select('year', 'patient_type', 'data', 'total')
            ->orderBy('year', 'DESC')
            ->limit(8)
            ->get();

        return view('about.record.patientstatisticspervisit', compact('statisticspervisits'));
    }

    public function TreatmentCount()
    {
        $year = date('Y');
        $url = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/TreatmentCount/1?year=$year";
        $treatmentCounts = [];
        $client = new Client([
            'base_uri' =>  $url,
        ]);
        // เลือกปี 1-3 ปีที่แล้ว
        for ($i = 0; $i <= 3; $i++) {
            $response = $client->request('GET', '?' . http_build_query([
                'year' => $year - $i
            ]), [
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                ],
            ]);
            $body = $response->getBody();
            $responseData = json_decode($body);
            foreach ($responseData as $data) {
                foreach ($data as $item) {
                    // ตรวจสอบว่าข้อมูลมีอยู่แล้วหรือไม่
                    $existingRecord = treatmentcount::where([
                        'year' => $year - $i,
                        'treat_name' => $item->Treat_Name,
                        'numtreat' => $item->numTreat_Name,
                    ])->exists();

                    // ถ้าข้อมูลยังไม่มีอยู่ในฐานข้อมูล ให้ทำการสร้างข้อมูลใหม่
                    if (!$existingRecord) {
                        treatmentcount::create([
                            'year' => $year - $i,
                            'treat_name' => $item->Treat_Name,
                            'numtreat' => $item->numTreat_Name,
                        ]);
                    }
                }
            }
        }
        $treatNames = treatmentcount::select('treat_name')
            ->groupBy('treat_name')
            ->orderBy('id')
            ->get();
        $arrary_Treat_Name = $treatNames->pluck('treat_name')->toArray();
        // ดึงข้อมูลปีและตารางแยกรายการ
        $jsonData = [];
        for ($i = 0; $i <= 3; $i++) {
            $year = date("Y") - $i;
            $numTreatNames = treatmentcount::select('treat_name', 'numtreat')
                ->where('year', $year)
                ->get();
            $arrayNumTreatNames = [];
            foreach ($arrary_Treat_Name as $treatName) {
                // ตรวจสอบว่า $treatName มีใน $numTreatNames หรือไม่
                $matchingItem = $numTreatNames->firstWhere('treat_name', $treatName);

                if ($matchingItem) {
                    $arrayNumTreatNames[] = $matchingItem->numtreat;
                } else {
                    $arrayNumTreatNames[] = "";
                }
            }
            $jsonData[] = [
                'name' => 'ปี ' . $year,
                'data' => $arrayNumTreatNames,
            ];
        }
        // dd($jsonData);
        $treatment = treatmentcount::all();

        // $treatment = treatmentcount::select('year')
        // ->orderBy('year', 'DESC')
        // ->limit(4)
        // ->get();
        return view('about.record.treatmentcount', compact('treatment', 'jsonData', 'arrary_Treat_Name'));
    }

    public function lecturer()
    {
        $lecturerApi = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/Lecturer";

        // ดึงข้อมูลจาก API
        $client = new Client([
            'base_uri' =>  $lecturerApi,
        ]);
        $response = $client->request('GET', $lecturerApi, [
            'headers' => [
                'Accept' => 'application/json',
                'cache-control' => 'no-cache',
            ],
        ]);
        $lecturer = json_decode($response->getBody());

        // dd($data);
        return view('about.record.lecturer', compact('lecturer'));
    }

    public function academic()
    {
        $AcademicApi = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/AcademicProfessionResearcher";
        // ดึงข้อมูลจาก API
        $client = new Client([
            'base_uri' =>  $AcademicApi,
        ]);
        $response = $client->request('GET', $AcademicApi, [
            'headers' => [
                'Accept' => 'application/json',
                'cache-control' => 'no-cache',
            ],
        ]);
        $academic = json_decode($response->getBody());

        // dd($data);
        return view('about.record.academic', compact('academic'));
    }

    public function risk(Request $request)
    {
        $client = new Client();

        $yearlyData = [];

        $years = date('Y') - 1;
        $yearrequest = request('year');
        if ($yearrequest) {
            $years = $yearrequest; // กำหนดค่าของ $years เป็นค่าที่รับมาจาก request ถ้ามีการส่งมา
        }
        for ($i = 0; $i < 4; $i++) {
            $startYear = date("Y", strtotime("-$i year"));
            $endYear = $startYear;
            $baseUrl = "https://dent-revproxy.dent.cmu.ac.th/api-his-v2/api/risk_management?date_start=$startYear-01-01&date_end=$endYear-12-31";

            $yearlyData[$startYear] = [];

            $response = $client->request('GET', $baseUrl, [
                'query' => [
                    'date_start' => "$startYear-01-01",
                    'date_end' => "$endYear-12-31",

                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                ],
            ]);

            // $data = json_decode($response->getBody(), true);
            $body = $response->getBody();
            $responseData = json_decode($body);
            foreach ($responseData as $data) {
                foreach ($data as $item) {
                    // ตรวจสอบว่าข้อมูลมีอยู่แล้วหรือไม่
                    $existingRecord = risk_management::where([
                        'year' => $startYear,
                        'risk_id' => $item->risk_id, // ค่าที่ได้จาก API
                        'group_name' => $item->group_name, // ค่าที่ได้จาก API
                        'count' => $item->count // ค่าที่ได้จาก API
                    ])->exists();

                    // ถ้าข้อมูลยังไม่มีอยู่ในฐานข้อมูล ให้ทำการสร้างข้อมูลใหม่
                    if (!$existingRecord) {
                        risk_management::create([
                            'year' => $startYear,
                            'risk_id' => $item->risk_id, // ค่าที่ได้จาก API
                            'group_name' => $item->group_name, // ค่าที่ได้จาก API
                            'count' => $item->count // ค่าที่ได้จาก API
                        ]);
                    }
                }
            }
            // foreach ($responseData as $data) {
            //     foreach ($data as $item) {
            //         risk::create([
            //             'year' => $startYear,
            //             'risk_id' => $item->risk_id, // ค่าที่ได้จาก API
            //             'group_name' => $item->group_name, // ค่าที่ได้จาก API
            //             'count' => $item->count // ค่าที่ได้จาก API
            //         ]);
            //     }
            // }  

            $gname = risk_management::select('group_name')
                ->where('year', $years)
                ->groupBy('group_name')
                ->orderBy('id')
                ->get();

            $arrary_gname = array();
            foreach ($gname as $key => $value) {
                array_push($arrary_gname, $value->group_name);
            }
            $jsonData = [];

            $numcount = risk_management::select('group_name', 'count')
                ->where('year', $years)
                ->get();

            $array_numcount = [];
            foreach ($numcount as $key => $value) {
                array_push($array_numcount, $value->count);
            }

            $jsonData[] = [
                'name' => 'Year ' . $years,
                'data' => $array_numcount,
            ];
        }

        $risk = risk_management::all();
        return view('about.record.risk', compact('risk', 'arrary_gname', 'jsonData', 'years'));
    }

    public function elderlygroups()
    {
        $elderlygroups = DB::table(DB::raw('(SELECT 
        year,
        SUM(CASE WHEN low_dependence != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS low_dependence,
        SUM(CASE WHEN medium_dependence != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS medium_dependence,
        SUM(CASE WHEN endo != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS endo,
        SUM(CASE WHEN fillng != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS fillng,
        SUM(CASE WHEN perio != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS perio,
        SUM(CASE WHEN prosth != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS prosth,
        SUM(CASE WHEN extraction != 0 AND deleted_by IS NULL AND deleted_at IS NULL THEN 1 ELSE 0 END) AS extraction
        FROM 
        elderlygroups
        GROUP BY 
        year
        ORDER BY 
        year DESC
        LIMIT 3) as sub'))
            ->orderBy('year')
            ->get();


        $array_name = [
            'low_dependence',
            'medium_dependence',
            'endo',
            'fillng',
            'perio',
            'prosth',
            'extraction',
        ];

        $jsonData = [];
        foreach ($elderlygroups as $group) {
            $array_data = [
                $group->low_dependence,
                $group->medium_dependence,
                $group->endo,
                $group->fillng,
                $group->perio,
                $group->prosth,
                $group->extraction,
            ];

            $jsonData[] = [
                'name' => 'Year ' . $group->year,
                'data' => $array_data,
            ];

            $count_sex = DB::table('elderlygroups')
                ->selectRaw('year,COUNT(name) AS name,
            SUM(CASE WHEN sex = 1 THEN 1 ELSE 0 END) AS male,
            SUM(CASE WHEN sex = 2 THEN 1 ELSE 0 END) AS female')
                ->groupBy('year')
                ->orderBy('year')
                ->get();
        }

        // dd($jsonData);
        // dd($elderlygroups);
        return view('about.record.elderlygroups', compact('elderlygroups', 'jsonData', 'array_name', 'count_sex'));
    }

    public function specialpatientgroups()
    {
        $specialpatientgroup = DB::table('special_patientgroups')
            ->selectRaw('year,
        SUM(CASE WHEN GA <> "" THEN 1 ELSE 0 END) AS GA,
        SUM(Filling) AS Filling,
        SUM(Perio = 1) AS Perio,
        SUM(Fluoride = 1) AS Fluoride,
        SUM(Scaling = 1) AS Scaling,
        SUM(Ext = 1) AS Ext,
        SUM(OHI = 1) AS OHI,
        SUM(Sealant = 1) AS Sealant')
            ->whereNull('deleted_by')
            ->whereNull('deleted_at')
            ->groupBy('year')
            ->orderBy('year', 'DESC')
            ->limit(3)
            ->get();


        $jsonData = [];
        foreach ($specialpatientgroup as $group) {
            $array_data = [
                $group->GA,
                $group->Filling,
                $group->Perio,
                $group->Fluoride,
                $group->Scaling,
                $group->Ext,
                $group->OHI,
                $group->Sealant,

            ];
            $array_name = [
                'GA',
                'Filling',
                'Scaling',
                'Fluoride',
                'perio',
                'Ext',
                'OHI',
                'Sealant',
            ];

            $jsonData[] = [
                'name' => 'Year ' . $group->year,
                'data' => $array_data,
            ];

            $count_sex = DB::table('special_patientgroups')
                ->selectRaw('year,COUNT(name) AS name,
            SUM(CASE WHEN sex = 1 THEN 1 ELSE 0 END) AS male,
            SUM(CASE WHEN sex = 2 THEN 1 ELSE 0 END) AS female')
                ->whereNull('deleted_by')
                ->whereNull('deleted_at')
                ->groupBy('year')
                ->orderBy('year', 'DESC')
                ->limit(3)
                ->get();
        }
        // dd($jsonData);
        return view('about.record.specialpatientgroup', compact('specialpatientgroup', 'jsonData', 'array_name', 'count_sex'));
    }

    public function emergency()
    {
        $year = emergency::select('year')
            ->whereNull('deleted_by')
            ->whereNull('deleted_at')
            ->groupBy('year')
            ->orderBy('year', 'DESC')
            ->limit(3)
            ->get();

        $arrary_year = array();
        foreach ($year as $key => $value) {
            array_push($arrary_year, $value->year);
        }

        $jsonData = [];

        $pt = emergency::select(
            DB::raw('year, COUNT(name) AS countname')
        )
            ->whereNull('deleted_by')
            ->whereNull('deleted_at')
            ->groupBy('year')
            ->orderBy('year', 'DESC')
            ->limit(3)
            ->get();
        $array_pt = [];
        foreach ($pt as $key => $value) {
            array_push($array_pt, $value->countname);
        }

        $jsonData[] = [
            'name' =>  'จำนวนผู้ป่วย',
            'data' => $array_pt,
        ];
        return view('about.record.emergency', compact('jsonData', 'arrary_year'));
    }
}
