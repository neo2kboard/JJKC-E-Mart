<style>
    body {
        background-color: #f8f9fa; 
        font-family: "Poppins", sans-serif;
    }
    
    .edit_acc {
        font-family: "Poppins", sans-serif;
        font-size: 35px;
        font-weight: bold;
        color: #00796b;
        margin-bottom: 30px;
    }

    .form-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }

    .form-outline input {
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .form-outline input:focus {
        border-color: #00796b;
        box-shadow: 0 0 5px rgba(0, 121, 107, 0.5);
    }

    .form-outline img {
        border-radius: 50%;
        margin-top: 10px;
        transition: transform 0.3s ease;
    }

    .form-outline img:hover {
        transform: scale(1.1);
    }

    .form-outline {
        margin-bottom: 20px;
    }

    .btn-success {
        background-color: #00796b; 
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        border-radius: 8px;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #004d40;
    }

    .form-container .form-control {
        border-radius: 8px;
    }

    .file-upload {
        position: relative;
        margin-bottom: 20px;
    }

    .file-upload input[type="file"] {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-upload label {
        display: block;
        background-color: #f1f1f1;
        padding: 12px 20px;
        border-radius: 8px;
        text-align: center;
        font-weight: 600;
        color: #00796b;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .file-upload input[type="file"]:focus + label,
    .file-upload label:hover {
        background-color: #00796b;
        color: #fff;
    }
</style>