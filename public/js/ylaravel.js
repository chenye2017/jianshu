var editor = new wangEditor('content');

editor.config.uploadImgUrl = '/posts/images/upload';

// 设置 headers（举例）
editor.config.uploadHeaders = {
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
};

editor.create();