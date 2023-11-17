<?php
    define('BASE_URL', '/admin');

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'password');
    define('DB_NAME', 'bms_db');

    function title_to_permalink($title) {
        $permalink = str_replace([' ', ',', '.', '!', '@', '#', '$', '%', '^', '&'], '-', $title);

        return $permalink;
    }

    function tags_to_string($tags) {
        $result = "";

        $tags_cont = substr($tags, 1, strlen($tags) - 2);
        $arr1 = explode(',', $tags_cont);
        $arr1_len = count($arr1);

        for ($i = 0; $i < $arr1_len; $i++) {
            $item = $arr1[$i];
            $item_cont = substr($item, 1, strlen($item) - 2);

            $arr2 = explode(':', $item_cont);
            $value = $arr2[1];
            
            $result .= substr($value, 1, strlen($value) - 2);
            if ($i < $arr1_len - 1) {
                $result .= ", ";
            }
        }

        return $result;
    }
    
    session_start();