@extends('layouts_backend.layouts')
@section('title', 'แก้ไขข้อมูลบริการที่มีการจ้างเหมามาจากภายนอก')
@section('content')

    <body style="font-family: 'Prompt', sans-serif;" x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased">
        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <div class="main-content flex flex-col min-h-screen">
                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <div class="panel p-5">
                        <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">แก้ไขข้อมูลบริการที่มีการจ้างเหมามาจากภายนอก</h4>
                    
                        <form method="POST" action="{{ route('outsourcing.update', $outsourcing['id']) }}" >
                            @csrf
                            @method('PUT') 
                            <div class="mb-5">
                                <label for="name">บริการจ้างเหมา</label>
                                <input id="name" name="name" rows="3" value="{{$outsourcing->name}}"
                                    class="form-input"/>
                            </div>
                            <div class="mb-5">
                                <label for="detail">รายละเอียด</label>
                                <textarea id="detail" name="detail" rows="3"
                                    class="form-textarea min-h-[130px] resize-none">{{ $outsourcing->detail}}</textarea>
                            </div>
                            
                            <div class="mt-8 flex items-center justify-end">
                                <button type="reset" class="btn btn-outline-danger">
                                    <a href="{{ route('relations_manage.index')  }}">ยกเลิก</a>
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
