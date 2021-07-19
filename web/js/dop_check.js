$(function(){
    $(document).ready(function(){
       
        $('#managerform-point_delivery').on('change', function(){
            //alert('Изменил');
            var text_drop = $('#managerform-point_delivery :selected').val();
            
            $('.adress-point').each(function(data){
                if($(this).hasClass(text_drop))
                {
                    $(this).css('display','block');
                }
                else
                {
                    $(this).css('display','none');
                }
            });
            
        });
        
        $('#managerform-type_delivery').on('change', function(){
            
            var text_drop = $('#managerform-type_delivery :selected').val();
            if(text_drop == 1)
            {
                $('#address').css('display','block');
                $('#address_point').css('display','none');
                
            }
            
            else if(text_drop == 2)
            {
                $('#address_point').css('display','block');
                $('#address').css('display','none'); 
            }
            
            
            
        });
        $('.close_flash').on('click',function(){
           $(".alert-dismissable").remove(); 
        });
        
    });
})







