@extends('layouts.layouts')
@section('title', ' วิสัยทัศน์ | พันธกิจ | ค่านิยม')
@section('content')
    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->
    <div class="container py-2">
        <div class="animate__animated p-6">
            <h4 class="text mb-6 text-xl font-bold md:text-1xl">วิสัยทัศน์ | พันธกิจ | ค่านิยม</h4>
            <hr>
            <div style="max-width: 950px; margin: 0 auto;">
                <div class="mb-6 grid gap-6 custom-line-spacing" style="color: #782A8C; font-size:20px; line-height: 1.8;">
                    <img class="card-img-top mx-auto mt-3" height="200px" width="220px"
                        src="{{ asset('assets/images/dent/หัวกระดาษ.svg') }}" alt="Card image">
                    <div>

                        <h4 class="text text-center text-xl font-bold md:text-xl mt-5">วิสัยทัศน์ (Vision)</h4>
                        @foreach ($vision as $row)
                        @if ($row->name === 'วิสัยทัศน์')
                                <div class="text text-center" style="font-size: 17px;">
                                    <p>{{ $row->detail }}</p>
                                </div>
                        @endif
                        @endforeach

                        <h4 class="text text-center text-xl font-bold md:text-xl mt-5">ค่านิยม (Values)</h4>
                        @foreach ($vision as $row)
                        @if ($row->name === 'ค่านิยม')
                                <div class="text text-center" style="font-size: 17px;">
                                    <p>{{ $row->detail }}</p>
                                </div>
                        @endif
                        @endforeach

                        <h4 class="text text-center text-xl font-bold md:text-xl mt-5">พันธกิจ (Mission)</h4>
                        @foreach ($vision as $row)
                        @if ($row->name === 'พันธกิจ')
                                <div class="text text-center" style="font-size: 17px;">
                                    <p>{{ $row->detail }}</p>
                                </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <img class="card-img-top mx-auto mt-8" height="200px" width="220px"
                    src="{{ asset('assets/images/dent/ท้ายกระดาษ.svg') }}" alt="Card image">
            </div>
        </div>
    </div>

@endsection
