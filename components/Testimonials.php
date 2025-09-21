<section id="testimonials" class="py-20" style="background: linear-gradient(135deg, #0d1b2a, #1b263b);">
    <div class="container mx-auto px-4 py-2">
        <!-- Section Title -->
        <div class="text-center mb-12">
            <h2 class="display-5 fw-bold text-warning mb-3 ">
                What People Say <span class="text-light gallery_span">About Us</span>
            </h2>
            <p class="lead text-light px-2 lg:px-32">
                Feedback from our community and partners who trust Team 0001.
            </p>
        </div>

        <!-- Swiper Carousel -->
        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
                <?php
                include "./code/db_connection.php";
                $sql = "SELECT * FROM team_feedback ORDER BY created_at DESC LIMIT 4"; // 4 testimonials only
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()):
                    $rating = (int)$row['rating'];
                ?>
                    <div class="swiper-slide mb-4">
                        <div class="testimonial-card p-6 shadow-lg border-0 rounded-4 text-center bg-dark text-light">
                            <img src="../code/<?= htmlspecialchars($row['profile_photo']); ?>"
                                class="rounded-circle mb-3 shadow-lg border-3 border-warning mx-auto"
                                style="width:80px;height:80px;object-fit:cover;">
                            <p class="fst-italic mb-2 text-white">
                                "<?= htmlspecialchars($row['comment']); ?>"
                            </p>
                            <h6 class="fw-bold text-warning mb-0"><?= htmlspecialchars($row['name']); ?></h6>
                            <div class="text-warning mt-2">
                                <?php for ($i = 1; $i <= 5; $i++) echo $i <= $rating ? '★' : '☆'; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                $conn->close();
                ?>
            </div>

            <!-- Navigation Arrows -->
            <div class="swiper-button-next text-warning"></div>
            <div class="swiper-button-prev text-warning"></div>

            <!-- View More Button -->
            <div class="text-center mt-8">
                <a href="../testimonials.php" class="custom-view-more-btn">
                    View More
                </a>
            </div>


        </div>
    </div>
</section>

<script>
    const testimonialSwiper = new Swiper('.testimonial-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        spaceBetween: 30,
        slidesPerView: 1, // mobile
        breakpoints: {
            768: {
                slidesPerView: 2
            }, // tablets
            1024: {
                slidesPerView: 4
            } // desktop, show all 4
        }
    });
</script>


<style>
    .custom-view-more-btn {
        display: inline-block;
        padding: 0.75rem 2rem;
        font-weight: bold;
        border-radius: 9999px;
        color: #ffc107;
        background: rgba(13, 71, 161, 0.4);
        box-shadow: 0 4px 14px rgba(13, 71, 161, 0.2);
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .custom-view-more-btn:hover {
        color: #fff;
        background: #ffc107;
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(13, 71, 161, 0.35);
    }

    .testimonial-card {
        background: rgba(17, 17, 17, 0.85);
        border-radius: 20px;
        transition: all 0.4s ease;
        backdrop-filter: blur(10px);
    }

    .testimonial-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 10px 25px rgba(255, 193, 7, 0.4);
    }

    .testimonial-card img {
        transition: all 0.4s ease;
    }

    .testimonial-card:hover img {
        transform: scale(1.1);
        border-color: #ffcc00;
    }

    #testimonials .splide__pagination__page {
        background: #fff !important;
        opacity: 0.5;
    }

    #testimonials .splide__pagination__page.is-active {
        background: #ffcc00 !important;
        transform: scale(1.3);
        opacity: 1;
    }
</style>