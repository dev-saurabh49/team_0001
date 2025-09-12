<?php include './code/header.php'; ?>


<body>

    <!-- Hero Section -->
    <section id="testimonials-hero" class="text-center" style="background: linear-gradient(135deg, #0d1b2a, #1b263b); padding: 100px 0; color: #fff;">
        <div class="container" data-aos="fade-up">
            <h2 class="fw-bold text-warning display-5">Our <span class="text-light gallery_span">Testimonials</span></h2>
            <p class="lead mt-3 px-3 px-md-5">
                Hear from our members and collaborators who have been part of Team 0001’s journey.
            </p>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5" style="background: linear-gradient(135deg, #1b263b, #0d1b2a);">
        <div class="container">
            <div class="row g-4">

                <!-- Testimonial 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="card bg-dark text-light border-0 shadow-lg rounded-4 p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="images/member1.jpg" class="rounded-circle me-3 shadow-sm" style="width:60px; height:60px; object-fit:cover;">
                            <div>
                                <h6 class="text-warning fw-bold mb-0">Rishabh Shukla</h6>
                                <small class="text-light">Lead Strategist</small>
                            </div>
                        </div>
                        <p class="fst-italic">
                            "Being part of Team 0001 has been transformative. The camaraderie and shared vision make every project exciting and meaningful."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card bg-dark text-light border-0 shadow-lg rounded-4 p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="images/member2.jpg" class="rounded-circle me-3 shadow-sm" style="width:60px; height:60px; object-fit:cover;">
                            <div>
                                <h6 class="text-warning fw-bold mb-0">Saurabh Pandey</h6>
                                <small class="text-light">Co-Organizer</small>
                            </div>
                        </div>
                        <p class="fst-italic">
                            "Team 0001 is a family. Every initiative is backed by trust, discipline, and mutual respect. A perfect place for growth."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card bg-dark text-light border-0 shadow-lg rounded-4 p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="images/member3.jpg" class="rounded-circle me-3 shadow-sm" style="width:60px; height:60px; object-fit:cover;">
                            <div>
                                <h6 class="text-warning fw-bold mb-0">Ananya Sharma</h6>
                                <small class="text-light">Event Coordinator</small>
                            </div>
                        </div>
                        <p class="fst-italic">
                            "The experience of working in Team 0001 is unmatched. Collaboration, learning, and innovation are at the heart of everything we do."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card bg-dark text-light border-0 shadow-lg rounded-4 p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="images/member4.jpg" class="rounded-circle me-3 shadow-sm" style="width:60px; height:60px; object-fit:cover;">
                            <div>
                                <h6 class="text-warning fw-bold mb-0">Rahul Mehta</h6>
                                <small class="text-light">Volunteer</small>
                            </div>
                        </div>
                        <p class="fst-italic">
                            "Joining Team 0001 opened doors to new opportunities and connections. The energy and discipline here are incredible."
                        </p>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card bg-dark text-light border-0 shadow-lg rounded-4 p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <img src="images/member5.jpg" class="rounded-circle me-3 shadow-sm" style="width:60px; height:60px; object-fit:cover;">
                            <div>
                                <h6 class="text-warning fw-bold mb-0">Priya Singh</h6>
                                <small class="text-light">Community Lead</small>
                            </div>
                        </div>
                        <p class="fst-italic">
                            "Team 0001 is about teamwork and trust. Every experience here helps you grow professionally and personally."
                        </p>
                    </div>
                </div>

            </div>
            <!-- Bootstrap Pagination -->
           

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
    