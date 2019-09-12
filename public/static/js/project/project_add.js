layui.use(['form','laydate'],function(){
    var form = layui.form;
    var laydate = layui.laydate;
    laydate.render({
        elem: '#start' //指定元素
      });
      form.on('select(status)', function(data){
        if(data.value=="1"){
            $('#start_time').css('display','block');
        }else{
            $('#start_time').css('display','none');
        }
    });  
})