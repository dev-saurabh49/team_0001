            <?php include "./new_head.php" ?>
            <div class="dashboard-header mb-5 text-center">
                <h1 class="dashboard-title">Dashboard</h1>
                <div class="title-underline mx-auto"></div>
                <p class="dashboard-subtitle">Welcome <span><?php echo $user_global['name'] ?></span> in Team 0001 </p>
            </div>

            <!-- Premium Cards -->
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card premium-card p-4">
                        <div class="d-flex align-items-center">
                            <!-- Icon Circle -->
                            <div class="icon-circle me-3">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <div>
                                <h6 class="card-title fs-4 mb-1">Messages</h6>
                                <h3 class="card-count mb-0">12</h3>
                                <small class="card-subtitle">New messages</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card premium-card p-4">
                        <div class="d-flex align-items-center">
                            <!-- Icon Circle -->
                            <div class="icon-circle me-3">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div>
                                <h6 class="card-title mb-1">Polls</h6>
                                <h3 class="card-count mb-0">3</h3>
                                <small class="card-subtitle">Active pols</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card premium-card p-4">
                        <div class="d-flex align-items-center">
                            <!-- Icon Circle -->
                            <div class="icon-circle me-3">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div>
                                <h6 class="card-title mb-1">Messages</h6>
                                <h3 class="card-count mb-0">12</h3>
                                <small class="card-subtitle">unresolved complaint</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <div class="card">
                        <h5><i class="bi bi-exclamation-triangle"></i> Complaints</h5>
                        <p>1 unresolved complaint</p>
                    </div>
                </div> -->
            </div>
            <?php include "./foot.php"; ?>

            <style>
                span {
                    color: #00E5FF;
                    text-shadow: 0 0 6px rgba(0, 229, 255, 0.6);
                }
            </style>