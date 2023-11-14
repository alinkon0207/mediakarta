<?php
    include('../bootstrap.php');

    /*DATABASE CONNECTION */
    global $conn;

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conn) {
        die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
    }

    $user_id = $_SESSION['user_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['draw']++;

        if ($_SESSION['role'] == 'admin') {
            $sql = "SELECT logs.id as id, logs.ip_addr as ip_addr, logs.ip_loc as ip_loc, posts.permalink as permalink, logs.date as date FROM posts, logs WHERE posts.id = logs.post_id";
        } else {
            $sql = "SELECT logs.id as id, logs.ip_addr as ip_addr, logs.ip_loc as ip_loc, posts.permalink as permalink, logs.date as date FROM posts, logs WHERE posts.id = logs.post_id AND posts.author = $user_id";
        }
    
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Fetch rows
            // $sql = $sql . " LIMIT 10";
            // if ($stmt = mysqli_prepare($conn, $sql)) {
                // Execute the statement
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $records = mysqli_stmt_num_rows($stmt);
                
                $result = mysqli_query($conn, $sql);

                // Perform any necessary server-side processing
                $data = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $item = array(
                        "ip_addr" => $row['ip_addr'], 
                        "ip_loc" => $row['ip_loc'], 
                        "permalink" => $row['permalink'], 
                        "created_at" => $row['date'], 
                        "id" => $row['id'], 
                        "option" => 
                            '<a class="badge badge-light-primary text-start me-2 action-edit" href="' . BASE_URL . '/logs/detail.php?id=' . $row['id'] . '">' . 
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">' . 
                                    '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>' . 
                                    '<circle cx="12" cy="12" r="3"></circle>' . 
                                '</svg>' . 
                            '</a>', 
                    );

                    array_push($data, $item);
                }

                mysqli_stmt_close($stmt);

                // Send the response
                echo json_encode(
                    array(
                        "draw" => $_SESSION['draw'], 
                        "recordsTotal" => $records, 
                        "recordsFiltered" => $records, 
                        "data" => $data
                    )
                );
            // }
        }
    }

    // Close connection
    mysqli_close($conn);
?>
