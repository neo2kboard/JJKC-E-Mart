<style>
    .table {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
        transform: scale(1.02);
        transition: all 0.3s ease;
    }

    .product-img {
        max-width: 100px;
        max-height: 100px;
        width: auto;
        height: auto;
        object-fit: contain;
        border-radius: 5px;
    }

    .btn {
        padding: 6px 12px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        background-color: #ffbf00;
        color: white;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .btn-sm {
        font-size: 14px;
    }

    thead {
        background-color: #007bff;
    }

    thead th {
        color: white;
        font-weight: bold;
    }

    tbody tr {
        transition: background-color 0.3s ease;
    }

    tbody tr:hover {
        background-color: #e6e6e6;
    }
</style>

<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            "paging": true,          
            "searching": true,       
            "ordering": true,        
            "info": true,            
            "lengthMenu": [5, 10, 25, 50], 
        });
    });
</script>