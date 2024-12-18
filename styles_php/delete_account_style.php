<style>
    body {
        font-family: "Poppins", sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 550px; 
        width: 100%;
    }

    .del {
        font-weight: bold;
        font-size: 35px;
        margin-bottom: 30px;
    }

    .btn_del {
        font-size: 16px;
        padding: 15px;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c0392b;
    }

    .btn-secondary {
        background-color: #95a5a6;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #7f8c8d;
    }

    .btn:focus {
        outline: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

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

