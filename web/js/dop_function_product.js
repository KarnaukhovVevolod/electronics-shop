$(function(){
    
   
   $(document).ready(function(){
       
      /* Функции добавляет товар в модальное окно */
      
      $(".modal-view").on('click', function(){
          //alert('modal window');
          var single_product = $(this).closest('.single-product');
          var link_description = single_product.find('.product-img').find('a').attr('href');
          //alert(link_description);
          
          //ajax-запрос
            //данные для ajax-запроса
            var i = 0; var arr = [];
            //конец данные для ajax-запроса
            arr[i] = link_description;
            var token = $('meta[name="csrf-token"]:first').attr("content");

            $.ajax({
                
                type: 'post',
                url: 'index.php?r=electronics/modalwindow',
                dataType:'json',
                data: {_csrf: token, data:arr},
                //"param="+JSON.stringify(ob),
                success:function(data1){
                    //alert(data1);
                    //console.log(data1);
                    
                    //изменяем данные модального окна
                    var modal_product = $('.modal-product');
                    modal_product.find('.product-images').find('.images').find('img').attr('src', data1['path']);
                    var product_info = modal_product.find('.product-info');
                    product_info.find('h1').text(data1['model_product']);
                    product_info.find('.price-box-3').find('.s-price-box').find('span:first').text(data1['price']);
                    if(data1['old_price']!=null)
                    {
                        product_info.find('.price-box-3').find('.s-price-box').find('.old-price').text(data1['old_price']);
                    }
                    else
                    {
                        product_info.find('.price-box-3').find('.s-price-box').find('.old-price').text('');
                    }
                    product_info.find('.see-all').attr('href',data1['link_description']);
                    
                    modal_product.find('.quick-desc').text(data1['description']);
                    
                    product_info.find('.number_of_product_modal').text(data1['number_of_products']);
                    product_info.find('.numbers-row').find('input').attr('max', data1['number_of_products']);
                    //$('.modal').css('display:block');
                },
                error: function(){
                    alert(JSON.stringify({param:token}));
                    //alert('error');
                    
                }
            });
        //ajax-запрос-конец
          
      });
      
      
      //функция добавляет товар из модального окна в корзину
      $(".single_add_to_cart_button").on("click", function(){
            
        //копируем нужный модуль, в который будем вставлять свой продукт
        var clone_module_product = $('.cart-img-details:first').clone(true);
        //alert('session');
        //читаем данные из кликнутого продукта
        var product_img = $(this).closest(".modal-product");
        var img_path = product_img.find('.images').find('img').attr('src');
        var link = product_img.find('.see-all').attr('href');

        //var model = $(this).closest(".single-product").find(".product-description");
        var name_product = product_img.find('.product-info').find('h1').text();
        var price = product_img.find('.product-info').find('.s-price-box').find('span:first').text();
        var number_of_product = product_img.find('.product-info').find('.quick-add-to-cart').find('#french-hens').val();
        var max_number_of_product = $(this).closest('.product-info').find('.number_of_product_modal').text();
        max_number_of_product = Number.parseInt(max_number_of_product);
        //проверяем нашу корзину на наличие одинаковых продуктов с выбранным
        var arr = [];
        var ind = 0;
        var sum = 0;

        $(".cart-img-details").each(function(index){
            var data = $(this).find('.cart-img-content').find('a').find('h4').text();
            var itr = $(this).find('.cart-img-content').find('span').find('strong:first').text();
            //console.log(data);
            
            arr[index] = data;
            ind = ind + Number.parseInt(itr.replace(/\s/g,''));

            if( data == name_product )
            {
                //search_product = -1;
                
                //ind = ind + 1;
                var mnogit = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var price_old = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var int_price_old = Number.parseInt(price_old.replace(/\s/g,''));
                var price_read = Number.parseInt(price.replace(/\s/g,''));
                var new_price = String(price_read + int_price_old);
                var size = new_price.toString().length;
                
                if(size < 4){
                    result_price = new_price + ' руб';
                }
                else if(size > 3 && size < 6){
                    result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(size%3, size) + ' руб';
                }
                else if(size == 6)
                {
                    result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(3, size) + ' руб';
                }
                else if(size == 7)
                {
                    result_price = new_price.substring(0, size - 6) + ' ' + new_price.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
                }
                else{
                    result_price = new_price + ' руб';
                }
                //var 
                var all_mnogit = Number.parseInt(mnogit) + Number.parseInt(number_of_product.replace(/\s/g,''));
                
                if(all_mnogit > max_number_of_product){
                    ind = ind - Number.parseInt(mnogit) + max_number_of_product;
                    mnogit = max_number_of_product + ' x';
                }
                else{
                    //mnogit = all_mnogit +  ' x';
                    //ind = ind + 1;
                    mnogit = Number.parseInt(mnogit) + Number.parseInt(number_of_product.replace(/\s/g,'')) + ' x';
                    ind = ind + Number.parseInt(number_of_product.replace(/\s/g,''));
                }
                
                //$(this).find('.cart-img-content').find('span').find('strong:first').next().text(result_price);
                $(this).find('.cart-img-content').find('span').find('strong:first').text(mnogit);

            }   
            var multiplier = $(this).find('.cart-img-content').find('span').find('strong:first').text();
            var price_each = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
            if(multiplier != null && price_each != null){
                sum = sum + (Number.parseInt(multiplier.replace(/\s/g,'')) * Number.parseInt(price_each.replace(/\s/g,'')));
            }

        });

       var search_product = $.inArray(name_product, arr);
       if(search_product != -1)
       {
           //console.log('ура нашлось');
       }
       else{
           
           sum = sum +  Number.parseInt(price.replace(/\s/g,'')) * number_of_product;
            //console.log(sum);
            //ind = ind + 1;
            ind = ind + Number.parseInt(number_of_product.replace(/\s/g,''));
            number_of_product = number_of_product + ' x';
           //перезаписываем модуль (блок продукта для корзины)
            clone_module_product.find('.cart-img-photo').find('a').attr('href', link);
            clone_module_product.find('.cart-img-photo').find('a').find('img').attr('src',img_path);
            clone_module_product.find('.cart-img-content').find('a').attr('href',link);
            clone_module_product.find('.cart-img-content').find('a').find('h4').text(name_product);
            clone_module_product.find('.cart-img-content').find('span').find('.text-right').text(number_of_product);
                
            clone_module_product.find('.cart-img-content').find('span').find('.cart-price').text(price);
            clone_module_product.find('.pro-del').find('a').attr('href', link);
            clone_module_product.find('.number_of_product_cart').text(max_number_of_product);
                
             //находим корзину и вставляем изменённый модуль
            clone_module_product.appendTo('.cart_past');

            
           
       }

        var result_price;
        var size = sum.toString().length;
        sum = String(sum);
        console.log(size+'size');
        if(size < 4){
            result_price = sum + ' руб';
        }
        else if(size > 3 && size < 6){
            result_price = sum.substring(0, size - 3) + ' ' + sum.substring(size%3, size) + ' руб';
        }
        else if(size == 6)
        {
            result_price = sum.substring(0, size - 3) + ' ' + sum.substring(3, size) + ' руб';
        }
        else if(size == 7)
        {
            result_price = sum.substring(0, size - 6) + ' ' + sum.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
        }
        else{
            result_price = sum + ' руб';
        }
        $('.amount').text(result_price);
        $('.cart-item').text(ind);

    //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = [];
        $(".cart-img-details").each(function(index){
        //$(".cart_past").find('.cart-img-details').each(function(index){
            if( index == 0 )
            {
                var quantity = $('.cart-item').text();
                arr[index] = quantity;
            }
            else{
                var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var link_product = $(this).find('.cart-img-photo').find('a').attr('href');
                var max_number_of_product_cart = $(this).find('.number_of_product_cart').text();
                
                arr[index] =[name_model, quantity, photo, price_model, link_product, max_number_of_product_cart];

            }

            i = index;
        });
        arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/cart',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success:function(data){
                alert(data);
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');

            }
        });
    //ajax-запрос-конец

        })
      
      //функция добавляет товар из страницы с описанием товара в корзину
      $(".toch-add-cart").on("click", function(){
            
        //копируем нужный модуль, в который будем вставлять свой продукт
        var clone_module_product = $('.cart-img-details:first').clone(true);
        //alert('session');
        //читаем данные из кликнутого продукта
        //var product_img = $(this).closest(".modal-product");
        var img_path = $('.toch-photo').find('a').find('img').attr('src');
        var link = $('.link_description_product').text();

        //var model = $(this).closest(".single-product").find(".product-description");
        var name_product = $('.title-product').text();
        var price = $('.current-price').text();
        
        var number_of_product = $('.quantity-product').val();
        //количество продуктов в базе данных
        var max_quantity = $('.item-stock1').find('span').text();
        var int_max_quantity =  Number.parseInt(max_quantity.replace(/\s/g,''));
        //проверяем нашу корзину на наличие одинаковых продуктов с выбранным
        var arr = [];
        var ind = 0;
        var sum = 0;

        $(".cart-img-details").each(function(index){
            var data = $(this).find('.cart-img-content').find('a').find('h4').text();
            var itr = $(this).find('.cart-img-content').find('span').find('strong:first').text();
            //console.log(data);
            
            arr[index] = data;
            ind = ind + Number.parseInt(itr.replace(/\s/g,''));

            if( data == name_product )
            {
                //search_product = -1;
                //ind = ind + 1;
                var mnogit = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var all_mnogit = Number.parseInt(mnogit) + Number.parseInt(number_of_product.replace(/\s/g,''));
                
                //number_of_product
                if(all_mnogit > int_max_quantity){
                    ind = ind - Number.parseInt(mnogit) + int_max_quantity;
                    mnogit = int_max_quantity + ' x';
                    
                }
                else{
                    mnogit = all_mnogit +  ' x';
                    ind = ind + Number.parseInt(number_of_product.replace(/\s/g,''));
                }
                var price_old = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var int_price_old = Number.parseInt(price_old.replace(/\s/g,''));
                var price_read = Number.parseInt(price.replace(/\s/g,''));
                var new_price = String(price_read + int_price_old);

                var size = new_price.toString().length;
                if(size < 4){
                    result_price = new_price + ' руб';
                }
                else if(size > 3 && size < 6){
                    result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(size%3, size) + ' руб';
                }
                else if(size == 6)
                {
                    result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(3, size) + ' руб';
                }
                else if(size == 7)
                {
                    result_price = new_price.substring(0, size - 6) + ' ' + new_price.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
                }
                else{
                    result_price = new_price + ' руб';
                }
                //var 
                //mnogit = Number.parseInt(mnogit) + 1 + ' x';
                //mnogit = Number.parseInt(mnogit) + Number.parseInt(number_of_product.replace(/\s/g,'')) +  ' x';

                //$(this).find('.cart-img-content').find('span').find('strong:first').next().text(result_price);
                $(this).find('.cart-img-content').find('span').find('strong:first').text(mnogit);

            }   
            var multiplier = $(this).find('.cart-img-content').find('span').find('strong:first').text();
            var price_each = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
            if(multiplier != null && price_each != null){
                sum = sum + (Number.parseInt(multiplier.replace(/\s/g,'')) * Number.parseInt(price_each.replace(/\s/g,'')));
            }

        });

       var search_product = $.inArray(name_product, arr);
       if(search_product != -1)
       {
           //console.log('ура нашлось');
       }
       else{
           
           sum = sum +  Number.parseInt(price.replace(/\s/g,'')) * number_of_product;
            //console.log(sum);
            //ind = ind + 1;
            ind = ind + Number.parseInt(number_of_product.replace(/\s/g,''));
            number_of_product = number_of_product + ' x';
           //перезаписываем модуль (блок продукта для корзины)
            clone_module_product.find('.cart-img-photo').find('a').attr('href', link);
            clone_module_product.find('.cart-img-photo').find('a').find('img').attr('src',img_path);
            clone_module_product.find('.cart-img-content').find('a').attr('href',link);
            clone_module_product.find('.cart-img-content').find('a').find('h4').text(name_product);
            clone_module_product.find('.cart-img-content').find('span').find('.text-right').text(number_of_product);
                
            clone_module_product.find('.cart-img-content').find('span').find('.cart-price').text(price);
            clone_module_product.find('.pro-del').find('a').attr('href', link);
             //находим корзину и вставляем изменённый модуль
            clone_module_product.appendTo('.cart_past');
            
       }

        var result_price;
        var size = sum.toString().length;
        sum = String(sum);
        console.log(size+'size');
        if(size < 4){
            result_price = sum + ' руб';
        }
        else if(size > 3 && size < 6){
            result_price = sum.substring(0, size - 3) + ' ' + sum.substring(size%3, size) + ' руб';
        }
        else if(size == 6)
        {
            result_price = sum.substring(0, size - 3) + ' ' + sum.substring(3, size) + ' руб';
        }
        else if(size == 7)
        {
            result_price = sum.substring(0, size - 6) + ' ' + sum.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
        }
        else{
            result_price = sum + ' руб';
        }
        $('.amount').text(result_price);
        $('.cart-item').text(ind);

    //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = [];
        $(".cart-img-details").each(function(index){
        //$(".cart_past").find('.cart-img-details').each(function(index){
            if( index == 0 )
            {
                var quantity = $('.cart-item').text();
                arr[index] = quantity;
            }
            else{
                var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var link_product = $(this).find('.cart-img-photo').find('a').attr('href');

                arr[index] =[name_model,quantity, photo,price_model,link_product ] ;

            }

            i = index;
        });
        arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/cart',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success:function(data){
                alert(data);
                console.log(data);
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');

            }
        });
    //ajax-запрос-конец

        })
      
      //функция изменяет кол-во товара в корзине на страницы с оформлением товара 
      $(".checkout-add-cart").on("click", function(){
        //console.log('sdsds');
        //копируем нужный модуль, в который будем вставлять свой продукт
        var clone_module_product = $('.cart-img-details:first').clone(true);
        //alert('session');
        //читаем данные из кликнутого продукта
        //var product_img = $(this).closest(".modal-product");
        var img_path = $(this).closest('tr').find('.img-thumbnail').attr('src');
        var link = $(this).closest('tr').find('.text-center').find('a').attr('href');

        //var model = $(this).closest(".single-product").find(".product-description");
        var name_product = $(this).closest('tr').find('text-left:first').find('a').text();
        var price = $(this).closest('tr').find('.text-right').text();
        
        var number_of_product = $('.quantity-product').val();
        
        //console.log(img_path);
        //console.log(link);
        //console.log('img_path');
        //var p = $(this).closest(".modal-product").find('.images').find('img').attr('src');
        //console.log(number_of_product);
        //console.log('img_path');
        
        //проверяем нашу корзину на наличие одинаковых продуктов с выбранным
        var arr = [];
        var ind = 0;
        var sum = 0;

        $(".cart-img-details").each(function(index){
            var data = $(this).find('.cart-img-content').find('a').find('h4').text();
            var itr = $(this).find('.cart-img-content').find('span').find('strong:first').text();
            //console.log(data);
            
            arr[index] = data;
            ind = ind + Number.parseInt(itr.replace(/\s/g,''));

            if( data == name_product )
            {
                //search_product = -1;
                ind = ind + 1;
                var mnogit = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var price_old = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var int_price_old = Number.parseInt(price_old.replace(/\s/g,''));
                var price_read = Number.parseInt(price.replace(/\s/g,''));
                var new_price = String(price_read + int_price_old);

                var size = new_price.toString().length;
                if(size < 4){
                    result_price = new_price + ' руб';
                }
                else if(size > 3 && size < 6){
                    result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(size%3, size) + ' руб';
                }
                else if(size == 6)
                {
                    result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(3, size) + ' руб';
                }
                else if(size == 7)
                {
                    result_price = new_price.substring(0, size - 6) + ' ' + new_price.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
                }
                else{
                    result_price = new_price + ' руб';
                }
                //var 
                mnogit = Number.parseInt(mnogit) + 1 + ' x';

                //$(this).find('.cart-img-content').find('span').find('strong:first').next().text(result_price);
                $(this).find('.cart-img-content').find('span').find('strong:first').text(mnogit);

            }   
            var multiplier = $(this).find('.cart-img-content').find('span').find('strong:first').text();
            var price_each = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
            if(multiplier != null && price_each != null){
                sum = sum + (Number.parseInt(multiplier.replace(/\s/g,'')) * Number.parseInt(price_each.replace(/\s/g,'')));
            }

        });

       var search_product = $.inArray(name_product, arr);
       if(search_product != -1)
       {
           //console.log('ура нашлось');
       }
       else{
           
           sum = sum +  Number.parseInt(price.replace(/\s/g,'')) * number_of_product;
            //console.log(sum);
            //ind = ind + 1;
            ind = ind + Number.parseInt(number_of_product.replace(/\s/g,''));
            number_of_product = number_of_product + ' x';
           //перезаписываем модуль (блок продукта для корзины)
            clone_module_product.find('.cart-img-photo').find('a').attr('href', link);
            clone_module_product.find('.cart-img-photo').find('a').find('img').attr('src',img_path);
            clone_module_product.find('.cart-img-content').find('a').attr('href',link);
            clone_module_product.find('.cart-img-content').find('a').find('h4').text(name_product);
            clone_module_product.find('.cart-img-content').find('span').find('.text-right').text(number_of_product);
                
            clone_module_product.find('.cart-img-content').find('span').find('.cart-price').text(price);
            clone_module_product.find('.pro-del').find('a').attr('href', link);
             //находим корзину и вставляем изменённый модуль
            clone_module_product.appendTo('.cart_past');

            
           
       }

        var result_price;
        var size = sum.toString().length;
        sum = String(sum);
        console.log(size+'size');
        if(size < 4){
            result_price = sum + ' руб';
        }
        else if(size > 3 && size < 6){
            result_price = sum.substring(0, size - 3) + ' ' + sum.substring(size%3, size) + ' руб';
        }
        else if(size == 6)
        {
            result_price = sum.substring(0, size - 3) + ' ' + sum.substring(3, size) + ' руб';
        }
        else if(size == 7)
        {
            result_price = sum.substring(0, size - 6) + ' ' + sum.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
        }
        else{
            result_price = sum + ' руб';
        }
        $('.amount').text(result_price);
        $('.cart-item').text(ind);

    //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = [];
        $(".cart-img-details").each(function(index){
        //$(".cart_past").find('.cart-img-details').each(function(index){
            if( index == 0 )
            {
                var quantity = $('.cart-item').text();
                arr[index] = quantity;
            }
            else{
                var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var link_product = $(this).find('.cart-img-photo').find('a').attr('href');

                arr[index] =[name_model,quantity, photo,price_model,link_product ] ;

            }

            i = index;
        });
        arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/cart',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success:function(data){
                alert(data);
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');

            }
        });
    //ajax-запрос-конец

        })
      
      
      //Функция добавляет товар из страницы с описанием товара в список избранных
      $(".toch-wishlist").on("click", function(){
          
        //читаем параметры продукта 
        
        //----
        var img_path = $('.toch-photo').find('a').find('img').attr('src');
        var link = $('.link_description_product').text();

        //var model = $(this).closest(".single-product").find(".product-description");
        var name_product = $('.title-product').text();
        var price = $('.current-price').text();
        var price_old = $('.price-old').text();
        
        var number_of_product = $('.quantity-product').val();
        //----
        
        //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = []; var prod_create_del = 2;
        arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];
        /*
        $(".cart-img-details").each(function(index){
        //$(".cart_past").find('.cart-img-details').each(function(index){
            if( index == 0 )
            {
                var quantity = $('.cart-item').text();
                arr[index] = quantity;
            }
            else{
                var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                var link_product = $(this).find('.cart-img-photo').find('a').attr('href');

                arr[index] =[name_model,quantity, photo,price_model,link_product ] ;

            }

            i = index;
        });
        */
       
        //arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/wishlist',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success: function(data){
                //alert(data);
                if(!$('.link').find('.fa-heart-o').hasClass('act_wish'))
                {
                    $('.link').find('.fa-heart-o').addClass('act_wish');
                    
                }
                $('.link').find('.fa-heart-o').next().text('Желаемые товары ('+data+')');
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');
                console.log(arr);

            }
        });
        //ajax-запрос-конец
          
      });
      
      //Функция добавляет товар в список избранных
      $(".m-heart-o").on("click", function(){
          
        //читаем параметры продукта 
        
        var product_img = $(this).closest(".single-product").find(".product-img");
        var img_path = product_img.find('.primary-img').attr('src');
        var link = product_img.find('a').attr('href');
            
        var model = $(this).closest(".single-product").find(".product-description");
        var name_product = model.find('h5').find('a').text();
        var price = model.find('.price').text();
        var price_old = model.find('.old-price').text();
        var number_of_product = $(this).closest('.product-action').prev().find('.number-of-products').text();
        
        //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = []; var prod_create_del = 2;
        arr[i] = [img_path, link, name_product, price, price_old, prod_create_del, number_of_product];
        
        //конец данные для ajax-запроса
        
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/wishlist',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success: function(data){
                //alert(data);
                if(!$('.link').find('.fa-heart-o').hasClass('act_wish'))
                {
                    $('.link').find('.fa-heart-o').addClass('act_wish');
                    
                }
                $('.link').find('.fa-heart-o').next().text('Желаемые товары ('+data+')');
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');
                console.log(arr);

            }
        });
        //ajax-запрос-конец
          
      });
      
      
      //Функция добавляет продукты в корзину из желаемых продуктов (страница со списком желаний)
      $(".wish_copy").on("click", function(){
           
            //копируем нужный модуль, в который будем вставлять свой продукт
            var clone_module_product = $('.cart-img-details:first').clone(true);
           
            //читаем данные из кликнутого продукта
            var product_img = $(this).closest("tr");
            var img_path = product_img.find('.text-center').find('img').attr('src');
            var link = product_img.find('.text-center').find('a').attr('href');
            
            var name_product = product_img.find('.text-left').find('a').text();
            var price = product_img.find('.text-right:first').find('.price').text();
            var number_of_product = 1;
            var max_quantity = product_img.find('.text-right:first').next().text();
            var int_max_quantity = Number.parseInt(max_quantity.replace(/\s/g,''));
                
            //проверяем нашу корзину на наличие одинаковых продуктов с выбранным
            var arr = [];
            var ind = 0;
            var sum = 0;
            
            $(".cart-img-details").each(function(index){
                var data = $(this).find('.cart-img-content').find('a').find('h4').text();
                var itr = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                console.log(data);
                arr[index] = data;
                ind = ind + Number.parseInt(itr.replace(/\s/g,''));
                
                if( data == name_product )
                {
                    //search_product = -1;
                    //ind = ind + 1;
                    var mnogit = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                    var all_mnogit = Number.parseInt(mnogit) + number_of_product;
                    
                    //number_of_product
                    
                    if(all_mnogit > int_max_quantity){
                        ind = ind - Number.parseInt(mnogit) + int_max_quantity;
                        mnogit = int_max_quantity + ' x';

                    }
                    else{
                        mnogit = all_mnogit +  ' x';
                        ind = ind + 1;
                    }
                    
                    var price_old = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                    var int_price_old = Number.parseInt(price_old.replace(/\s/g,''));
                    var price_read = Number.parseInt(price.replace(/\s/g,''));
                    var new_price = String(price_read + int_price_old);
                    
                    var size = new_price.toString().length;
                    if(size < 4){
                        result_price = new_price + ' руб';
                    }
                    else if(size > 3 && size < 6){
                        result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(size%3, size) + ' руб';
                    }
                    else if(size == 6)
                    {
                        result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(3, size) + ' руб';
                    }
                    else if(size == 7)
                    {
                        result_price = new_price.substring(0, size - 6) + ' ' + new_price.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
                    }
                    else{
                        result_price = new_price + ' руб';
                    }
                    //var 
                    //mnogit = Number.parseInt(mnogit) + 1 + ' x';
                    
                    //$(this).find('.cart-img-content').find('span').find('strong:first').next().text(result_price);
                    $(this).find('.cart-img-content').find('span').find('strong:first').text(mnogit);
                    
                }   
                var multiplier = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var price_each = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                if(multiplier != null && price_each != null){
                    sum = sum + (Number.parseInt(multiplier.replace(/\s/g,'')) * Number.parseInt(price_each.replace(/\s/g,'')));
                }
                
            });
            
           var search_product = $.inArray(name_product, arr);
           if(search_product != -1)
           {
               //console.log('ура нашлось');
           }
           else{
               //перезаписываем модуль (блок продукта для корзины)
                clone_module_product.find('.cart-img-photo').find('a').attr('href', link);
                clone_module_product.find('.cart-img-photo').find('a').find('img').attr('src',img_path);
                clone_module_product.find('.cart-img-content').find('a').attr('href',link);
                clone_module_product.find('.cart-img-content').find('a').find('h4').text(name_product);
                number_of_product = number_of_product + ' x';
                clone_module_product.find('.cart-img-content').find('span').find('.text-right').text(number_of_product);    
                clone_module_product.find('.cart-img-content').find('span').find('.cart-price').text(price);
                clone_module_product.find('.pro-del').find('a').attr('href', link);
                clone_module_product.find('.number_of_product_cart').text(int_max_quantity);
                 //находим корзину и вставляем изменённый модуль
                clone_module_product.appendTo('.cart_past');
                
                sum = sum +  Number.parseInt(price.replace(/\s/g,''));
                console.log(sum);
                ind = ind + 1; 
           }
           
            var result_price;
            var size = sum.toString().length;
            sum = String(sum);
            console.log(size + 'size');
            if(size < 4){
                result_price = sum + ' руб';
            }
            else if(size > 3 && size < 6){
                result_price = sum.substring(0, size - 3) + ' ' + sum.substring(size%3, size) + ' руб';
            }
            else if(size == 6)
            {
                result_price = sum.substring(0, size - 3) + ' ' + sum.substring(3, size) + ' руб';
            }
            else if(size == 7)
            {
                result_price = sum.substring(0, size - 6) + ' ' + sum.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
            }
            else{
                result_price = sum + ' руб';
            }
            $('.amount').text(result_price);
            $('.cart-item').text(ind);
            
        //ajax-запрос
            //данные для ajax-запроса
            var i = 0;var arr = [];
            $(".cart-img-details").each(function(index){
            //$(".cart_past").find('.cart-img-details').each(function(index){
                if( index == 0 )
                {
                    var quantity = $('.cart-item').text();
                    arr[index] = quantity;
                }
                else{
                    var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                    var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                    var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                    var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                    var link_product = $(this).find('.cart-img-photo').find('a').attr('href');
                    var max_number_of_product_cart = $(this).find('.number_of_product_cart').text();
                    arr[index] =[name_model, quantity, photo, price_model, link_product, max_number_of_product_cart ] ;
               
                }
                
                i = index;
            });
            arr[i+1] = $('.amount').text();
            //конец данные для ajax-запроса
            var token = $('meta[name="csrf-token"]:first').attr("content");

            $.ajax({
                
                type: 'post',
                url: 'index.php?r=electronics/cart',
                dataType:'json',
                data: {_csrf: token, data:arr},
                //"param="+JSON.stringify(ob),
                success:function(data){
                    alert(data);
                },
                error: function(){
                    alert(JSON.stringify({param:token}));
                    //alert('error');
                    
                }
            });
        //ajax-запрос-конец
        
        })
      
      //Функция удаляет продукты из страницы избранных продуктов
      $(".wish_delet").on('click', function(){
        //копируем нужный модуль, в который будем вставлять свой продукт

            //читаем данные из кликнутого продукта
            var product_img = $(this).closest("tr");
            var img_path = product_img.find('.text-center').find('img').attr('src');
            var link = product_img.find('.text-center').find('a').attr('href');
            
            var name_product = product_img.find('.text-left').find('a').text();
            var price = product_img.find('.text-right:first').find('.price').text();
            var price_old = product_img.find('.text-right:first').find('.old-price').text();
            var number_of_product = 1;
            
        //ajax-запрос
            //данные для ajax-запроса
            var i = 0;var arr = []; var prod_create_del = 1;
            arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];
            //конец данные для ajax-запроса
            var token = $('meta[name="csrf-token"]:first').attr("content");

            $.ajax({
                
                type: 'post',
                url: 'index.php?r=electronics/wishlist',
                dataType: 'json',
                data: {_csrf: token, data:arr},
                //"param="+JSON.stringify(ob),
                success:function(data){
                    //alert(data);
                    if(data > 0)
                    {
                        
                        //$('.link').find('.fa-heart').addClass('act_wish');
                        $('.link').find('.fa-heart-o').next().text('Желаемые товары ('+data+')');
                    }
                    else{
                        $('.link').find('.fa-heart-o').removeClass('act_wish');
                        $('.link').find('.fa-heart-o').next().text('Желаемые товары ('+0+')');
                    }
                    
                    product_img.remove();
                },
                error: function(){
                    alert(JSON.stringify({param:token}));
                    //alert('error');
                    
                }
            });
        //ajax-запрос-конец
        
      });
      
      
      //функция добавляет товары в сессию для сравнения
      $(".compare_product").on('click', function(){
          //читаем параметры продукта 
        
        var product_img = $(this).closest(".single-product").find(".product-img");
        var img_path = product_img.find('.primary-img').attr('src');
        var link = product_img.find('a').attr('href');
            
        var model = $(this).closest(".single-product").find(".product-description");
        var name_product = model.find('h5').find('a').text();
        var price = model.find('.price').text();
        var price_old = model.find('.old-price').text();
        var number_of_product = 1;
        
        //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = []; var prod_create_del = 2;
        arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];
        
       
        //arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/compare',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success: function(data2){
                //alert(data);
                //var data_on = data2;
                var count =  data2; //Number.parseInt(data_on.replace(/\s/g,''));
                console.log(data2);
                if(count > 0){
                    if(!$('.link').find('.compare_main').hasClass('act_compare'))
                    {
                        $('.link').find('.compare_main').addClass('act_compare');

                    }
                    

                    $('.link').find('.compare_main').next().text(data2);
                }
                else{
                    $('.link').find('.compare_main').next().text("");
                    $('.link').find('.compare_main').removeClass('act_compare');
                }
                
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');
                console.log(arr);

            }
        });
        //ajax-запрос-конец
          
      });
      
      //функция добавляет товары из страницы с описанием товара в сессию, для сравнения
      $(".toch-compare").on('click', function(){
          //читаем параметры продукта 
        
        //----
        var img_path = $('.toch-photo').find('a').find('img').attr('src');
        var link = $('.link_description_product').text();

        //var model = $(this).closest(".single-product").find(".product-description");
        var name_product = $('.title-product').text();
        var price = $('.current-price').text();
        var price_old = $('.price-old').text();
        var number_of_product = 1;
        //var number_of_product = $('.quantity-product').val();
        //----
        
        
        //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = []; var prod_create_del = 2;
        arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];
        
       
        //arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/compare',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success: function(data2){
                //alert(data);
                //var data_on = data2;
                var count =  data2; //Number.parseInt(data_on.replace(/\s/g,''));
                console.log(data2);
                if(count > 0){
                    if(!$('.link').find('.compare_main').hasClass('act_compare'))
                    {
                        $('.link').find('.compare_main').addClass('act_compare');

                    }
                    

                    $('.link').find('.compare_main').next().text(data2);
                }
                else{
                    $('.link').find('.compare_main').next().text("");
                    $('.link').find('.compare_main').removeClass('act_compare');
                }
                
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');
                console.log(arr);

            }
        });
        //ajax-запрос-конец
          
      });
      
      
     //Функция добавляет товар в сессию для корзины из списка сравнения 
      $('.compare_add').on('click', function(){
        
        //копируем нужный модуль, в который будем вставлять свой продукт
        var clone_module_product = $('.cart-img-details:first').clone(true);

        //читаем параметры продукта 
        
        var product_img = $(this).closest("tr");
        var img_path = product_img.find('.photo_comp').attr('src');
        var link = product_img.find('.link_comp').attr('href');

        var name_product = product_img.find('.name_comp').text();
        var price = product_img.find('.price_comp').text();
                //var price_old = product_img.find('.price_old_comp').text();
        var number_of_product = 1;
        
        //количество продуктов в базе данных
        var max_quantity = product_img.find('.number_product').text();
        var int_max_quantity =  Number.parseInt(max_quantity.replace(/\s/g,''));
                
        //проверяем нашу корзину на наличие одинаковых продуктов с выбранным
        var arr = [];
        var ind = 0;
        var sum = 0;
            
            $(".cart-img-details").each(function(index){
                var data = $(this).find('.cart-img-content').find('a').find('h4').text();
                var itr = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                console.log(data);
                arr[index] = data;
                ind = ind + Number.parseInt(itr.replace(/\s/g,''));
                
                if( data == name_product )
                {
                    //search_product = -1;
                    //ind = ind + 1;
                    var mnogit = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                    
                    var all_mnogit = Number.parseInt(mnogit) + number_of_product;
                    
                    //number_of_product
                    
                    
                    if(all_mnogit > int_max_quantity){
                        ind = ind - Number.parseInt(mnogit) + int_max_quantity;
                        mnogit = int_max_quantity + ' x';

                    }
                    else{
                        mnogit = all_mnogit +  ' x';
                        ind = ind + 1;
                    }
                    
                    var price_old = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                    var int_price_old = Number.parseInt(price_old.replace(/\s/g,''));
                    var price_read = Number.parseInt(price.replace(/\s/g,''));
                    var new_price = String(price_read + int_price_old);
                    
                    var size = new_price.toString().length;
                    if(size < 4){
                        result_price = new_price + ' руб';
                    }
                    else if(size > 3 && size < 6){
                        result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(size%3, size) + ' руб';
                    }
                    else if(size == 6)
                    {
                        result_price = new_price.substring(0, size - 3) + ' ' + new_price.substring(3, size) + ' руб';
                    }
                    else if(size == 7)
                    {
                        result_price = new_price.substring(0, size - 6) + ' ' + new_price.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
                    }
                    else{
                        result_price = new_price + ' руб';
                    }
                    //var 
                    //mnogit = Number.parseInt(mnogit) + 1 + ' x';
                    
                    //$(this).find('.cart-img-content').find('span').find('strong:first').next().text(result_price);
                    $(this).find('.cart-img-content').find('span').find('strong:first').text(mnogit);
                    
                }   
                var multiplier = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                var price_each = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                if(multiplier != null && price_each != null){
                    sum = sum + (Number.parseInt(multiplier.replace(/\s/g,'')) * Number.parseInt(price_each.replace(/\s/g,'')));
                }
                
            });
            
           var search_product = $.inArray(name_product, arr);
           if(search_product != -1)
           {
               //console.log('ура нашлось');
           }
           else{
               //перезаписываем модуль (блок продукта для корзины)
                clone_module_product.find('.cart-img-photo').find('a').attr('href', link);
                clone_module_product.find('.cart-img-photo').find('a').find('img').attr('src',img_path);
                clone_module_product.find('.cart-img-content').find('a').attr('href',link);
                clone_module_product.find('.cart-img-content').find('a').find('h4').text(name_product);
                number_of_product = number_of_product+'x';
                clone_module_product.find('.cart-img-content').find('span').find('.text-right').text(number_of_product);    
                clone_module_product.find('.cart-img-content').find('span').find('.cart-price').text(price);
                clone_module_product.find('.pro-del').find('a').attr('href', link);
                clone_module_product.find('.number_of_product_cart').text(int_max_quantity);
                
                 //находим корзину и вставляем изменённый модуль
                clone_module_product.appendTo('.cart_past');
                
                sum = sum +  Number.parseInt(price.replace(/\s/g,''));
                //console.log(sum);
                ind = ind + 1; 
           }
           
            var result_price;
            var size = sum.toString().length;
            sum = String(sum);
            console.log(size+'size');
            if(size < 4){
                result_price = sum + ' руб';
            }
            else if(size > 3 && size < 6){
                result_price = sum.substring(0, size - 3) + ' ' + sum.substring(size%3, size) + ' руб';
            }
            else if(size == 6)
            {
                result_price = sum.substring(0, size - 3) + ' ' + sum.substring(3, size) + ' руб';
            }
            else if(size == 7)
            {
                result_price = sum.substring(0, size - 6) + ' ' + sum.substring(1, size - 3) + ' ' + new_price.substring(4, size) + ' руб';
            }
            else{
                result_price = sum + ' руб';
            }
            $('.amount').text(result_price);
            $('.cart-item').text(ind);
            
        //ajax-запрос
            //данные для ajax-запроса
            var i = 0;var arr = [];
            $(".cart-img-details").each(function(index){
            //$(".cart_past").find('.cart-img-details').each(function(index){
                if( index == 0 )
                {
                    var quantity = $('.cart-item').text();
                    arr[index] = quantity;
                }
                else{
                    var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                    var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                    var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                    var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                    var link_product = $(this).find('.cart-img-photo').find('a').attr('href');
                    var max_number_of_product_cart = $(this).find('.number_of_product_cart').text();
                    
                    arr[index] =[name_model, quantity, photo, price_model, link_product, max_number_of_product_cart ] ;
               
                }
                
                i = index;
            });
            arr[i+1] = $('.amount').text();
            //конец данные для ajax-запроса
            var token = $('meta[name="csrf-token"]:first').attr("content");

            $.ajax({
                
                type: 'post',
                url: 'index.php?r=electronics/cart',
                dataType:'json',
                data: {_csrf: token, data:arr},
                //"param="+JSON.stringify(ob),
                success:function(data){
                    alert(data);
                },
                error: function(){
                    alert(JSON.stringify({param:token}));
                    //alert('error');
                    
                }
            });
        //ajax-запрос-конец
        
        
      });
     
      //функция удаляет товар из сессии для сравнения
      $('.compare_delet').on('click', function(){
          
        //читаем параметры продукта 
        
        var product_img = $(this).closest("tr");
        var img_path = product_img.find('.photo_comp').attr('src');
        var link = product_img.find('.link_comp').attr('href');

        var name_product = product_img.find('.name_comp').text();
        var price = product_img.find('.price_comp').text();
        var price_old = '10 000 руб'; //product_img.find('.price_old_comp').text();
        var number_of_product = 1;  
          
        //--
        //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = []; var prod_create_del = 2;
         arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];

        //arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/compare',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success: function(data2){
                //alert(data);
                //var data_on = data2;
                var count =  data2; //Number.parseInt(data_on.replace(/\s/g,''));
                console.log(data2);
                if(count > 0){
                    if(!$('.link').find('.compare_main').hasClass('act_compare'))
                    {
                        $('.link').find('.compare_main').addClass('act_compare');

                    }
                    

                    $('.link').find('.compare_main').next().text(data2);
                    
                }
                else{
                    $('.link').find('.compare_main').next().text("");
                    $('.link').find('.compare_main').removeClass('act_compare');
                }
                product_img.remove();
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');
                console.log(arr);

            }
        });
        //ajax-запрос-конец
        //--
          
          
      });
      
      //функция удаляет все товары из списка сравнения 
      $('.clear_compare_all').on('click', function(){
          
          //--
        //ajax-запрос
        //данные для ajax-запроса
        var i = 0;var arr = []; var prod_create_del = 3;
        var img_path = 0; var link = 0; var name_product = 0; var price = 0;
        var price_old = 0; 
        arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];
        
        //arr[i+1] = $('.amount').text();
        //конец данные для ajax-запроса
        
        var token = $('meta[name="csrf-token"]:first').attr("content");

        $.ajax({

            type: 'post',
            url: 'index.php?r=electronics/compare',
            dataType:'json',
            data: {_csrf: token, data:arr},
            //"param="+JSON.stringify(ob),
            success: function(){
                
                //var count =  data2; //Number.parseInt(data_on.replace(/\s/g,''));
                //console.log(data2);
                
                $('.link').find('.compare_main').next().text("");
                $('.link').find('.compare_main').removeClass('act_compare');
               
                $('.table-responsive').remove();
                
            },
            error: function(){
                alert(JSON.stringify({param:token}));
                //alert('error');
                console.log(arr);

            }
        });
        //ajax-запрос-конец
        //--
          
      });
      
      //Функция удаляет сообщение flash message
      $('.close-np').on('click', function(){
          alert('hello');
         $(this).closest('.alert').remove(); 
      });
      
      //функция удаляет продукт из базы данных и из сессии
      $('.wish_delete_db').on('click', function(){
        //копируем нужный модуль, в который будем вставлять свой продукт

            //читаем данные из кликнутого продукта
            var product_img = $(this).closest("tr");
            var img_path = product_img.find('.text-center').find('img').attr('src');
            var link = product_img.find('.text-center').find('a').attr('href');
            
            var name_product = product_img.find('.text-left').find('a').text();
            var price = product_img.find('.text-right:first').find('.price').text();
            var price_old = product_img.find('.text-right:first').find('.old-price').text();
            var number_of_product = 1;
            
        //ajax-запрос
            //данные для ajax-запроса
            var i = 0;var arr = []; var prod_create_del = 3;
            arr[i] = [img_path, link, name_product, price, price_old, prod_create_del];
            //конец данные для ajax-запроса
            var token = $('meta[name="csrf-token"]:first').attr("content");

            $.ajax({
                
                type: 'post',
                url: 'index.php?r=user/default/wishlist',
                dataType: 'json',
                data: {_csrf: token, data:arr},
                //"param="+JSON.stringify(ob),
                success:function(data){
                    //alert(data);
                    
                    if(data > 0)
                    {
                        
                        //$('.link').find('.fa-heart').addClass('act_wish');
                        $('.link').find('.fa-heart').next().text('Желаемые товары ('+data+')');
                    }
                    else{
                        $('.link').find('.fa-heart').removeClass('act_wish');
                        $('.link').find('.fa-heart').next().text('Желаемые товары ('+0+')');
                    }
                    
                    product_img.remove();
                },
                error: function(){
                    alert(JSON.stringify({param:token}));
                    //alert('error');
                    
                }
            });
        //ajax-запрос-конец
      });
      
      //Функция для комментариев
      $(".comment_button").on('click', function(){
          var review = $(this).closest('.review-message');
          var comment_name = review.find('#comment-name').val();
          var comment_text = review.find('#comment-text').val();
          review.find('#comment-text').val('');//очищаем строку в форме
          var comment_star = $('input[type="radio"]:checked').val();

          var comment_date = review.find('#comment-date').val();
          var comment_id_product = review.find('#comment-id_product').val();
          var comment_category = review.find('#comment-category').val();
          //клонируют блок для сообщенияя
          var clone_message_1_tr = $('.copy_form').find('tr:first').clone(); 
          var clone_message_2_tr = $('.copy_form').find('tr:first').next().clone();
          
          //заменяем блок для сообщения информацией
          clone_message_1_tr.find('td:first').find('strong').text(comment_name);
          clone_message_1_tr.find('.text-right').find('strong').text(comment_date);
          
          clone_message_2_tr.find('p').text(comment_text);
          if(comment_star == 1)
          {
              clone_message_2_tr.find('span').removeClass('search_span_1');
          }
          else if(comment_star == 2)
          {
              clone_message_2_tr.find('span').removeClass('search_span_2');
          }
          else if(comment_star == 3)
          {
              clone_message_2_tr.find('span').removeClass('search_span_3');
          }
          else if(comment_star == 4)
          {
              clone_message_2_tr.find('span').removeClass('search_span_4');
          }
          else if(comment_star == 5)
          {
              clone_message_2_tr.find('span').removeClass('search_span_5');
          }
          else
          {
              clone_message_2_tr.find('span').removeClass('search_span_0');
          }
          
          
          //вставляем изменённый блок на страницу
          clone_message_2_tr.prependTo($('.insert_message'));
          clone_message_1_tr.prependTo($('.insert_message'));
          //ajax-запрос
            //данные для ajax-запроса
            var arr = [comment_name, comment_text, comment_star, comment_date,
            comment_id_product, comment_category];
            //конец данные для ajax-запроса
            
            
            var token = $('meta[name="csrf-token"]:first').attr("content");

            $.ajax({
                
                type: 'post',
                url: 'index.php?r=electronics/product-details',
                dataType:'json',
                data: {_csrf: token, data:arr},
                //"param="+JSON.stringify(ob),
                success:function(data1){
                    //alert(data1);
                    //console.log(data1);
                    
                    //изменяем данные модального окна
                    /*
                    var modal_product = $('.modal-product');
                    modal_product.find('.product-images').find('.images').find('img').attr('src', data1['path']);
                    var product_info = modal_product.find('.product-info');
                    product_info.find('h1').text(data1['model_product']);
                    product_info.find('.price-box-3').find('.s-price-box').find('span:first').text(data1['price']);
                    if(data1['old_price']!=null)
                    {
                        product_info.find('.price-box-3').find('.s-price-box').find('.old-price').text(data1['old_price']);
                    }
                    else
                    {
                        product_info.find('.price-box-3').find('.s-price-box').find('.old-price').text('');
                    }
                    product_info.find('.see-all').attr('href',data1['link_description']);
                    
                    modal_product.find('.quick-desc').text(data1['description']);
                    */
                   console.log(data1);
                    
                },
                error: function(){
                    alert(JSON.stringify({param:token}));

                },
                
            });
            return false;
        //ajax-запрос-конец
          
      }); 
      /*
      $('.field-comment-star').on('click', function(){
          //$('.chek').removeClass('chek');
          var value = $('input[type="radio"]:checked').val();
          alert(value);
          
      });
       */
      
      $(".link").mouseover(function(){
        var t = $(this);
        var p = t.closest('td').next().find('.display_price').
               css('display','block');
        console.log(t.closest('td'));
        console.log(p);
      });
      //
      $(".link").mouseout(function(){
        var t = $(this);
        var p = t.closest('td').next().find('.display_price').
               css('display','none');
        //console.log(t.closest('td'));
        //console.log(p);
      });
       //x.closest("td").next().find('.display_price').
       //        css('display','block');
       //x.css({'color':'yellow'});
       //alert('ok');
       //alert($(this).closest("td"));
       $(".delivery-info").on('click',function(){
           $(this).next().slideToggle();
       });
       
                                                                 

            
   });
    
    
    
    
    
});

















