{{-- resources/views/components/hero-carousel.blade.php --}}
<div class="carousel">
    @php
        $slides = [
            [
                'image' => 'assets/images/custom/hero-banner/oppf-founders.png',
                'title' => 'Welcome to Gamma Alpha Chapter',
                'subtitle' => 'Omega Psi Phi Fraternity, Inc',
                'button' => ['text' => 'About GA', 'url' => "route('about_ga')"]
            ],        
            [
                'image' => 'assets/images/custom/hero-banner/omega-shield.png',
                'title' => 'Welcome to Gamma Alpha Chapter',
                'subtitle' => 'Omega Psi Phi Fraternity, Inc',
                'button' => ['text' => 'View Services', 'url' => '#services']
            ],
            [
                'image' => 'assets/images/custom/hero-banner/GAIMG6.jpg',
                'title' => 'Welcome to Gamma Alpha Chapter',
                'subtitle' => 'Omega Psi Phi Fraternity, Inc',
                'button' => ['text' => 'Get in Touch', 'url' => '#contact']
            ],
        ];
    @endphp

    @foreach ($slides as $index => $slide)        
        <div class="slide {{ $index === 0 ? 'active' : '' }}">
            @php
				$filePath = asset($slide['image'])
			@endphp
            <img src="{{ $filePath }}" alt="Slide Image">
            <div class="content">
                <h1 style="color: #CFB53B;">{{ $slide['title'] }}</h1>
                <h2 style="color: #CFB53B;">{{ $slide['subtitle'] }}</h2>
                <!-- <a href="{{ $slide['button']['url'] }}">{{ $slide['button']['text'] }}</a> -->
            </div>
        </div>
    @endforeach

    <div class="overlay"></div>

    <div class="dots">
        @foreach ($slides as $index => $slide)
            <span class="dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})"></span>
        @endforeach
    </div>
    
</div>

@push('styles')
<style>
    html, body { height: 100%; margin: 0; font-family: Arial, sans-serif; }
    .carousel { position: relative; width: 100%; height: 400px; overflow: hidden; }
    .slide {
        position: absolute;
        width: 100%;
        height: 400px;
        background-size: cover;
        background-position: center;
        opacity: 0;
        object-fit: cover;
        transition: opacity 1s ease-in-out;
    }
    .slide.active { opacity: 0.9; z-index: 1; }
    .overlay {
        position: absolute;
        width: 100%;
        height: 400px; 
        z-index: 2;
    }
    .slide img {
        width: 100%;
        height: 400px;
        object-fit: fill;
    }
    .content {
        position: absolute;
        z-index: 3;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
    }
    .content h1 { font-size: 3rem; margin-bottom: 1rem; }
    .content h2 { font-size: 2.25rem; margin-bottom: 1.5rem; }
    .content a {
        display: inline-block;
        padding: 12px 24px;
        background-color: white;
        color: purple;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
    }
    .content a:hover { background-color: #eee; }
    .dots {
        position: absolute;
        bottom: 20px;
        width: 100%;
        text-align: center;
        z-index: 4;
    }
    .dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        margin: 0 5px;
        background: white;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0.5;
    }
    .dot.active { opacity: 1; }
</style>
@endpush

@push('scripts')
<script>
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let currentIndex = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            dots[i].classList.remove('active');
            if (i === index) {
                slide.classList.add('active');
                dots[i].classList.add('active');
            }
        });
        currentIndex = index;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    function goToSlide(index) {
        showSlide(index);
    }

    setInterval(nextSlide, 5000);
</script>
@endpush
