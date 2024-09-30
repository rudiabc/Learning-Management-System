<!doctype html>
<html>
<head>
    {{-- Created By Rudiansyah --}}
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="text-black font-poppins pt-10 pb-[50px]">
    <div id="hero-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-10 pb-[50px] bg-transparent-10% bg-[url('assets/background/Hero-Banner.png')] bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden">
        <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="">
                <img src="assets/logo/logo.svg" alt="logo">
            </a>
            {{-- <ul class="flex items-center gap-[30px] text-white">
                <li>
                    <a href="{{ route('front.index') }}" class="font-semibold">Home</a>
                </li>
                <li>
                    <a href="{{ route('front.pricing') }}" class="font-semibold">Pricing</a>
                </li>
                <li>
                    <a href="" class="font-semibold">Benefits</a>
                </li>
                <li>
                    <a href="" class="font-semibold">Stories</a>
                </li>
            </ul> --}}
            @auth
            <div class="flex gap-[10px] items-center">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                    @if(Auth::user()->hasActiveSubscription())
                    <p class="p-[2px_10px] rounded-full bg-[#FF6129] font-semibold text-xs text-white text-center">PRO</p>
                    @endif
                </div>
                <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{Storage::url(Auth::user()->avatar)}}" class="object-cover w-full h-full" alt="photo">
                    </a>
                </div>
            </div>
            @endauth
            @guest
            <div class="flex gap-[10px] items-center">
                <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Daftar</a>
                <a href="{{ route('login') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Masuk</a>
            </div>
            @endguest
        </nav>
        <div class="flex flex-col items-center gap-[30px]">
            {{-- <div class="w-fit flex items-center gap-3 p-2 pr-6 rounded-full bg-[#FFFFFF1F] border border-[#3477FF24]">
                <div class="w-[100px] h-[48px] flex shrink-0">
                    <img src="assets/icon/avatar-group.png" class="object-contain" alt="icon">
                </div>
                <p class="text-sm font-semibold text-white">Join 3 million users</p>
            </div> --}}
            <div class="flex flex-col gap-[10px]">
                <h1 class="font-semibold text-[80px] leading-[82px] text-center gradient-text-hero">PTPN IV Regional V Online Learning</h1>
                {{-- <p class="text-center text-xl leading-[36px] text-[#F5F8FA]">PT Perkebunan Nusantara IV Regional 5</p> --}}
            </div>
            <div class="flex gap-6 w-fit">
                <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Cari Pembelajaran</a>
                {{-- <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Career Guidance</a> --}}
            </div>
        </div>
        <div class="flex gap-[70px] items-center justify-center">
            {{-- <div>
                <img src="assets/icon/logo-55.svg" alt="icon">
            </div>
            <div>
                <img src="assets/icon/logo.svg" alt="icon">
            </div> --}}
            <div>
                <a href="https://www.instagram.com/sdm_ptpn4reg5?igsh=MTB6bWptaHdocHl1Zg==">
                    <img src="assets/icon/logo-54.svg" alt="icon">
                </a>
            </div>
            <div>
                <a href="https://www.instagram.com/ptpn4_regional5?igsh=ZWpwcmF6ZXhqNnBu">
                    <img src="assets/icon/logo.svg" alt="icon">
                </a>
            </div>
            <div>
                <a href="https://www.ptpn4.co.id/">
                    <img src="assets/icon/logo-52.svg" alt="icon">
                </a>
            </div>
        </div>
    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Kategori Pembelajaran</h2>
                {{-- <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p> --}}
            </div>
        </div>

        <div class="grid grid-cols-3 gap-[30px]">
            <a href="{{ route('front.category', 'tanaman') }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#FED6AD] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/tanaman.png" class="object-contain" alt="icon">
                </div>
                <p class="text-[#6D7786] text-lg font-bold">Tanaman</p>
            </a>
            <a href="{{ route('front.category', 'teknik-dan-pengolahan') }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#FED6AD] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/tekpol.png" class="object-contain" alt="icon">
                </div>
                <p class="text-[#6D7786] text-lg font-bold">Teknik dan Pengolahan</p>
            </a>
            <a href="{{ route('front.category', 'keuangan') }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#FED6AD] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/keuangan.png" class="object-contain" alt="icon">
                </div>
                <p class="text-[#6D7786] text-lg font-bold">Keuangan</p>
            </a>
        </div>
        <div class="grid grid-cols-3 gap-[30px]">
            <a href="{{ route('front.category', 'sdm') }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#FED6AD] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/sdm.png" class="object-contain" alt="icon">
                </div>
                <p class="text-[#6D7786] text-lg font-bold">SDM</p>
            </a>
            <a href="{{ route('front.category', 'corporate-culture') }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#FED6AD] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/corporate-culture.png" class="object-contain" alt="icon">
                </div>
                <p class="text-[#6D7786] text-lg font-bold">Corporate Culture</p>
            </a>
            <a href="{{ route('front.category', 'umum') }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#FED6AD] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="assets/icon/umum.png" class="object-contain" alt="icon">
                </div>
                <p class="text-[#6D7786] text-lg font-bold">Umum</p>
            </a>
        </div>
    </section>
    <section id="Popular-Courses" class="max-w-[1200px] mx-auto flex flex-col p-[70px_82px_0px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            {{-- <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Popular Courses</p>
            </div> --}}
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Pembelajaran Tersedia</h2>
                {{-- <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p> --}}
            </div>
        </div>
        <div class="relative">
            <button class="btn-prev absolute rotate-180 -left-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <button class="btn-prev absolute -right-[52px] top-[216px]">
                <img src="assets/icon/arrow-right.svg" alt="icon">
            </button>
            <div id="course-slider" class="w-full">

                @forelse($courses as $course)
                <div class="course-card w-1/3 px-3 pb-[70px] mt-[2px]">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="{{ route('front.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($course->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[10px]">
                            <a href="{{ route('front.details', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}</a>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-[2px]">
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                    <div>
                                        <img src="assets/icon/star.svg" alt="star">
                                    </div>
                                </div>
                                <p class="text-right text-[#6D7786]">{{ $course->students->count() }} students</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                    <img src="{{ Storage::url($course->teacher->user->avatar) }}" class="object-cover w-full h-full" alt="icon">
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-semibold">{{ $course->teacher->user->name }}</p>
                                    <p class="text-[#6D7786]">{{ $course->teacher->user->occupation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>
                    Belum ada data kelas terbaru
                </p>
                @endforelse

            </div>
        </div>
    </section>
    {{-- <section id="Pricing" class="max-w-[1200px] mx-auto flex justify-between items-center p-[70px_100px]">
        <div class="relative">
            <div class="w-[355px] h-[488px]">
                <img src="assets/background/benefit_illustration.png" alt="icon">
            </div>
            <div class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[214px] bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
                <p class="font-semibold">Materials</p>
                <div class="flex items-center gap-2">
                    <div>
                        <img src="assets/icon/video-play.svg" alt="icon">
                    </div>
                    <p class="font-medium">Videos</p>
                </div>
                <div class="flex items-center gap-2">
                    <div>
                        <img src="assets/icon/note-favorite.svg" alt="icon">
                    </div>
                    <p class="font-medium">Handbook</p>
                </div>
                <div class="flex items-center gap-2">
                    <div>
                        <img src="assets/icon/3dcube.svg" alt="icon">
                    </div>
                    <p class="font-medium">Assets</p>
                </div>
                <div class="flex items-center gap-2">
                    <div>
                        <img src="assets/icon/award.svg" alt="icon">
                    </div>
                    <p class="font-medium">Certificates</p>
                </div>
                <div class="flex items-center gap-2">
                    <div>
                        <img src="assets/icon/book.svg" alt="icon">
                    </div>
                    <p class="font-medium">Documentations</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-left gap-[30px]">
            <h2 class="font-bold text-[36px] leading-[52px]">Learn From Anywhere,<br>Anytime You Want</h2>
            <p class="text-[#475466] text-lg leading-[34px]">Growing new skills would be more flexible without <br> limit we help you to access all course materials.</p>
            <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Check Pricing</a>
        </div>
    </section> --}}
    {{-- <section id="Zero-to-Success" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[50px] gap-[30px] bg-[#F5F8FA] rounded-[32px]">
        <div class="flex flex-col gap-[30px] items-center text-center">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="assets/icon/medal-star.svg" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Zero to Success People</p>
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Happy & Success Students</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Acquiring skills and new high paying career become much easier</p>
            </div>
        </div>
        <div class="relative flex flex-col w-full gap-6 overflow-hidden testi">
            <div class="fade-overlay absolute z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA] to-[#F5F8FA00]"></div>
            <div class="fade-overlay absolute right-0 z-10 h-full w-[50px] bg-gradient-to-r from-[#F5F8FA00] to-[#F5F8FA]"></div>
            <div class="flex items-center group/slider flex-nowrap w-max">
                <div class="testi-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToL_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                            <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                            <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                            <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center group/slider flex-nowrap w-max">
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                            <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                        </div>
                        <p class="font-semibold">Shayna</p>
                    </div>
                    <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                    <div class="flex gap-[2px]">
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                        <div>
                            <img src="assets/icon/star.svg" alt="star">
                        </div>
                    </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-6 pl-6 items-center flex-nowrap ">
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                    <div class="test-card w-[300px] flex flex-col h-full bg-white rounded-xl gap-3 p-5">
                        <div class="flex items-center gap-3">
                            <div class="flex w-8 h-8 overflow-hidden rounded-full shrink-0">
                                <img src="assets/photo/photo4.png" class="object-cover w-full h-full" alt="photo">
                            </div>
                            <p class="font-semibold">Shayna</p>
                        </div>
                        <p class="text-sm text-[#475466]">Alqowy has helped me to grow from zero to perfect career, thank you!</p>
                        <div class="flex gap-[2px]">
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                            <div>
                                <img src="assets/icon/star.svg" alt="star">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
    </section>
    <footer class="max-w-[1200px] mx-auto flex flex-col pt-[10px] pb-[50px] px-[100px] gap-[50px] ">
        <div class="flex justify-between">
            <a href="">
                <div>
                    <img src="assets/logo/logo-black.svg" alt="logo">
                </div>
            </a>
            <div class="flex flex-col gap-5">
                <p class="text-lg font-semibold">PT Perkebunan Nusantara IV Regional 5</p>
                <ul class="flex flex-col gap-[14px]">
                    <li>
                        <a href="" class="text-[#6D7786]">Jl. Sultan Abdurrachman No. 11 Pontianak, 78116</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">Telp: +62 561 734110</a>
                    </li>
                    <li>
                        <a href="" class="text-[#6D7786]">pengembangan.pelatihansdm@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">@Copyright Bagian SDM & Sistem Manajemen 2024 - Versi 3.0</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
