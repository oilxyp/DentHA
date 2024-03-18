@extends('layouts_backend.layouts')
@section('title', 'โครงสร้างองค์กร')
@section('content')

        <body style="font-family: 'Prompt', sans-serif;" x-data="main"
            class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased">
            <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
                <div class="main-content flex flex-col min-h-screen">
                    <div class="animate__animated p-6" :class="[$store.app.animation]">
                        <!-- simple tabs -->

                        {{-- <div>
                            <ul class="flex flex-wrap mt-3 border-b border-white-light dark:border-[#191e3a]">
                                <li>
                                    <input type="radio" id="tab1" name="tab" class="hidden" />
                                    <label for="tab1"
                                        class="tab-label p-3.5 py-2 block border border-transparent hover:text-primary dark:hover:border-b-black"
                                        :class="{ 'active': tab === '1' }"
                                        @click="showTab('tab-content1')">
                                        โครงสร้างการบริหาร
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="tab2" name="tab" class="hidden" />
                                    <label for="tab2"
                                        class="tab-label p-3.5 py-2 block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                        :class="{ 'active': tab === '2' }"
                                        @click="showTab('tab-content2')">
                                        โครงสร้างบริหารหน่วยภายในโรงพยาบาลทันตกรรม
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="tab3" name="tab" class="hidden" />
                                    <label for="tab3"
                                        class="tab-label p-3.5 py-2 block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                        :class="{ 'active': tab === '3' }"
                                        @click="showTab('tab-content3')">
                                        โครงสร้างความรับผิดชอบและการประสานงานในระบบคุณภาพ/สร้างเสริมสุขภาพ
                                    </label>
                                </li>
                                <li>
                                    <input type="radio" id="tab4" name="tab" class="hidden" />
                                    <label for="tab4"
                                        class="tab-label p-3.5 py-2 block border border-transparent hover:text-primary dark:hover:border-[#191e3a] dark:hover:border-b-black"
                                        :class="{ 'active': tab === '4' }"
                                        @click="showTab('tab-content4')">
                                        โครงสร้างระบบกำกับดูแลกิจการ / ธรรมาภิบาล
                                    </label>
                                </li>
                              
                            </ul>
                        </div> --}}
                        
                        <div>
                            {{-- <div class="tab-content" id="tab-content1"> --}}
                                <div x-data="contacts" class="mt-5">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <h2 class="text-xl font-semibold">
                                            โครงสร้างการบริหาร</h2>
                                        {{-- <div
                                            class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                                            <div class="flex gap-3">
                                                <div>
                                                    <button type="button" class="btn btn-primary" @click="editUser">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19">
                                                            </line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12">
                                                            </line>
                                                        </svg>
                                                        <a href="#">เพิ่มข้อมูล</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div x-data="basic">
                                    <div class="panel mt-3">
                                        <table id="example" class="table-hover whitespace-nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">ID</th>
                                                    <th style="text-align: center">หัวข้อ</th>
                                                    <th style="text-align: center">รูปภาพ</th>
                                                    <th style="text-align: center">การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($administer as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->name}}</td>
                                                    {{-- <td>{{$row->detail}}</td> --}}
                                                    <td><img src="{{ asset('storage/images/structure/'.$row->detail) }}" alt="" style="width: 300px; hight: 300px;"></td>

                                                    <td>
                                                        <div class="flex items-center justify-center gap-4">
                                                            <a href="{{ route('structure_manage.edit', ['structure_manage' => $row->id, 'source' => 'administer']) }}" class="btn btn-sm btn-outline-warning">
                                                                แก้ไข</a>
                                                            {{-- <form action="{{ route('structure_manage.destroy', ['structure_manage' => $row->id, 'source' => 'administer']) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">ลบ</button>
                                                            </form> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            {{-- </div>

                            <div class="tab-content" id="tab-content2"> --}}
                                <div x-data="contacts" class="mt-5">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <h2 class="text-xl font-semibold">
                                            โครงสร้างบริหารหน่วยภายในโรงพยาบาลทันตกรรม</h2>
                                        {{-- <div
                                            class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                                            <div class="flex gap-3">
                                                <div>
                                                    <button type="button" class="btn btn-primary" @click="editUser">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19">
                                                            </line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12">
                                                            </line>
                                                        </svg>
                                                        <a href="#">เพิ่มข้อมูล</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div x-data="basic">
                                    <div class="panel mt-3">
                                        <table id="example2" class="table-hover whitespace-nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">ID</th>
                                                    <th style="text-align: center">หัวข้อ</th>
                                                    <th style="text-align: center">รูปภาพ</th>
                                                    <th style="text-align: center">การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($denthospital as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->name}}</td>
                                                    <td><img src="{{ asset('storage/images/structure/'.$row->picture) }}" alt="" style="width: 300px; hight: 300px;"></td>
                                                    <td>
                                                        <div class="flex items-center justify-center gap-4">
                                                            <a href="{{ route('structure_manage.edit', ['structure_manage' => $row->id, 'source' => 'denthospital']) }}" class="btn btn-sm btn-outline-warning">
                                                                แก้ไข</a>
                                                            {{-- <form action="{{ route('structure_manage.destroy', ['structure_manage' => $row->id, 'source' => 'denthospital']) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">ลบ</button>
                                                            </form> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            {{-- </div>

                            <div class="tab-content" id="tab-content3"> --}}
                                <div x-data="contacts" class="mt-5">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <h2 class="text-xl font-semibold">
                                            โครงสร้างความรับผิดชอบและการประสานงานในระบบคุณภาพ</h2>
                                        {{-- <div
                                            class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                                            <div class="flex gap-3">
                                                <div>
                                                    <button type="button" class="btn btn-primary" @click="editUser">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19">
                                                            </line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12">
                                                            </line>
                                                        </svg>
                                                        <a href="#">เพิ่มข้อมูล</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div x-data="basic">
                                    <div class="panel mt-3">
                                        <table id="example3" class="table-hover whitespace-nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">ID</th>
                                                    <th style="text-align: center">หัวข้อ</th>
                                                    <th style="text-align: center">รายละเอียด</th>
                                                    <th style="text-align: center">การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($coordinate as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->name}}</td>
                                                    <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$row->detail}}</td>
                                                    <td>
                                                        <div class="flex items-center justify-center gap-4">
                                                            <a href="{{ route('structure_manage.edit', ['structure_manage' => $row->id, 'source' => 'coordinate']) }}" class="btn btn-sm btn-outline-warning">
                                                                แก้ไข</a>
                                                            {{-- <form action="{{ route('structure_manage.destroy', ['structure_manage' => $row->id, 'source' => 'coordinate']) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">ลบ</button>
                                                            </form> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            {{-- </div>

                            <div class="tab-content" id="tab-content4"> --}}
                                <div x-data="contacts" class="mt-5">
                                    <div class="flex flex-wrap items-center justify-between gap-4">
                                        <h2 class="text-xl font-semibold">
                                            โครงสร้างระบบกำกับดูแลกิจการ / ธรรมาภิบาล</h2>
                                        {{-- <div
                                            class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                                            <div class="flex gap-3">
                                                <div>
                                                    <button type="button" class="btn btn-primary" @click="editUser">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                            height="24px" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19">
                                                            </line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12">
                                                            </line>
                                                        </svg>
                                                        <a href="#">เพิ่มข้อมูล</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div x-data="basic">
                                    <div class="panel mt-3">
                                        <table id="example4" class="table-hover whitespace-nowrap"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">ID</th>
                                                    <th style="text-align: center">หัวข้อ</th>
                                                    <th style="text-align: center">รายละเอียด</th>
                                                    <th style="text-align: center">การจัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ggovernance as $row)
                                                <tr>
                                                    <td>{{$row->id}}</td>
                                                    <td>{{$row->name}}</td>
                                                    <td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$row->detail}}</td>
                                                    <td>
                                                        <div class="flex items-center justify-center gap-4">
                                                            <a href="{{ route('structure_manage.edit', ['structure_manage' => $row->id, 'source' => 'ggovernance']) }}" class="btn btn-sm btn-outline-warning">
                                                                แก้ไข</a>
                                                            {{-- <form action="{{ route('structure_manage.destroy', ['structure_manage' => $row->id, 'source' => 'ggovernance']) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger">ลบ</button>
                                                            </form> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>                                                          
                    </div>
                </div>
            </div>
    </div>
    {{-- <script>
        // ตั้งค่า tab เป็น '1' เมื่อหน้าเว็บโหลดเสร็จ
        let tab = '1';
    
        function showTab(tabId) {
            // ซ่อนทุก tab-content ก่อน
            const allTabs = document.querySelectorAll('.tab-content');
            allTabs.forEach(tab => {
                tab.style.display = 'none';
            });
    
            // แสดง tab-content ที่ถูกคลิก
            const selectedTab = document.getElementById(tabId);
            selectedTab.style.display = 'block';
        }
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // เมื่อหน้าเว็บโหลดเสร็จ ให้แสดง tab-content1 และทำให้ tab1 เป็น active
            showTab('tab-content1');
            document.getElementById('tab1').checked = true;
        });

        function showTab(tabId) {
            // ซ่อนทุก tab-content ก่อน
            const allTabs = document.querySelectorAll('.tab-content');
            allTabs.forEach(tab => {
                tab.style.display = 'none';
            });

            // แสดง tab-content ที่ถูกคลิก
            const selectedTab = document.getElementById(tabId);
            selectedTab.style.display = 'block';
        }
    </script>
    @csrf
    @push('js')
    @endpush
@endsection
