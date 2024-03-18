@extends('layouts_backend.layouts')
@section('title', 'กิจกรรม HA')
@section('content')
<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
    <div class="main-content flex flex-col min-h-screen">
        <div class="animate__animated p-6" :class="[$store.app.animation]">
            <!-- start main content section -->
            <div x-data="contacts">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h2 class="text-xl">กิจกรรม HA</h2>
                    <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                        <div class="flex gap-3">
                            <div>                                                                
                                    <a href="{{ route('create_menu') }}" type="button" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 ltr:mr-3 rtl:ml-3">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                        เพิ่มกิจกรรม HA</a>
                                {{-- <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                                    :class="addContactModal && '!block'">
                                    <div class="flex min-h-screen items-center justify-center px-4"
                                        @click.self="addContactModal = false">
                                        <div x-show="addContactModal" x-transition x-transition.duration.300
                                            class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                            <button type="button"
                                                class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                                @click="addContactModal = false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                    class="h-6 w-6">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                            <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                                x-text="params.id ? 'Edit Contact' : 'เพิ่มบริการ'"></h3>
                                            <div class="p-5">
                                                <form @submit.prevent="saveUser">
                                                    <div class="mb-5">
                                                        <label for="name">ชื่อบริการ</label>
                                                        <input id="name" type="text" placeholder="เพิ่มชื่อบริการ"
                                                            class="form-input" x-model="params.name" />
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="address">รายละเอียด</label>
                                                        <textarea id="address" rows="3" placeholder="เพิ่มรายละเอียดบริการ"
                                                            class="form-textarea min-h-[130px] resize-none" x-model="params.location"></textarea>
                                                    </div>

                                                    <div class="panel">
                                                        <div class="mb-5  items-center">
                                                        <div class="mb-5">
                                                            <div class="custom-file-container" data-upload-id="myFirstImage"></div>
                                                        </div>
                                                       
                                                    </div>
                                                    </div>

                                                    <div class="mt-8 flex items-center justify-end">
                                                        <button type="button" class="btn btn-outline-danger"
                                                            @click="addContactModal = false">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                            x-text="params.id ? 'Update' : 'Add'"></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- end main content section -->
            <div x-data="basic">
                <div class="panel mt-6">
                    <table id="example" class="table-hover whitespace-nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">ชื่อบริการ</th>
                                <th style="text-align: center">รายละเอียด</th>
                                <th style="text-align: center">รูปภาพ</th>
                                <th style="text-align: center">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $row)
                            <tr style="text-align: center">
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $row->detail }}</td>
                                    <td><img src="{{ asset('storage/images/menu/'.$row->picture) }}" alt="" style="width: 100px; hight: 100px;"></td>
                                <td>
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('menu_manage.edit', $row->id) }}"
                                            class="btn btn-sm btn-outline-warning"> แก้ไข</a>
                                        <form action="{{ route('menu_manage.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm btn-outline-danger">ลบ</button>
                                        </form>
                                    </div>
                                </td>
                            </tr> 
                            @endforeach                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                }));
    
    
                //Carousel
                Alpine.data('carousel', () => ({
                    items: ['ถอนฟัน.jpg', 'ขูดหินปูน.jpg', 'ครอบฟัน.jpg'],
    
                    init() {
                        // basic
                        const swiper1 = new Swiper('#slider1', {
                            navigation: {
                                nextEl: '.swiper-button-next-ex1',
                                prevEl: '.swiper-button-prev-ex1',
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                        });
                        // Autoplay
                        const swiper2 = new Swiper('#slider2', {
                            navigation: {
                                nextEl: '.swiper-button-next-ex2',
                                prevEl: '.swiper-button-prev-ex2',
                            },
                            autoplay: {
                                delay: 2000,
                            },
                        });
                        // vertical
                        setTimeout(() => {
                            const swiper3 = new Swiper('#slider3', {
                                direction: 'vertical',
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true,
                                },
                                autoplay: {
                                    delay: 2000,
                                },
                            });
                        });
                        // Loop
                        const swiper4 = new Swiper('#slider4', {
                            slidesPerView: 1,
                            spaceBetween: 30,
                            loop: true,
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                                type: 'fraction',
                            },
                            navigation: {
                                nextEl: '.swiper-button-next-ex4',
                                prevEl: '.swiper-button-prev-ex4',
                            },
                        });
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
                //contacts
                Alpine.data('contacts', () => ({
                    defaultParams: {
                        id: null,
                        name: '',
                        email: '',
                        role: '',
                        phone: '',
                        location: '',
                    },
                    displayType: 'list',
                    addContactModal: false,
                    params: {
                        id: null,
                        name: '',
                        email: '',
                        role: '',
                        phone: '',
                        location: '',
                    },
                    filterdContactsList: [],
                    searchUser: '',
    
                    init() {
                        this.searchContacts();
                    },
    
                    searchContacts() {
                        this.filterdContactsList = this.contactList.filter((d) => d.name
                            .toLowerCase()
                            .includes(this.searchUser.toLowerCase()));
                    },
    
                    editUser(user) {
                        this.params = this.defaultParams;
                        if (user) {
                            this.params = JSON.parse(JSON.stringify(user));
                        }
    
                        this.addContactModal = true;
                    },
    
                    saveUser() {
                        if (!this.params.name) {
                            this.showMessage('Name is required.', 'error');
                            return true;
                        }
                        if (!this.params.email) {
                            this.showMessage('Email is required.', 'error');
                            return true;
                        }
                        if (!this.params.phone) {
                            this.showMessage('Phone is required.', 'error');
                            return true;
                        }
                        if (!this.params.role) {
                            this.showMessage('Occupation is required.', 'error');
                            return true;
                        }
    
                        if (this.params.id) {
                            //update user
                            let user = this.contactList.find((d) => d.id === this.params.id);
                            user.name = this.params.name;
                            user.email = this.params.email;
                            user.role = this.params.role;
                            user.phone = this.params.phone;
                            user.location = this.params.location;
                        } else {
                            //add user
                            let maxUserId = this.contactList.length ?
                                this.contactList.reduce((max, character) => (character.id >
                                    max ?
                                    character
                                    .id : max), this.contactList[0].id) :
                                0;
    
                            let user = {
                                id: maxUserId + 1,
                                path: 'profile-35.png',
                                name: this.params.name,
                                email: this.params.email,
                                role: this.params.role,
                                phone: this.params.phone,
                                location: this.params.location,
                                posts: 20,
                                followers: '5K',
                                following: 500,
                            };
                            this.contactList.splice(0, 0, user);
                            this.searchContacts();
                        }
    
                        this.showMessage('User has been saved successfully.');
                        this.addContactModal = false;
                    },
    
                    deleteUser(user) {
                        this.contactList = this.contactList.filter((d) => d.id != user.id);
                        // this.ids = this.ids.filter((d) => d != user.id);
                        this.searchContacts();
                        this.showMessage('User has been deleted successfully.');
                    },
    
                    setDisplayType(type) {
                        this.displayType = type;
                    },
    
                    showMessage(msg = '', type = 'success') {
                        const toast = window.Swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                        });
                        toast.fire({
                            icon: type,
                            title: msg,
                            padding: '10px 20px',
                        });
                    },
                }));
            });
        </script>
        @csrf
        @push('js')
        @endpush
    @endsection
