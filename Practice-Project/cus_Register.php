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

    <div>
        <form action="" class="form_submitted" method="Post">
            <h1 class="MainHeading"> Create your Account </h1>
            
            <div>
                <label>ID</label>
                <input type="text" required="" name="id" placeholder="Enter id">
            </div>
            <br>
            <div>
                <label>Username</label>
                <input type="text" required="" name="username" placeholder="Enter username">
            </div>
            <br>
            <div>
                <label>Password</label>
                <input type="text" required="" name="password" placeholder="Enter password">
            </div>
            <br>
            <div>
                <label>Re-Type Password</label>
                <input type="text" required="" name="re_password" placeholder="Enter Password Again">
            </div>
            <br>
            <div>
                <label>Name</label>
                <input type="text" required="" name="name" placeholder="Enter name ">
            </div>
            <br>
            <div>
                <label>Contact Number</label>
                <input type="text" required="" name="contactnumber" placeholder="Enter Contact Number">
            </div>
            <br>
            <div>
                <label>email</label>
                <input type="text" required="" name="email" placeholder="Enter Email">
            </div>
            <br>
            <div>
                <label>Address</label>
                <input type="text" required="" name="address" placeholder="Enter Address">
            </div>
            <br>
            <div>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $id = $_POST["id"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];
        $name = $_POST["name"];
        $contactNumber = $_POST["contactnumber"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        if ($re_password == $password) {
            $query_1 = $conn->prepare("insert into customer values (?, ?, ?, ?, ?, ?, ?)");
            $query_1->execute([$id, $username, $password, $name, $contactNumber, $email, $address]);
            header("cus_Login.php");
            
        } else {
            echo "Retype Password";
        }
    }
    ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>