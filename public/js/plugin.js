$(document).ready(function(){
    jQuery.fn.añadirVerde = function() {
       
        this.each(function(){
       
           elem = $(this);
           elem.animate({backgroundColor: '#421aa8'})

        });   
        return this;
     }; 
     
     $(".top-bar").mouseover(function(){
        $(".top-bar").añadirVerde(); 
    });
});