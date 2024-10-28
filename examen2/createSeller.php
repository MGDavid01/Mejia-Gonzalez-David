<?php
    include "includes/header.php";
    require "includes/config/connectDB.php";
    $db = connectTo2DB();

    var_dump($_POST);
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($name == null || $email == null || $phone == null) {
            echo 'Rellenar todo el formulario';
        } else {
            $query = "insert into sellers(name, email, phone) values ('$name', '$email','$phone');";
            $response = mysqli_query($db, $query);
            if($response){
                echo "Seller created succesfully";  
            } else {
                echo "Seller not created";
            }
        }
    }
    

?>
<section>
    <h2>Sellers Form</h2>
    <div>
        <form action="createSeller.php" method="post">
            <legend>Fill All Form Fields</legend>
            <div>
                <label for="id">Seller ID</label>
                <input type="number" name="id" id="id">
            </div>
            <div>
                <label for="name">Seller Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">Seller Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="phone">Seller Phone</label>
                <input type="tel" name="phone" id="phone">
            </div>
            <div>
                <button type="submit">Create a New Seller</button>
            </div>
        </form>
    </div>
</section>
<?php include "includes/footer.php"?>