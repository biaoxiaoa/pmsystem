layui.use(['table','form'], function () {
    var table = layui.table;

    /**
     *添加数据 
     */
    $('#addMenu').on('click', function () {
        layer.open({
            title:'菜单添加',
            type:2,
            content:'/menu_add',
            area:['700px','350px'],
        })
    })



})