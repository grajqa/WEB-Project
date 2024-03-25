<?php
include "getU.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>   
    body {
        font-family: Arial, sans-serif;
        background-color: #ffe6e6; 
    }
    .container {
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff; 
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        color: #ff69b4; 
    }
    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .user-table th, .user-table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    .user-table th {
        background-color: #ff69b4; 
        color: #fff; 
    }
    .user-table tbody tr:nth-child(even) {
        background-color: #fff; 
    }
    .user-table tbody tr:nth-child(odd) {
        background-color: #ffe6e6; 
    }
    .editbutton, .deletebutton, .newbutton {
        background-color: #ff69b4; 
        color: #fff; 
        border: none;
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
    }
    .editbutton:hover, .deletebutton:hover, .newbutton:hover {
        background-color: #ff4d94; 
    }
    </style>
</head>
<body>
<div class="container">
    <h2>User Management</h2>
    <a class="newbutton" href="createacc.php" role="button">New User</a>
    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        include "getU.php";

        if (!empty($users)) {
            foreach($users as $user) {
                echo 
                "
                <tr>
                    <td>{$user['id']}</td>
                    <td>{$user['username']}</td>
                    <td>{$user['email']}</td>
                    <td>{$user['password']}</td>
                    <td>{$user['created']}</td>
                    <td>
                        <a href='editU.php?id={$user['id']}' class='editbutton'>Edit</a>
                        <a href='deleteU.php?id={$user['id']}' class='deletebutton'>Delete</a>
                    </td>
                </tr>
                ";
            }
        } else {
            echo ">No users found";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
