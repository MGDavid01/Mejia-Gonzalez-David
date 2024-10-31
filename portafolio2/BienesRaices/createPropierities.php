<?php
    include "includes/header.php";
    require "includes/config/connectDB.php";

    $db = connectTo2DB();

    $query_seller = "select id, name from sellers;";
    $sellers = mysqli_query($db, $query_seller);
    
    $img = null;
    $id = $_POST["id"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $rooms = $_POST["rooms"];
    $wc = $_POST["wc"];
    $garage = $_POST["garage"];
    $timestamp = $_POST["timestamp"];
    $seller = $_POST["id_seller"];
    if (isset($_GET['status']) && $_GET['status'] === 'success') {
        echo "<p>Property created successfully</p>";
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($title == '' || $price == '' || $description == ''
            || $rooms == '' || $wc == '' || $garage == '') {
            echo 'Rellenar todo el formulario';
        } else {
            $query = "INSERT INTO propierties (title, price, imagen, description,
            rooms, wc, garages, timestamp, seller)
            VALUES ('$title', '$price', '$img', '$description', '$rooms', '$wc', '$garage', '$timestamp', '$seller');";
            
            $response = mysqli_query($db, $query);
            
            if ($response) {
                header("Location: createPropierities.php?status=success");
                exit();
            } else {
                echo "Property not created";
            }
        }
    }
?>
    <section>
        <h2>Propierities Form</h2>
        <div>
        <form action="createPropierities.php" method="post" enctype="multipart/form-data">
            <legend>Fill All Form Fields</legend>
            <div>
                <label for="id">Propierity ID</label>
                <input type="number" name="id" id="id">
            </div>
            <div>
                <label for="title">Propierity Title</label>
                <input type="text" name="title" id="title" placeholder="Propierty Title">
            </div>
            <div>
                <label for="price">Propierity Price</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="img">Image</label>
                <input type="file" id="img" name="img" accept="image/*">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div>
                <label for="rooms">Rooms</label>
                <input type="number" name="rooms" id="rooms">
            </div>
            <div>
                <label for="wc">Bathrooms</label>
                <input type="number" name="wc" id="wc">
            </div>
            <div>
                <label for="garage">Garage</label>
                <input type="number" name="garage" id="garage">
            </div>
            <div>
                <label for="timestamp">Timestamp</label>
                <input type="date" name="timestamp" id="timestamp">
            </div>
            <div>
                <label for="id_seller">Seller</label>
                <select name="id_seller" id="id_seller">
                        <?php while ($seller = mysqli_fetch_assoc($sellers)) : ?>
                            <option value="<?php echo $seller['id'];?>">
                                <?php echo $seller['name'];?>
                        </option>
                        <?php endwhile;?>
                </select>
            </div>
            <div>
                <button type="submit">Create a New Propierity</button>
            </div>
        </form>
        </div>
    </section>

<?php include "includes/footer.php"?>