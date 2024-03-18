

<script defer src="assets/js/apexcharts.js"></script>
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
                        height: 500,
                        width: 1200,
                        type: 'bar',
                        zoom: {
                            enabled: false,
                        },
                        toolbar: {
                            show: false,
                        },
                    },
                    colors: ['#4361ee', '#805dca', '#e3e7fc'],
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 5,
                        colors: ['transparent'],
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '40%',
                            endingShape: 'rounded',
                        },
                    },
                    grid: {
                        borderColor: isDark ? '#191e3a' : '#e0e6ed',
                    },
                    xaxis: {
                        categories: @json($arrary_dname),
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
