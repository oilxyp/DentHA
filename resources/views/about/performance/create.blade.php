@extends('layouts_backend.layouts')
@section('title', 'เพิ่มข้อมูลระบบการพัฒนาคุณภาพ')
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
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">เพิ่มข้อมูลระบบการพัฒนาคุณภาพ</h4>
                            <form method="POST" action="{{ route('performance_manage.store',['source' => 'devquality']) }}" >
                                @csrf                         
                                <div class="mb-5">
                                    <label for="name">หัวข้อ</label>
                                    <textarea id="name" name="name" rows="3" placeholder="กรอกรายละเอียด"
                                        class="form-textarea min-h-[130px] resize-none"></textarea>
                                </div>                               
                                <div class="mt-8 flex items-center justify-end">
                                    <button type="reset" class="btn btn-outline-danger">
                                        <a href="{{route('performance_manage.index')}}">ยกเลิก</a>
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
