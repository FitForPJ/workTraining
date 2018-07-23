<?php 
    include_once "database/config.php";


    if (isset($_GET['delete'])) {
        $cid = $_GET['cid'];
        $sql = "DELETE FROM customer WHERE cid=" . $cid;
        mysqli_query($conn, $sql);
        exit();
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $sql = "UPDATE comments SET name='{$name}', comment='{$comment}' WHERE id=".$id;
        if (mysqli_query($conn, $sql)) {
            $id = mysqli_insert_id($conn);
            $saved_comment = '<div class="comment_box">
              <span class="delete" data-id="' . $id . '" >delete</span>
              <span class="edit" data-id="' . $id . '">edit</span>
              <div class="display_name">'. $name .'</div>
              <div class="comment_text">'. $comment .'</div>
          </div>';
          echo $saved_comment;
        }else {
          echo "Error: ". mysqli_error($conn);
        }
        exit();
    }
  


?>