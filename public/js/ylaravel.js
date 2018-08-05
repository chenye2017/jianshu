$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var editor = new wangEditor('content');

if (editor.config) {

    editor.config.uploadImgUrl = '/posts/images/upload';

// 设置 headers（举例）
    editor.config.uploadHeaders = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    };

    editor.create();
}

$('.preview_input').change(function (event) {
    var file = event.currentTarget.files[0];
    var url = window.URL.createObjectURL(file);
    $(event.target).next(".preview_img").attr("src", url);
})


$(".like-button").click(function(event){
    var target = $(event.target);

    var user_id = target.attr("like-user");
    //var _token = target.attr("_token");
    // 已经关注了

        // 取消关注
        $.ajax({
                url: "/user/" + user_id + "/fan",
                method: "POST",
                //data: {"_token": _token},
                dataType: "json",
                success: function(data) {
                    if (data.errCode != 0) {
                        alert(data.errMsg);
                        return;
                    }


                    target.text('取消关注');
                }
            }
        );

});

$(".ulike-button").click(function(event){
    var target = $(event.target)
    var user_id = target.attr("like-user");
    //var _token = target.attr("_token");
    // 已经关注了

        // 取消关注
        $.ajax({
                url: "/user/" + user_id + "/unfan",
                method: "POST",
                //data: {"_token": _token},
                dataType: "json",
                success: function(data) {

                    if (data.errCode != 0) {
                        alert(data.errMsg);
                        return;
                    }


                    target.text("关注");
                }
            }
        );

});




