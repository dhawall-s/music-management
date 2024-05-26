<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["music_file"]) && $_FILES["music_file"]["error"] == 0) {
        $target_dir = "music/";
        $target_file = $target_dir . basename($_FILES["music_file"]["name"]);
        $uploadOk = 1;
        $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg") {
            echo "Sorry, only MP3, WAV, and OGG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["music_file"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["music_file"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: " . $_FILES["music_file"]["error"];
    }
}
?>
