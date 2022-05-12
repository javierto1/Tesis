<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('input').blur(function(){
        var field = $(this);
        var parent = field.parent().attr('id');
        field.css('background-color','#F3F3F3');

        if($('#'+parent).find(".ok").length){
            $('#'+parent+' .ok').remove();
            $('#'+parent+' .loader').remove();
            $('#'+parent).append('<div><img src="images/loader.gif"/></div>').fadeIn('slow');
        }else{
            $('#'+parent).append('<div><img src="images/loader.gif"/></div>').fadeIn('slow');
        }

        var dataString = 'value='+$(this).val()+'&field='+$(this).attr('name');
        $.ajax({
            type: "POST",
            url: "query.php",
            data: dataString,
            success: function(data) {
                field.val(data);
                $('#'+parent+' .loader').fadeOut(function(){
                    $('#'+parent).append('<div><img src="images/ok.png"/></div>').fadeIn('slow');
                });

            }
        });
    });
});
</script>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>