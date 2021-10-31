<?php
if (!empty($_POST)) {
    $id = getPost('id');
    $title = getPost('title');
    $price = getPost('price');
    $discount = getPost('discount');
    $thumbnail = getPost('thumbnail');
    $author = getPost('author');
    $description = getPost('description');
    $category_id = getPost('category_id');
    $created_at = $updated_at = date('Y-m-d H:S:I');

    if ($id > 0) {
        //update
        $sql = "update Product set title = '$title', price = '$price', thumbnail = '$thumbnail', 
                    discount = '$discount', description = '$description', author = '$author',category_id = '$category_id', updated_at = '$updated_at' where id = $id";
        excute($sql);

    } else {
        //insert
        $sql = "insert into Product(title, price, thumbnail, 
                    discount, description, author, updated_at, created_at, deleted, category_id ) values 
                    ('$title', '$price', '$thumbnail', '$discount',
                     '$description', '$author', '$updated_at', '$created_at', 0, $category_id)";
        excute($sql);
        header('Location: index.php');
        die();
    }
}