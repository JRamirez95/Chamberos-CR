function activar()
{
    if (document.getElementById('radioCustom1' ).checked==true)
    {
        document.getElementById('precio').disabled=false;
    }
   
    else if (document.getElementById('radioCustom2').checked==true)
    {
        document.getElementById('precio').disabled=true;
    } 
    else if (document.getElementById('radioCustom3' ).checked==true)
    {
        document.getElementById('precio').disabled=false;
    }
   
   

}