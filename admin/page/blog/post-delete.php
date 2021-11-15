<?php

if(isset($_GET["post-delete"])){
    $category_id = $_GET["post-delete"];
    mysqli_query($conn, "DELETE FROM post WHERE id = '$category_id'");
    header("location:index.php?post");
}

?>