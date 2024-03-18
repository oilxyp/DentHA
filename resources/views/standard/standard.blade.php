@extends('layouts.layouts')
@section('title', 'มาตรฐานและแนวทางการปฎิบัติ')
@section('content')

 <!-- start header section -->
 @include('layouts.header_font')
 <!-- end header section -->
    <div class="animate__animated p-6">
        <h4 class="text mb-6 text-xl font-bold md:text-1xl">มาตรฐานและแนวทางการปฏิบัติ</h4>
        <hr>
        <!-- sidebar menu overlay -->
        <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
            @click="$store.app.toggleSidebar()"></div>

        <!-- scroll to top button -->
        <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button type="button"
                    class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                    @click="goToTop">
                    <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                            d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                            fill="currentColor" />
                        <path
                            d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                            fill="currentColor" />
                    </svg>
                </button>
            </template>
        </div>

        <div class="h-full flex-1">
            <div class="grid grid-cols-1 gap-6 py-4">
                <div>
                    <div class="mb-5 flex flex-col sm:flex-row" x-data="{ tab: 'home' }">
                        <div class="sm:mb-0 xl:flex-[0_0_20%]">
                            <div class="flex h-full flex-col">
                                <ul class="font-light">
                                    <li class="py-[5px]" x-data="dropdown">
                                        <button type="button" @click="toggle" onclick="goToPage(1)">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2"
                                                :class="{ 'rotate-180': open }">
                                                <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            มาตรฐานโรงพยาบาลและบริการสุขภาพ
                                        </button>
                                        <ul class="ltr:pl-14 rtl:pr-14" x-show="open" x-collapse>
                                            <li class="py-[5px]"><a href="javascript:void(0)"
                                                    class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                    onclick="goToPage(1,13)">ภาพรวมของการบริการองค์กร</a></li>
                                            <li class="py-[5px]"><a href="javascript:void(0)"
                                                    class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                    onclick="goToPage(1,71)">ระบบงานสำคัญของโรงพยาบาล</a></li>
                                            <li class="py-[5px]"><a href="javascript:void(0)"
                                                    class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                    onclick="goToPage(1,157)">กระบวนการดูแลผู้ป่วย</a></li>
                                            <li class="py-[5px]"><a href="javascript:void(0)"
                                                    class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                    onclick="goToPage(1,205)">ผลลัพธ์</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="py-[5px]" x-data="dropdown">
                                        <button type="button" @click="toggle" onclick="goToPage(2)">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2"
                                                :class="{ 'rotate-180': open }">
                                                <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            แนวทางการปฏิบัติเพื่อความปลอดภัยทางทันตะกรรม&nbsp;&nbsp;&nbsp;
                                        </button>
                                        <ul class="ltr:pl-14 rtl:pr-14 mt-1" x-show="open" x-collapse>
                                            <li class="py-[5px]" x-data="dropdown">
                                                <button type="button" @click="toggle">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2">
                                                        <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    SAFE TRICO
                                                </button>
                                                <ul class="ltr:pl-14 rtl:pr-14" x-show="open" x-collapse>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,8)">SC:SAFE COMMUNICATION</a></li>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,10)">ST:SAFE TREATMENT</a></li>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,16)">SI:SAFE INFECTION CONTROL</a></li>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,32)">SR:SAFE RECORD</a></li>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,34)">SO:SAFE OCCUPATION</a></li>
                                                </ul>
                                            </li>

                                            <li class="py-[5px]" x-data="dropdown">
                                                <button type="button" @click="toggle">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="relative -top-1 inline h-5 w-5 text-primary ltr:mr-2 rtl:ml-2">
                                                        <path d="M19 9L12 15L5 9" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    SIMPLE
                                                </button>
                                                <ul class="ltr:pl-14 rtl:pr-14" x-show="open" x-collapse>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,36)">PATIENT SAFETY</a></li>
                                                    <li class="py-[5px]"><a href="javascript:void(0)"
                                                            class="nav-link p-0 text-muted text-gray-500 hover:text-primary"
                                                            onclick="goToPage(2,39)">PERSONNEL SAFETY</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="h-full flex-1">
                            <div class="flex justify-center md:justify-start py-2">
                                <div id="downloadLinkContainer">
                                    <a href="{{ asset('assets/pdf/standards.pdf') }}" download>
                                        <button type="button" class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path
                                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                                <path
                                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
                                            </svg>&nbsp; Download PDF
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="flex h-full flex-col">
                                <div id="pdfContainer">
                                    <embed width="100%" height="550px" type="application/pdf"
                                        src="{{ asset('assets/pdf/standards.pdf') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer src="assets/js/alpine-ui.min.js"></script>
    <script defer src="assets/js/alpine-focus.min.js"></script>
    <script defer src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        function goToPage(id, pageNumber) {
            var pdfURL;

            if (id === 1) {
                pdfURL = '{{ asset('assets/pdf/standards.pdf') }}' + '#page=' + pageNumber;
                pdfdowload = '{{ asset('assets/pdf/standards.pdf') }}'
            } else if (id === 2) {
                pdfURL = '{{ asset('assets/pdf/dentalsafe.pdf') }}' + '#page=' + pageNumber;
                pdfdowload = '{{ asset('assets/pdf/dentalsafe.pdf') }}'
            } else {
                // กรณี id ไม่ตรงกับที่กำหนด
                console.error('Invalid id:', id);
                return;
            }

            var pdfHTML = '<embed width="100%" height="550px" type="application/pdf" src="' + pdfURL + '"/>';

            document.getElementById('pdfContainer').innerHTML = pdfHTML;

            var downloadLinkHTML = '<a href="' + pdfdowload + '" download>' +
                '<button type="button" class="btn btn-primary">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">' +
                '<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>' +
                '<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>' +
                '</svg>&nbsp; Download PDF' +
                '</button>' +
                '</a>';
            document.getElementById('downloadLinkContainer').innerHTML = downloadLinkHTML;
        }
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                },
            }));

            // theme customization
            Alpine.data('customizer', () => ({
                showCustomizer: false,
            }));

            // sidebar section
            Alpine.data('sidebar', () => ({
                init() {
                    const selector = document.querySelector('.sidebar ul a[href="' + window.location
                        .pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.click();
                                });
                            }
                        }
                    }
                },
            }));

            // header section
            Alpine.data('header', () => ({
                init() {
                    const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                        .location.pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.classList.add('active');
                                });
                            }
                        }
                    }
                },

                notifications: [{
                        id: 1,
                        profile: 'user-profile.jpeg',
                        message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                        time: '45 min ago',
                    },
                    {
                        id: 2,
                        profile: 'profile-34.jpeg',
                        message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                        time: '9h Ago',
                    },
                    {
                        id: 3,
                        profile: 'profile-16.jpeg',
                        message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                        time: '9h Ago',
                    },
                ],

                messages: [{
                        id: 1,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                        title: 'Congratulations!',
                        message: 'Your OS has been updated.',
                        time: '1hr',
                    },
                    {
                        id: 2,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                        title: 'Did you know?',
                        message: 'You can switch between artboards.',
                        time: '2hr',
                    },
                    {
                        id: 3,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                        title: 'Something went wrong!',
                        message: 'Send Reposrt',
                        time: '2days',
                    },
                    {
                        id: 4,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                        title: 'Warning',
                        message: 'Your password strength is low.',
                        time: '5days',
                    },
                ],

                languages: [{
                        id: 1,
                        key: 'Chinese',
                        value: 'zh',
                    },
                    {
                        id: 2,
                        key: 'Danish',
                        value: 'da',
                    },
                    {
                        id: 3,
                        key: 'English',
                        value: 'en',
                    },
                    {
                        id: 4,
                        key: 'French',
                        value: 'fr',
                    },
                    {
                        id: 5,
                        key: 'German',
                        value: 'de',
                    },
                    {
                        id: 6,
                        key: 'Greek',
                        value: 'el',
                    },
                    {
                        id: 7,
                        key: 'Hungarian',
                        value: 'hu',
                    },
                    {
                        id: 8,
                        key: 'Italian',
                        value: 'it',
                    },
                    {
                        id: 9,
                        key: 'Japanese',
                        value: 'ja',
                    },
                    {
                        id: 10,
                        key: 'Polish',
                        value: 'pl',
                    },
                    {
                        id: 11,
                        key: 'Portuguese',
                        value: 'pt',
                    },
                    {
                        id: 12,
                        key: 'Russian',
                        value: 'ru',
                    },
                    {
                        id: 13,
                        key: 'Spanish',
                        value: 'es',
                    },
                    {
                        id: 14,
                        key: 'Swedish',
                        value: 'sv',
                    },
                    {
                        id: 15,
                        key: 'Turkish',
                        value: 'tr',
                    },
                    {
                        id: 16,
                        key: 'Arabic',
                        value: 'ae',
                    },
                ],

                removeNotification(value) {
                    this.notifications = this.notifications.filter((d) => d.id !== value);
                },

                removeMessage(value) {
                    this.messages = this.messages.filter((d) => d.id !== value);
                },
            }));

            // main content
            Alpine.data('knowledge', () => ({
                items: [{
                        src: 'assets/images/knowledge/image-5.jpg',
                        title: 'Excessive sugar is harmful',
                    },
                    {
                        src: 'assets/images/knowledge/image-6.jpg',
                        title: 'Creative Photography',
                    },
                    {
                        src: 'assets/images/knowledge/image-7.jpg',
                        title: 'Plan your next trip',
                    },
                    {
                        src: 'assets/images/knowledge/image-8.jpg',
                        title: 'My latest Vlog',
                    },
                ],
            }));
        });
    </script>

@endsection
