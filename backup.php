<?php
// Database credentials
$host = "sg1-cpanel.premium-hostingserver.net";
$username = "corevisi_sudo";
$password = "Corevision@@@###&&&";
$dbname = "corevisi_fruit_shop_app";

// File name with date
$date = date("Y-m-d");
$backupFile = "backup_$date.sql";
$backupPath = __DIR__ . "/backups/$backupFile";

// Create backups directory if it doesn't exist
if (!file_exists(__DIR__ . "/backups")) {
    mkdir(__DIR__ . "/backups", 0777, true);
}

// Run mysqldump command
$command = "mysqldump -h $host -u $username -p$password $dbname > $backupPath";
$output = [];
exec($command, $output, $result);

if ($result === 0) {
    echo "Backup success. File: $backupPath";
} else {
    echo "Backup failed.";
}
?>
