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
        <form action="Register_Login.php" class="form_submitted" method="Post">
            <h1 class="MainHeading"> Register Login Form </h1>
            <div>
                <label>Username</label>
                <input type="text" required="" name="username" placeholder="Enter username name">
            </div>
            <br>
            <div>
                <label>Password</label>
                <input type="text" required="" name="password" placeholder="Enter password name">
            </div>
            <br>
            <div>
                <label>Re-Type Password</label>
                <input type="text" required="" name="re_password" placeholder="Enter password again">
            </div>
            <br>
            <div>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];
        print_r($password, $re_password);
        if ($re_password == $password) {
            $query_1 = $conn->prepare("insert into Login(userName, password) values (?, ?)");
            $query_1->execute([$username, $password]);
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