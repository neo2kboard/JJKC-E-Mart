<style>
    .card-img-top {
        object-fit: contain;
        width: 100%;
        height: 200px;
        transition: transform 0.3s ease;
    }

    .card {
        border: none;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        margin-top: 10px;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }

    .card-text {
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .related-message {
        font-family: 'Poppins', sans-serif; 
        font-weight: bold; 
        font-size: 30px;
    }

    .btn {
        font-family: 'Poppins', sans-serif;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn:hover {
        opacity: 0.9;
    }

    @media (max-width: 767px) {
        .card-img-top {
            height: 180px;
        }
    }
</style>