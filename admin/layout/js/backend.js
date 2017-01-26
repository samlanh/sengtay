/**
 * Created by BUNCHHEANG on 8/29/2016.
 */
$(function (){
    // Confirm message on click button
    $('.confirm').click(function () {
        return confirm("Are you sure ?");
    });
})


$('#menuCreatePost').change(function () {
  var selectChangemenu=$(this).find("option:selected").val();
    console.log(selectChangemenu);

  var dataString='menu_id='+selectChangemenu;


    $.ajax({
        url:"include/ajax/Select_categories.php",
        method:"POST",
        cache:false,
        data:dataString,
        success:function (data) {
            $("#selectCategoriesPost").html(data);
            
            var categ=$(this).val();
            console.log(categ);
        }


    });



});


$("#fileUpload").on('change', function() {
    //Get count of selected files

    countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $(".box_img");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++)
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "viewImagesBrow"
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
    console.log("CountFile"+countFiles+"\n");
});
$('.box_img').click(function () {
    $('#fileUpload').click();
});

$("#uploadslide").on('change', function() {
    countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $(".slide_backend");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++)
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "slide_backend"
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
    console.log("CountFile"+countFiles+"\n");
});
$('.slide_backend').click(function () {
    $('#uploadslide').click();
})



$("#fileUploadCat").on('change', function() {
    countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $(".categoryBannerShowBackend");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++)
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "categoryBannerShowBackend"
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
    console.log("CountFile"+countFiles+"\n");
});
$('.categoryBannerShowBackend').click(function () {
    $('#fileUploadCat').click();
});





$('#positionban').change(function () {

   var valueSelectChange=$(this).find("option:selected").val();
    if (valueSelectChange==0){
        $('.info1').html("Please brow banner image and Position Left or Rith");
    }else if(valueSelectChange==1){
        $('.info1').html("Recommend 410X80");
    }else{
        $('.info1').html("Recommend 600X80");
    }
});
$('.slide_banner').click(function () {
    $('#upload_banner').click();
});
$("#upload_banner").on('change', function() {
    countFiles = $(this)[0].files.length;
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $(".slide_banner");
    image_holder.empty();
    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {
            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++)
            {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "slide_banner"
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }
        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
    }
    console.log("CountFile"+countFiles+"\n");
});