<!-- About Section -->
<section
    id="about"
    class="py-5"
    style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); color: #fff;">
    <div class="container">
        <div class="row align-items-center">
            <!-- Swiper Images -->
            <div class="col-lg-5 mb-4 mb-lg-0 d-flex justify-content-center align-items-center">
                <div class="swiper mySwiper" style="width: 100%; max-width: 300px;">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <img src="./images/0001.jpeg" alt="Team Member 1" class="rounded-circle shadow-lg" style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <img src="https://plus.unsplash.com/premium_photo-1726403421924-eeb265f8c57a?w=600" alt="Team Member 2" class="rounded-circle shadow-lg" style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <img src="./images/0001.jpeg" alt="Team Member 3" class="rounded-circle shadow-lg" style="width: 100%; height: auto; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Text & Icons -->
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="fw-bold text-warning mb-3" data-aos="fade-right">
                    About <span class="text-light gallery_span">Us</span>
                </h1>
                <p class="mb-4 text-light px-2 px-lg-0" data-aos="fade-up">
                    <span class="fw-bold text-warning mb-3">Discipline >> Respect >> Loyalty</span><br>
                    Where brotherhood meets loyalty and trust. We rise together, stronger with every challenge.
                </p>

                <div class="row text-center g-4 mt-4">
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="50">
                        <div class="icon-box p-4 rounded shadow-lg h-100">
                            <i class="fas fa-handshake fa-3x text-warning mb-3"></i>
                            <h6 class="fw-bold">Brotherhood</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box p-4 rounded shadow-lg h-100">
                            <i class="fas fa-heart fa-3x text-warning mb-3"></i>
                            <h6 class="fw-bold">Loyalty</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="icon-box p-4 rounded shadow-lg h-100">
                            <i class="fas fa-hands-praying fa-3x text-warning mb-3"></i>
                            <h6 class="fw-bold">Respect</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box p-4 rounded shadow-lg h-100">
                            <i class="fas fa-fire fa-3x text-warning mb-3"></i>
                            <h6 class="fw-bold">Discipline</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="250">
                        <div class="icon-box p-4 rounded shadow-lg h-100">
                            <i class="fas fa-dumbbell fa-3x text-warning mb-3"></i>
                            <h6 class="fw-bold">Strength</h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box p-4 rounded shadow-lg h-100">
                            <i class="fas fa-bolt fa-3x text-warning mb-3"></i>
                            <h6 class="fw-bold">Unity</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS Init -->
    <script>
        const swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            slidesPerView: 1,
            spaceBetween: 20,
            centeredSlides: true,
            breakpoints: {
                576: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            }
        });
    </script>
</section>
<!-- About Section End-->