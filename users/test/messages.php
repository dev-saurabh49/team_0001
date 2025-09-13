<?php include "./new_head.php";?>

<div class="messages-section d-flex flex-column flex-lg-row gap-3">

    <!-- Messages Inbox List -->
    <div class="inbox-list border rounded p-3 flex-shrink-0" style="width: 320px; max-height: 600px; overflow-y: auto;">
        <h5 class="mb-3 text-warning">Inbox</h5>
        <ul class="list-group">
            <!-- Example message item -->
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center cursor-pointer unread" onclick="openMessage(this, 1)">
                <div>
                    <strong class="sender-name">Admin</strong><br />
                    <small class="message-subject text-truncate d-block" style="max-width: 220px;">Welcome to the platform!</small>
                </div>
                <small class="text-muted">Aug 30</small>
            </li>
            <!-- More messages here -->
        </ul>
    </div>

    <!-- Message Content & Reply Panel -->
    <div class="message-content border rounded p-3 flex-grow-1" style="max-height: 600px; display: flex; flex-direction: column;">
        <h5 class="mb-3 text-warning">Select a message to read</h5>
        <div class="message-body flex-grow-1 overflow-auto mb-3" style="white-space: pre-wrap; color: #444;">
            <!-- Message text here -->
        </div>
        <form id="replyForm" class="d-flex gap-2 align-items-center" onsubmit="sendReply(event)">
            <input type="text" class="form-control" placeholder="Type your reply..." required />
            <button type="submit" class="btn btn-warning">Send</button>
        </form>
    </div>

</div>
<?php include "./foot.php";?>