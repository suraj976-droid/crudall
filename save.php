<?php
    include 'conn.php';

    if(isset($_POST['add-btn'])){

        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['pwd'];

        $sel_cat = $_REQUEST['sel_cat'];

        $gender = $_REQUEST['gender'];
   
        $hobbies = implode(',', $_REQUEST['hobbies']); 


        $imageName = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $imageName);

        $add_sql = "INSERt INTO `Student` (`email`,`pwd`,`image_name`,`state`,`gender`, `hobbies`) VALUES ('$email', '$pwd','$imageName',$sel_cat,'$gender', '$hobbies')";
        $add_query = mysqli_query($conn, $add_sql);

        header("location:list.php");

    }



    if (isset($_POST['upd-btn'])) {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $id = $_POST['id'];

        $sel_cat = $_REQUEST['sel_cat'];

        $gender = $_REQUEST['gender'];
   
        $hobbies = implode(',', $_REQUEST['hobbies']); 

    
        // Handle image upload if a new image is uploaded
        if (!empty($_FILES['image']['name'])) {
            // New image uploaded, process it
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
    
            move_uploaded_file($imageTmpName, "uploads/" . $imageName);
    

            $upd_sql = "UPDATE `Student` SET `email`='$email', `pwd`='$pwd',`state`= $sel_cat,`gender`='$gender',`hobbies`='$hobbies', `image_name`='$imageName' WHERE id=$id";
        } else {
            // No img uploaded, only update the other fields
            $upd_sql = "UPDATE `Student` SET `email`='$email', `pwd`='$pwd',`state`= $sel_cat,`gender`='$gender',`hobbies`='$hobbies' WHERE id=$id";
        }
    
        $upd_query = mysqli_query($conn, $upd_sql);
    
        if ($upd_query) {
            header("Location: list.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>