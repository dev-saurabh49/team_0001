<?php include "./new_head.php"; ?>
<div class="dashboard-header mb-5 text-center">
    <h1 class="dashboard-title text-warning" style="background: transparent;">Dashboard</h1>
    <div class="title-underline mx-auto"></div>
    <p class="dashboard-subtitle">Welcome <span><?= htmlspecialchars($user_global['name']) ?></span> in Team 0001</p>
</div>

<!-- Premium Cards -->
<div class="row g-3">
    <div class="col-md-4">
        <div class="card premium-card p-4">
            <div class="d-flex align-items-center">
                <div class="icon-circle me-3 bg-primary text-white">
                    <i class="bi bi-chat-dots"></i>
                </div>
                <div>
                    <h6 class="card-title fs-5 mb-1">Messages</h6>
                    <h3 class="card-count mb-0">12</h3>
                    <small class="card-subtitle">New messages</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card premium-card p-4">
            <div class="d-flex align-items-center">
                <div class="icon-circle me-3 bg-warning text-dark">
                    <i class="bi bi-bar-chart"></i>
                </div>
                <div>
                    <h6 class="card-title fs-5 mb-1">Polls</h6>
                    <h3 class="card-count mb-0">3</h3>
                    <small class="card-subtitle">Active polls</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card premium-card p-4">
            <div class="d-flex align-items-center">
                <div class="icon-circle me-3 bg-danger text-white">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div>
                    <h6 class="card-title fs-5 mb-1">Complaints</h6>
                    <h3 class="card-count mb-0">12</h3>
                    <small class="card-subtitle">Unresolved complaints</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities -->
<div class="row g-3 mt-5">
    <div class="col-12">
        <div class="card premium-card p-4">
            <h5 class="mb-3"><i class="bi bi-clock-history me-2"></i> Recent Activities</h5>

            <div class="activity-marquee-wrapper">
                <ul class="activity-marquee list-unstyled mb-0">
                    <?php
                    $sql = "SELECT activity_text, activity_type, created_at 
                            FROM activities 
                            WHERE member_id = ? 
                            ORDER BY created_at DESC
                            LIMIT 10";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $user_global['id']);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $icon = "bi-check-circle text-success";
                            switch ($row['activity_type']) {
                                case 'message':
                                    $icon = "bi-chat-left-text text-primary";
                                    break;
                                case 'poll':
                                    $icon = "bi-bar-chart-line text-warning";
                                    break;
                                case 'complaint':
                                    $icon = "bi-exclamation-circle text-danger";
                                    break;
                                case 'task':
                                    $icon = "bi-check-circle text-success";
                                    break;
                            }

                            echo '<li class="mb-2"><i class="bi ' . $icon . ' me-2"></i>' .
                                htmlspecialchars($row['activity_text']) .
                                ' <small class="text-muted">(' . $row['created_at'] . ')</small></li>';
                        }
                    } else {
                        echo "<li class='text-muted'>No recent activities found.</li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Team Overview -->
<div class="row g-3 mt-5">
    <div class="col-12">
        <div class="card  p-4">
            <h5 class="mb-3"><i class="bi bi-people me-2"></i> Team Overview</h5>
            <div class="row text-center">

                <?php
                $team_id = $user_global['team_id'];

                // Total members
                $stmt = $conn->prepare("SELECT COUNT(*) AS cnt FROM members WHERE team_id = ?");
                $stmt->bind_param("i", $team_id);
                $stmt->execute();
                $total_members = $stmt->get_result()->fetch_assoc()['cnt'];

                // Active members
                $stmt = $conn->prepare("SELECT COUNT(*) AS cnt FROM members WHERE team_id = ? AND is_blocked = 1");
                $stmt->bind_param("i", $team_id);
                $stmt->execute();
                $active_members = $stmt->get_result()->fetch_assoc()['cnt'];

                // Total complaints
                $stmt = $conn->prepare("SELECT COUNT(*) AS cnt FROM complaints WHERE member_id IN (SELECT id FROM members WHERE team_id = ?)");
                $stmt->bind_param("i", $team_id);
                $stmt->execute();
                $total_complaints = $stmt->get_result()->fetch_assoc()['cnt'];

                // Placeholders
                $total_polls = 0;
                $total_tasks = 0;

                $cards = [
                    ['icon' => 'bi-people', 'bg' => 'bg-primary', 'title' => 'Total Members', 'count' => $total_members],
                    ['icon' => 'bi-person-check', 'bg' => 'bg-success', 'title' => 'Blocked Members', 'count' => $active_members],
                    ['icon' => 'bi-bar-chart', 'bg' => 'bg-warning text-dark', 'title' => 'Total Polls', 'count' => $total_polls],
                    ['icon' => 'bi-check-circle', 'bg' => 'bg-info text-white', 'title' => 'Total Tasks', 'count' => $total_tasks],
                    ['icon' => 'bi-exclamation-triangle', 'bg' => 'bg-danger', 'title' => 'Total Complaints', 'count' => $total_complaints],
                ];

                foreach ($cards as $card) : ?>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                        <div class="card premium-card p-4 shadow-sm h-100">
                            <div class="d-flex align-items-center">
                                <div class="icon-circle me-3 <?= $card['bg'] ?>">
                                    <i class="bi <?= $card['icon'] ?>"></i>
                                </div>
                                <div>
                                    <h6 class="card-title fs-6 mb-1"><?= $card['title'] ?></h6>
                                    <h3 class="card-count mb-0"><?= $card['count'] ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>


<?php include "./foot.php"; ?>

<style>
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }

    .premium-card {
        border-radius: 1rem;
        transition: transform 0.2s;
    }

    .premium-card:hover {
        transform: translateY(-4px);
    }

    .card-count {
        color: #00E5FF;
        text-shadow: 0 0 6px rgba(0, 229, 255, 0.6);
    }

    span {
        color: #00E5FF;
        text-shadow: 0 0 6px rgba(0, 229, 255, 0.6);
    }

    /* Marquee */
    .activity-marquee-wrapper {
        overflow: hidden;
        max-height: 200px;
        position: relative;
    }

    .activity-marquee {
        display: inline-block;
        animation: scrollUp 15s linear infinite;
        margin: 0;
        padding: 0;
    }

    .activity-marquee-wrapper:hover .activity-marquee {
        animation-play-state: paused;
    }

    @keyframes scrollUp {
        0% {
            transform: translateY(100%);
        }

        100% {
            transform: translateY(-100%);
        }
    }

    @media (max-width: 768px) {
        .activity-marquee-wrapper {
            max-height: 250px;
        }
    }
</style>