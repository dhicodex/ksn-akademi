@extends('layouts.app')

@section('css-custom')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
span.swiper-pagination-bullet.swiper-pagination-bullet-active {
    background: #aaaaaa;
}
</style>
@endsection

@section('content')
    <x-header-component />
    
    {{-- Hero --}}
    <section class="hero section bg-white min-h-[600px]" data-aos="fade-in">
        <div class="container flex flex-col items-center justify-center px-4">
            <div class="max-w-[800px] mx-auto text-center">
                <h1 class="hero-title text-3xl md:text-5xl leading-tight font-bold">Solusi Terpercaya untuk Sengketa Kepabeanan Bea Cukai dan Sertifikasi Ahli Kepabeanan</h1>
            </div>

            <div class="hero-btn mt-12">
                <a href="https://wa.me/6281990891680?text=Halo%20saya%20ingin%20konsultasi%20dengan%20KSN%20Akademi" class="btn btn-primary py-3 px-6">Konsultasi Gratis Sekarang</a>
            </div>
        </div>
    </section>

    {{-- Plans --}}
    <section id="plans" class="plans-section bg-white pb-20" data-aos="fade-up">
        <div class="container max-w-[1200px] mx-auto flex flex-col items-center px-4">
            <h2 class="play-fair-family text-3xl md:text-4xl text-[#1d1e20] font-semibold text-center">
                Pilih Paket Anda
            </h2>
            <p class="max-w-[400px] text-[#7a7a7a] text-center mt-2">Pilih paket yang sesuai untuk menuntaskan tantangan kepabeanan Anda</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-5 w-full items-end">
                @foreach ($plans as $plan)
                    <div class="card-package">
                        <div class="card-package__wrapper border bg-[#fafbff] rounded-lg {{ $loop->index == 1 ? 'border-[#2e3e50] border-2' : 'border-slate-200' }}">
                            <div class="card-package__header p-5">
                                <div class="card-package__title play-fair-family text-2xl font-medium text-[#1d1e20]">{{ $plan->name }}</div>
                                <div class="card-package__desc text-[#7a7a7a] text-sm mt-1">{{ $plan->for_who }}</div>
                            </div>
                            
                            <div class="card-package__body bg-white mt-1 p-5 rounded-b-lg">
                                <div class="card-package__price play-fair-family text-2xl font-bold">
                                    Rp. {{ number_format($plan->price, 0, ',', '.') }}<span class="text-sm text-[#7a7a7a] font-medium">/ {{ $plan->description }}</span>
                                </div>

                                <div class="btn btn-primary py-3 px-6 mt-4 text-center">Pilih Paket</div>

                                <div class="card-package__profit">
                                    <ul>
                                        @foreach ($plan->plan_features as $feature)
                                            <li class="flex items-center gap-2 mt-4">
                                                <img src="{{ asset('icons/ico_checklist.svg') }}" alt="checklist" class="w-4 h-4">
                                                <span class="text-sm">{{ $feature->feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About --}}
    <section class="about-section pt-20 pb-10 md:pb-[200px]">
        <div class="container max-w-[1200px] mx-auto flex flex-col md:flex-row gap-10 px-4">
            <div class="relative w-full md:w-[50%]" data-aos="fade-right">
                <!-- Gambar 1 dan 2 di atas, overlap -->
                <div class="illustration-about flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-[-30px] z-10 relative mb-3">
                    <img src="https://media.istockphoto.com/id/1783743772/id/foto/pembicara-wanita-memberikan-presentasi-selama-seminar-bisnis-di-pusat-konvensi.jpg?s=612x612&w=0&k=20&c=dTuGMazV0h9OycnjVjyxW7nDYcAcZTPkObtyRqqkOSw=" 
                        alt="About 1" 
                        class="w-full md:w-[400px] h-52 object-cover rounded-lg border-4 border-white shadow-lg relative z-20" />
                    <img src="https://images.pexels.com/photos/3184360/pexels-photo-3184360.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="About 2"
                        class="w-full md:w-52 h-52 object-cover rounded-lg border-4 border-white shadow-lg relative md:bottom-[-50px]" />
                </div>
                <!-- Gambar 3 di bawah, full -->
                <div>
                    <img src="https://media.istockphoto.com/id/1496377580/photo/group-of-people-applauding.jpg?s=612x612&w=0&k=20&c=3xt-MUAOankRsMDryMJTFEwC5QQ1CYHvloGIKbyzzDQ=" 
                        alt="About 3"
                        class="w-full h-80 object-cover rounded-lg shadow" />
                </div>
            </div>

            <div class="relative flex flex-col justify-end pb-10 flex-1 mt-10 md:mt-0" data-aos="fade-left">
                <div class="bg-[#2e3e50] py-1 px-4 text-center text-white text-sm font-medium rounded-sm w-fit mb-2">Tentang Kami</div>
                <h2 class="play-fair-family text-[#1d1e20] text-3xl md:text-4xl font-semibold">Pelajari & tingkatkan <span class="marker-circle relative">keterampilan</span> Anda bersama Kami</h2>
                <p class="mt-2 text-[#7a7a7a]">Berkomitmen memberikan solusi dan pendampingan terbaik dalam kepabeanan dan cukai, serta edukasi dan dukungan sistem yang efektif. Kami berupaya memberikan layanan terbaik dan kenyamanan konsultasi bagi klien. Kepercayaan Anda menjadi prioritas kami, yang telah dipilih oleh banyak klien</p>
            </div>
        </div>
    </section>

    {{-- Testimonial --}}
    <section class="testimonial-section bg-[#2e3e50]" data-aos="fade-up">
        <div class="container max-w-[1200px] mx-auto flex flex-col gap-10 relative px-4">
            <div class="testimonial-counting bg-white flex flex-col md:flex-row gap-5 py-10 px-6 md:py-[50px] md:px-[70px] relative top-[-95px] rounded-lg md:rounded-full">
                <div class="flex gap-4 w-full items-center">
                    <div class="bg-slate-200 rounded-full w-[60px] h-[60px] md:w-[78px] md:h-[78px] flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('images/successful-testimonial.png') }}"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="font-bold text-3xl md:text-5xl text-[#1d1e20]">1K+</div>
                        <div class="text-[#7a7a7a] text-sm">Successfully Trained</div>
                    </div>
                </div>
                <div class="flex gap-4 w-full items-center">
                    <div class="bg-slate-200 rounded-full w-[60px] h-[60px] md:w-[78px] md:h-[78px] flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('images/class-testimonial.png') }}"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="font-bold text-3xl md:text-5xl text-[#1d1e20]">15K+</div>
                        <div class="text-[#7a7a7a] text-sm">Classes Completed</div>
                    </div>
                </div>
                <div class="flex gap-4 w-full items-center">
                    <div class="bg-slate-200 rounded-full w-[60px] h-[60px] md:w-[78px] md:h-[78px] flex items-center justify-center flex-shrink-0">
                        <img src="{{ asset('images/satisfaction-testimonial.png') }}"/>
                    </div>
                    <div class="flex flex-col gap-2">
                        <div class="font-bold text-3xl md:text-5xl text-[#1d1e20]">37K+</div>
                        <div class="text-[#7a7a7a] text-sm">Satisfaction Rate</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-list relative top-[-60px]">
                <div class="text-center text-2xl text-white play-fair-family font-semibold">Testimoni</div>
                <div class="swiper mySwiper mt-4 w-full h-full">
                    <div class="swiper-wrapper mb-10">
                        <div class="swiper-slide bg-white rounded-2xl p-5">
                            <p class="testimonial-text relative text-sm leading-6 text-[#7a7a7a] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam dolore eum temporibus corrupti rem eveniet voluptatem, blanditiis debitis sed vel consectetur delectus aliquid ipsum doloremque quaerat aliquam reiciendis veritatis impedit velit labore magni tempore. Soluta, sit impedit quis iste debitis suscipit atque ex fugit aperiam ad reprehenderit incidunt qui error!</p>
                            <div class="flex items-center gap-2 mt-4">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="{{ asset('/images/avatar.png') }}"/>
                                </div>
                                <div class="flex flex-col">
                                    <div class="play-fair-family font-bold text-[#1d1e20] text-[16px]">Jessica</div>
                                    <p class="text-slate-400 text-[10px]">CEO Tambang</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white rounded-2xl p-5">
                            <p class="testimonial-text relative text-sm leading-6 text-[#7a7a7a] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam dolore eum temporibus corrupti rem eveniet voluptatem, blanditiis debitis sed vel consectetur delectus aliquid ipsum doloremque quaerat aliquam reiciendis veritatis impedit velit labore magni tempore. Soluta, sit impedit quis iste debitis suscipit atque ex fugit aperiam ad reprehenderit incidunt qui error!</p>
                            <div class="flex items-center gap-2 mt-4">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="{{ asset('/images/avatar.png') }}"/>
                                </div>
                                <div class="flex flex-col">
                                    <div class="play-fair-family font-bold text-[#1d1e20] text-[16px]">Jessica</div>
                                    <p class="text-slate-400 text-[10px]">CEO Tambang</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white rounded-2xl p-5">
                            <p class="testimonial-text relative text-sm leading-6 text-[#7a7a7a] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam dolore eum temporibus corrupti rem eveniet voluptatem, blanditiis debitis sed vel consectetur delectus aliquid ipsum doloremque quaerat aliquam reiciendis veritatis impedit velit labore magni tempore. Soluta, sit impedit quis iste debitis suscipit atque ex fugit aperiam ad reprehenderit incidunt qui error!</p>
                            <div class="flex items-center gap-2 mt-4">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="{{ asset('/images/avatar.png') }}"/>
                                </div>
                                <div class="flex flex-col">
                                    <div class="play-fair-family font-bold text-[#1d1e20] text-[16px]">Jessica</div>
                                    <p class="text-slate-400 text-[10px]">CEO Tambang</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white rounded-2xl p-5">
                            <p class="testimonial-text relative text-sm leading-6 text-[#7a7a7a] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam dolore eum temporibus corrupti rem eveniet voluptatem, blanditiis debitis sed vel consectetur delectus aliquid ipsum doloremque quaerat aliquam reiciendis veritatis impedit velit labore magni tempore. Soluta, sit impedit quis iste debitis suscipit atque ex fugit aperiam ad reprehenderit incidunt qui error!</p>
                            <div class="flex items-center gap-2 mt-4">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="{{ asset('/images/avatar.png') }}"/>
                                </div>
                                <div class="flex flex-col">
                                    <div class="play-fair-family font-bold text-[#1d1e20] text-[16px]">Jessica</div>
                                    <p class="text-slate-400 text-[10px]">CEO Tambang</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white rounded-2xl p-5">
                            <p class="testimonial-text relative text-sm leading-6 text-[#7a7a7a] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam dolore eum temporibus corrupti rem eveniet voluptatem, blanditiis debitis sed vel consectetur delectus aliquid ipsum doloremque quaerat aliquam reiciendis veritatis impedit velit labore magni tempore. Soluta, sit impedit quis iste debitis suscipit atque ex fugit aperiam ad reprehenderit incidunt qui error!</p>
                            <div class="flex items-center gap-2 mt-4">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="{{ asset('/images/avatar.png') }}"/>
                                </div>
                                <div class="flex flex-col">
                                    <div class="play-fair-family font-bold text-[#1d1e20] text-[16px]">Jessica</div>
                                    <p class="text-slate-400 text-[10px]">CEO Tambang</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide bg-white rounded-2xl p-5">
                            <p class="testimonial-text relative text-sm leading-6 text-[#7a7a7a] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam dolore eum temporibus corrupti rem eveniet voluptatem, blanditiis debitis sed vel consectetur delectus aliquid ipsum doloremque quaerat aliquam reiciendis veritatis impedit velit labore magni tempore. Soluta, sit impedit quis iste debitis suscipit atque ex fugit aperiam ad reprehenderit incidunt qui error!</p>
                            <div class="flex items-center gap-2 mt-4">
                                <div class="w-10 h-10 rounded-full">
                                    <img src="{{ asset('/images/avatar.png') }}"/>
                                </div>
                                <div class="flex flex-col">
                                    <div class="play-fair-family font-bold text-[#1d1e20] text-[16px]">Jessica</div>
                                    <p class="text-slate-400 text-[10px]">CEO Tambang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Expert --}}
    <section class="expert-section bg-white" data-aos="fade-up">
        <div class="container max-w-[1200px] mx-auto flex flex-col gap-10 relative py-20 px-4">
            <div class="flex items-center justify-center flex-col">
                <div class="bg-[#2e3e50] py-1 px-4 text-center text-white text-sm font-medium rounded-sm w-fit mb-4">Experts</div>
                <h2 class="play-fair-family text-[#1d1e20] text-3xl md:text-4xl font-semibold text-center">Temui Instruktur Ahli Kami</h2>
                <p class="max-w-[400px] mt-2 text-[14px] text-[#7a7a7a] leading-6 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad fugiat possimus adipisci eos quisquam quae ex rem unde, dolorum nihil?</p>

                <div class="expert-list mt-5 flex flex-col md:flex-row gap-5">
                    <div class="relative">
                        <div class="max-w-full md:max-w-[312px] min-h-[361px] relative">
                            <img src="{{ asset('/images/benny.png') }}" class="h-[361px] object-cover w-full rounded-t-lg"/>
                        </div>
                        <div class="bg-[#2e3e50] rounded-b-lg py-8 w-full">
                            <div class="text-center text-white font-bold text-[18px]">Benny Sudikno</div>
                            <p class="text-center text-[#bfbfbf] text-sm">Konsultan Hukum Kepabeanan dan Cukai</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="max-w-full md:max-w-[312px] min-h-[361px] relative">
                            <img src="{{ asset('/images/yossy.png') }}" class="h-[361px] object-cover w-full rounded-t-lg"/>
                        </div>
                        <div class="bg-[#2e3e50] rounded-b-lg py-8 w-full">
                            <div class="text-center text-white font-bold text-[18px]">Yossy Girsang</div>
                            <p class="text-center text-[#bfbfbf] text-sm">Konsultan Hukum Kepabeanan dan Cukai</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="max-w-full md:max-w-[312px] min-h-[361px] relative">
                            <img src="{{ asset('/images/okta.png') }}" class="h-[361px] object-cover w-full rounded-t-lg"/>
                        </div>
                        <div class="bg-[#2e3e50] rounded-b-lg py-8 w-full">
                            <div class="text-center text-white font-bold text-[18px]">Oktaviana Devita</div>
                            <p class="text-center text-[#bfbfbf] text-sm">Konsultan Hukum Kepabeanan dan Cukai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- News --}}
    {{-- <section class="expert-section bg-white">
        <div class="container max-w-[1200px] mx-auto flex flex-col relative py-20">

        </div>
    </section> --}
    
    {{-- Footer --}}
    <x-footer-component />
@endsection

@section('js-custom')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
    }
});
</script>
@endsection