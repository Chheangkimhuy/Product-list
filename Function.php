<?php
include 'Connection.php';

function insert_product()
{
    global $connection;

    if (isset($_POST['btn_confirm_add'])) {
        $name   = $_POST['p_name'];
        $image  = $_FILES['p_image']['name'];
        $price  = $_POST['p_price'];
        $qty  = $_POST['p_qty'];
        $category = $_POST['p_category'];
        $brand  = $_POST['p_brand'];

        if (!empty($name) && !empty($image) && !empty($price) && !empty($qty) && !empty($category) && !empty($brand)) {
            $file = time() . '-' . $image;
            $path = './uploads/' . $file;
            move_uploaded_file($_FILES['p_image']['tmp_name'], $path);
            $sql_insert = "INSERT INTO `tbl_productlist`(name, image, price, qty, category, brand) VALUES ('$name', '$file', '$price', '$qty', '$category', '$brand')";
            $connection->query($sql_insert);
        }
    }
}
insert_product();

function select_product()
{
    global $connection;
    $sql_select = "SELECT id, name, image, price, qty, category, brand FROM tbl_productlist ORDER BY id DESC";
    $result = $connection->query($sql_select);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['name'] . '</td>
                <td>
                    <img src="./uploads/' . $row['image'] . '" width="60px">
                </td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['qty'] . '</td>
                <td>' . $row['category'] . '</td>
                <td>' . $row['brand'] . '</td>
                <td>
                    <button class="btn btn-outline-primary btn_update" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="open_update">Update</button>
                    <button class="btn btn-outline-danger btn_delete" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btn_delete" data-id="' . $row['id'] . '">Delete</button>
                </td>
            </tr>
        ';
    }
}
function delete_product()
{
    global $connection;
    if (isset($_POST['btn_confirm_delete'])) {
        $id = $_POST['hidden_id'];
        $sql_delete = "DELETE FROM tbl_productlist WHERE id='$id'";
        $connection->query($sql_delete);
    }
}
delete_product();

function update_product()
{
    global $connection;
    if (isset($_POST['btn_confirm_update'])) {
        $id = $_POST['update_id'];
        $name = $_POST['p_name'];
        $price = $_POST['p_price'];
        $qty = $_POST['p_qty'];
        $category = $_POST['p_category'];
        $brand = $_POST['p_brand'];
        
        if (!empty($_FILES['p_image']['name'])) {
            $image = $_FILES['p_image']['name'];
            $file = time() . '-' . $image;
            $path = './uploads/' . $file;
            move_uploaded_file($_FILES['p_image']['tmp_name'], $path);
            $sql_update = "UPDATE tbl_productlist SET name='$name', image='$file', price='$price', qty='$qty', category='$category', brand='$brand' WHERE id='$id'";
        } else {
            $sql_update = "UPDATE tbl_productlist SET name='$name', price='$price', qty='$qty', category='$category', brand='$brand' WHERE id='$id'";
        }
        
        $connection->query($sql_update);
    }
}
update_product();