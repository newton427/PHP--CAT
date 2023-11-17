<?php
// Delete author
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $deleteSql = "DELETE FROM authorstb WHERE AuthorId = $deleteId";
    $DbConn->query($deleteSql);
    // Redirect to refresh the page after deletion
    header("Location: $_SERVER[PHP_SELF]");
    exit();
}
?>

