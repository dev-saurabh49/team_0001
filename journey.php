<?php include "./code/header.php" ?>

<!-- Beautiful Responsive Timeline Section -->
<section id="timeline-new" class="py-5" style="background: #0d1b2a; color: #f5f5f5;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-warning">Our <span class="text-light">Journey</span></h2>
            <p class="lead mx-auto" style="max-width: 600px;">
                Milestones and achievements that shaped Team 0001’s success story.
            </p>
        </div>

        <div class="position-relative">
            <!-- Vertical line -->
            <div class="timeline-line position-absolute top-0 start-50 translate-middle-x"></div>

            <!-- Timeline items -->
            <div class="timeline-item d-flex flex-column flex-md-row align-items-center mb-5">
                <div class="timeline-icon bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center shadow">
                    <i class="fas fa-handshake fa-lg"></i>
                </div>
                <div class="timeline-content bg-dark rounded p-4 ms-md-4 mt-3 mt-md-0 shadow">
                    <h5 class="text-warning mb-2">June 2025</h5>
                    <p>First meetups and team gatherings, building foundation of trust, respect, and loyalty.</p>
                </div>
            </div>

            <div class="timeline-item d-flex flex-column flex-md-row align-items-center mb-5 flex-md-row-reverse">
                <div class="timeline-icon bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center shadow">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div class="timeline-content bg-dark rounded p-4 me-md-4 mt-3 mt-md-0 shadow">
                    <h5 class="text-warning mb-2">July 2025</h5>
                    <p>Started small community activities and established core team values.</p>
                </div>
            </div>

            <div class="timeline-item d-flex flex-column flex-md-row align-items-center mb-5">
                <div class="timeline-icon bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center shadow">
                    <i class="fas fa-lightbulb fa-lg"></i>
                </div>
                <div class="timeline-content bg-dark rounded p-4 ms-md-4 mt-3 mt-md-0 shadow">
                    <h5 class="text-warning mb-2">August 2025</h5>
                    <p>Brainstormed new ideas for team projects and defined goals for growth and collaboration.</p>
                </div>
            </div>

            <div class="timeline-item d-flex flex-column flex-md-row align-items-center mb-5 flex-md-row-reverse">
                <div class="timeline-icon bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center shadow">
                    <i class="fas fa-trophy fa-lg"></i>
                </div>
                <div class="timeline-content bg-dark rounded p-4 me-md-4 mt-3 mt-md-0 shadow">
                    <h5 class="text-warning mb-2">September 2025</h5>
                    <p>Successfully completed first team milestone and celebrated unity and dedication.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    #timeline-new {
        font-family: 'Poppins', sans-serif;
    }

    .timeline-line {
        width: 4px;
        height: 100%;
        background: #ffc107;
        left: 50%;
        transform: translateX(-50%);
        top: 0;
        bottom: 0;
        position: absolute;
        z-index: 1;
    }

    .timeline-item {
        position: relative;
        z-index: 2;
    }

    .timeline-icon {
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        font-size: 22px;
    }

    .timeline-content {
        max-width: 500px;
    }

    /* For small screens stack vertically & center */
    @media (max-width: 767px) {
        .timeline-line {
            left: 8px;
            transform: none;
            height: 100%;
        }

        .timeline-item {
            flex-direction: row !important;
            align-items: flex-start !important;
            margin-bottom: 2rem;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            font-size: 18px;
            margin-right: 1rem;
        }

        .timeline-content {
            max-width: none;
        }
    }
</style>


<?php include "./code/footer.php" ?>