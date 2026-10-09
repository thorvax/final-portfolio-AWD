<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int) $_POST['id'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $tmp = $_FILES['image']['tmp_name'];
        $path = 'uploads/' . $image;

        move_uploaded_file($tmp, $path);

        $sql = "UPDATE posts SET
                title='$title',
                description='$description',
                date='$date',
                image_path='$path'
                WHERE id=$id";
    } else {
        $sql = "UPDATE posts SET
                title='$title',
                description='$description',
                date='$date'
                WHERE id=$id";
    }

    mysqli_query($conn, $sql);
}

header("Location: post.php");
exit();
