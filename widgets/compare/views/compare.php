<?php
?>


<?php if($result_data != null): ?>
    <?php foreach($result_data as $category_data): ?>
        <?php $key = array_keys($result_data, $category_data); ?>

<?php switch($key[0]): ?>
<?php case ('notebook'): ?>
            <br>
        <table class="table table-bordered table-hover">    
            <h3>Ноутбуки</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        <td class ="text-left">Оперативная память</td>
                        <td class ="text-left">Производитель</td>
                        
                        <td class ="text-right">Кол-во ядер процессора</td>
                        <td class ="text-right">Общий объём памяти</td>
                        <td class ="text-right">Ширина экрана</td>
                        <td class ="text-right">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?> </td>
                        
                        <td class ="text-left">
                        <?= $single_product['amount_ram'] ?></td>
                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        <td class ="text-right"><?= $single_product['number_core'] ?></td>
                        <td class ="text-right"><?= $single_product['total_memory'] ?></td>
                        <td class ="text-right"><?= $single_product['screen_diagonal'] ?></td>
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>
                
<?php case 'tablet' : ?>
            <br>
        <table class="table table-bordered table-hover">
            <h3>Планшеты</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        <td class ="text-left">Оперативная память</td>
                        <td class ="text-left">Производитель</td>
                        
                        <td class ="text-right">Кол-во SIM-карт</td>
                        <td class ="text-right">Общий объём памяти</td>
                        <td class ="text-right">Ширина экрана</td>
                        <td class ="text-rignt">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?></td>
                        <td class ="text-left"><?= $single_product['amount_ram'] ?></td>
                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        <td class ="text-right"><?= $single_product['number_sim'] ?></td>
                        <td class ="text-right"><?= $single_product['internal_memory'] ?></td>
                        <td class ="text-right"><?= $single_product['screen_diagonal'] ?></td>
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>
            
<?php case 'audio': ?>
            <br>
        <table class="table table-bordered table-hover">
            <h3>Аудио</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        
                        <td class ="text-left">Производитель</td>
                        <td class ="text-right">Мощность излучения во фронтальном направлении</td>
                        <td class ="text-rignt">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?></td>
                        
                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        <td class ="text-right"><?= $single_product['power'] ?></td>
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>

<?php case 'camera' : ?>
            <br>
        <table class="table table-bordered table-hover">
            <h3>Фотоаппараты</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        <td class ="text-left">Производитель</td>
                        
                        <td class ="text-right">Разрешение камеры</td>
                        <td class ="text-rignt">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?></td>
                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        
                        <td class ="text-right"><?= $single_product['resolution_matrix'] ?></td>
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>

<?php case 'videocamera' : ?>
            <br>
        <table class="table table-bordered table-hover">
            <h3>Видеокамеры</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        
                        <td class ="text-left">Производитель</td>
                        
                        <td class ="text-right">Скорость видеозаписи</td>
                        
                        <td class ="text-rignt">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?></td>
                        
                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        <td class ="text-right"><?= $single_product['video_recording_speed'] ?></td>
                       
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>            
            
<?php case 'tv' : ?>
            <br>
        <table class="table table-bordered table-hover">
            <h3>Телевизоры</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        
                        <td class ="text-left">Производитель</td>
                        
                        <td class ="text-right">Диагональ экрана</td>
                        <td class ="text-right">Разрешение экрана</td>
                        
                        <td class ="text-rignt">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?></td>

                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        <td class ="text-right"><?= $single_product['screen_diagonal'] ?></td>
                        <td class ="text-right"><?= $single_product['screen_resolution'] ?></td>
                        
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>
            
<?php case 'smartiphone' : ?>
            <br>
        <table class="table table-bordered table-hover">
            <h3>Телефоны</h3>
                <thead>
                    <tr>
                        <td class ="text-center">Фото</td>
                        <td class ="text-left">Название продукта</td>
                        <td class ="text-left">Цена</td>
                        <td class ="text-left">Оперативная память</td>
                        <td class ="text-left">Производитель</td>
                        
                        <td class ="text-left">Разрешение камеры</td>
                        <td class ="text-right">Внутренняя память</td>
                        <td class ="text-right">Диагональ экрана</td>
                        <td class ="text-right">Кол-во ядер</td>
                        <td class ="text-right">Цвет</td>
                        
                        <td class ="text-rignt">Дата выпуска</td>
                        <td class ="text-right">Действие</td>
                    </tr>
                </thead>
                <?php foreach($category_data as $single_product): ?>
                <tbody>
                    <tr>
                        <td class ="text-center"><a class="link_comp" href="<?= $single_product['link_description'] ?>"><img class="photo_comp" src="<?= $single_product['path'] ?>"/></a></td>
                        <td class ="text-left"><a class="name_comp" href="<?= $single_product['link_description'] ?>"><?= $single_product['model_product'] ?></a></td>
                        <td class ="text-left price_comp"><?= $single_product['price'] ?></td>
                        <td class ="text-left"><?= $single_product['amount_ram'] ?></td>
                        <td class ="text-left"><?= $single_product['manufacturer'] ?></td>
                        
                        <td class ="text-left"><?= $single_product['camera_resolution'] ?></td>
                        <td class ="text-right"><?= $single_product['internal_memory'] ?></td>
                        <td class ="text-right"><?= $single_product['screen_diagonal'] ?></td>
                        <td class ="text-right"><?= $single_product['number_core'] ?></td>
                        <td class ="text-right"><?= $single_product['color'] ?></td>
                        <td class ="text-rignt"><?= $single_product['date'] ?></td>
                        <td class ="text-right"> 
                            <button class="btn btn-primary compare_add" data-toggle="tooltip" title="Добавить в корзину" type="button">
                                <i class="fa fa-shopping-cart  "></i>
                                </button>
                                <a href="#" class="btn btn-danger compare_delet" data-toggle="tooltip" title="Удалить">
                                        <i class="fa fa-times"></i>
                                </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
        </table>        
<?php break; ?>
            
<?php endswitch; ?>    
<?php endforeach; ?>

<?php else: ?>
    Нет продуктов для сранения
<?php endif; ?>


