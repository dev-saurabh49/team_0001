<!-- Founders Section -->
<?php
include './code/db_connection.php'; // Make sure path is correct

$founders = mysqli_query($conn, "SELECT * FROM founders ORDER BY created_at ASC");
?>
<!-- Swiper CSS -->
<!-- Swiper CSS -->
<?php //include "code/header.php";?>

<style>
    /* Ensure Swiper slides stretch equally */
    .founderSwiper .swiper-slide {
        display: flex;
        height: auto;
        /* Let card control the height */
    }

    /* Make card take full available height */
    .founder-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /* space out content */
        height: 100%;
        width: 100%;
    }
</style>
<section
    id="founders"
    class="py-5"
    style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); color: #fff;">
    <div class="container text-center">
        <h2 class="fw-bold text-warning mb-4" data-aos="fade-down">
            Meet Our <span class="gallery_span text-light">Founders</span>
        </h2>
        <p class="mb-5 text-light px-2 px-lg-5" data-aos="fade-up" data-aos-delay="100">
            Team 0001 की नींव कुछ खास लोगों ने रखी है। उनका vision, brotherhood और
            dedication ही आज हमें यहां तक लाया है।
        </p>

        <!-- Swiper Container -->
        <div class="swiper founderSwiper">
            <div class="swiper-wrapper">
                <?php
                $delay = 200;
                while ($row = mysqli_fetch_assoc($founders)):
                ?>
                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <div class="card founder-card shadow-lg border-0 text-center p-4">
                            <img
                                src="./admin/dashboard/<?= htmlspecialchars($row['photo']) ?>"
                                alt="<?= htmlspecialchars($row['name']) ?>"
                                class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning"
                                style="width: 130px; height: 130px; object-fit: cover" />

                            <h5 class="fw-bold text-warning">
                                <?= htmlspecialchars($row['name']) ?>
                            </h5>
                            <p class="text-light small"><?= htmlspecialchars($row['role']) ?></p>

                            <blockquote class="fst-italic text-light small px-3 py-2 rounded-3 flex-grow-1"
                                style="background: rgba(255,255,255,0.05); border-left: 4px solid #ffc107; transition: transform 0.3s ease;">
                                <?= htmlspecialchars($row['bio']) ?>
                            </blockquote>

                            <!-- Social Links -->
                            <div class="mt-3 d-flex justify-content-center gap-3">
                                <?php if (!empty($row['twitter'])): ?>
                                    <a href="<?= htmlspecialchars($row['twitter']) ?>" target="_blank"
                                        class="social-icon text-info d-flex align-items-center justify-content-center rounded-circle"
                                        style="width:40px; height:40px; background: rgba(29,161,242,0.1); transition: all 0.3s ease;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (!empty($row['linkedin'])): ?>
                                    <a href="<?= htmlspecialchars($row['linkedin']) ?>" target="_blank"
                                        class="social-icon text-primary d-flex align-items-center justify-content-center rounded-circle"
                                        style="width:40px; height:40px; background: rgba(0,119,181,0.1); transition: all 0.3s ease;">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                <?php
                    $delay += 200;
                endwhile;
                ?>
            </div>

            <!-- Swiper Controls -->
            <div class="swiper-pagination founder-pagination"></div>
            <div class="swiper-button-next founder-next"></div>
            <div class="swiper-button-prev founder-prev"></div>
        </div>
    </div>
</section>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Init -->
<script>
    var founderSlider = new Swiper(".founderSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".founder-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".founder-next",
            prevEl: ".founder-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            }, // tablets
            992: {
                slidesPerView: 3
            } // desktops
        }
    });
</script>