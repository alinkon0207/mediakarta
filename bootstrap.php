<?php
    define('BASE_URL', '');

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'password');
    define('DB_NAME', 'bms_db');

    define('DAYS_PER_MONTH', 31);
	define('MONTHS_PER_YEAR', 12);
	define('DAYS_PER_YEAR', 365);
	
	function getDaysDiff($difference) {
		if ($difference < DAYS_PER_MONTH) return $difference . ' day(s)';
		else if ($difference < DAYS_PER_MONTH * MONTHS_PER_YEAR) return floor($difference / DAYS_PER_MONTH) . ' month(s)';
		else return floor($difference / DAYS_PER_MONTH / MONTHS_PER_YEAR) . ' year(s)';
	}