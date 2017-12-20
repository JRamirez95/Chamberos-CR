function selecCombo(combo){
    combito = combo.id;
    opcion = combo.value;
    var cards = document.getElementById('card');
    
    

        $.post("log/busq_filtros.php", {
                tipo: combito, valor:opcion
            },
            function(mensaje) {
                var lista = JSON.parse(mensaje);
                while (cards.hasChildNodes()){
                    cards.removeChild(cards.lastChild);
                }
                for (var j = 0; j < lista.length; j++) {
                    
    var div1 = document.createElement("div");
    div1.setAttribute("class", "col-md-4 text-center");
    div1.setAttribute("style", "margin-top:2%;");    
        var div2 = document.createElement("div"); 
        div2.setAttribute("class", "panel panel-pricing");          
            var div3 = document.createElement("div"); 
            div3.setAttribute("class", "panel-heading");             
                var div4 = document.createElement("div"); 
                div4.setAttribute("class", "avatar center-block img-thumbnail");                
                var h3 = document.createElement("h3");                
                    var div5 = document.createElement("div"); 
                    div5.setAttribute("class", "panel-body text-center");
                    var p = document.createElement("p");                    
                    var ul = document.createElement("ul"); 
                    ul.setAttribute("class", "list-group text-left");
                        var li1 = document.createElement("li"); 
                        li1.setAttribute("class", "list-group-item fa fa-venus-mars");
                        
                            var li2 = document.createElement("li"); 
                            li2.setAttribute("class", "list-group-item fa fa-phone");
                           
                                var li3 = document.createElement("li"); 
                                li3.setAttribute("class", "list-group-item fa fa-map-marker");
                                
                                    var div6 = document.createElement("div"); 
                                    div6.setAttribute("class", "panel-footer");
                                        var li4 = document.createElement("li"); 
                                        li4.setAttribute("class", "list-group-item");
                                        var form = document.createElement("form");
                                        form.setAttribute("action", "vistaPerfil.php");
                                        form.setAttribute("method", "post");
                                        var input1 = document.createElement("input"); 
                                        input1.setAttribute("type", "text");
                                        input1.setAttribute("name", "id_prove");
                                        input1.setAttribute("value", lista[j]['idprovincia']);
                                        var input2 = document.createElement("input"); 
                                        input2.setAttribute("type", "text");
                                        input2.setAttribute("name", "id_user");
                                        input2.setAttribute("value", lista[j]['id']);
                                        var button = document.createElement("button"); 
                                        button.setAttribute("class", "btn btn-lg btn-block btn-primary");
                                        button.setAttribute("type", "submit");
    cards.appendChild(div1);
        div1.appendChild(div2);
            div2.appendChild(div3);    
                div3.appendChild(div4);
                    div4.style.backgroundImage = "url(fotosPerfil/"+lista[j]['foto'] +")";
                    div3.appendChild(h3);
            div2.appendChild(div5);
                div5.appendChild(p); 
            div2.appendChild(ul);   
                ul.appendChild(li1);
                    
                ul.appendChild(li2);
                    
                ul.appendChild(li3);
                    
            div2.appendChild(div6);
                div6.appendChild(li4);
                    li4.appendChild(form);
                        form.appendChild(input1);
                        form.appendChild(input2);
                        form.appendChild(button);
    
    
    
    //div2.appendChild(div3);
    
   
    //div2.appendChild(div6);



    
    h3.innerHTML= lista[j]['nombre']+" "+ lista[j]['apellido'];
    p.innerHTML= lista[j]['email'];
    li1.innerHTML= " " +lista[j]['sexo'];
    li2.innerHTML= " " +lista[j]['telefono'];
    li3.innerHTML= " " +lista[j]['provincia'] + ", " + lista[j]['canton'] + ", " + lista[j]['distrito'];
    input1.style.display ="none";
    input2.style.display ="none";
    //input1.value= lista[i]['idprovincia'];
    //input2.value= lista[i]['id'];
    button.innerHTML= "Ver";
                }
            });
    }




