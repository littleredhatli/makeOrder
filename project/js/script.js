window.onload=function(){
    var content_list=document.getElementsByClassName("content_list");
    content_list[0].style.backgroundColor="#F63440";
    content_list[0].style.color="white";
    for(var i=0;i<content_list.length;i++){
        content_list[i].index=i;
        content_list[i].onclick=function(){
            for(var j=0;j<content_list.length;j++){
                content_list[j].style.backgroundColor="#FAFAFA";
                content_list[j].style.color="black";
            }
            this.style.backgroundColor="#F63440";
            this.style.color="white";
        }
    }
    var list_name=document.getElementsByClassName("list_name")[0];
    console.log(list_name.text);
}