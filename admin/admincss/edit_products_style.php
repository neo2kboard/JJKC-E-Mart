<!-- Styling -->
<style>
    .form-label {
        font-weight: bold;
        color: #444;
    }

    .form-control, .form-select {
        border-radius: 5px;
        padding: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #007bff;
        outline: none;
    }

    .file-input {
        border-radius: 5px;
        padding: 12px;
        font-size: 14px;
        border: 1px solid #ddd;
        background: #f9f9f9;
    }

    .file-input:hover {
        cursor: pointer;
        background-color: #e9e9e9;
    }

    .img-thumbnail {
        margin-top: 10px;
        width: 100%;
        height: auto;
        display: block;
        max-height: 150px;
        object-fit: contain;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .preview-img {
        display: none;
        margin-top: 10px;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<script>
    function previewImage(imgId) {
        var fileInput = document.getElementById('product_image' + imgId);
        var preview = document.getElementById('imgPreview' + imgId);
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
</script>