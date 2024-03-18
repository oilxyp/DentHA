@extends('layouts.layouts')
@section('title', 'กิจกรรม HA')
@section('content')
    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->

    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?
            'dark' :
            '', $store.app.menu, $store.app.layout, $store.app.rtlClass
        ]">
        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <div x-data="comingsoon">
                <div class="absolute inset-0">
                    <img src="assets/images/dent/bgmenu2.png" alt="image" class="fixed inset-0 w-screen h-screen object-cover" />
                </div>
                
                <div
                    class="relative  min-h-screen items-center justify-center bg-[url(../images/dent/bgmenu.png)] bg-cover bg-center bg-no-repeat px-6 py-10 sm:px-16">
                    {{-- <img src="assets/images/auth/coming-soon-object1.png" alt="image"
                        class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2" /> --}}
                    {{-- <img src="assets/images/auth/coming-soon-object2.png" alt="image"
                        class="absolute left-24 top-0 h-40 md:left-[20%]" /> --}}
                    {{-- <img src="assets/images/auth/coming-soon-object3.png" alt="image"
                        class="absolute right-0 top-0 h-[300px]" /> --}}
                        {{-- <img src="assets/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]" /> --}}


                    <div class="animate__animated p-6">
                        <section class="hero-banner bg-light">
                            <div>
                                <h5 class="text mb-6 text-center font-bold md:text-2xl">กิจกรรม HA</h5>
                                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                                    @foreach ($menu as $row)
                                        <div
                                            class="space-y-5 rounded-md border bg-white p-5 shadow-[0px0px_2px_0px_rgba(145,158,171,0.20),0px_12px_24px-4px_rgba(145,158,171,0.12)] dark:border-[#1B2E4B] dark:bg-black">
                                            <div class="max-h-56 overflow-hidden rounded-md">
                                                <img src="{{ asset('storage/images/menu/' . $row->picture) }}"
                                                    alt="..." class="w-full object-cover" />
                                            </div>
                                            <h2 class="dark:text-white text-center">
                                                {{ $row->name }}</h2>
                                            <span class="text-white-dark">&nbsp;&nbsp;&nbsp;{{ $row->detail }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script src="assets/js/highlight.min.js"></script>
        <script src="assets/js/alpine-collaspe.min.js"></script>
        <script src="assets/js/alpine-persist.min.js"></script>
        <script defer src="assets/js/alpine-ui.min.js"></script>
        <script defer src="assets/js/alpine-focus.min.js"></script>
        <script defer src="assets/js/alpine.min.js"></script>
        <script src="assets/js/custom.js"></script>

        <script>
            document.addEventListener('alpine:init', () => {
                //Carousel
                Alpine.data('carousel', () => ({
                    items: ['Bannermenu1.svg', 'Bannermenuu.svg'],
                    init() {
                        // basic
                        const swiper1 = new Swiper('#slider1', {
                            navigation: {
                                nextEl: '.swiper-button-next-ex1',
                                prevEl: '.swiper-button-prev-ex1',
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                        });
                        // Autoplay
                        const swiper2 = new Swiper('#slider2', {
                            navigation: {
                                nextEl: '.swiper-button-next-ex2',
                                prevEl: '.swiper-button-prev-ex2',
                            },
                            autoplay: {
                                delay: 2000,
                            },
                        });
                    },
                }));
            });
        </script>

        @csrf
        @push('js')
        @endpush

    @endsection
