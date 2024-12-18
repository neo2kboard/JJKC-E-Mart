<!-- Logout Confirmation Modal -->
<div id="logoutModal" style="display:none;" class="modal">
    <div class="modal-content">
        <h4>Are you sure you want to log out?</h4>
        <p>You will be logged out of your account.</p>
        <button onclick="confirmLogout()" class="btn btn-danger">Yes, Logout</button>
        <button onclick="closeLogoutModal()" class="btn btn-secondary">Cancel</button>
    </div>
</div>

<!-- JavaScript for Modal Handling -->
<script>
    // Show the logout confirmation modal
    function showLogoutModal() {
        document.getElementById('logoutModal').style.display = 'block';
    }

    // Close the logout confirmation modal
    function closeLogoutModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }

    // Redirect to logout if confirmed
    function confirmLogout() {
        window.location.href = 'logout.php';  // Redirects to the logout page
    }
</script>

<!-- CSS for Modal -->
<style>
    /* Style for the modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border-radius: 10px;
        width: 400px;
        text-align: center;
    }

    .modal-content button {
        padding: 10px 20px;
        border: none;
        margin: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .modal-content .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .modal-content .btn-danger:hover {
        background-color: #c0392b;
    }

    .modal-content .btn-secondary {
        background-color: #95a5a6;
        color: white;
    }

    .modal-content .btn-secondary:hover {
        background-color: #7f8c8d;
    }
</style>
