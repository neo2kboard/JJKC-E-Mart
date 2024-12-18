<?php include('admincss/list_order_styles.php'); ?>

<h3 class="all_order text-center text-success">All Users</h3>

<table id="ordersTable" class="table table-striped table-hover mt-5">
    <thead>
        <?php
            $get_orders = "SELECT * FROM `user_table`";
            $result = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result);
            

            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' 
                    style='font-family: \"Poppins\", sans-serif; font-weight: bold;'>No Users Yet</h2>";
            } else {
                echo "<tr>
                    <th>SN</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>";

                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $user_id = $row_data['user_id'];
                    $username = $row_data['username'];
                    $user_email = $row_data['user_email'];
                    $user_image = $row_data['user_image'];
                    $user_address = $row_data['user_address'];
                    $user_mobile = $row_data['user_mobile'];
                    $number++;
                    echo "<tr>
                            <td>$number</td>
                            <td>$username</td>
                            <td>$user_email</td>
                            <td><img src='../users/user_img/$user_image' alt='$username'
                                    class='user_img'/></td>
                            <td>$user_address</td>
                            <td>$user_mobile</td>
                            <td>
                                <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal$user_id'>
                                    <i class='fa-solid fa-trash' style='color: white;'></i>
                                </button>
                            </td>
                        </tr>";

                    // Modal for each user
                    echo "<!-- Modal for User $user_id -->
                    <div class='modal fade' id='deleteModal$user_id' tabindex='-1' aria-labelledby='deleteModalLabel$user_id' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='deleteModalLabel$user_id'>Delete User</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    Are you sure you want to delete the user: <strong>$username</strong>?
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                    <button type='button' class='btn btn-danger'>
                                        <a href='index.php?delete_user=$user_id' class='text-white' style='text-decoration: none;'>Delete</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }

        ?>
    </tbody>
</table>






