<?php
    include('../bootstrap.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['draw']++;

        $user_id = $_SESSION['user_id'];

        /*DATABASE CONNECTION */
        global $conn;

        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
        }

        if ($_SESSION['role'] == 'admin') {
            $sql = "SELECT id, title, permalink, category, date, contents, tags FROM posts";
        } else {
            $sql = "SELECT id, title, permalink, category, date, contents, tags FROM posts WHERE author = $user_id";
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
                        "category" => $row['category'], 
                        "content" => $row['contents'], 
                        "created_at" => $row['date'], 
                        "id" => $row['id'], 
                        "option" => 
                            '<a class="badge badge-light-primary text-start me-2 action-edit" href="' . BASE_URL . '/posts/edit.php?id=' . $row['id'] . '">' . 
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">' . 
                                    '<path d="M12 20h9"></path>' . 
                                    '<path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>' . 
                                '</svg>' . 
                            '</a>', 
                        "title" => $row['title'] . 
                            '<small>' . 
                                '<a href="javascript:void(0);" onclick="copyToClipboard(`' . BASE_URL . '/read.php?id=' . $row['id'] . '`)" title="Copy Link">' . 
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy">' . 
                                        '<rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>' . 
                                        '<path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>' . 
                                    '</svg>' . 
                                '</a>' . 
                            '</small>', 
                    );

                    array_push($data, $item);
                }

                // Send the response
                echo json_encode(
                    array(
                        "draw" => $_SESSION['draw'], 
                        "recordsTotal" => $records, 
                        "recordsFiltered" => $records, 
                        "data" => $data
                    )
                );

                mysqli_stmt_close($stmt);
            // }
        }
    }

    // Close connection
    mysqli_close($conn);
?>
