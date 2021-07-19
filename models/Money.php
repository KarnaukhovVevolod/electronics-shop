<?php

namespace app\models;

class Money {
    
    public function Oplata($price, $number_order){
    // 2.
    // Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
    // Payment of the set sum with a choice of currency on site ROBOKASSA

    // регистрационная информация (идентификатор магазина, пароль #1)
    // registration info (login, password #1)
    $mrh_login = "my_identity_shop";
    $mrh_pass1 = "password_1";

    // номер заказа
    // number of order
    $inv_id = $number_order;

    // описание заказа
    // order description
    $inv_desc = "Заказ № = $number_order, оплачен";

    // сумма заказа
    // sum of order
    $out_summ = $price;

    // тип товара
    // code of goods
    $shp_item = "2";

    // предлагаемая валюта платежа
    // default payment e-currency
    $in_curr = "Рубль";

    // язык
    // language
    $culture = "ru";

    // формирование подписи
    // generate signature
    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
    
    return [$mrh_login,$mrh_pass1,$inv_desc,$out_summ,$shp_item,$in_curr,$culture,$crc]; 
    
    }
}
