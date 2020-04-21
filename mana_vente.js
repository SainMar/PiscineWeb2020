function refresh_mrmv(){
    
    var hr= new XMLHttpRequest();
          var url="mr_mana_vente.php";
          var cmpt=0;
          var vars="";
          $.each(para_mana_vente, function(key,value){
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
              function reload_js() {
                $('script[src="mana_vente2.js"]').remove();
                $('<script>').attr('src', 'mana_vente2.js').appendTo('head');
                }
                reload_js();
            }
          }
          hr.send(vars);
          if(para_mana_vente["enchere"]==true)
          {
            
            document.getElementById('transaction').innerHTML="preparing your encheres...";
          }
          if(para_mana_vente["meilloffre"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing the meilleurs offres you've received...";
          }
          
          if(para_mana_vente["historique"]==true)
          {
            document.getElementById('transaction').innerHTML="preparing your historic...";
          }
          
}
$(document).ready(function(){

    refresh_mrmv();
    $(".elem_panier").click(function(){

        $('.elem_panier').removeClass('param_selected');
        $(this).addClass('param_selected');

        para_mana_vente["enchere"]=false;  
        para_mana_vente["meilloffre"]=false;
        para_mana_vente["historique"]=false; 

        para_mana_vente[$(this).attr('id')]=true;
        
        //test pour voir valeur recup
        /*$.each(para_mana_vente, function(key, value){
            alert(key+"="+value);
            
        });*/

        refresh_mrmv();

    });
    
    




});