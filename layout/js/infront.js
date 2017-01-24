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
Main();

