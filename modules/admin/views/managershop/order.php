<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>

<?php $link_shop_order = Url::to(['/admin/managershop/order']);
              $link_shop_order_1 = $link_shop_order."&0";
              $link_shop_order_2 = $link_shop_order."&0"."&1";
              $link_shop_order_3 = $link_shop_order."&0"."&2";
              $link_shop_order_4 = $link_shop_order."&0"."&3";
              $link_shop_order_5 = $link_shop_order."&0"."&4";
              $link_shop_order_6 = $link_shop_order."&0"."&5";
        ?>
<?php $link ?>
<?php if( $data['count_url']  < 3 ):?>
    <div class="block-all-order">
        <div class="block-order block-order-active">
            <a href="<?= $link_shop_order_1 ?>">Все заказы: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p6'] ?></div>
        </div>
        <div class="block-order">
            <a href="<?= $link_shop_order_2 ?>">Заказы на обработке: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p1'] ?></div>
        </div>
        <div class="block-order">
            <a href="<?= $link_shop_order_3 ?>">Заказы на подготовке: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p2'] ?></div>
        </div>
        <div class="block-order">
            <a href="<?= $link_shop_order_4 ?>">Заказы на отправку: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p3'] ?></div>
        </div>
        <div class="block-order">
            <a href="<?= $link_shop_order_5 ?>">Заказы в пункте выдачи: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p4'] ?></div>
        </div>
        <div class="block-order">
            <a href="<?= $link_shop_order_6 ?>">Заказов завершено: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p5'] ?></div>
        </div>
        <div class="block-order1">
            <a></a>

        </div>

    </div>
<?php else: ?>
    <div class="block-all-order">
        
        <div class="block-order">
            <a href="<?= $link_shop_order_1 ?>">Все заказы: </a>
            <div class="order-quantity"><?= $data['count_rows'][0]['p6'] ?></div>
        </div>
        
        <?php if($data['count_url_1'] == 1): ?>
            <div class="block-order block-order-active">
                <a >Заказы на обработке: </a>
                
                <div class="order-quantity"><?= $data['count_rows'][0]['p1'] ?></div>
            </div>
        <?php else: ?>
            <div class="block-order">
                <a href="<?= $link_shop_order_2 ?>">Заказы на обработке: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p1'] ?></div>
            </div>
        <?php endif; ?>
        
        <?php if($data['count_url_1'] == 2): ?>
            <div class="block-order block-order-active">
                <a>Заказы на подготовке: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p2'] ?></div>
            </div>
        <?php else: ?>
            <div class="block-order">
                <a href="<?= $link_shop_order_3 ?>">Заказы на подготовке: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p2'] ?></div>
            </div>
        <?php endif; ?>
        
        <?php if($data['count_url_1'] == 3): ?>
            <div class="block-order block-order-active">
                <a>Заказы на отправку: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p3'] ?></div>
            </div>
        <?php else: ?>
            <div class="block-order">
                <a href="<?= $link_shop_order_4 ?>">Заказы на отправку: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p3'] ?></div>
            </div>
        <?php endif; ?>
        <?php if($data['count_url_1'] == 4): ?>
            <div class="block-order block-order-active">
                <a>Заказы в пункте выдачи: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p4'] ?></div>
            </div>
        <?php else: ?>
            <div class="block-order">
                <a href="<?= $link_shop_order_5 ?>">Заказы в пункте выдачи: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p4'] ?></div>
            </div>
        <?php endif; ?>
        <?php if($data['count_url_1'] == 5): ?>
            <div class="block-order block-order-active">
                <a>Заказов завершено: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p5'] ?></div>
            </div>
        <?php else: ?>
            <div class="block-order">
                <a href="<?= $link_shop_order_6 ?>">Заказов завершено: </a>
                <div class="order-quantity"><?= $data['count_rows'][0]['p5'] ?></div>
            </div>
        <?php endif; ?>
        <div class="block-order1">
            <a></a>

        </div>

    </div>
<?php endif; ?>
<div class="all_order">
    <div class="table-responsive">
        <?php foreach($data_order as $order ): ?>
        <!-- Выводим заказ -->
        <table class="table_m table-bordered table-hover">
    
            <thead>
                <tr>
                    <td class="text-center">Имя</td>
                    <td class="text-left">Фамилия</td>
                    <td class="text-left">Номер заказа</td>
                    <td class="text-left">Tелефон</td>
                    <!--<td class="text-left">Email</td>-->
                    <td class="text-left">Вид доставки</td>
                    <td class="text-right">Статус заказа</td>
                    <td class="text-right">Цена заказа</td>
                    <td class="text-right">Дата</td>
                    <td class="text-right">Оплата заказа</td>
                    <td class="text-right">Действие</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><?= $order['name'] ?></td>
                    <td class="text-left"><?= $order['surname'] ?></td>
                    <td class="text-left"><?= $order['order_number'] ?></td>
                    <td class="text-left"><?= $order['telephone'] ?></td>
                    <!--<td class="text-left"><?php // $order['email'] ?></td>-->
                    <td class="text-left"><?= $order['type_delivery'] ?></td>
                    <?php switch($order['status_order']){
                        case(1):
                            $Status_order = 'Обработка заказа';
                            break;
                        case(2):
                            $Status_order = 'Подготовка заказа';
                            break;
                        case(3):
                            $Status_order = 'Отправка заказа';
                            break;
                        case(4):
                            $Status_order = 'Доставлен заказ в пункт выдачи';
                            break;
                        case(5):
                            $Status_order = 'Заказ завершён';
                            break;
                        default :
                            $Status_order = 'Непонятный статус';
                            break;
                    } ?>
                    <!-- <td class="text-right"><?php // $order['status_order'] ?></td>-->
                    <td class="text-right"><?= $Status_order ?></td>
                    <td class="text-right"><?= $order['total_price_order'] ?></td>
                    <td class="text-right"><?= $order['date_order'] ?></td>
                    <td class="text-right"><?= $order['pay_order'] ?></td>
                    <td class="text-right">
                            
                        <?php $view_shop = Url::to(['/admin/managershop/view']);
                        $view_shop = $view_shop."&id=";
                        ?>
                        <a href="<?= $view_shop.$order['id'] ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                            <span class= "glyphicon glyphicon-eye-open"></span>
                        </a>
                        
                        <?php $update_shop = Url::to(['/admin/managershop/update']);
                        $update_shop = $update_shop."&id=";
                        ?>
                        <a href="<?= $update_shop.$order['id'] ?>" title="Изменить" aria-label="Изменить" data-pjax="0">
                            <span class= "glyphicon glyphicon-pencil"></span>
                        </a>
                        <?php $delete_shop = Url::to(['/admin/managershop/delete']);
                        $delete_shop = $delete_shop."&id=";
                        ?>
                        <a href="<?= $delete_shop.$order['id'] ?>" title="Удалить" aria-label="Удалить" data-pjax="0" 
                           data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                            <span class= "glyphicon glyphicon-trash"></span>
                        </a>
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Конец вывода заказа -->
        
        <!-- Выводим состав заказа -->
        
        <table class="table_l table-bordered table-hover">

            <thead>
                <tr>
                    <td class="text-center">Фото</td>
                    <td class="text-left">Номер заказа</td>
                    <td class="text-left">Название товара</td>
                    <td class="text-left">Путь к фото</td>
                    
                    <td class="text-right">Цена 1шт</td>
                    <td class="text-left">Кол-во</td>
                    <td class="text-right">Общая цена</td>
                    <td class="text-right">Ссылка на товар</td>
                    <td class="text-right">Действие</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($order['productshop'] as $structure): ?>

                    <tr>                
                        <td class="text-center"><img src="<?= $structure['path'] ?>" style="width:220px;height:100px" ></td>
                        <td class="text-left"><?= $structure['order_number'] ?></td>
                        <td class="text-left"><?= $structure['name_model'] ?></td>
                        <td class="text-left"><?= $structure['path'] ?></td>
                        
                        <td class="text-right"><?= $structure['price'] ?></td>
                        <td class="text-left"><?= $structure['quantity'] ?></td>
                        <td class="text-right"><?= $structure['total_price'] ?></td>
                        <td class="text-right"><?= $structure['link'] ?></td>
                        <td class="text-right">

                            <?php $view_shop = Url::to(['/admin/managerorder/view']);
                            $view_shop = $view_shop."&id=";
                            ?>
                            <a href="<?= $view_shop.$structure['id'] ?>" title="Просмотр" aria-label="Просмотр" data-pjax="0">
                                <span class= "glyphicon glyphicon-eye-open"></span>
                            </a>

                            <?php $update_shop = Url::to(['/admin/managerorder/update']);
                            $update_shop = $update_shop."&id=";
                            ?>
                            <a href="<?= $update_shop.$structure['id'] ?>" title="Изменить" aria-label="Изменить" data-pjax="0">
                                <span class= "glyphicon glyphicon-pencil"></span>
                            </a>
                            <?php $delete_shop = Url::to(['/admin/managerorder/delete']);
                            $delete_shop = $delete_shop."&id=";
                            ?>
                            <a href="<?= $delete_shop.$structure['id'] ?>" title="Удалить" aria-label="Удалить" data-pjax="0" 
                               data-confirm="Вы уверены, что хотите удалить этот элемент?" data-method="post">
                                <span class= "glyphicon glyphicon-trash"></span>
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Конец вывода состава заказа-->
        <?php endforeach; ?>
        <!-- первая-->
        
        <?php $link_shop = Url::to(['/admin/managershop/order']);
              $link_shop = $link_shop."&";
        ?>
        
        <!-- Первая страница -->
        <?php if($data['current_number'] != 1): ?>
            <a href="<?= $link_shop.$data['start_product'] ?>">
                <div class="pagin left_angle">
                    <i class="fa "><?= $data['number_first'] ?></i>
                </div>
            </a>
        <?php endif; ?>
        <!-- Предыдущая -->
        <?php if($data['prev'] != 0): ?>
            <a href="<?= $link_shop.$data['prev'] ?>">
                <div class="pagin left_angle">
                    <i class="fa fa-angle-double-left"></i>
                </div>
            </a>
        <?php endif; ?>
        <!-- Текущая -->
        <!-- -->
        <div class="pagin center_angel">
            <?= $data['current_number'] ?>
        </div>
        
        
        <?php if($data['next'] != 0): ?>
            <!-- Следующая -->
            <a href="<?= $link_shop.$data['next'] ?>">
                <div class=" pagin right_angle">
                    <i class="fa fa-angle-double-right"></i>
                </div>
            </a>
        <?php endif; ?>
        <?php if($data['current_number'] != $data['number_last']): ?>
            <!-- Последняя страница -->
            <a href="<?= $link_shop.$data['last_n'] ?>">
                <div class="pagin right_angle">
                    <i class="fa"><?= $data['number_last'] ?></i>
                </div>
            </a>
        <?php endif;?>
    </div>
</div>




