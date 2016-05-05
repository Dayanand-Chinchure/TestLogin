<?php
    $con = mysqli_connect("mysql1.000webhost.com", "a3754689_db", "dayanand007", "a3754689_Mydb");

    $book = $_POST["TITLE"];
    $Auhtor= $_POST["AUTHOR"];

    $statement = mysqli_prepare($con, "SELECT * FROM Title WHERE TITLE = ?");
    mysqli_stmt_bind_param($statement, "s", $book);
    mysqli_stmt_execute($statement);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$book,$Author);

    $response = array();
    $response["success"] = true;

     while(mysqli_stmt_fetch($statement)){
            $response["success"] = true;
            $response["TITLE"] = $book;
     }

    echo json_encode($response);
?>
