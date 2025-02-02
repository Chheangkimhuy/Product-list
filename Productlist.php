<?php
include 'Function.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: "Roboto", sans-serif;
        }

        .container {
            height: 60px;
        }
    </style>
    <title>Product List</title>
</head>

<body>
    <div class="container bg-secondary py-3 px-3 d-flex align-items-center justify-content-between">
        <h2 class="text-light">Products List</h2>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btn_add">Add Product</button>
    </div>
    <!-- Modal Add and Update -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fw-bold" id="staticBackdropLabel">Product Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="update_id" name="update_id">
                        <label for="">Name:</label>
                        <input type="text" id="p_name" name="p_name" class="form-control shadow-none">
                        <input type="file" placeholder="file uploads" class="py-3" name="p_image" id="p_image"><br>
                        <label for="">Price :</label>
                        <input type="text" id="p_price" name="p_price" class="form-control shadow-none">
                        <label for="">Quantity:</label>
                        <input type="text" id="p_qty" name="p_qty" class="form-control shadow-none">
                        <label for="">Category:</label>
                        <input type="text" id="p_category" name="p_category" class="form-control shadow-none">
                        <label for="">Brand:</label>
                        <input type="text" id="p_brand" name="p_brand" class="form-control shadow-none">
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-success" name="btn_confirm_add" id="btn_confirm_add">Add
                            Product</button>
                        <button type="submit" class="btn btn-outline-primary" name="btn_confirm_update" id="btn_confirm_update">Update
                            Product</button>
                        <button type="button" class="btn btn-warning" id="btn_clear">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <h3>Are you sure you want to delete?</h3>
                        <input type="hidden" name="hidden_id" id="hidden_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btn_confirm_delete">Delete Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include 'Productshow.php';
    ?>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("body").on("click", "#btn_delete", function() {
            var productId = $(this).attr("data-id");
            $("#hidden_id").val(productId);
        });
        $("#btn_confirm_add").show();
        $("#btn_confirm_update").hide();
        $("body").on("click", "#open_update", function() {
            var row = $(this).closest("tr");
            $("#update_id").val(row.find("td").eq(0).text().trim());
            $("#p_name").val(row.find("td").eq(1).text().trim());
            $("#p_price").val(row.find("td").eq(3).text().trim());
            $("#p_qty").val(row.find("td").eq(4).text().trim());
            $("#p_category").val(row.find("td").eq(5).text().trim());
            $("#p_brand").val(row.find("td").eq(6).text().trim());

            $("#btn_confirm_add").hide();
            $("#btn_confirm_update").show();
        });
        $("#btn_clear").click(function() {
            $("#update_id").val("");
            $("#p_name, #p_price, #p_qty, #p_category, #p_brand").val("");
        });
        
    });
</script>

</html>