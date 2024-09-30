<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="text-black font-poppins pt-10 pb-[50px]">
    <div style="background-image: url('{{asset('assets/background/Hero-Banner.png')}}');" id="hero-section" class="max-w-[1200px] mx-auto w-full flex flex-col gap-10 bg-center bg-no-repeat bg-cover rounded-[32px] overflow-hidden">
        <nav class="flex justify-between items-center py-6 px-[50px]">
            <a href="">
                <img src="{{asset('assets/logo/logo.svg')}}" alt="logo">
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
                <a href="{{ route('register') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Sign Up</a>
                <a href="{{ route('login') }}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign In</a>
            </div>
            @endguest
        </nav>


    </div>
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="gradient-badge w-fit p-[8px_16px] rounded-full border border-[#FED6AD] flex items-center gap-[6px]">
                <div>
                    <img src="{{asset('assets/icon/medal-star.svg')}}" alt="icon">
                </div>
                <p class="font-medium text-sm text-[#FF6129]">Top Categories</p>
            </div>
            {{-- <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]"></h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Catching up the on demand skills and high paying career this year</p>
            </div> --}}
            <div class="grid grid-cols-3 gap-[30px] w-full">

                @forelse($courses as $course)
                <div class="course-card">
                    <div class="flex flex-col rounded-t-[12px] rounded-b-[24px] gap-[32px] bg-white w-full pb-[10px] overflow-hidden ring-1 ring-[#DADEE4] transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">
                        <a href="{{ route('front.details', $course->slug) }}" class="thumbnail w-full h-[200px] shrink-0 rounded-[10px] overflow-hidden">
                            <img src="{{ Storage::url($course->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail">
                        </a>
                        <div class="flex flex-col px-4 gap-[32px]">
                            <div class="flex flex-col gap-[10px]">
                                <a href="{{ route('front.details', $course->slug) }}" class="font-semibold text-lg line-clamp-2 hover:line-clamp-none min-h-[56px]">{{ $course->name }}</a>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-[2px]">
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                        <div>
                                            <img src="{{asset('assets/icon/star.svg')}}" alt="star">
                                        </div>
                                    </div>
                                    <p class="text-right text-[#6D7786]">{{ $course->students->count() }} students</p>
                                </div>
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
                    Belum tersedia kelas pada kategori ini
                </p>
                @endforelse


            </div>
        </div>

    </section>
    <section id="FAQ" class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px]">
    </section>
    <footer class="max-w-[1200px] mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] ">
        <div class="flex justify-between">
            <a href="">
                <div>
                    <img src="{{asset('assets/logo/logo-black.svg')}}" alt="logo">
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
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
