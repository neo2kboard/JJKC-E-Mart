<style>
    h1 {
        font-family: "Poppins", sans-serif;
        font-weight: 600;
        color: #28a745;
        margin-bottom: 40px;
    }

    .container {
        max-width: 800px;
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-outline {
        flex: 1;
        min-width: calc(50% - 10px);
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 8px;
        color: #555;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 12px;
        font-size: 1rem;
        transition: border 0.3s, box-shadow 0.3s;
        width: 100%;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        outline: none;
    }

    .form-select {
        border-radius: 8px;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ddd;
        transition: border 0.3s, box-shadow 0.3s;
        width: 100%;
    }

    .form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    .form-control[type="file"] {
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 8px;
        font-size: 1rem;
        color: #555;
    }

    .form-control[type="file"]:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }

    .btn {
        background-color: #28a745;
        color: white;
        border-radius: 8px;
        padding: 12px 20px;
        font-size: 1rem;
        width: 100%;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
    }

    .btn:hover {
        background-color: #218838;
    }

    .btn:active {
        transform: scale(0.98);
    }

    .form-control::placeholder {
        color: #aaa;
    }

    @media (max-width: 768px) {
        .form-outline {
            min-width: 100%;
        }
    }
</style>