function refresh_mrp(){
    
    var hr= new XMLHttpRequest();
          var url="mr_panier.php";
          var cmpt=0;
          var vars="";
          $.each(para_panier, function(key,value){
                if(cmpt==0)
                {
                  vars+=key+"="+value;
                  cmpt=1;
                }
                else
                {
                  vars+="&"+key+"="+value;
                }
          });

          hr.open("POST", url, true);
          hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          hr.onreadystatechange = function(){
            if(hr.readyState==4 && hr.status==200){
              var return_data=hr.responseText;
              document.getElementById('transaction').innerHTML = return_data;
            }
          }
          hr.send(vars);
          if(para_panier["enchere"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing encheres when you act...";
          }
          if(para_panier["achatimme"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing your selection of items...";
          }
          if(para_panier["meilloffre_att"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing the meilleurs offres you've send...";
          }
          if(para_panier["meilloffre_r"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing the meilleurs offres you've received and are refused...";
          }
          if(para_panier["historique"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing your historic...";
          }
          
}
$(document).ready(function(){

    refresh_mrp();
    $(".elem_panier").click(function(){

        $('.elem_panier').removeClass('param_selected');
        $(this).addClass('param_selected');

        para_panier["enchere"]=false;  
        para_panier["achatimme"]=false;  
        para_panier["meilloffre_att"]=false;
        para_panier["meilloffre_r"]=false;
        para_panier["historique"]=false; 

        para_panier[$(this).attr('id')]=true;
        
        //test pour voir valeur recup
        /*$.each(para_panier, function(key, value){
            alert(key+"="+value);
            
        });*/

        refresh_mrp();

    });




});