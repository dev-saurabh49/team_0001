<?php
include "code/db_connection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 🔹 Fetch top members
$sql = "SELECT * FROM members ORDER BY rand() LIMIT 6";
$result = $conn->query($sql);

// Store in array for reuse
$members = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $members[] = $row;
    }
}
?>

<!-- Top members section start -->
<section id="top-members" class="py-5" style="background: linear-gradient(135deg, #0d1b2a 0%, #1b263b 100%); color: #fff;">
    <div class="container">
        <!-- Section Title -->
        <div class="row mb-5 text-center">
            <div class="col">
                <h2 class="display-5 fw-bold text-warning mb-3">
                    Our <span class="text-light gallery_span">Top Members</span>
                </h2>
                <p class="lead text-light px-2 px-lg-5">
                    Meet the dedicated members who make Team 0001 special.
                </p>
            </div>
        </div>

        <?php if (!empty($members)): ?>
            <!-- Swiper Slider -->
            <div class="swiper topMembersSwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($members as $row): ?>
                        <div class="swiper-slide">
                            <div class="card member-card h-100 text-center p-4">
                                <img src="code/<?= htmlspecialchars($row['profile_pic']) ?>"
                                    alt="<?= htmlspecialchars($row['name']) ?>"
                                    class="rounded-circle mx-auto mb-3 shadow-lg border border-3 border-warning"
                                    style="width:120px;height:120px;object-fit:cover;" />
                                <h5 class="fw-bold text-warning"><?= htmlspecialchars($row['name']) ?></h5>
                                <p class="text-light small">Team <?= htmlspecialchars($row['team_id']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Swiper Pagination & Nav -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        <?php else: ?>
            <p class="text-light text-center">No top members found.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Swiper CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var topMembersSlider = new Swiper(".topMembersSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            }, // Tablets
            992: {
                slidesPerView: 3
            } // Desktops
        }
    });
</script>