<?php include_once(ROOT . '/Views/layout/header_adm.php'); ?>
<div class="contentpanel">
    <table class="table table-striped">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Категория</th>

                <th>Цена</th>
                <th>Описание</th>
                <th>Наличие</th>
                <th>Редактирование</th>
            </tr>
        </thead>

        <tbody>
            <?php $i = 1;
            foreach ($productList as $product) : ?>
    <?php $category = $product['category_id']; ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $product['header'] ?></td>
                    <td><?php echo Product::getCategoryById($category)['name']; ?></td>

                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['body'] ?></td>
                    <td><?php echo $product['stock'] ?></td>
                    <td class="table-action">
                        <a href="" data-id="<?php echo $product['id']; ?>" title="Edit" class="tooltips"><i class="fa fa-2x fa-pencil"></i></a>
                        <a href="" data-id="<?php echo $product['id']; ?>" title="Delete" class="delete-row tooltips"><i class="fa fa-2x fa-trash-o"></i></a>
                    </td>
                </tr>
    <?php endforeach; ?>
    </table>


</div><!-- contentpanel -->

<?php include_once(ROOT . '/Views/layout/footer_adm.php'); ?>
