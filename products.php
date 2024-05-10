<?php
$conn = mysqli_connect("localhost", "root", "", "berwashop");

$select = mysqli_query($conn, "SELECT * FROM product");
$tbody = '';
$num_rows = '';
$a = 1;

if ($select) {
    $num_rows = mysqli_num_rows($select);

    if ($num_rows > 0) {
        while ($fetch = mysqli_fetch_assoc($select)) {
            $tbody .= "<tr>
            <td>" . $a++ . "</td>
            <td>" . $fetch["ProductName"] . "</td>
            <td class='text-align:center;'>
            <a href='update.php?productCode=" . $fetch['ProductCode'] . "' class='update'>Update</a>
            <a href='delete.php?productCode=" . $fetch['ProductCode'] . "' class='delete'>Delete</a>
            </td>
        </tr></br>";
        }
    } else {
        $tbody .= '<tr><td colspan="3" style="text-align:center; font-weight:bold;">No Products found</td></tr>';
    }
} else {
    echo "Not selected";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/products.css">
    <style>
        .container {
            width: 100%;
            padding: 2rem;
        }

        .admin-info {
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            margin-top: 2rem;
        }

        .admin-info h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .admin-info p {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
        }

        .card h3 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .card p {
            font-size: 1rem;
            margin-bottom: 1rem;
            color: #555;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

    
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <div class="logo">
                <span class="logo-text">Berwa Shop</span>
            </div>
            <div class="primary-nav">
                <a href="./index.php">Home</a>
                <a href="./products.php">Products</a>
                <a href="./productin.php">Product In</a>
                <a href="./productout.php">Product Out</a>
            </div>
            <div class="secondary-nav">
                <a href="./auth/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="head">
            <h2>Products</h2>
            <a href="./addproduct.php" class="btn btn-info">Add New Product</a>

        </div>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $tbody ?>
            </tbody>
        </table>
    </div>

</body>

</html>