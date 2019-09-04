layui.use(['table','form'], function () {
    var table = layui.table;
    var form = layui.form;
    var showDesk = false;
     //特殊字符正则
     var regEn = /[`~!@#$%^&*()_+<>?:"{},.\/;'[\]]/im,
     regCn = /[·！#￥（——）：；“”‘、，|《。》？、【】[\]]/im;
     var chinese = /^[^\u4e00-\u9fa5]+$/
    form.verify({
        name:function(value,item){
            if(value.length==0){
                return "请输入菜单名称";
            }
            if(regEn.test(value)||regCn.test(value)){
                return "菜单名称中不能包含特殊字符";
            }
            if(value.length>10){
                return "菜单名称不能超过10个字符";
            }
            
        },
        title:function(value,item){
            if(showDesk){
                if(value.length==0){
                    return "请输入窗口名称";
                }
                if(regEn.test(value)||regCn.test(value)){
                    return "窗口名称中不能包含特殊字符";
                }
                if(value.length>10){
                    return "窗口名称不能超过10个字符";
                }
            }
        },
        icon:function(value,item){
            if(value.length==0){
                return "请输入菜单图标名称";
            }
            if(regEn.test(value)||regCn.test(value)){
                return "菜单图标名称中不能包含特殊字符";
            }
            if(!chinese.test(value)){
                return "菜单图标名称中不能包含中文";
            }
            if(value.length>40){
                return "菜单图标名称不能超过40个字符";
            }
        },
        module:function(value,item){
            if(value.length==0){
                return "请输入菜单所属模块";
            }
            if(regEn.test(value)||regCn.test(value)){
                return "模块名称中不能包含特殊字符";
            }
            if(!chinese.test(value)){
                return "模块名称中不能包含中文";
            }
            if(value.length>20){
                return "模块名称不能超过20个字符";
            }
        },
        controller:function(value,item){
            if(value.length==0){
                return "请输入菜单控制器名称";
            }
            if(regEn.test(value)||regCn.test(value)){
                return "控制器名称中不能包含特殊字符";
            }
            if(!chinese.test(value)){
                return "控制器名称中不能包含中文";
            }
            if(value.length>40){
                return "控制器名称不能超过40个字符";
            }
        },
        action:function(value,item){
            if(value.length==0){
                return "请输入方法名称";
            }
            if(regEn.test(value)||regCn.test(value)){
                return "方法名中不能包含特殊字符";
            }
            if(!chinese.test(value)){
                return "方法名中不能包含中文";
            }
            if(value.length>40){
                return "方法名不能超过40个字符";
            }
        },
        pageURL:function(value,item){
            if(value.length>0){
                if(!chinese.test(value)){
                    return "路由地址中不能包含中文";
                }
                if(value.length>100){
                    return "路由地址不能超过100个字符";
                }   
            }
        },
    })
    form.on('switch(deskshow)', function(data){
        var checked = data.elem.checked;
        if(checked){
            $('#title').css('display','block');
            showDesk = true;
        }else{
            $('#title').css('display','none');
            showDesk = false;
        }
    });  
    form.on('submit(menu_edit)',function(data){
        // $.ajax({
        //     type:'post',
        //     url:'/submit_menu_add',
        //     data:data.field,
        //     success:function(response){
        //         if(response.code==2000){
        //             location.reload();
        //             parent.frameElement.contentWindow.layui.table.reload('list')
        //             parent.parent.winui.desktop.init();
        //         }else{
        //             layer.msg(response.msg)
        //         }
        //     },
        //     error:function(error){
        //         console.log(error);
        //     }
        // })
        return false;
    })
    $.ajax({
        url: '/menu_all',
        dataType: 'json',
            //查询状态为正常的所有机构类型
        type: 'get',
        success: function (data) {
           
            $.each(data, function (index, item) {
                $('#parments').append(new Option(item.name, item.id));// 下拉菜单里添加元素
            });
            layui.form.render("select");
        },
        error:function(error){
            layer.msg('上级菜单加载失败！')
        }
    })
})