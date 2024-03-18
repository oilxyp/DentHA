@extends('layouts.layouts')
@section('title', 'ข้อมูลทางสถิติ')
@section('content')

    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->

    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' :
            '',
            $store.app.menu, $store.app.layout, $store.app.rtlClass
        ]">
        <div class="animate__animated p-6">
            <h4 class="text mb-6 text-xl font-bold md:text-2xl">ข้อมูลทางสถิติ</h4>
            <hr>
            <div class="h-full flex-1">
                <div class="mb-6 grid grid-cols-1 gap-6 py-4">
                    <div>
                        <div class="mb-5 flex flex-col sm:flex-row" x-data="{ tab: 'record' }">
                            {{-- <div class="sm:mb-0 xl:flex-[0_0_20%]">
                                <ul class="space-y-2 ltr:pr-4 rtl:pl-4">
                                    <li>
                                        <a href="{{ route('record') }}"
                                            class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                            :class="{ '!bg-primary text-white': tab === 'home' }"
                                            @click="tab = 'home'">12
                                            อันดับการวินิจฉัยโรคผู้ป่วยนอก</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('sendptcount') }}"
                                            class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white">ข้อมูลสถิติการรักษา</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('patientstatistics') }}"
                                            class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white">จํานวนการให้บริการทางทันตกรรมย้อนหลัง
                                            6 เดือน</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                            :class="{ '!bg-primary text-white': tab === 'settings' }"
                                            @click="tab = 'settings'">สถิติการรักษาแยกตามรายการ</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                            :class="{ '!bg-primary text-white': tab === 'person' }"
                                            @click="tab = 'person'">อัตรากำลัง</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('patientstatisticspervisit') }}"
                                            class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white">จํานวนการให้บริการทางทันตกรรมย้อนหลัง
                                            4 ปี</a>
                                    </li>
                                </ul>
                            </div> --}}
                            @include('about.record.tab')

                            <div class="flex-1">
                                <div>
                                    <div x-data="chart">
                                    </div>
                                    <div>
                                        <div class="mb-5 flex items-center justify-between">
                                            <h5 class="text-lg font-semibold dark:text-white">
                                                12 อันดับการวินิจฉัยโรคผู้ป่วยนอก</h5>
                                        </div>
                                        <div x-ref="barChart" class="bg dark:bg-black rounded-lg"></div>
                                    </div>
                                    <p>หน่วย : คน</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script defer src="assets/js/apexcharts.js"></script>
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('chart', () => ({
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

                    barChart: null,
                    init() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true :
                            false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        setTimeout(() => {
                            this.barChart = new ApexCharts(this.$refs.barChart, this
                                .barChartOptions);
                            this.barChart.render();
                        }, 300);

                        this.$watch('$store.app.theme', () => {
                            this.refreshOptions();
                        });

                        this.$watch('$store.app.rtlClass', () => {
                            this.refreshOptions();
                        });
                    },

                    refreshOptions() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true :
                            false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        this.barChart.updateOptions(this.barChartOptions);
                    },

                    get barChartOptions() {
                        return {
                            series: @json($jsonData),
                            chart: {
                                height: 800,
                                type: 'bar',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 1,
                            },
                            colors: ['#805dca', '#a775d4', '#d39ee3', '#e3c7ed'],
                            xaxis: {
                                categories: @json($arrary_ICD10_namese),
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                reversed: isRtl ? true : false,
                            },
                            labels: {
                                style: {
                                    fontFamily: 'Prompt, sans-serif', // ระบุชื่อฟอนต์ที่ใช้
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: true,
                                },
                            },
                            fill: {
                                opacity: 0.8,
                            },
                        };
                    },
                }));
            });
        </script>

        {{-- <script>
            document.addEventListener('alpine:init', () => {

                Alpine.data('chart', () => ({
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


                    columnChart: null,

                    init() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true :
                            false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;

                        setTimeout(() => {


                            this.columnChart = new ApexCharts(this.$refs.columnChart, this
                                .columnChartOptions);
                            this.columnChart.render();


                        }, 300);

                        this.$watch('$store.app.theme', () => {
                            this.refreshOptions();
                        });

                        this.$watch('$store.app.rtlClass', () => {
                            this.refreshOptions();
                        });
                    },

                    refreshOptions() {
                        isDark = this.$store.app.theme === 'dark' || this.$store.app.isDarkMode ? true :
                            false;
                        isRtl = this.$store.app.rtlClass === 'rtl' ? true : false;
                        this.columnChart.updateOptions(this.columnChartOptions);

                    },


                    get columnChartOptions() {
                        return {
                            series: @json($jsonData),
                            chart: {
                                height: 800,
                                type: 'bar',
                                zoom: {
                                    enabled: false,
                                },
                                toolbar: {
                                    show: false,
                                },
                            },
                            colors: ['#805dca', '#a775d4', '#d39ee3', '#e3c7ed', ],
                            dataLabels: {
                                enabled: false,
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent'],
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded',
                                },
                            },
                            grid: {
                                borderColor: isDark ? '#191e3a' : '#e0e6ed',
                            },
                            xaxis: {
                                categories: @json($arrary_ICD10_namese),
                                axisBorder: {
                                    color: isDark ? '#191e3a' : '#e0e6ed',
                                },
                            },
                            yaxis: {
                                opposite: isRtl ? true : false,
                                labels: {
                                    offsetX: isRtl ? -10 : 0,
                                },
                            },
                            tooltip: {
                                theme: isDark ? 'dark' : 'light',
                                y: {
                                    formatter: function(val) {
                                        return val;
                                    },
                                },
                            },
                        };
                    },


                }));
            });
        </script> --}}
        @csrf
        @push('js')
        @endpush
    @endsection
