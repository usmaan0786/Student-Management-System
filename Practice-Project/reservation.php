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
        <form class="form_submitted" method="Post">
            <h1 class="MainHeading"> Reserve a Day? </h1>
            <br>
            <div>
                <label>Name</label>
                <input type="text" required="" name="name" placeholder="Enter name ">
            </div>
            <br>
            <div>
                <label>email</label>
                <input type="text" required="" name="email" placeholder="Enter Email">
            </div>
            <br>
            <div>
                <label>Contact Number</label>
                <input type="text" required="" name="contactnumber" placeholder="Enter Contact Number">
            </div>
            <br>
            <?php
            $query_1 = $conn->query("Select Name from photographer");
            $result = $query_1->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="col-md-4">
                <label for="inputState" class="form-label">Select Photographer</label>
                <select id="inputState" name="photographer" class="form-select">
                    <option selected>Choose...</option>
                    <option value="Tayyab"> Tayyab </option>
                    <option value="Usman"> Usman </option>
                </select>
            </div>
            <br>
            <!--<div>
                <label>Card Type : </label>
                <select name="card_type" id="card_type">
                    <option value="">---Select a Card Type---</option>
                    <option value="Visa"> Visa </option>
                    <option value="EasyPaisa"> EasyPaisa </option>
                    <option value= "Bank Account">Bank Account</option>
                </select>
            </div> -->
            <div>
                <label>Date:</label>
                <input type="date" name="date">
            </div>
            <br>
            <div>
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $photograper = $_POST["photographer"];
        echo $photograper;
        $contactNumber = $_POST["contactnumber"];
        $date = $_POST["date"];
        
        $query_1 = $conn->prepare("insert into reservation(Name, Email, contactNumber, photographer, Reserved_Date) values (?, ?, ?, ?, ?)");
        $query_1->execute([$name, $email, $contactNumber, $photograper, $date]);
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