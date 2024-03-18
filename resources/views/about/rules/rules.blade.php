@extends('layouts.layouts')
@section('title', 'กฎระเบียบข้อบังคับที่เกี่ยวข้อง')

@section('content')
    <!-- start header section -->
    @include('layouts.header_font')
    <!-- end header section -->

    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' :
            '', $store.app.menu, $store.app.layout, $store.app.rtlClass
        ]">

        <div class="animate__animated p-6">
            <h4 class="text mt-5 mb-6 text-xl font-bold md:text-1xl">กฎระเบียบข้อบังคับที่เกี่ยวข้อง</h4>
            <hr>
            <img class="card-img-top mx-auto mt-3" height="200px" width="220px"
                src="{{ asset('assets/images/dent/หัวกระดาษ.svg') }}" alt="Card image">
            <div class="animate__animated p-6" style="color: #782A8C; font-size:16px; line-height: 1.8; margin-left:50px;">
                <div style="max-width: 1200px; margin: 0 auto;">
                @foreach ($rules as $row)
                    <li>{{ $row->name }}
                    <a href="{{ $row->link}}" class="text-white-dark" target="_blank">ดูเพิ่มเติม</a></li>
                @endforeach
                </div>

                {{-- <div>
                    <li>พระราชบัญญัติการศึกษาแห่งชาติ พ.ศ.2542 และกฎกระทรวงที่ออกตาม พ.ร.บ.
                        <a href="https://www.moe.go.th/backend/wp-content/uploads/2020/10/1.-%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%9A%E0%B8%B1%E0%B8%8D%E0%B8%8D%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%A8%E0%B8%B6%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B9%81%E0%B8%AB%E0%B9%88%E0%B8%87%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4-%E0%B8%9E.%E0%B8%A8.2542-%E0%B8%89.%E0%B8%AD%E0%B8%B1%E0%B8%9E%E0%B9%80%E0%B8%94%E0%B8%97.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>ประกาศคณะกรรมการการอุดมศึกษาเรื่องแนวทางปฏิบัติตามกรอบมาตรฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ
                        พ.ศ.2552 และ (ฉบับที่ 2) พ.ศ.2554
                        <a href="https://service.buu.ac.th/web2019/wp-content/uploads/2020/06/guidelinetqf.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>กรอบมาตรฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ (TQF)
                        <a href="https://www.mhesi.go.th/images/2565/T_1390028.PDF" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    </li>
                    <li>มาตรฐานคุณวุฒิระดับปริญญาตรี สาขาวิชาทันตแพทยศาสตร์ พ.ศ.2557
                        <a href="" class="text-white-dark" target="_blank">ดูเพิ่มเติม</a> 
                    </li>
                    <li>ข้อบังคับมหาวิทยาลัยเชียงใหม่ ว่าด้วยการศึกษาระดับบัณฑิตศึกษา พ.ศ.2559
                        <a href="https://www.grad.cmu.ac.th/grad_wp2/wp-content/uploads/2023/01/1-%E0%B8%95%E0%B8%B2%E0%B8%A3%E0%B8%B2%E0%B8%87%E0%B9%80%E0%B8%9B%E0%B8%A3%E0%B8%B5%E0%B8%A2%E0%B8%9A%E0%B9%80%E0%B8%97%E0%B8%B5%E0%B8%A2%E0%B8%9A%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%9A%E0%B8%B1%E0%B8%87%E0%B8%84%E0%B8%B1%E0%B8%9A-%E0%B8%9A%E0%B8%A8-65-%E0%B8%AA%E0%B8%A0%E0%B8%B2-24-12-65.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>ข้อบังคับมหาวิทยาลัยเชียงใหม่ ว่าด้วยการศึกษาเพื่อปริญญาทันตแพทยศาสตร์บัณฑิต
                        และปริญญาวิทยาศาสตรบัณฑิต
                        </p>สาขาวิทยาศาสตร์การแพทย์ พ.ศ.2553, พ.ศ.2556, พ.ศ.2561 และ พ.ศ.2565
                        <a href="https://www.eqd.cmu.ac.th/Curr/doc/rule_cmu/rule/dent&science-education%20rule%2065-2.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติส่งเสริมและรักษาคุณภาพสิ่งแวดล้อมแห่งชาติ พ.ศ.2535
                        <a href="https://drr.go.th/wp-content/uploads/2022/02/11.%E0%B8%9E%E0%B8%A3%E0%B8%B0%E0%B8%A3%E0%B8%B2%E0%B8%8A%E0%B8%9A%E0%B8%B1%E0%B8%8D%E0%B8%8D%E0%B8%B1%E0%B8%95%E0%B8%B4%E0%B8%AA%E0%B9%88%E0%B8%87%E0%B9%80%E0%B8%AA%E0%B8%A3%E0%B8%B4%E0%B8%A1%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%A3%E0%B8%B1%E0%B8%81%E0%B8%A9%E0%B8%B2%E0%B8%84%E0%B8%B8%E0%B8%93%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B9%81%E0%B8%AB%E0%B9%88%E0%B8%87%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4-%E0%B8%9E.%E0%B8%A8.2535.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติความปลอดภัย และสภาพแวดล้อมในการทำงาน พ.ศ.2554
                        <a href="https://osh.labour.go.th/images/PDF/2014/10/conclude-2554.pdf" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติสุขภาพแห่งชาติ พ.ศ.2550
                        <a href="https://senate.go.th/assets/portals/28/fileups/146/files/%E0%B8%9E%E0%B8%A3%E0%B8%9A.%E0%B8%AA%E0%B8%B8%E0%B8%82%E0%B8%A0%E0%B8%B2%E0%B8%9E%E0%B9%81%E0%B8%AB%E0%B9%88%E0%B8%87%E0%B8%8A%E0%B8%B2%E0%B8%95%E0%B8%B4%20%E0%B8%9E.%E0%B8%A8.2550.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติสถานพยาบาล พ.ศ.2541 และแก้ไขเพิ่มเติม
                        <a href="https://hss.moph.go.th/webs/law/fileupload_doc/2021-08-24-12-21-3498427.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติเครื่องมือแพทย์ พ.ศ.2562
                        <a href="https://catalog.fda.moph.go.th/dataset/medical-law/resource/7aa88a64-2bdb-47fe-9751-5079c9f70dd7/view/cea9c98c-207b-492a-b0d9-4beceb751d8f"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติวิชาชีพทันตกรรม พ.ศ.2537
                        <a href="https://www.ratchakitcha.soc.go.th/DATA/PDF/2537/A/040/1.PDF" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>
                        และ ฉบับที่ 2 (พ.ศ.2559)
                        <a href="https://dentalcouncil.or.th/pdf/porobo12.pdf" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>

                    </li>
                    <li>พระราชบัญญัติวิชาชีพการพยาบาลและการผดุงครรภ์ พ.ศ.2528 </p>
                        และที่แก้ไขเพิ่มเติมโดยพระราชบัญญัติวิชาชีพการพยาบาลและการผดุงครรภ์ (ฉบับที่ 2) พ.ศ.2540
                        <a href="https://www.tnmc.or.th/images/userfiles/files/222222.pdf" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติวิชาชีพเภสัชกรรม พ.ศ.2537
                        <a href="https://www.senate.go.th/assets/portals/28/fileups/146/files/%E0%B8%9E%E0%B8%A3%E0%B8%9A.%E0%B8%A7%E0%B8%B4%E0%B8%8A%E0%B8%B2%E0%B8%8A%E0%B8%B5%E0%B8%9E%E0%B9%80%E0%B8%A0%E0%B8%AA%E0%B8%B1%E0%B8%8A%E0%B8%81%E0%B8%A3%E0%B8%A3%E0%B8%A1%20%E0%B8%9E.%E0%B8%A8.%202537_1.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                        </p>และที่แก้ไขเพิ่มเติมโดย พระราชบัญญัติวิชาชีพเภสัชกรรม (ฉบับที่ 2) พ.ศ.2558
                        <a href="https://bdn.go.th/attachment/about/download.php?WP=q2WZLJ1CM5O0hJatrTgjWz0kqmyZZ21CM5O0hJatrTDo7o3Q"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติการประกอบโรคศิลปะ พ.ศ.2542
                        <a href="https://www.tsrt.or.th/a/wp-content/laws/lic2542.pdf" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติการประกอบโรคศิลปะ (ฉบับที่ 4) พ.ศ.2556
                        <a href="https://thaicam.dtam.moph.go.th/wp-content/uploads/2021/02/%E0%B8%9E.%E0%B8%A3.%E0%B8%9A.%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%AD%E0%B8%9A%E0%B9%82%E0%B8%A3%E0%B8%84%E0%B8%A8%E0%B8%B4%E0%B8%A5%E0%B8%9B%E0%B8%B0-%E0%B8%89%E0%B8%9A%E0%B8%B1%E0%B8%9A%E0%B8%97%E0%B8%B5%E0%B9%88-4-%E0%B8%9E.%E0%B8%A8.2556.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติวิชาชีพเวชกรรม พ.ศ.2525
                        <a href="https://www.tmc.or.th/download/law-medical_2525.pdf" class="text-white-dark"
                            target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติหลักประกันสุขภาพแห่งชาติ พ.ศ.2545
                        <a href="https://docs.google.com/file/d/0B_ydwvTMCL8xcVE1c3JrQnVhXzg/edit?resourcekey=0-en8fr108SYi43u6ksvRnUg"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติประกันสังคม พ.ศ.2533
                        <a href="https://www.sso.go.th/wpr/assets/upload/files_storage/sso_th/7d900b368467d904cf25f13b46f20e21.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>พระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ.2562
                        <a href="http://www.stopcorruption.moph.go.th/application/editors/userfiles/files/%E0%B8%9E_%E0%B8%A3_%E0%B8%9A_%20%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5%202562%20%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A8%20%E0%B8%84%E0%B8%81%E0%B8%81_%20%E0%B8%84%E0%B8%B8%E0%B9%89%E0%B8%A1%E0%B8%84%E0%B8%A3%E0%B8%AD%E0%B8%87%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%AA%E0%B9%88%E0%B8%A7%E0%B8%99%E0%B8%9A%E0%B8%B8%E0%B8%84%E0%B8%84%E0%B8%A5%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B9%80%E0%B8%81%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%A7%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%87.pdf"
                            class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                    <li>แนวทางปฏิบัติเพื่อความปลอดภัยทางทันตกรรม 2566 - DENTAL SAFETY GOALS & GUIDELINES 2023
                        <a href="assets/pdf/dentalsafe.pdf" class="text-white-dark" target="_blank">ดูเพิ่มเติม</a>
                    </li>
                </div>  --}}
            </div>
        </div>
        <img class="mx-auto" height="200px" width="220px" src="{{ asset('assets/images/dent/ท้ายกระดาษ.svg') }}">
    @endsection
