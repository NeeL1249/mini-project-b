<?php
require 'connection.php';

$deleteid = $_GET['bdelid'];

$query = "DELETE FROM businfo WHERE bus_id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $deleteid);
    if (mysqli_stmt_execute($stmt)) {
        echo "Record with ID $deleteid has been deleted.";
    } else {
        echo "Error deleting the record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing the delete statement: " . mysqli_error($conn);
}

header("location: displayVehicles.php");
mysqli_close($conn);

?>
 