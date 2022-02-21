$(document).ready(function(){
    
    let elemento = $("#inicio");
    
    elemento.mouseover(function(){
        elemento.css({"fontSize": "16pt"});
    });

    elemento.mouseout(function(){
        elemento.css({"fontSize": "10pt"});
    });
});
