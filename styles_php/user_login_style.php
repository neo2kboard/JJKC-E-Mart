<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #f8f9fa;
        color: #495057;
    }

    .container-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-container {
        margin-top: 50px;
        max-width: 500px; 
        width: 100%;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: 600;
        color: #28a745;
        margin-bottom: 30px;
        text-align: center;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 5px;
    }

    .form-control, .btn, .form-label, .form-check {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px 20px;
        font-size: 14px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.2);
    }

    .form-check-label {
        font-size: 14px;
    }

    .small {
        font-size: 13px;
    }

    .text-danger {
        color: #e74a3b;
    }

    .btn {
        font-size: 15px;
        padding: 10px 20px;
        background-color: #218838;  
        color: white;
        margin-top: 12px; 
        border-radius: 8px;
        width: 80%; 
    }

    .btn:hover {
        background-color: #28a745; 
        color: white;
    }

    .form-group {
        text-align: left;
    }
</style>

<script>
    function togglePasswordVisibility(passwordFieldId) {
        var passwordField = document.getElementById(passwordFieldId);
        var checkbox = document.getElementById(passwordFieldId + '_checkbox');
        if (checkbox.checked) {
            passwordField.type = "text"; 
        } else {
            passwordField.type = "password"; 
        }
    }
</script>