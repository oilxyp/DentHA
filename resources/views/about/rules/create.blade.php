@extends('layouts_backend.layouts')
@section('title', 'เพิ่มข้อมูลกฎระเบียบและข้อบังคับ')
@section('content')

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
                        {{-- <h3 class="text text-center size-xl"></h3> --}}
                        <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">เพิ่มข้อมูลกฎระเบียบและข้อบังคับ</h4>
                        <form method="POST" action="{{ route('rules_manage.store') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="name">ชื่อ</label>
                                <input id="name" type="text" placeholder="เพิ่มกฏ" class="form-input"
                                    name="name" />
                            </div>

                            <div class="mb-5">
                                <label for="name">ลิงก์</label>
                                <input id="link" type="text" placeholder="เพิ่มลิงก์" class="form-input"
                                    name="link" />
                            </div>

                            <div class="mt-8 flex items-center justify-end">
                                <button type="reset" class="btn btn-outline-danger">
                                    <a href="{{ route('rules_manage.index') }}">ยกเลิก</a>
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
