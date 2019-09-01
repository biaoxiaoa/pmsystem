function verify_code() {
    $('#captchaImg').attr('src', '/coder');
}
layui.use(['form', 'layer'], function () {
    var form = layui.form;
    var layer = layui.layer;
    var length = new RegExp(/^[\S]{5,20}$/);
    form.verify({
        username:function(value,item){
            var specialCharacters = new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$");//不包含特殊符号返回True
            if(value.length==0){
                return "请输入用户名";
            }
            if (!length.test(value)) {
                return "用户名必须5到20位";
            }
            if (!specialCharacters.test(value)) {
                return "用户名不能输入特殊字符";
            }
        },
        password:function(value,item){
            if(value.length==0){
                return "请输入密码";
            }
            if (!length.test(value)) {
                return "密码必须5到20位";
            }
        },
        vercodes:function(value,item){
            if(value.length==0){
                return "请输入验证码";
            }
            if(value.length!=5){
                return "验证码5个字符";
            }
        }
    })
    form.on('submit(login)', function (data) {
        $.ajax({
            type: 'post',
            url: '/submit_login',
            data: data.field,
            success: function (response) {
                if($('#vercode').val().length>0){
                    verify_code();
                }
                if (response.code != 2000) {
                    layer.open({
                        title: '友情提示',
                        content: response.msg,
                        icon: 2
                    });
                }
            },
            error: function (error) {
                if($('#vercode').val().length>0){
                    verify_code();
                }
                layer.open({
                    title: '友情提示',
                    content: '请求失败',
                    icon: 2
                });
            }
        })
        return false;
    })
});