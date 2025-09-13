<?php include './code/header.php'; ?>


<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #0d1b2a, #1b263b);
        color: #f5f5f5;
        overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h5,
    h6 {
        color: #ffc107;
    }

    .intro-section {
        padding: 100px 20px;
        text-align: center;
    }

    .intro-section p {
        font-size: 1.15rem;
        color: #e0e0e0;
        max-width: 700px;
        margin: 0 auto;
    }

    .icon-box {
        background: rgba(33, 37, 41, 0.85);
        border: 1px solid #ffc107;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
    }

    .icon-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 0 20px rgba(255, 193, 7, 0.4);
    }

    .icon-box i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #ffc107;
    }

    .team-section img {
        border-radius: 50%;
        border: 4px solid #ffc107;
        object-fit: cover;
        height: 220px;
        width: 220px;
        transition: all 0.4s ease;
    }

    .team-section img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(255, 193, 7, 0.5);
    }

    .divider {
        width: 80px;
        height: 4px;
        background: #ffc107;
        margin: 20px auto;
        border-radius: 2px;
    }
</style>
</head>

<body>

    <!-- Intro Section -->
    <section class="intro-section">
        <div class="container" data-aos="fade-up">
            <h1 class="fw-bold mb-3">About <span class="text-light">Team 0001</span></h1>
            <div class="divider"></div>
            <p data-aos="fade-up" data-aos-delay="200">
                Where brotherhood meets loyalty and trust. We rise together, stronger with every challenge.
                Discipline, respect, and unity define who we are. More than a team — we are a family.
            </p>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-5" data-aos="fade-up">Our <span class="text-light">Core Values</span></h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="icon-box">
                        <i class="fas fa-handshake"></i>
                        <h5 class="fw-bold mt-2">Brotherhood</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <i class="fas fa-heart"></i>
                        <h5 class="fw-bold mt-2">Loyalty</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <i class="fas fa-hands-praying"></i>
                        <h5 class="fw-bold mt-2">Respect</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="icon-box">
                        <i class="fas fa-fire"></i>
                        <h5 class="fw-bold mt-2">Discipline</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <i class="fas fa-dumbbell"></i>
                        <h5 class="fw-bold mt-2">Strength</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <i class="fas fa-bolt"></i>
                        <h5 class="fw-bold mt-2">Unity</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section with Material Swiper -->
    <section class="team-section py-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-5" data-aos="fade-up">Meet <span class="text-light">Our Team</span></h2>

            <!-- Swiper Slider -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <!-- Team Member 1 -->
                    <div class="swiper-slide">
                        <div class="swiper-material-wrapper">
                            <div class="swiper-material-content text-center">
                                <img class="demo-material-image" data-swiper-material-scale="1.2" src="images/0001.jpeg" alt="Founder">
                                <h6 class="mt-3">John Doe</h6>
                                <p class="text-warning">Founder</p>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="swiper-slide">
                        <div class="swiper-material-wrapper">
                            <div class="swiper-material-content text-center">
                                <img class="demo-material-image" data-swiper-material-scale="1.2" src="https://plus.unsplash.com/premium_photo-1726403421924-eeb265f8c57a?w=600" alt="Co-Founder">
                                <h6 class="mt-3">Jane Smith</h6>
                                <p class="text-warning">Co-Founder</p>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="swiper-slide">
                        <div class="swiper-material-wrapper">
                            <div class="swiper-material-content text-center">
                                <img class="demo-material-image" data-swiper-material-scale="1.2" src="images/0001.jpeg" alt="Team Lead">
                                <h6 class="mt-3">Alex Johnson</h6>
                                <p class="text-warning">Team Lead</p>
                            </div>
                        </div>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="swiper-slide">
                        <div class="swiper-material-wrapper">
                            <div class="swiper-material-content text-center">
                                <img class="demo-material-image" data-swiper-material-scale="1.2" src="https://plus.unsplash.com/premium_photo-1726403421924-eeb265f8c57a?w=600" alt="Coordinator">
                                <h6 class="mt-3">Emily Davis</h6>
                                <p class="text-warning">Coordinator</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SwiperJS & Material Effect -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 2,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1200: {
                    slidesPerView: 3
                },
            }
        });
    </script>





    <?php include './code/footer.php'; ?>

    <!-- AOS Animation -->
    <script src="https://cdn.jsdelivr.net/npm/aos@3.0.0-beta.6/dist/aos.js"></script>