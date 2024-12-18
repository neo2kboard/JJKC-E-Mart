<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        overflow-x: hidden;
    }

    h2 {
        font-weight: bold;
        color: #007bff;
        margin-bottom: 40px;
    }

    .payment-option {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .payment-option:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .payment-option img {
        width: 100%;
        border-bottom: 1px solid #ddd;
        border-radius: 10px 10px 0 0;
    }

    .payment-option .option-title {
        padding: 20px;
        text-align: center;
        background-color: #007bff;
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .payment-option .option-title:hover {
        background-color: #0056b3;
    }

    .text-center a {
        text-decoration: none;
    }

    .container {
        max-width: 900px;
    }

    .payment-options {
        display: flex;
        justify-content: space-around;
        gap: 30px;
    }

    @media (max-width: 768px) {
        .payment-options {
            flex-direction: column;
            align-items: center;
        }

        .payment-option {
            margin-bottom: 20px;
        }
    }
</style>