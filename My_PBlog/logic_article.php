<?php


    // Initialize a database connection
    $conn = mysqli_connect("localhost", "root", "", "datablog");

    // Destroy if not possible to create a connection
    if(!$conn){
        echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish 
        Database Connection<h3>";
    }

    // Get data to display on index page
    $sql = "SELECT * FROM data";
    $query = mysqli_query($conn, $sql);

    // Create a new post
    if(isset($_REQUEST['new_post'])){
        $title = $_REQUEST['title'];
        $slug = $_REQUEST['slug'];
        $content = $_REQUEST['content'];

        $sql = "INSERT INTO data(title, slug, content) VALUES('$title', '$slug', '$content')";
        mysqli_query($conn, $sql);

        echo $sql;

        header("Location: home_article.php?info=added");
        exit();
    }

    // Get post data based on id
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM data WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    }
    
    // Update a post
    if(isset($_REQUEST['update'])){
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $slug = $_REQUEST['slug'];
        $content = $_REQUEST['content'];

        $sql = "UPDATE data SET title = '$title', slug = '$slug', content = '$content' WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: home_article.php?info=updated");
        exit();
    }

    // Delete a post
    if(isset($_REQUEST['delete'])){
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM data WHERE id = $id";
        mysqli_query($conn, $sql);

        header("Location: home_article.php?info=deleted");
        exit();
    }


?>