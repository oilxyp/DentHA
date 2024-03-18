@extends('layouts_backend.layouts')
@section('title', 'เพิ่มข้อมูลประชาสัมพันธ์')
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
                            <h4 class="text text-center mb-6 text-xl font-bold md:text-1xl">เพิ่มข้อมูลประชาสัมพันธ์</h4>
                            <form method="POST" action="{{ route('publish.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-5">
                                    <label for="name">หัวข้อ</label>
                                    <input id="name" type="text" name="name" placeholder="กรอกชื่อประชาสัมพันธ์"
                                        class="form-input" />
                                </div>
                                <div class="mb-5">
                                    <label for="detail">รายละเอียด</label>
                                    <textarea id="detail" name="detail" rows="3" placeholder="กรอกรายละเอียดประชาสัมพันธ์"
                                        class="form-textarea min-h-[130px] resize-none"></textarea>
                                </div>
                                <div class="mb-5">
                                    <label for="number">รูปภาพ</label>
                                    <!-- Multiple File -->
                                    <div class="form-textarea min-h-[130px] resize-none">
                                        {{-- <div class="custom-file-container" data-upload-id="mySecondImage"></div> --}}
                                        <input type="file" name="picture">
                                    </div>
                                    <template x-if="codeArr.includes('code2')">
                                        <pre class="code overflow-auto rounded-md !bg-[#191e3a] p-4 text-white">
                                </pre>
                                    </template>
                                </div>
                                <div class="mt-8 flex items-center justify-end">
                                    <button type="reset" class="btn btn-outline-danger">
                                        <a href="{{ route('home.index') }}">ยกเลิก</a>
                                    </button>
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
