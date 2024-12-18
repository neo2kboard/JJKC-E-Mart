<style>
    .all_order {
        font-family: "Poppins", sans-serif;
        font-weight: bold;
        font-size: 30px;
    }

    table {
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        vertical-align: middle;
        text-align: center;
    }

    .table thead {
        background-color: #f8f9fa;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .deleteBtn {
        cursor: pointer;
    }


    /*all users style */
    .user_img {
        width: 60px;
        object-fit: contain;
        border-radius: 50%;
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




