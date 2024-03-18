@extends('layouts.layouts')
@section('title', 'ความสัมพันธ์ระดับองค์กร')
@section('content')

    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->
    <div class="animate__animated p-6">
        <h4 class="text mb-6 text-xl font-bold md:text-2xl">ความสัมพันธ์ระดับองค์กร</h4>
        <hr>
        <div class="h-full flex-1">
            <div class="mb-6 grid grid-cols-1 gap-6 py-4">
                <div>
                    <div class="mb-5 flex flex-col sm:flex-row" x-data="{ tab: '1' }">
                        <div class="mb-5 sm:mb-0 sm:flex-[0_0_20%]" style="font-size: 16px">
                            <ul class="space-y-2 ltr:pr-4 rtl:pl-4">
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '1' }"
                                        @click="tab = '1'">ระบบกำกับดูแลองค์กร</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '2' }"
                                        @click="tab = '2'">กลุ่มผู้ป่วยที่สำคัญ</p>และความต้องการ</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '3' }"
                                        @click="tab = '3'">กลุ่มผู้รับผลงานอื่นๆ </p>และความต้องการ</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '4' }"
                                        @click="tab = '4'">โครงสร้างเครือข่ายบริการ</p>และเครือข่ายความร่วมมือ</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '5' }"
                                        @click="tab = '5'">ผู้ส่งมอบและคู่ความร่วมมือ</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '6' }"
                                        @click="tab = '6'">บริการที่มีการจ้างเหมามาจากภายนอก</a>
                                </li>
                                <li>
                                    <a href="javascript:;"
                                        class="block rounded-md p-3.5 py-2 transition-all duration-300 hover:bg-primary hover:text-white"
                                        :class="{ '!bg-primary text-white': tab === '7' }"
                                        @click="tab = '7'">การมีพันธสัญญาการให้บริการ</a>
                                </li>
                            </ul>
                        </div>
                        <div style="width: 3%"></div>
                        <div class="flex-1 text-sm ">
                            <template x-if="tab === '1'">
                                <div>
                                    <h4 class="text-xl font-semibold">ระบบกำกับดูแลองค์กร (Governance System)</h4>
                                    <div style="max-width: 1000px; margin: 0 auto;">
                                        <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px;">
                                            @foreach ($governance as $row)
                                                {{-- <p>{{ $row->detail }}</p> --}}
                                                <li>{{ $row->detail }}</li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </template>
                            
                            <template x-if="tab === '2'">
                                <div>
                                    <h4 class="text-xl font-semibold">กลุ่มผู้ป่วย/ผู้รับบริการที่สำคัญและความต้องการ</h4>
                                    <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px">
                                        @foreach ($customers as $row)
                                            @if ($row->name == 'เนื้อหา')
                                                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    {{ $row->detail }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div>
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>กลุ่มผู้ป่วย/ผู้รับบริการแบ่งตามอาการตามความเร่งด่วนของโรค</th>
                                                    <th>เกณฑ์การพิจารณา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $row)
                                                @if ($row->title == 'กลุ่มผู้ป่วย')
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->detail }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>ผู้ป่วยความต้องการพิเศษ</th>
                                                    <th>เกณฑ์การพิจารณา</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $row)
                                                @if ($row->title == 'ผู้ป่วยความต้องการพิเศษ')
                                                <tr>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->detail }}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </template>

                            <template x-if="tab === '3'">
                                <div>
                                    <h4 class="text-xl font-semibold">กลุ่มผู้รับผลงานอื่น ๆ และความต้องการ </h4>
                                    <div style="max-width: 1000px; margin: 0 auto;">
                                        <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px;">
                                            @foreach ($need as $row)
                                                {{-- <p>{{ $row->detail }}</p> --}}
                                                <li>{{ $row->detail }}</li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="tab === '4'">
                                <div>
                                    <h4 class="text-xl font-semibold">โครงสร้างเครือข่ายบริการและเครือข่ายความร่วมมือ</h4>
                                    <div style="max-width: 1000px; margin: 0 auto;">
                                        <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px;">
                                            @foreach ($service as $row)
                                                {{-- <p>{{ $row->detail }}</p> --}}
                                                <li>{{ $row->detail }}</li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="tab === '5'">
                                <div>
                                    <h4 class="text-xl font-semibold">ผู้ส่งมอบและคู่ความร่วมมือ</h4>
                                    <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px">
                                        <div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>ผู้ส่งมอบที่สำคัญ</th>
                                                        <th>ผลิตภัณฑ์และบริการที่ส่งมอบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($deliverer as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->detail }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="tab === '6'">
                                <div>
                                    <h4 class="text-xl font-semibold">บริการที่มีการจ้างเหมามาจากภายนอก</h4>
                                    <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px">
                                        <div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>บริการจ้างเหมา</th>
                                                        <th>บริการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($outsourcing as $row)
                                                        <tr>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->detail }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="tab === '7'">
                                <div>
                                    <h4 class="text-xl font-semibold">การมีพันธสัญญาการให้บริการ </h4>
                                    <div style="max-width: 1000px; margin: 0 auto;">
                                        <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px;">
                                            @foreach ($covenants as $row)
                                                {{-- <p>{{ $row->detail }}</p> --}}
                                                <li>{{ $row->detail }}</li>
                                            @endforeach
                                        </div>
                                    </div>

                                    <h4 class="text font-semibold mt-5" style="font-size: 16px">
                                        คู่ความร่วมมือที่สำคัญและบทบาท</h4>
                                    <div style="max-width: 1000px; margin: 0 auto;">
                                        <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px;">
                                            @foreach ($cooperation as $row)
                                                {{-- <p>{{ $row->detail }}</p> --}}
                                                <ul>
                                                    <li>{{ $row->detail }}</li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>

                                    <h4 class="text font-semibold mt-5" style="font-size: 16px">
                                        การฝึกอบรมหรือเป็นสถาบันสมทบในการฝึกอบรม</h4>
                                    <div style="max-width: 1000px; margin: 0 auto;">
                                        <div class="text-[#515365] dark:text-white-dark mt-3" style="font-size: 16px;">
                                            @foreach ($train as $row)
                                                <li>{{ $row->detail }}</li>
                                            @endforeach
                                        </div>
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
