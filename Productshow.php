<h2 class="text-center my-4">
    List Product
</h2>
<table class="table mx-auto aling-middle p-5" style="table-layout: fixed ;">
    <tr>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Action</th>
        </thead>
    </tr>
    <?php
    select_product();
    ?>
</table>