<?php
    $con = mysqli_connect('localhost','root','','phone') or die(mysqli_connect_error($con));

    $update = false;
    $id = 0;
    $name = '';
    $fName = '';
    $mName = '';
    $age = '';
    $email = '';

    if (isset($_POST['save'])){

        $name = $_POST['name'];
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "INSERT INTO information VALUES(NULL,'$name','$fName','$mName','$age','$gender','$email','$pass')";

        $result = mysqli_query($con,$sql) or die(mysqli_error($result));
        mysqli_close($con);

        header("location: index.php");
    }
    if (isset($_GET['delete'])){

        $id = $_GET['delete'];

        $sql = "DELETE FROM information WHERE id = $id";

        $result = mysqli_query($con,$sql) or die(mysqli_error( $result));
        mysqli_close($con);

        header("location: index.php");
    }
    if (isset($_GET['edit'])){

        $id = $_GET['edit'];
        $update = true;

        $sql = "SELECT * FROM information WHERE id = $id";

        $result = mysqli_query($con,$sql) or die(mysqli_error( $result));
        mysqli_close($con);
        if ($result) {

            $row = mysqli_fetch_array($result);

            $id = $row['id'];
            $name = $row['name'];
            $fName = $row['fatherName'];
            $mName = $row['motherName'];
            $age = $row['age'];
            $email = $row['email'];
        }
    }
    if (isset($_POST['update'])){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $fName = $_POST['fName'];
        $mName = $_POST['mName'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $sql = "UPDATE information SET name = '$name', fatherName = '$fName', motherName = '$mName', age = '$age', gender = '$gender', email = '$email', password = '$pass' WHERE id = '$id'";

        $result = mysqli_query($con,$sql) or die(mysqli_error( $result));
        mysqli_close($con);

        header("location: index.php");
    }
?>
