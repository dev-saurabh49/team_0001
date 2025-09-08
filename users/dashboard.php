<?php include './head.php'; ?>
<!-- Stats Cards -->
<div class="row g-4 mt-3">
    <!-- Points -->
    <div class="col-md-6 col-lg-4">
        <div class="card card-premium p-3   shadow-sm border-0 card-premium-shadow  ">
            <div class="d-flex align-items-center">
                <span class="icon-box bg-light text-primary me-3">
                    <i class="bi bi-star-fill"></i>
                </span>
                <div>
                    <h5 class="mb-0">Points</h5>
                    <small class="text-muted">Your score: <span class="fw-bold text-dark">3,200</span></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Polls -->
    <div class="col-md-6 col-lg-4">
        <div class="card card-premium p-3  shadow-sm border-0 card-premium-shadow">
            <div class="d-flex align-items-center">
                <span class="icon-box bg-light text-success me-3">
                    <i class="bi bi-bar-chart-fill"></i>
                </span>
                <div>
                    <h5 class="mb-0">Polls</h5>
                    <small class="text-muted">Answered: <span class="fw-bold text-dark">12</span> of 15</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Complaints -->
    <div class="col-md-6 col-lg-4">
        <div class="card card-premium p-3  shadow-sm border-0 card-premium-shadow">
            <div class="d-flex align-items-center">
                <span class="icon-box bg-light text-danger me-3">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </span>
                <div>
                    <h5 class="mb-0">Complaints</h5>
                    <small class="text-muted">
                        Resolved: <span class="fw-bold text-dark">3</span> | Pending:
                        <span class="fw-bold text-dark">1</span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card{
        height: 100px;
    }
    .card-premium-shadow {
        box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3), 0 2px 6px rgba(40, 167, 69, 0.15) !important;
        border-radius: 1rem;
        transition: box-shadow 0.3s ease;
    }

    .card-premium-shadow:hover {
        box-shadow: 0 14px 40px rgba(40, 167, 69, 0.45), 0 4px 10px rgba(40, 167, 69, 0.25);
    }
</style>
<style>
    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
    }

    .card-premium {
        border-radius: 16px;
        transition: all 0.3s ease;
    }

    .card-premium:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }
</style>
<!-- Profile Section -->

<?php include './foot.php'; ?>