function show(menu,change){
    if($("#"+change).hasClass('ico-open')){
        $("#"+change).removeClass('ico-open');
        $("#"+change).addClass('ico-close');
    }else{
        $("#"+change).removeClass('ico-close');
        $("#"+change).addClass('ico-open');
    }
    //Òþ²ØÏÔÊ¾
    $("#"+menu).toggle();
}