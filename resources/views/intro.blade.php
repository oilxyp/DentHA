@extends('layouts')
@section('title', 'ข้อมูลทั่วไป')

@section('content')
    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' :
            '', $store.app.menu, $store.app.layout, $store.app.rtlClass
        ]">
        <div class="animate__animated p-6">
            <section class="hero-banner bg-light py-5">
                <h3 class="text mb-6 text-xl font-bold md:text-2xl">ข้อมูลทั่วไป</h3>
                <hr>
                <div x-data="carousel">
                    <div class="lg:col-span-2 mt-5">
                        <div class="swiper" id="slider5">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div
                                        class="space-y-5 rounded-md border border border-white-light p-5 block bg-white-light/40 hover:bg-white-light/90 hover:text-dark dark:bg-dark/40 dark:hover:bg-dark/60">
                                        <li x-data="dropdown" x-on:mouseover="open = true"
                                            x-on:mouseleave="open = false">
                                            <div
                                                class="max-h-56 overflow-hidden rounded-md flex items-center justify-center">
                                                <img src="assets/images/dent/hospital.png" height="70px" width="70px" />
                                            </div>
                                            <div class="py-[5px] text-xl dark:text-white text-center">
                                                <button type="button" @click="toggle">
                                                    ชื่อองค์กร
                                                </button>
                                            </div>
                                            <ul x-show="open" x-collapse>
                                                <li class="py-[5px]">ไทย : โรงพยาบาลทันตกรรม คณะทันตแพทยศาสตร์
                                                    มหาวิทยาลัยเชียงใหม่</p>
                                                    อังกฤษ : Dental Hospital, Faculty of Dentistry, </p>Chiang Mai
                                                    University</li>
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="space-y-5 rounded-md border border border-white-light p-5 block bg-white-light/40 hover:bg-white-light/90 hover:text-dark dark:bg-dark/40 dark:hover:bg-dark/60">
                                        <li x-data="dropdown" x-on:mouseover="open = true"
                                            x-on:mouseleave="open = false">
                                            <div
                                                class="max-h-56 overflow-hidden rounded-md flex items-center justify-center">
                                                <img src="assets/images/dent/hospitalAD.png" height="70px"
                                                    width="70px" />
                                            </div>
                                            <div class="py-[5px] text-xl dark:text-white text-center">
                                                <button type="button" @click="toggle">
                                                    ที่อยู่
                                                </button>
                                            </div>
                                            <ul x-show="open" x-collapse>
                                                <li class="py-[5px]">คณะทันตแพทยศาสตร์ มหาวิทยาลัยเชียงใหม่</p>
                                                    เลขที่ 110 ถ.สุเทพ ต.สุเทพ อ.เมือง จ.เชียงใหม่ 50200
                                                </li>
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div
                                        class="space-y-5 rounded-md border border border-white-light p-5 block bg-white-light/40 hover:bg-white-light/90 hover:text-dark dark:bg-dark/40 dark:hover:bg-dark/60 ">
                                        <li x-data="dropdown" x-on:mouseover="open = true"
                                            x-on:mouseleave="open = false">
                                            <div
                                                class="max-h-56 overflow-hidden rounded-md flex items-center justify-center">
                                                <img src="assets/images/dent/doctor.png" height="70px" width="70px" />
                                            </div>
                                            <div class="py-[5px] text-xl dark:text-white text-center">
                                                <button type="button" @click="toggle">
                                                    ผู้นำสูงสุดขององค์กร
                                                </button>
                                            </div>
                                            <ul x-show="open" x-collapse>
                                                <li class="py-[5px]">ชื่อ ผศ. ทพ. ดร. นฤมนัส คอวณิช</p>
                                                    ตำแหน่ง คณบดี คณะทันตแพทยศาสตร์</p>
                                                    เบอร์โทรศัพท์ (053) 944401
                                                </li>
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="space-y-5 rounded-md border border border-white-light p-5 block bg-white-light/40 hover:bg-white-light/90 hover:text-dark dark:bg-dark/40 dark:hover:bg-dark/60">
                                        <li x-data="dropdown" x-on:mouseover="open = true"
                                            x-on:mouseleave="open = false">
                                            <div
                                                class="max-h-56 overflow-hidden rounded-md flex items-center justify-center">
                                                <img src="assets/images/dent/medicalteam2.png" height="70px"
                                                    width="70px" />
                                            </div>
                                            <div class="py-[5px] text-xl dark:text-white text-center">
                                                <button type="button" @click="toggle">
                                                    ผู้ประสานงาน
                                                </button>
                                            </div>
                                            <ul x-show="open" x-collapse>
                                                <li class="py-[5px]">ชื่อ ผศ. ทพ. ดร. จิตจิโรจน์ อิทธิชัยเจริญ</p>
                                                    ตำแหน่ง ผู้อำนวยการโรงพยาบาลทันตกรรม</p>
                                                    Email Jitjiroj.itti@cmu.ac.th</p>
                                                    เบอร์โทรศัพท์ (053) 944490</p>
                                                    <br>
                                                    ชื่อ นพ. ทพ. สหธัช แก้วกำเนิด</p>
                                                    ตำแหน่ง นายแพทย์</p>
                                                    Email sahatut.kae@cmu.ac.th</p>
                                                    เบอร์โทรศัพท์ (053) 944489</p>
                                                </li>
                                            </ul>
                                        </li>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </section>
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
                    items: ['carousel1.jpeg', 'carousel2.jpeg', 'carousel3.jpeg'],

                    init() {
                        // Multiple Slides
                        const swiper5 = new Swiper('#slider5', {
                            navigation: {
                                nextEl: '.swiper-button-next-ex5',
                                prevEl: '.swiper-button-prev-ex5',
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            breakpoints: {
                                1024: {
                                    slidesPerView: 3,
                                    spaceBetween: 30,
                                },
                                768: {
                                    slidesPerView: 2,
                                    spaceBetween: 40,
                                },
                                320: {
                                    slidesPerView: 1,
                                    spaceBetween: 20,
                                },
                            },
                        });
                    },

                    // highlightjs
                    codeArr: [],
                    toggleCode(name) {
                        if (this.codeArr.includes(name)) {
                            this.codeArr = this.codeArr.filter((d) => d != name);
                        } else {
                            this.codeArr.push(name);

                            setTimeout(() => {
                                document.querySelectorAll('pre.code').forEach((el) => {
                                    hljs.highlightElement(el);
                                });
                            });
                        }
                    },
                }));
            });
        </script>
        @csrf
        @push('js')
        @endpush
    @endsection
