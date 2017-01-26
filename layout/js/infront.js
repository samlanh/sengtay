function Main(page) {
    $.ajax({
        url: "ajax/fetch.php",
        method: "POST",
        dataType: "text",
        data: {page: page},
        success:function (data) {
            $('#show_default').html(data);
        }
    });
}
/*$("#search_item_id").keyup(function () {
    var valueTextSearch=$(this).val();
    if (valueTextSearch==""){
        console.log("zerro");
        $('#slider').show();
        $('.ddd').hide();
        $('#show_default').show();

    }else {
        console.log(valueTextSearch);

        $('.ddd').show();
        $('#slider').hide();
        $('#show_default').hide();

        $.ajax({
            url: "ajax/search_item.php",
            method: "POST",
            dataType: "text",
            data: {valueTextSearch: valueTextSearch},
            success:function (data) {
                $('.ddd').html(data);
            }
        });
        
      

    }

});*/

Main();
