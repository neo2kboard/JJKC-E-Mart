<style>
    h3 {
        font-size: 35px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #28a745;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
    }

    th, td {
        text-align: center;
        font-size: 16px;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    td {
        background-color: #ffffff;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        font-size: 15px;
        border-radius: 5px;
        font-weight: bold;
        background-color: #007bff;
        color: white;
        border: none;
    }

    .btn:hover {
        background-color: #0056b3;
        color: white;
    }

    .badge {
        padding: 8px 12px;
        font-size: 15px;
        border-radius: 15px;
        text-transform: uppercase;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
    }

    .badge-warning {
        background-color: #ffc107;
        color: white;
    }

    .badge-danger {
        background-color: #dc3545;
        color: white;
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