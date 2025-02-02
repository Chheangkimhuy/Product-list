<?php
include 'Connection.php';

$query = "SELECT * FROM tbl_productlist";
$result = $connection->query($query);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product List</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center bg-dark text-light p-2">Products</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-12 col-md-6 col-lg-3 mb-3">
                        <div class="card h-100">
                            <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text"><strong>Brand:</strong> <?php echo $row['brand']; ?></p>
                                    <p class="card-text"><strong>Category:</strong> <?php echo $row['category']; ?></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text"><strong>Quantity:</strong> <?php echo $row['qty']; ?></p>
                                    <p class="card-text fw-bold">Price: <?php echo number_format($row['price'], 2); ?>$</p>
                                </div>
                                <a href="cart.php?id=<?php echo $row['id']; ?>" class="btn btn-danger w-100">Add To Cart</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>No products available.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>