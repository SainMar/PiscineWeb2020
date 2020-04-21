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

function accept_mo(id_transa,prix_enchere){

        var hr= new XMLHttpRequest();
        var url="accept_mo.php";
        var vars="id_transa="+id_transa+"&prix="+prix_enchere;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function(){
          if(hr.readyState==4 && hr.status==200){
            var return_data=hr.responseText;
            
            alert(return_data);
          }
        }
        hr.send(vars);
}
function refuser_mo(id_transa,prix_enchere){

    var hr= new XMLHttpRequest();
    var url="refuser_mo.php";
    var vars="id_transa="+id_transa+"&prix="+prix_enchere;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
      if(hr.readyState==4 && hr.status==200){
        var return_data=hr.responseText;
        alert('yolo');
        alert(return_data);
      }
    }
    hr.send(vars);
}


$(document).ready(function(){

    
    $('.accept_mo').click(function(){

        var id_transa = $(this).attr('id');
        var prix_enchere = $(this).attr('name');
        
        
        accept_mo(id_transa,prix_enchere);
        
        refresh_mrmv();
        
    });
    $('.refuser_mo').click(function(){

        var id_transa = $(this).attr('id');
        var prix_enchere = $(this).attr('name');
        alert("transa:"+id_transa);
        
        refuser_mo(id_transa,prix_enchere);

        alert("prix:"+prix_enchere);
        
        refresh_mrmv();
        
    });

    $(".compte_a_rebour").ready(function(){
      
      var datFin= $(this).val();
      // Set the date we're counting down to
      var countDownDate = new Date(datFin).getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("compte_a_rebour").innerHTML = days + "d " + hours + "h "
        + minutes + "m " + seconds + "s ";

        // If the count down is finished, write some text
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("compte_a_rebour").innerHTML = "EXPIRED";
        }
      }, 1000);
    });





});