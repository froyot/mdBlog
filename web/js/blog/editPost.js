    var editor = ace.edit("md_post_content");
    var JavaScriptMode = ace.require("ace/mode/markdown").Mode;
    var markdown = ace.require("ace/handler/Markdown");
    String.prototype.replaceAll = function(s1,s2){
    return this.replace(new RegExp(s1,"gm"),s2);
    }
    editor.getSession().setMode(new JavaScriptMode());

    editor.on("change",function(e){
        var doc = document.getElementById("preview").contentDocument || document.frames["preview"].document;
        doc.body.innerHTML = markdown.toHTML(editor.getValue());
    });

    $('form').submit(function(){
        // var doc = document.getElementById("preview").contentDocument || document.frames["preview"].document;

        $('#post_content').val(editor.getValue());
        // // str = editor.getValue();
        // // str=str.replaceAll("\n", "<br/>")
        // return false;

    });
