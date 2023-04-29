<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>
<style>
    table,
    tr,
    td,
    th {
        text-align: center;
        border: 2px solid rgb(255, 255, 255);
        border-collapse: collapse;
        padding: 10px;
    }
</style>

<body>
    <?php
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=localhost;dbname=project_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
    <?php

    $query = $conn->query("Select * from reservation");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <div>
        <p>Reservation List</p>
        <hr>
        <table>
            <tbody>
            <tr><td>ID </td>
            <td>Name</td>
            <td>Email </td>
            <td>Contact Number </td>
            <td>Photographer </td>
            <td>Reserved Date </td></tr>
                <?php
                foreach ($result as $value) {
                    echo '<tr> 
            <td> ' . $value["Id"] . ' </td>
            <td> ' . $value["Name"] . ' </td>
            <td> ' . $value["Email"] . ' </td>
            <td> ' . $value["contactNumber"] . ' </td>
            <td> ' . $value["photographer"] . ' </td>
            <td> ' . $value["Reserved_Date"] . ' </td>
            </tr>';
                }


                ?>
            </tbody>
        </table>
        <hr>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>