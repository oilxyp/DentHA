@extends('layouts_backend.layouts')
@section('title', 'แก้ไขข้อมูลบริการ')
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
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">แก้ไขข้อมูลรายการบริการ</h4>
                            <form method="POST" action="{{ route('menu_manage.update', $menu->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-5">
                                    <label for="name">ชื่อบริการ</label>
                                    <input id="name" type="text" placeholder="เพิ่มชื่อบริการ"
                                        class="form-input" name="name" value="{{$menu->name}}"/>
                                </div>
                                <div class="mb-5">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea id="detail" rows="3" placeholder="เพิ่มรายละเอียดบริการ"
                                        class="form-textarea min-h-[130px] resize-none" name="detail">{{$menu->detail}}</textarea>
                                </div>

                                <div class="panel">
                                    <div class="mb-5">
                                        <label for="Image" class="form-label">รูปภาพ</label>
                                        <input type="file" name="picture" class="custom-file-container"
                                            data-upload-id="mySecondImage">
                                    </div>
                                    <div class="item item-center"
                                        style="display: flex; justify-content: center; align-items: center;">
                                        @foreach (explode(',', $menu->picture) as $filename)
                                            @if (file_exists(public_path('storage/images/menu/' . $filename)))
                                                <img src="{{ asset('storage/images/menu/' . $filename) }}"
                                                    alt="" style="width: 400px; hight: 400px;">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-8 flex items-center justify-end">
                                    <a href="{{ route('menu_manage.index') }}" type="reset" class="btn btn-outline-danger">ยกเลิก</a>
                                    <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">บันทึก</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="{{ asset('assets/js/file-upload-with-preview.iife.js') }}"></script>
    <script>
        // multiple image upload
        new FileUploadWithPreview.FileUploadWithPreview('mySecondImage', {
            images: {
                baseImage: 'assets/images/file-preview.svg',
                backgroundImage: '',
            },
            multiple: true,
        });
    </script>
    @csrf
    @push('js')
    @endpush
@endsection