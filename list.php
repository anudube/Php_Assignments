<!DOCTYPE html>
<html>
    <head>
    <link rel="Stylesheet" type="text/css" href="list.css">
    </head>
<body>
    <div class="main-div">
        <h1> List of Records</h1>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>photo</th>
                    </tr>
                </thead>

            <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password= "";
                $db = "assignments";
                // create connection
                $conn = new mysqli($servername, $username, $password, $db);

                // get connection error
                if($conn->connect_error){
                 die("Connection failed:" .$conn->connect_error);
                }else{
                // echo "Connected Successfully";
                 }
                $selectquery = "select * from users";
                $query = mysqli_query($conn,$selectquery);
                $num = mysqli_num_rows($query);
                while($res = mysqli_fetch_array($query)){
                ?>
                    <tr>
                        <td><?php echo $res['id']; ?></td>
                        <td><?php echo $res['first_name']; ?></td>
                        <td><?php echo $res['last_name']; ?></td>
                        <td><?php echo $res['email']; ?></td>
                        <td><?php echo $res['password']; ?></td>
                        <td><img src="image_folder/<?php echo $res['photo']; ?>" width="100"></td>
                    </tr>
                <?php 
                }
                 ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>













