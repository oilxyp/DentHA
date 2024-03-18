@extends('layouts_backend.layouts')
@section('title', 'แก้ไขข้อมูลระบวนการต่างๆ')
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
                            @if ($source === 'process_commu')
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                    แก้ไขข้อมูลกระบวนการสื่อสารภายในองค์กร</h4>
                                <form method="POST"
                                    action="{{ route('performance_manage.update',['performance_manage' => $data->id, 'source' => 'process_commu']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5">
                                        <label for="name">รายละเอียด</label>
                                        <textarea id="name" name="name" rows="3" placeholder="กรอกรายละเอียด"
                                            class="form-textarea min-h-[130px] resize-none">{{$data->name}}</textarea>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                            <a href="{{ route('performance_manage.index') }}" type="reset" class="btn btn-outline-danger">ยกเลิก</a>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            @elseif ($source === 'process_createinnovation')
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                     แก้ไขข้อมูลกระบวนการสร้างนวัตกรรม</h4>
                                <form method="POST"
                                    action="{{ route('performance_manage.update',['performance_manage' => $data->id, 'source' => 'process_createinnovation']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5">
                                        <label for="name">รายละเอียด</label>
                                        <textarea id="name" name="name" rows="3" placeholder="กรอกรายละเอียด"
                                            class="form-textarea min-h-[130px] resize-none">{{$data->name}}</textarea>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                        <a href="{{ route('performance_manage.index') }}"  type="reset" class="btn btn-outline-danger">ยกเลิก</a>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            @elseif ($source === 'process_learn')
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                    แก้ไขข้อมูลกระบวนการเรียนรู้ระดับองค์กร</h4>
                                <form method="POST"
                                    action="{{ route('performance_manage.update',['performance_manage' => $data->id, 'source' => 'process_learn']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-5">
                                        <label for="name">รายละเอียด</label>
                                        <textarea id="name" name="name" rows="3" placeholder="กรอกรายละเอียด"
                                            class="form-textarea min-h-[130px] resize-none">{{$data->name}}</textarea>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                            <a href="{{ route('performance_manage.index') }}" type="reset" class="btn btn-outline-danger">ยกเลิก</a>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            @endif
                            {{-- <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">แก้ไขข้อมูลผลงานเด่นและความภาคภูมิใจขององค์กร</h4>
                            <form method="POST" action="{{ route('performance_manage.store',['source' => 'outstanding']) }}" >
                                @csrf                         
                                <div class="mb-5">
                                    <label for="name">รายละเอียด</label>
                                    <textarea id="name" name="name" rows="3" placeholder="กรอกรายละเอียด"
                                        class="form-textarea min-h-[130px] resize-none"></textarea>
                                </div>                               
                                <div class="mt-8 flex items-center justify-end">
                                    <button type="reset" class="btn btn-outline-danger">
                                        <a href="{{route('performance_manage.index')}}">ยกเลิก</a>
                                    </button>
                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @csrf
    @push('js')
    @endpush
@endsection
