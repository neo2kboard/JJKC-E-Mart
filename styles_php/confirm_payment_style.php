<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }

    .container {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        padding: 50px 30px 30px 30px; 
        max-width: 500px;
        margin: auto;
        margin-top: 50px; 
    }

    h1 {
        font-weight: 600;
        font-size: 28px;
        color: #28a745;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-outline {
        margin-bottom: 20px;
    }

    .form-outline input, .form-outline select {
        border-radius: 8px;
        padding: 12px;
        font-size: 16px;
        width: 100%;
        border: 1px solid #ddd;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }

    .form-outline input:focus, .form-outline select:focus {
        border-color: #28a745;
        box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
    }

    .form-outline select {
        background-color: #f9f9f9;
    }

    .form-outline input[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 18px;
        padding: 15px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .form-outline input[type="submit"]:hover {
        background-color: #218838;
    }

    @media (max-width: 576px) {
        h1 {
            font-size: 24px;
        }

        .form-outline input, .form-outline select {
            font-size: 14px;
            padding: 10px;
        }

        .container {
            padding: 40px 20px 20px 20px; 
        }
    }
</style>