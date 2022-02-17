window.onload = function(){

    if (window.XMLHttpRequest) {
            XMLHttpRequestObject = new XMLHttpRequest();
        }
    
    document.getElementById('boton').onmouseover = sacardatos
    document.getElementById('boton').onmouseout = vaciar
    
    }
    
    
    
    function sacardatos(){
        if(XMLHttpRequestObject) {
            XMLHttpRequestObject.open("GET", "/html/terminos.txt");
            XMLHttpRequestObject.onreadystatechange = function(){
        if (XMLHttpRequestObject.readyState == 4 &&                   
            XMLHttpRequestObject.status == 200) {
            document.getElementById("contenedor").innerHTML = XMLHttpRequestObject.responseText;
            }
        }
        XMLHttpRequestObject.send(null);
        } 
    }

    function vaciar(){
        document.getElementById("contenedor").innerHTML = "";
    }