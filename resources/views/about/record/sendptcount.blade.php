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
                        <div class="mb-5 flex flex-col sm:flex-row" x-data="{ tab: 'sendptcount' }">
                            @include('about.record.tab')

                            <div class="flex-1">
                                <div>
                                    <h4 class="mt-3 text-xl font-semibold">ข้อมูลสถิติการรักษา</h4>
                                    <div class="table-responsive">

                                        <div>
                                            <div x-data="chart">
                                            </div>
                                            <div>
                                                <div x-ref="barChart"
                                                    class="rounded-lg dark:bg-black overflow-hidden">
                                                </div>
                                            </div>

                                        <p>หน่วย : ครั้ง</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        {{-- @include('layouts.scriptchart') --}}
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
                                categories: @json($arrary_dname),
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
        @csrf
        @push('js')
        @endpush
    @endsection
