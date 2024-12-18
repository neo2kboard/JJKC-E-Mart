<style>
    form {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        margin: 0 auto;
    }

    .input-group {
        margin-bottom: 15px;
    }

    h3 {
        font-family: 'Poppins', sans-serif; 
        text-align: center;
        margin-top: 10px;
    }

    .input-group-text {
        background-color: #28a745;
        color: white;
        border-radius: 5px 0 0 5px;
        font-size: 1.2rem;
        padding: 10px;
    }

    .form-control {
        border-radius: 0 5px 5px 0;
        font-size: 1rem;
        padding: 12px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
    }

    .form-control.bg-success {
        background-color: #28a745;
        color: white;
        font-weight: bold;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        font-size: 1rem;
        font-family: 'Poppins', serif;
        transition: background-color 0.3s ease-in-out, transform 0.3s ease;
    }

    .form-control.bg-success:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    .form-control.bg-success:focus {
        box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 15px; 
    }

    .form-check-input {
        margin-right: 10px;
    }

    .form-check-label {
        font-size: 15px;  
        color: #6c757d; 
    }

    @media (max-width: 768px) {
        .input-group {
            width: 100%;
        }

        .form-control {
            font-size: 1rem;
        }
    }
</style>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('admin_password');
        var checkbox = document.getElementById('user_password_checkbox');

        // Toggle the password visibility
        if (checkbox.checked) {
            passwordField.type = 'text'; 
        } else {
            passwordField.type = 'password'; 
        }
    }
</script>