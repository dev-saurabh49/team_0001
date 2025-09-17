<?php include './code/header.php'; ?>

<body>

    <!-- Hero Section -->
    <section id="testimonials-hero" class="text-center" style="background: linear-gradient(135deg, #0d1b2a, #1b263b); padding: 100px 0; color: #fff;">
        <div class="container" data-aos="fade-up">
            <h2 class="fw-bold text-warning display-5">Our <span class="text-light gallery_span">Testimonials</span></h2>
            <p class="lead mt-3 px-3 px-md-5"> Hear from our members and collaborators who have been part of Team 0001’s journey. </p>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5" style="background: linear-gradient(135deg, #1b263b, #0d1b2a);">
        <div class="container">
            <div class="row g-4">

                <?php
                include "code/db_connection.php";

                // Fetch all testimonials dynamically
                $sql = "SELECT * FROM team_feedback ORDER BY created_at DESC LIMIT 20";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()):
                    $rating = (int)$row['rating'];
                ?>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <div class="card bg-dark text-light border-0 shadow-lg rounded-4 p-4 h-100 text-center">
                            <!-- Profile Image Centered -->
                            <img src="code/<?= htmlspecialchars($row['profile_photo']); ?>"
                                class="rounded-circle mb-3 shadow-sm mx-auto"
                                style="width:80px; height:80px; object-fit:cover; border: 2px solid #FFD700;">

                            <!-- Name and Role / Comment -->
                            <h6 class="text-warning fw-bold mb-1"><?= htmlspecialchars($row['name']); ?></h6>

                            <!-- User Comment -->
                            <p class="fst-italic mt-2">
                                "<?= htmlspecialchars($row['comment']); ?>"
                            </p>

                            <!-- Star Rating -->
                            <div class="text-warning mt-2">
                                <?php for ($i = 1; $i <= 5; $i++) echo $i <= $rating ? '★' : '☆'; ?>
                            </div>
                        </div>

                    </div>
                <?php endwhile;
                $conn->close();
                ?>

            </div>
        </div>
    </section>

    <?php include './code/footer.php'; ?>

    <!-- AOS Animation -->
    <script src="https://cdn.jsdelivr.net/npm/aos@3.0.0-beta.6/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            offset: 50,
        });
    </script>