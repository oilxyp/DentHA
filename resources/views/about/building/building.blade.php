@extends('layouts.layouts')
@section('title', 'อาคารและสถานที่')

@section('content')
    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->

    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' :
            '',
            $store.app.menu, $store.app.layout, $store.app.rtlClass
        ]">
        <div class="container py-2">
            <div class="animate__animated p-6">
                <h4 class="text mb-6 text-xl font-bold md:text-2xl">อาคารและสถานที่</h4>
                <hr>
                <div class="animate__animated p-6">
                    {{-- <div class="item item-center mb-6 grid grid-cols-2 gap-6 lg:grid-cols"> --}}
                    {{-- <div class="h-full"> --}}
                    <div class="flex justify-center">
                        <img class="card-img-top mx-auto" src="{{ asset('assets/images/dent/building3.svg') }}"
                            alt="Card image" style="width: 70%">
                    </div>
                    {{-- </div> --}}
                    {{-- </div> --}}
                    <div class="text-[#515365] dark:text-white-dark">
                        <h5 class="font-semibold dark:text-white-light">อาคารสถานที่ที่สำคัญ :</h5>
                        @foreach ($buildings as $row)
                            @if ($row->name == 'ข้อมูล')
                                <ul>
                                    <li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{ $row->detail }}</li>
                                </ul>
                            @endif
                        @endforeach
                    </div>
                    <div
                        class="max-w-full space-y-4 p-4 ltr:rounded-r-none rtl:rounded-l-none xl:relative xl:block xl:h-auto ltr:xl:rounded-r-md rtl:xl:rounded-l-md">
                        <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 mt-3 text-[#515365] dark:text-white-dark">
                            <ul>
                                <li><b>อาคาร 1</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 1')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 2</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 2')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 3</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 3')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 4</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 4')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 5</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 5')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 6</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 6')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 7</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 7')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 8</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 8')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 9</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 9')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul>
                                <li><b>อาคาร 10</b></li>
                                @foreach ($buildings as $row)
                                    @if ($row->name == 'อาคาร 10')
                                        <li>{{ $row->detail }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
