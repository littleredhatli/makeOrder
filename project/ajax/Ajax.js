function post_ajax(url, data, sucess_function){
    $.ajax({
        type: "post",
        url: url,
        data:data,
        /*dataType:"json",*/
        async:true,
        success: function (ret) {
            if(sucess_function != false){
                sucess_function(ret);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
                    // 状态码
                    console.log(XMLHttpRequest.status);
                    // 状态
                    console.log(XMLHttpRequest.readyState);
                    // 错误信息   
                    console.log(textStatus);
                }
    });
}

function get_ajax(url, data, sucess_function){
    $.ajax({
        type: "get",
        url: url,
        dataType: "json",
        data:data,
        async:false,
        success: function (ret) {
            if(sucess_function != false){
                sucess_function(ret);
            }
        }
    });
}




/* function addHostSubmit(elem){
    var item = $(elem).parents(".item-content");
    var hostName = item.find(".hostName").text();
    var hostIp = item.find(".hostIp").text();
    var hostPort = item.find(".hostPort").text();
    data = {'hostName': hostName, 'hostIp': hostIp, 'hostPort': hostPort};
    //alert(hostName)
    //alert(hostIp)
    //alert(hostPort)
    postRequest("/addHost/",data,true,addHostResult);
}
function addHostResult(ret) {
    if(ret['ret'] == true){
        alert("成功添加主机信息!");
        location.reload()
    }else{
        alert("添加主机信息失败!");
        location.reload()
    }
}*/
