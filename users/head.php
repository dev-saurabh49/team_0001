<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../code/db_connection.php"; // make sure correct path

$member_id = $_SESSION['user_id'] ?? 0;
$user = null;

if ($member_id > 0) {
    $stmt = $conn->prepare("SELECT name, team_id, profile_pic FROM members WHERE id = ?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

$avatar = !empty($user['profile_pic'])
    ? "../code/" . htmlspecialchars($user['profile_pic'])
    : "https://i.pravatar.cc/80?img=5";

$name = $user['name'] ?? ($_SESSION['user_name'] ?? "Guest User");
$team = !empty($user['team_id']) ? "Team ID: " . htmlspecialchars($user['team_id']) : "Team ID :";
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Team_0001 || User Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fdfdfd;
            color: #222;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cinzel Decorative', serif;
            color: #0d47a1;
            letter-spacing: 1.2px;
        }

        /* Navbar */
        .navbar {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            margin-bottom: 1rem;
            padding: 0.7rem 1.2rem;
        }

        .btn-logout {
            background: crimson;
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            padding: 6px 22px;
            border: none;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
            transition: 0.2s all ease;
        }

        .btn-logout:hover {
            background: #d4af37;
        }

        .btn-back {
            background: purple;
            color: #fff;
            font-weight: 600;
            border-radius: 25px;
            padding: 6px 22px;
            border: none;
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.4);
            transition: 0.2s all ease;
        }

        .btn-back:hover {
            background: crimson;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #ffffff;
            border-right: 1px solid #eee;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            z-index: 1050;
            padding-top: 2rem;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar .user-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .sidebar .user-section img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid #d4af37;
            box-shadow: 0 3px 8px rgba(212, 175, 55, 0.4);
        }

        .sidebar .user-name {
            margin-top: 0.6rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .sidebar .user-role {
            font-size: 1rem;
            color: #d4af37;
            /* text-transform: uppercase; */
            font-weight: bold;
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            margin: 0.3rem 0;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #fdf6e3;
            color: #0d47a1;
            box-shadow: 0 3px 10px rgba(212, 175, 55, 0.2);
        }

        /* Content */
        .content {
            margin-left: 0;
            padding: 1.5rem;
            transition: margin-left 0.3s ease;
        }

        @media(min-width: 992px) {
            .sidebar {
                left: 0;
            }

            .content {
                margin-left: 250px;
            }
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .icon-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #f3f6ff;
            color: #0d47a1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-right: 1rem;
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: inline-block;
            font-size: 1.5rem;
            color: #0d47a1;
            cursor: pointer;
        }

        @media(min-width: 992px) {
            .mobile-menu-btn {
                display: none;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">



        <div class="user-section text-center">
            <img src="<?= $avatar ?>" alt="User Avatar" class="rounded-circle shadow-sm" width="80" height="80">
            <div class="user-name fw-bold mt-2"><?= htmlspecialchars($name) ?></div>
            <div class=" user-role text-muted"><?= $team ?></div>
        </div>

        <ul class="nav flex-column px-2">
            <li><a href="./dashboard.php" class="nav-link active"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
            <li><a href="./profile.php" class="nav-link"><i class="bi bi-person"></i> Profile</a></li>
            <li><a href="#stats" class="nav-link"><i class="bi bi-graph-up-arrow"></i> Statistics</a></li>
            <li><a href="./messages.php" class="nav-link"><i class="bi bi-chat-dots"></i> Messages</a></li>
            <li><a href="./complaint.php" class="nav-link"><i class="bi bi-exclamation-triangle"></i> Complaint</a></li>
            <li><a href="#polls" class="nav-link"><i class="bi bi-bar-chart"></i> Polls</a></li>
            <li><a href="#settings" class="nav-link"><i class="bi bi-gear"></i> Settings</a></li>
            <li><a href="#settings" class="nav-link text-danger"><i class="bi bi-aerrow-left"></i> Logout</a></li>
            <li><a href="#delete" class="nav-link text-danger"><i class="bi bi-trash"></i> Delete Account</a></li>
        </ul>
        <div class="text-center mt-3">
            <button id="sidebarCloseBtn" class="btn btn-sm btn-outline-secondary d-lg-none">Close</button>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="navbar sticky-top d-flex justify-content-between align-items-center flex-wrap py-3 px-4 bg-light shadow-sm">
            <div class="d-flex align-items-center gap-3 flex-grow-1">
                <span id="mobileMenuBtn" class="mobile-menu-btn d-lg-none fs-4 text-dark" style="cursor:pointer;">
                    <i class="bi bi-list"></i>
                </span>
                <h6 class="mb-0 text-center flex-grow-1 text-dark">
                    Welcome, <?= htmlspecialchars($name) ?> in team 0001
                </h6>
            </div>

            <!-- <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                
                <button class="btn btn-outline-primary d-flex align-items-center justify-content-center w-100 w-lg-auto" data-bs-toggle="modal" data-bs-target="#chatbotModal">
                    <i class="bi bi-robot fs-5 me-2"></i> Chatbot
                </button>

                
                <button class="btn btn-logout btn-success d-flex align-items-center justify-content-center w-100 w-lg-auto py-2 px-4">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    <a href="../code/logout.php" class="text-decoration-none text-white">Logout</a>
                </button>

                
                <button class="btn btn-back btn-secondary d-flex align-items-center justify-content-center w-100 w-lg-auto py-2 px-4">
                    <i class="bi bi-box-arrow-left me-2"></i>
                    <a href="../index.php" class="text-decoration-none text-white">Back to home</a>
                </button>
            </div> -->

        </nav>

        <!-- chat modal -->
        <!-- Chatbot Modal -->
        <div class="modal fade" id="chatbotModal" tabindex="-1" aria-labelledby="chatbotModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-end modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="bi bi-robot me-2"></i> Chat with AI</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div id="chatbox" class="chatbox border rounded p-3" style="height:300px; overflow-y:auto;">
                            <!-- Messages will appear here -->
                        </div>
                        <div class="input-group mt-3">
                            <input type="text" id="userInput" class="form-control" placeholder="Type your message...">
                            <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function sendMessage() {
                let userMsg = document.getElementById("userInput").value;
                if (!userMsg.trim()) return;

                let chatbox = document.getElementById("chatbox");
                chatbox.innerHTML += `<p><b>You:</b> ${userMsg}</p>`;
                document.getElementById("userInput").value = "";

                fetch("chatbot.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({
                            message: userMsg
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        chatbox.innerHTML += `<p class="text-primary"><b>Bot:</b> ${data.reply}</p>`;
                        chatbox.scrollTop = chatbox.scrollHeight; // Auto scroll
                    })
                    .catch(() => {
                        chatbox.innerHTML += `<p class="text-danger"><b>Bot:</b> Error connecting to server.</p>`;
                    });
            }
        </script>