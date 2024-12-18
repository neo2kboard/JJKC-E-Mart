<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #f8f9fa;
        color: #495057;
    }

    .container-fluid {
        max-width: 1200px;
        margin-top: 50px;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: 600;
        color: #28a745;
        margin-bottom: 30px;
    }

    .form-outline {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px 20px;
        font-size: 14px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .form-control:focus {
        border-color: #28a745;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.2);
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .col-lg-6 {
        flex: 1 1 45%;
    }

    .password-wrapper {
        position: relative;
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }

    .form-check-input {
        margin-right: 10px;
    }

    .form-check-label {
        font-size: 12px;  
        color: #6c757d;  
    }

    input[type="submit"] {
        width: 100%;
        border-radius: 30px;
        padding: 12px;
        background-color: #28a745;
        color: white;
        font-weight: 600;
        border: none;
        transition: all 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
        background-color: #218838;
        cursor: pointer;
        transform: scale(1.05); 
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .small {
        font-size: 13px;
    }

    .fw-bold {
        font-weight: 600;
    }

    .text-danger {
        color: #e74a3b;
    }

    @media (max-width: 768px) {
        .col-lg-6 {
            flex: 1 1 100%;
        }
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
