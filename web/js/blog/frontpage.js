var markdown = ace.require("ace/handler/Markdown");
$(".markdown").each(function(index,item){
    $(this).html(markdown.toHTML($(this).html()));
});

$(function(){

    $.get(url,function(data){
        if(data.length >0)
        {
            $(data).each(function(index,item){
                var html = markdown.toHTML(item['content']);
                $('#posts').append(html+"<div><a href='test'>Detail&gt;&gt;&gt;</a></div><hr><br/>");
            });
        }
    });
});
