@extends('layouts_backend.layouts')
@section('title', 'เพิ่มข้อมูลสถิติผู้ป่วยกลุ่มผู้สูงอายุ')
@section('content')

    <body style="font-family: 'Prompt', sans-serif;" x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased">
        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <div class="main-content flex flex-col min-h-screen">
                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <div class="panel p-5">
                        @if ($source === 'elderlygroup')
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                เพิ่มข้อมูลสถิติผู้ป่วยกลุ่มผู้สูงอายุ</h4>
                            <form method="POST" action="{{ route('record_manage.store', ['source' => 'elderlygroup']) }}">
                                @csrf

                                <div class="mb-5">
                                    <label for="year">ปี</label>
                                    <select id="year" name="year" class="form-input">
                                        <?php
                                        $current_year = date('Y');
                                        for ($i = $current_year; $i >= $current_year - 4; $i--) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-2" style="display: flex; justify-content: space-between;">
                                    <div style="flex-basis: 28%;">
                                        <label for="HN" style="display: inline-block;">HN</label>
                                        <input type="text" id="HN" name="HN" rows="3" placeholder="HN"
                                            class="form-input" style="display: inline-block;"></input>
                                    </div>

                                    <div style="flex-basis: 50%;">
                                        <label for="name" style="display: inline-block;">ชื่อ-นามสกุล</label>
                                        <input type="text" id="name" name="name" rows="3"
                                            placeholder="ชื่อ-นามสกุล" class="form-input"
                                            style="display: inline-block;"></input>
                                    </div>
                                    <div style="flex-basis: 18%;">
                                        <label for="old">อายุ</label>
                                        <input type="nunber" id="old" name="old" rows="3"
                                            placeholder="อายุ" class="form-input"></input>
                                    </div>
                                </div>
                                <div class="mb-5 mt-5" style="display: flex; justify-content: space-between;">
                                    <label for="HN" style="display: inline-block;">เพศ</label>
                                    <div style="flex-basis: 10%; margin-left:2%">
                                        <label class="inline-flex">
                                            <input type="radio" name="sex" value="1" class="form-radio peer"
                                                checked />
                                            <span class="peer-checked:text-primary">ชาย</span>
                                        </label>
                                    </div>
                                    <div style="flex-basis: 10%;">
                                        <label class="inline-flex">
                                            <input type="radio" name="sex"
                                                value="2"class="form-radio text-primary peer" />
                                            <span class="peer-checked:text-primary">หญิง</span>
                                        </label>
                                    </div>
                                    <div style="flex-basis: 80%;">
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label for="congenital_disease">โรคประจำตัว</label>
                                    <input type="text" id="congenital_disease" name="congenital_disease" rows="3"
                                        placeholder="โรคประจำตัว" class="form-input"></input>
                                </div>

                                <div class="mb-5">
                                    <label for="medium_dependence">medium_dependence</label>
                                    <input type="text" id="medium_dependence" name="medium_dependence" rows="3"
                                        placeholder="medium_dependence" class="form-input"></input>
                                </div>

                                <div class="mb-2" style="display: flex; justify-content: space-between;">
                                    <label class="inline-flex">
                                        <input type="checkbox" id="gero" name="gero" value="1"
                                            class="form-checkbox rounded-full peer" />
                                        <span class="peer-checked:text-primary">Gero</span>
                                    </label>
                                    <label class="inline-flex">
                                        <input type="checkbox" id="low_dependence" name="low_dependence" value="1"
                                            class="form-checkbox rounded-full peer" />
                                        <span class="peer-checked:text-primary">Low Dependence</span>
                                    </label>
                                    <label class="inline-flex">
                                        <input type="checkbox" id="endo" name="endo" value="1"
                                            class="form-checkbox text-primary rounded-full peer" />
                                        <span class="peer-checked:text-primary">Endo</span>
                                    </label>

                                    <label class="inline-flex">
                                        <input type="checkbox" id="fillng" name="fillng" value="1"
                                            class="form-checkbox text-primary rounded-full peer" />
                                        <span class="peer-checked:text-primary">Fillng</span>
                                    </label>
                                    <label class="inline-flex">
                                        <input type="checkbox" id="perio" name="perio" value="1"
                                            class="form-checkbox text-primary rounded-full peer" />
                                        <span class="peer-checked:text-primary">Perio</span>
                                    </label>
                                    <label class="inline-flex">
                                        <input type="checkbox" id="prosth" name="prosth" value="1"
                                            class="form-checkbox text-primary rounded-full peer" />
                                        <span class="peer-checked:text-primary">Prosth</span>
                                    </label>
                                    <label class="inline-flex">
                                        <input type="checkbox" id="extraction" name="extraction" value="1"
                                            class="form-checkbox text-primary rounded-full peer" />
                                        <span class="peer-checked:text-primary">Extraction</span>
                                    </label>
                                    </label>
                                    <label class="inline-flex" style="flex-basis: 10%;">
                                    </label>

                                    <div class="mt-8 flex items-center justify-end">
                                        <a href="{{ route('record_manage.index') }}" type="reset" class="btn btn-outline-danger">ยกเลิก</a>                          
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                            </form>
                        @elseif ($source === 'specialpatientgroup')
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                เพิ่มข้อมูลสถิติผู้ป่วยกลุ่มเด็กพิเศษที่มีอายุ 12 ปี ขึ้นไป</h4>
                            <form method="POST"
                                action="{{ route('record_manage.store', ['source' => 'specialpatientgroup']) }}">
                                @csrf
                                <div class="mb-5">
                                    <label for="year">ปี</label>
                                    {{-- <input type="text" id="year" name="year" placeholder="ปี"  class="form-input"> --}}
                                    <select id="year" name="year" class="form-input">
                                        <?php
                                        $current_year = date('Y');
                                        for ($i = $current_year + 543; $i >= $current_year - 4 + 543; $i--) {
                                            echo "<option value=\"$i\">$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-2" style="display: flex; justify-content: space-between;">
                                    <div style="flex-basis: 28%;">
                                        <label for="HN" style="display: inline-block;">HN</label>
                                        <input type="text" id="HN" name="HN" rows="3"
                                            placeholder="HN" class="form-input" style="display: inline-block;"></input>
                                    </div>

                                    <div style="flex-basis: 50%;">
                                        <label for="name" style="display: inline-block;">ชื่อ-นามสกุล</label>
                                        <input type="text" id="name" name="name" rows="3"
                                            placeholder="ชื่อ-นามสกุล" class="form-input"
                                            style="display: inline-block;"></input>
                                    </div>
                                    <div style="flex-basis: 18%;">
                                        <label for="old">อายุ</label>
                                        <input type="nunber" id="old" name="old" rows="3"
                                            placeholder="อายุ" class="form-input"></input>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="detail">เบอร์โทรศัพท์</label>
                                    <input id="phon" type="text" placeholder="เบอร์โทรศัพท์" class="form-input"
                                        name="phon" />
                                </div>
                                <div class="mb-5">
                                    <label for="detail">เพศ</label>
                                    <div class="flex-1">
                                        <div class="mb-2 flex">
                                            <label class="inline-flex items-center cursor-pointer mr-2">
                                                <input type="radio" name="sex" class="form-radio"
                                                    value="2" />
                                                <span class="text-white-dark ml-1">หญิง</span>
                                            </label>
                                            <label class="inline-flex items-center cursor-pointer">
                                                <input type="radio" name="sex" class="form-radio"
                                                    value="1" />
                                                <span class="text-white-dark ml-1">ชาย</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="detail">โรคประจำตัว</label>
                                    <input id="U_D" type="text" placeholder="โรคประจำตัว" class="form-input"
                                        name="U_D" />
                                </div>
                                <div class="mb-5">
                                    <label for="detail">อื่นๆ</label>
                                    <input id="GA" type="text" placeholder="อื่นๆ" class="form-input"
                                        name="GA" />
                                </div>

                                <div class="mb-2" style="display: flex; justify-content: space-between;">
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer mr-2">
                                            <input type="radio" name="Filling" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Filling</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="Perio" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Perio</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer mr-2">
                                            <input type="radio" name="Fluoride" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Fluoride</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="Scaling" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Scaling</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer mr-2">
                                            <input type="radio" name="Ext" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Ext</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="OHI" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">OHI</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer mr-2">
                                            <input type="radio" name="Sealant" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Sealant</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex" style="flex-basis: 10%;">
                                    </label>
                                </div>
                                <div class="mt-8 flex items-center justify-end">
                                    <a href="{{ route('record_manage.index') }}" type="reset" class="btn btn-outline-danger">ยกเลิก</a>                          
                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                </div>
                            </form>
                        @elseif ($source === 'emergency')
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                เพิ่มข้อมูลสถิติผู้ป่วยกลุ่ม Emergency </h4>
                            <form method="POST" action="{{ route('record_manage.store', ['source' => 'emergency']) }}">
                                @csrf
                                <div class="mb-2" style="display: flex; justify-content: space-between;">
                                    <div style="flex-basis: 32%;">
                                        <label for="date" style="display: inline-block;">วันที่</label>
                                        <input type="text" id="date" name="date" rows="3"
                                            placeholder="วันที่" class="form-input"
                                            style="display: inline-block;"></input>
                                    </div>
                                    <div style="flex-basis: 32%;">
                                        <label for="year">เดือน</label>
                                        <select id="month" name="month" class="form-input">
                                            <option value="1">มกราคม</option>
                                            <option value="2">กุมภาพันธ์</option>
                                            <option value="3">มีนาคม</option>
                                            <option value="4">เมษายน</option>
                                            <option value="5">พฤษภาคม</option>
                                            <option value="6">มิถุนายน</option>
                                            <option value="7">กรกฎาคม</option>
                                            <option value="8">สิงหาคม</option>
                                            <option value="9">กันยายน</option>
                                            <option value="10">ตุลาคม</option>
                                            <option value="11">พฤศจิกายน</option>
                                            <option value="12">ธันวาคม</option>
                                        </select>
                                    </div>
                                    <div style="flex-basis: 32%;">
                                        <label for="year">ปี</label>
                                        {{-- <input type="text" id="year" name="year" placeholder="ปี"  class="form-input"> --}}
                                        <select id="year" name="year" class="form-input">
                                            <?php
                                            $current_year = date('Y');
                                            for ($i = $current_year; $i >= $current_year - 4; $i--) {
                                                echo "<option value=\"$i\">$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-2" style="display: flex; justify-content: space-between;">

                                    <div style="flex-basis: 32%;">
                                        <label for="HN" style="display: inline-block;">HN</label>
                                        <input type="text" id="HN" name="HN" rows="3"
                                            placeholder="HN" class="form-input" style="display: inline-block;"></input>
                                    </div>

                                    <div style="flex-basis: 66%;">
                                        <label for="name" style="display: inline-block;">ชื่อ-นามสกุล</label>
                                        <input type="text" id="name" name="name" rows="3"
                                            placeholder="ชื่อ-นามสกุล" class="form-input"
                                            style="display: inline-block;"></input>
                                    </div>
                                </div>
                                <div class="mb-2" style="display: flex; justify-content: space-between;">
                                    <div style="flex-basis: 50%;">
                                        <label for="other">อื่นๆ</label>
                                        <input id="other" type="text" placeholder="อื่นๆ" class="form-input"
                                            name="other" />
                                    </div>
                                    <div style="flex-basis: 48%;">
                                        <label for="endo">endo</label>
                                        <input id="endo" type="text" placeholder="endo" class="form-input"
                                            name="endo" />
                                    </div>
                                </div>

                                <div class="mb-2 mt-5" style="display: flex; justify-content: space-between;">
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer mr-2">
                                            <input type="radio" name="filling" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Filling</span>
                                        </label>
                                    </label>
                                    <label class="inline-flex">
                                        <label class="inline-flex items-center cursor-pointer">
                                            <input type="radio" name="perio" class="form-radio" value="1" />
                                            <span class="text-white-dark ml-1">Perio</span>
                                        </label>
                                    </label>
                                    <div style="flex-basis: 60%;">
                                    </div>
                                </div>
                                <div class="mt-8 flex items-center justify-end">
                                    <a href="{{ route('record_manage.index') }}" type="reset" class="btn btn-outline-danger">ยกเลิก</a>                          
                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @csrf
        @push('js')
        @endpush
    @endsection
