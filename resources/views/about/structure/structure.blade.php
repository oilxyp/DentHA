@extends('layouts.layouts')
@section('title', 'โครงสร้างองค์กร')
@section('content')

    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->

    <div class="animate__animated p-6">
        <h4 class="text mb-6 text-2xl font-bold md:text-2xl">โครงสร้างองค์กร</h4>
        <hr>
        <div class="h-full flex-1">
            <div class="mb-6 grid grid-cols-1 gap-6 py-4">
                <div>
                    <div class="mb-5 flex flex-col sm:flex-row" x-data="{ tab: 'home' }">
                        <div class="mb-5 sm:mb-0 sm:flex-[0_0_20%]">
                            <ul class="space-y-2 ltr:pr-4 rtl:pl-4">
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === 'home' }" @click="tab = 'home'">
                                        โครงสร้างการบริหาร </a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === 'profile' }"
                                        @click="tab = 'profile'">โครงสร้างบริหารหน่วยภายในโรงพยาบาลทันตกรรม</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === 'messages' }"
                                        @click="tab = 'messages'">โครงสร้างความรับผิดชอบและการประสานงานในระบบคุณภาพ</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === 'settings' }"
                                        @click="tab = 'settings'">โครงสร้างระบบกำกับดูแลกิจการ </a>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-1 text-sm">
                            <template x-if="tab === 'home'">
                                @foreach ($administer as $row)
                                <div>
                                    <h4 class="mb-4 text-xl font-semibold">{{$row->name}}</h4>
                                    <img class="card-img-top mx-auto" height="100%" width="100%"
                                        src="{{ asset('storage/images/structure/' . $row->detail) }}" alt="">
                                </div>
                                @endforeach
                            </template>
                            <template x-if="tab === 'profile'">
                                @foreach ($denthospital as $row)
                                <div>
                                    <h4 class="mb-4 text-xl font-semibold">{{$row->name}}</h4>
                                    <img class="card-img-top mx-auto" height="100%" width="100%"
                                        src="{{ asset('storage/images/structure/' . $row->picture) }}" alt="">
                                </div>
                                @endforeach
                            </template>
                            <template x-if="tab === 'messages'">
                                <div>
                                    <h4 class="mb-4 text-xl font-semibold">
                                        โครงสร้างความรับผิดชอบและการประสานงานในระบบคุณภาพ/สร้างเสริมสุขภาพ
                                    </h4>
                                    <div style="font-size: 16px;">
                                        @foreach ($ggovernance as $row)
                                            <p class="not-italic text-[#515365] dark:text-white-dark">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$row->detail}}
                                            </p>
                                        @endforeach
                                    </div>
                            </template>
                            <template x-if="tab === 'settings'">
                                <div>
                                    <h4 class="mb-4 text-xl font-semibold">โครงสร้างระบบกำกับดูแลกิจการ /
                                        ธรรมาภิบาล
                                    </h4>
                                    <div style="font-size: 16px;">
                                        @foreach ($coordinate as $row)
                                        <p class="not-italic text-[#515365] dark:text-white-dark">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$row->detail}}
                                        </p>
                                    @endforeach
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
