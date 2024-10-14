<?php
include 'koneksi.php';
session_start();

if (isset($_GET['id'])) {
    $fotoID = $_GET['id'];

    // Sanitize the input to prevent SQL injection
    $fotoID = mysqli_real_escape_string($conn, $fotoID);

    // Get the file name first to delete from the server
    $result = mysqli_query($conn, "SELECT * FROM foto WHERE FotoID='$fotoID'");
    
    if ($result && mysqli_num_rows($result) > 0) {
        $foto = mysqli_fetch_assoc($result);

        // Delete from database
        $deleteResult = mysqli_query($conn, "DELETE FROM foto WHERE FotoID='$fotoID'");
        
        if ($deleteResult) {
            // Delete the file from the uploads directory
            $filePath = 'uploads/' . $foto['NamaFile'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Redirect back to the gallery with a success message
            header("Location: ?url=album&message=Photo deleted successfully");
        } else {
            // Handle deletion failure
            header("Location: ?url=album&error=Failed to delete photo from database");
        }
    } else {
        // Redirect back with an error message if the photo was not found
        header("Location: ?url=album&error=Photo not found");
    }
} else {
    // Redirect if no ID was provided
    header("Location: ?url=album");
}
exit();
