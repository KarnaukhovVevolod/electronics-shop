$(function(){
    /* функция добавляет в корзину продукты */
    $(document).ready(function(){
        $(".product-button").on("click", function(){
            
            //копируем нужный модуль, в который будем вставлять свой продукт
            var clone_module_product = $('.cart-img-details:first').clone(true);
           
            //читаем данные из кликнутого продукта
            var product_img = $(this).closest(".single-product").find(".product-img");
            var img_path = product_img.find('.primary-img').attr('src');
            var link = product_img.find('a').attr('href');
            
            var model = $(this).closest(".single-product").find(".product-description");
            var name_product = model.find('h5').find('a').text();
            var price = model.find('.price').text();
            var number_of_product = 1;
            //количество продуктов в базе данных
            var max_quantity = $(this).closest('.single-product').find('.number-of-products').text();
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
                    //console.log(max_number_of_product_cart);
                    //console.log('pippip');
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
    })
    //$cart();
    
    //---------
    /* Функция добавляет в корзину продукты */
    $(document).ready(function(){
        $(".shop_add").on("click", function(){
        
            //копируем нужный модуль, в который будем вставлять свой продукт
            var clone_module_product = $('.cart-img-details:first').clone(true);
           
            //читаем данные из кликнутого продукта
            var product_img = $(this).closest(".single-product").find(".product-img");
            var img_path = product_img.find('.primary-img').attr('src');
            var link = product_img.find('a').attr('href');
            
            var model = $(this).closest(".single-product").find(".product-description");
            var name_product = model.find('h5').find('a').text();
            var price = model.find('.price').text();
            var number_of_product = 1;
                
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
                    ind = ind + 1;
                    var mnogit = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                    var price_old = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                    var int_price_old = Number.parseInt(price_old.replace(/\s/g,''));
                    var price_read = Number.parseInt(price.replace(/\s/g,''));
                    var new_price = String(price_read + int_price_old);
                    
                    var size = new_price.toString().length;
                    
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
               //перезаписываем модуль (блок продукта для корзины)
                clone_module_product.find('.cart-img-photo').find('a').attr('href', link);
                clone_module_product.find('.cart-img-photo').find('a').find('img').attr('src',img_path);
                clone_module_product.find('.cart-img-content').find('a').attr('href',link);
                clone_module_product.find('.cart-img-content').find('a').find('h4').text(name_product);
                number_of_product = number_of_product + 'x';
                clone_module_product.find('.cart-img-content').find('span').find('.text-right').text(number_of_product);    
                clone_module_product.find('.cart-img-content').find('span').find('.cart-price').text(price);
                clone_module_product.find('.pro-del').find('a').attr('href', link);
                 //находим корзину и вставляем изменённый модуль
                clone_module_product.appendTo('.cart_past');
                
                sum = sum +  Number.parseInt(price.replace(/\s/g,''));
                console.log(sum);
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
            console.log('result_price');
            console.log(result_price);
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
            
            
        });
        
    });
    
    //---------
    
    /* Функция удаляет с корзины продукты */
   
    var del_product = function(){ 
        $(".pro-new").on("click", function(){
            console.log('del-product');
            var product_delete = $(this).closest('.cart-img-details');
            var number_of_product = product_delete.find('.cart-img-content').find('span').find('strong:first').text();
            var price_product = product_delete.find('.cart-img-content').find('span').find('strong:first').next().text();
            var name_product = product_delete.find('.cart-img-content').find('a').find('h4').text();
            var quantity_product_del = product_delete.find('.cart-img-content').find('span').find('strong:first').text();
            quantity_product_del = Number.parseInt(quantity_product_del.replace(/\s/g,''))
            var all_price = $('.amount').text();
            var number_of_product_int = Number.parseInt(number_of_product.replace(/\s/g,''));
            var all_product = $('.cart-item').text();
            all_product = Number.parseInt(all_product.replace(/\s/g,'')) - 1;
            if(all_product == 0)
            {
                $('.cart-item').text('');
            }
            else{
                $('.cart-item').text(all_product);
            }
            
            var all_price_product;
            if(number_of_product_int == 1){
                all_price_product = Number.parseInt(price_product.replace(/\s/g,''));
                product_delete.remove();
            }
            else{
                all_price_product = Number.parseInt(price_product.replace(/\s/g,''));
                var number_of_product = number_of_product_int - 1;
                number_of_product = number_of_product + ' x';
                product_delete.find('span').find('strong:first').text(number_of_product);    
            }
            var new_all_price = Number.parseInt(all_price.replace(/\s/g,'')) - all_price_product;
            
            var result_price;
            var size = new_all_price.toString().length;
            var sum = new_all_price;
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
            $('.all_price').text(result_price);
            
        //ajax-запрос
            //данные для ajax-запроса
            var i = 0;var arr = [];
            $(".cart-img-details").each(function(index){
            //$(".cart_past").find('.cart-img-details').each(function(index){
                if( index == 0 )
                {
                    var quantity = $('.cart-item').text();
                    if(quantity == 0)
                    {
                        arr[index]='';
                    }
                    else{
                        arr[index] = quantity;
                    }
                    
                }
                else{
                    var name_model   = $(this).find('.cart-img-content').find('a').find('h4').text();
                    var quantity     = $(this).find('.cart-img-content').find('span').find('strong:first').text();
                    var photo        = $(this).find('.cart-img-photo').find('a').find('img').attr('src');
                    var price_model  = $(this).find('.cart-img-content').find('span').find('strong:first').next().text();
                    var link_product = $(this).find('.cart-img-photo').find('a').attr('href');
                    arr[index] = [name_model,quantity, photo,price_model,link_product] ;
                    
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
        
        //удаляем этот продукт на страницы корзины
        
        $('tr').each(function(){
            var product_del = $(this).find('.text-left:first').find('a').text();
            if( name_product == product_del )
            {
               if(quantity_product_del == 1 && first_1 == 0)
               {
                   $(this).find('tr:first').remove(); 
                   
               }
               else
               {
                    var quant = quantity_product_del - 1;
                    $(this).find('.cart-put').find('input').val(quant);
                    var all_price_single = Number.parseInt(price_product.replace(/\s/g,'')) * quant;
                    
                    var result_price;
                    var size = all_price_single.toString().length;
                    var sum = all_price_single;
                    sum = String(sum);
                    //console.log(size+'size');
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
                    $(this).find('.all-single-price').text(result_price);
                    //console.log('price_product');
                    //console.log(result_price);
                    //console.log('price_product');
                   
               }
               
            }
        });
             
        });
    };
    del_product();
    //---------
    
    //--функция изменяет кол-во товара непосредственно в корзине
    var update_product = function(){
        $('.refresh').on('click', function(){
            //console.log('work');
            
            var quantity = $(this).closest('.cart-buttons').prev().val();
            var price = $(this).closest('.text-left').next().next().text();
            var old_all_price = $(this).closest('.text-left').next().next().next().text();
            old_all_price = Number.parseInt(old_all_price.replace(/\s/g,''));
            
            var single_price = Number.parseInt(price.replace(/\s/g,''));
            var all_price = single_price * quantity;
            
            
            var result_price;
            var size = all_price.toString().length;
            var sum = String(all_price);
   
            //console.log(size+'size');
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
            
            //console.log(quantity);
            
            $(this).closest('.text-left').next().next().next().text(result_price);
            var different_price = all_price - old_all_price;
            
            var total_price = $('.all_price').text();
            total_price = Number.parseInt(total_price.replace(/\s/g,''));
            var all_total_price = total_price + different_price;
            size = all_total_price.toString().length;
            sum = String(all_total_price);
   
            
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
            
            $('.all_price').each(function(){
                $(this).text(result_price);
            });
            //console.log('all_price');
            //console.log(result_price);
            //console.log('all_price');
            
            //записываем данные о продуктах в session
            
            //ajax-запрос
                //данные для ajax-запроса
                var i = 0;var arr = []; var all_quantity = 0;
                $("tr").each(function(index){
                //$(".cart_past").find('.cart-img-details').each(function(index){
                    if( index == 0 )
                    {
                        var quantity_product = $('.cart-item').text();
                        quantity_product = Number.parseInt(quantity_product.replace(/\s/g,''));
                        arr[index] = quantity_product;
                        //console.log(quantity_product);
                    }
                    //else if(index <= quantity_product+1){
                    else{
                        var name_model   = $(this).find('.text-center').next().find('a').text();
                        var quantity     = $(this).find('.text-left:first').next().find('.form-control').val();
                        var photo        = $(this).find('.text-center').find('a').find('img').attr('src');
                        var price_model  = $(this).find('.text-right:first').text();
                        var link_product = $(this).find('.text-center').find('a').attr('href');
                        var max_quantity = $(this).find('.text-right:first').prev().text();
                        //console.log(quantity);
                        
                        if(quantity != null){
                            arr[index] = [name_model,quantity + 'x', photo, price_model, link_product,max_quantity];
                            all_quantity = all_quantity + Number.parseInt(quantity.replace(/\s/g,''));
                            //console.log(all_quantity);
                            //console.log(quantity);
                            i = index;
                            
                            //console.log('price_model');
                            //console.log(price_model);
                            //console.log('price_model');
                        }
                         
                    }

                   
                });
                //var result_price = $('.all_price:first').text();
                arr[i+1] = result_price; //$('.all_price:first').next().text(result_price);
                arr[0] = all_quantity;
                $('.cart-item').text(all_quantity);
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
            
            //изменяем параметры корзины в шапке
        
            var quantity = $(this).closest('.cart-buttons').prev().val();
            var model = $(this).closest('tr').find('.text-left:first').find('a').text();
            
            $('.cart-img-details').each(function(){
                var cart_model = $(this).find('.cart-img-content').find('h4').text();
                if(cart_model == model)
                {
                    $(this).find('.cart-img-content').find('span:first').find('strong:first').text(quantity + ' x');
                    $('.amount').text(result_price);
                }
            });
            
        });
        
    }
    
    update_product();
    
    //-- Функция удаляет товары непосредственно в корзине
    
    var delete_product = function(){
        $('.delete').on('click', function(){
            console.log('удалить');
            
            var all_price_single_product = $(this).closest('.text-left').next().next().next().text();
            var price_single_product = $(this).closest('.text-left').next().next().text();
            var quantity = Number.parseInt(all_price_single_product.replace(/\s/g,'')) / Number.parseInt(price_single_product.replace(/\s/g,'')) ;
            var quantity_all_product = $('.cart-item').text();
            
            var name_model = $(this).closest('.text-left').prev().find('a').text();
            //удаляем из корзины в шапке продукт
            $('.cart-img-details').each(function(){
                var cart_model = $(this).find('.cart-img-content').find('h4').text();
                if(cart_model == name_model)
                {
                    $(this).remove();
                }
            });
            
            var update_quantity_all_product = quantity_all_product - quantity;
            if(update_quantity_all_product == 0)
            {
                $('.cart-item').text('');
            }
            else{
                $('.cart-item').text(update_quantity_all_product);
            }
            
            var all_price_product = $('.all_price').last().text();
            
            var different_all_price = Number.parseInt(all_price_product.replace(/\s/g,'')) - Number.parseInt(all_price_single_product.replace(/\s/g,''));
            //console.log(different_all_price);
            //console.log(quantity);
            
            //конвертируем результат
            var result_price;
            var size = different_all_price.toString().length;
            var sum = different_all_price;
            sum = String(sum);
            //console.log(size+'size');
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
            $('.all_price').text(result_price);
            //перезаписываем результат
            
            //изменяем параметры в шапке корзины
            
            //удаляем из корзины на страничке
            $(this).closest('tr').remove();
            //записываем данные о продуктах в session
            
            //ajax-запрос
                //данные для ajax-запроса
                var i = 0;var arr = []; var all_quantity = 0;
                $("tr").each(function(index){
                //$(".cart_past").find('.cart-img-details').each(function(index){
                    if( index == 0 )
                    {
                        var quantity_product = $('.cart-item').text();
                        quantity_product = Number.parseInt(quantity_product.replace(/\s/g,''));
                        if(quantity_product == 0)
                        {
                            arr[index] = "";
                        }
                        else{
                            arr[index] = quantity_product;
                        }
                        
                        //console.log(quantity_product);
                    }
                    //else if(index <= quantity_product+1){
                    else{
                        var name_model   = $(this).find('.text-center').next().find('a').text();
                        var quantity     = $(this).find('.text-left:first').next().find('.form-control').val();
                        var photo        = $(this).find('.text-center').find('a').find('img').attr('src');
                        var price_model  = $(this).find('.text-right:first').text();
                        var link_product = $(this).find('.text-center').find('a').attr('href');
                        var max_number_of_product = $(this).find('.text-right:first').prev().text();
                        //console.log(quantity);
                        
                        if(quantity != null){
                            arr[index] = [name_model,quantity + 'x', photo, price_model, link_product, max_number_of_product];
                            all_quantity = all_quantity + Number.parseInt(quantity.replace(/\s/g,''));
                            console.log(all_quantity);
                            console.log(quantity);
                            i = index;
                        }
                    }
                });
                //var result_price = $('.all_price:first').text();
                arr[i+1] = result_price;
                if( all_quantity == 0 ){
                    arr[0] = "";
                }else{
                    arr[0] = all_quantity;
                }
                
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
                    }
                });
            //ajax-запрос-конец 
        });
    };
    delete_product();
    
});

