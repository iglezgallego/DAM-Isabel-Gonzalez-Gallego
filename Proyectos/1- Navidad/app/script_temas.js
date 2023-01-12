$(document).ready(function(){
    $("span").click(function(){
        var idpadre = '#';
        idpadre += $(this).attr('id');
        console.log(idpadre)
        $(idpadre).children("p").toggle();
    })
})