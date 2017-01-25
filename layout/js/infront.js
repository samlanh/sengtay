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
$("#search_item_id").keyup(function () {
    var valueTextSearch=$(this).val();
    if (valueTextSearch==""){
        $.ajax({
            url: "ajax/fetch.php",
            method: "POST",
            dataType: "text",
            data: {page: page},
            success:function (data) {
                $('#product_full_profile').html(data);
            }
        });
    }else {
        $.ajax({
            url:"ajax/search_item.php",
            method:"POST",
            cache:false,
            data:{valueTextSearch:valueTextSearch},
            success:function (data) {
                $("#product_full_profile").html(data);
                // var valueSub=$("#selectCategoriesPost").val();
                console.log(data);
            }
        });
    }

});

Main();
