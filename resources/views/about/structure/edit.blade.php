@extends('layouts_backend.layouts')
@section('title', 'แก้ไขข้อมูล')
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
                        @if ($source === 'administer')
                            <div class="panel p-5">
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                    แก้ไขข้อมูลโครงสร้างการบริหาร</h4>

                                <form method="POST" action="{{ route('structure_manage.update', $data['id']) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="source" value="{{ $source }}">
                                    <div class="mb-5">
                                        <label for="name">ชื่อ</label>
                                        <input id="name" type="text" placeholder="เพิ่มชื่อบริการ"
                                            class="form-input" name="name" value="{{ $data->name }}" />
                                    </div>
                                    <div class="panel">
                                        <div class="mb-5">
                                            <label for="Image" class="form-label">รูปภาพ</label>
                                            <input type="file" name="detail" class="custom-file-container"
                                                data-upload-id="mySecondImage">
                                        </div>
                                        <div class="item item-center"
                                            style="display: flex; justify-content: center; align-items: center;">
                                            <img src="{{ asset('storage/images/structure/' . $data->detail) }}"
                                                alt="" style="width: 500px; hight: 500px;">
                                        </div>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                        <button type="reset" class="btn btn-outline-danger">
                                            <a href="{{ route('structure_manage.index') }}">ยกเลิก</a>
                                        </button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                        @elseif ($source === 'denthospital')
                            <div class="panel p-5">
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                    แก้ไขข้อมูลโครงสร้างบริหารหน่วยภายในโรงพยาบาลทันตกรรม</h4>
                                    <form method="POST" action="{{ route('structure_manage.update', $data['id']) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="source" value="{{ $source }}">
                                    <div class="mb-5">
                                        <label for="name">ชื่อ</label>
                                        <input id="name" type="text" placeholder="เพิ่มชื่อบริการ"
                                            class="form-input" name="name" value="{{ $data->name }}" />
                                    </div>
                                    <div class="panel">
                                        <div class="mb-5">
                                            <label for="Image" class="form-label">รูปภาพ</label>
                                            <input type="file" name="picture" class="custom-file-container"
                                                data-upload-id="mySecondImage">
                                        </div>
                                        <div class="item item-center"
                                            style="display: flex; justify-content: center; align-items: center;">
                                            <img src="{{ asset('storage/images/structure/' . $data->picture) }}"
                                                alt="" style="width: 500px; hight: 500px;">
                                        </div>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                        <button type="reset" class="btn btn-outline-danger">
                                            <a href="{{ route('structure_manage.index') }}">ยกเลิก</a>
                                        </button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                        @elseif ($source === 'coordinate')
                            <div class="panel p-5">
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                    แก้ไขข้อมูลโครงสร้างความรับผิดชอบและการประสานงานในระบบคุณภาพ</h4>
                                <form method="POST" action="{{ route('structure_manage.update', $data->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="source" value="{{ $source }}">
                                    <div class="mb-5">
                                        <label for="name">ชื่อ</label>
                                        <input id="name" type="text" placeholder="เพิ่มชื่อบริการ"
                                            class="form-input" name="name" value="{{ $data->name }}" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="detail">รายละเอียด</label>
                                        <textarea id="detail" name="detail" rows="3" placeholder="กรอกรายละเอียด"
                                            class="form-textarea min-h-[130px] resize-none">{{ $data->detail }}</textarea>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                        <button type="reset" class="btn btn-outline-danger">
                                            <a href="{{ route('structure_manage.index') }}">ยกเลิก</a>
                                        </button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                        @elseif ($source === 'ggovernance')
                            <div class="panel p-5">
                                <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">
                                    แก้ไขข้อมูลโครงสร้างระบบกำกับดูแลกิจการ / ธรรมาภิบาล</h4>
                                <form method="POST" action="{{ route('structure_manage.update', $data->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="source" value="{{ $source }}">
                                    <div class="mb-5">
                                        <label for="name">ชื่อ</label>
                                        <input id="name" type="text" placeholder="เพิ่มชื่อบริการ"
                                            class="form-input" name="name" value="{{ $data->name }}" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="detail">รายละเอียด</label>
                                        <textarea id="detail" name="detail" rows="3" placeholder="กรอกรายละเอียด"
                                            class="form-textarea min-h-[130px] resize-none">{{ $data->detail }}</textarea>
                                    </div>
                                    <div class="mt-8 flex items-center justify-end">
                                        <button type="reset" class="btn btn-outline-danger">
                                            <a href="{{ route('structure_manage.index') }}">ยกเลิก</a>
                                        </button>
                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                    </div>
                                </form>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
    </div>
    @csrf
    @push('js')
    @endpush
@endsection
