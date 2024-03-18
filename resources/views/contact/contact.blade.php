@extends('layouts.layouts')
@section('title', 'ติดต่อ')

@section('content')
    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->
    <div class="animate__animated p-6">
        <div class="container py-2">
            <h3 class="text mt-5 mb-6 text-xl font-bold md:text-2xl">ติดต่อเรา</h3>
            <hr>
            <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2 mt-5">
                <div class="panel h-full w-full ">
                    {{-- <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">แผนที่</h5>
        </div> --}}
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1132.9286786314829!2d98.96715818686974!3d18.789972345379503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a7d9a4abd79%3A0xab608efde5483493!2z4LiE4LiT4Liw4LiX4Lix4LiZ4LiV4LmB4Lie4LiX4Lii4Lio4Liy4Liq4LiV4Lij4LmMIOC4oeC4q-C4suC4p-C4tOC4l-C4ouC4suC4peC4seC4ouC5gOC4iuC4teC4ouC4h-C5g-C4q-C4oeC5iA!5e0!3m2!1sth!2sth!4v1704852214106!5m2!1sth!2sth"
                        width="590" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="panel h-full w-full">
                    {{-- <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">ข้อมูลการติดต่อ</h5>
        </div> --}}
                    
                        <p style="font-size: 16px;">คณะทันตแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่<p>เลขที่ 110 ถ.สุเทพ ต.สุเทพ อ.เมือง จ.เชียงใหม่ 50200
                        </p>
                    
                    <div>
                        <ul class="flex rtl:space-x-reverse flex-wrap space-x-3 mt-5">
                            <li>
                                <a href="https://web.facebook.com/dentcmu/?locale=th_TH&_rdc=1&_rdr"
                                    class="btn btn-outline-primary h-7 w-7 rounded-full p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="" class="mt-5">โรงพยาบาลทันตกรรม</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
