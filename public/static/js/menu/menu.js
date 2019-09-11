layui.use(['table','form','layer'], function () {
    var table = layui.table;
    var layer = layui.layer;
    table.render({
        elem: '#list',
        url: '/menu_list',
        page: true,
        cols: [[ //表头
            { type: 'checkbox', fixed: 'left' },
            { field: 'id', title: 'ID', width: 80, sort: true, align: 'center' }
            , { field: 'title', title: '菜单名称', align: 'center'}
            , { field: 'deskshow', title: '桌面是否显示', align: 'center'}
            , { field: 'icon', title: '菜单图标', align: 'center' }
            , { field: 'pageURL', title: '页面地址', align: 'center' }
            , { field: 'addtime', title: '添加时间', align: 'center' }
        ]]
    })
    /**
     *添加数据 
     */
    $('#addMenu').on('click', function () {
        layer.open({
            title:'菜单添加',
            type:2,
            content:'/menu_add',
            area:['1140px','480px'],
        })
    })
    //绑定工具栏编辑按钮事件
    $('#editMenu').on('click', function () {
        var checkStatus = table.checkStatus("list");
        var checkCount = checkStatus.data.length;
        if (checkCount < 1) {
            layer.msg('请选择一条数据', {
                time: 2000
            });
            return false;
        }
        if (checkCount > 1) {
            layer.msg('只能选择一条数据', {
                time: 2000
            });
            return false;
        }
        var url = '/menu_edit/?id=' + checkStatus.data[0].id;
        layer.open({
            title:'菜单编辑',
            type:2,
            content:url,
            area:['1140px','480px'],
        })
        // openEditWindow(checkStatus.data[0].id);
    });
    

})