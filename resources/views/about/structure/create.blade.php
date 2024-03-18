@extends('layouts_backend.layouts')
@section('title', 'เพิ่มข้อมูลโครงสร้างองค์กร')
@section('content')

    <div class="container py-2">

        <body style="font-family: 'Prompt', sans-serif;" x-data="main"
            class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
            :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?
                'dark' :
                '',
                $store.app.menu, $store.app.layout, $store.app.rtlClass
            ]">
            <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
                <div class="main-content flex flex-col min-h-screen">
                    <div class="animate__animated p-6" :class="[$store.app.animation]">
                        <div class="panel p-5">
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">เพิ่มข้อมูลโครงสร้างองค์กร</h4>
                            <form method="POST" action="#" >
                                @csrf       
                                <div class="flex flex-col sm:flex-row">
                                    <label class="rtl:ml-2 sm:w-1/4 sm:ltr:mr-2">เลือกหัวข้อที่ต้องการเพิ่มข้อมูล</label>
                                    <div class="flex-1">
                                        <div class="mb-2">
                                            <label class="mt-1 inline-flex cursor-pointer">
                                                <input type="radio" name="segements" class="form-radio" />
                                                <span class="text-white-dark">โครงสร้างความรับผิดชอบและการประสานงานในระบบคุณภาพ/สร้างเสริมสุขภาพ</span>
                                            </label>
                                        </div>
                                        <div class="mb-2">
                                            <label class="mt-1 inline-flex cursor-pointer">
                                                <input type="radio" name="segements" class="form-radio" />
                                                <span class="text-white-dark">โครงสร้างระบบกำกับดูแลกิจการ/ธรรมาภิบาล</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea id="detail" name="detail" rows="3" placeholder="กรอกรายละเอียด"
                                        class="form-textarea min-h-[130px] resize-none"></textarea>
                                </div>                               
                                <div class="mt-8 flex items-center justify-end">
                                    <button type="reset" class="btn btn-outline-danger">
                                        <a href="{{ route('structure_manage.index') }}">ยกเลิก</a>
                                    </button>
                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @csrf
    @push('js')
    @endpush
@endsection
