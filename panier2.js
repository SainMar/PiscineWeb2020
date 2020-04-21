/// recharge la galerie d'elements
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
              function reload_js() {
                $('script[src="panier2.js"]').remove();
                $('<script>').attr('src', 'panier2.js').appendTo('head');
                }
                reload_js();
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
///recharge les info sous le menus selon la selection dans le menu 
function refresh_ti(){
    
  var hr= new XMLHttpRequest();
        var url="ti_panier.php";
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
            document.getElementById('text_info').innerHTML = return_data;
            
          }
          
        }
        hr.send(vars);
        if(para_panier["enchere"]==true)
        {
          document.getElementById('text_info').innerHTML="Text info enchere :";
        }
        if(para_panier["achatimme"]==true)
        {
          document.getElementById('text_info').innerHTML="Text info achat immediat :";
        }
        if(para_panier["meilloffre_att"]==true)
        {
          document.getElementById('text_info').innerHTML="Text info meilleures offres envoyées :";
        }
        if(para_panier["meilloffre_r"]==true)
        {
          document.getElementById('text_info').innerHTML="Text info reponses recu au meillerus offres :";
        }
        if(para_panier["historique"]==true)
        {
          document.getElementById('text_info').innerHTML="Text info historique :";
        }

}


function supp_item_panier(id_item)
{
    var hr= new XMLHttpRequest();
    var url="supp_item_panier.php";
    var vars="id_item="+id_item;
    alert(vars);
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
      if(hr.readyState==4 && hr.status==200){
        var return_data=hr.responseText;
        
      }
    }
    hr.send(vars);
   
  
  }
function payer_panier()
{
        var hr= new XMLHttpRequest();
        var url="payer_panier.php";
        var vars="info=ok";
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function(){
          if(hr.readyState==4 && hr.status==200){
            var return_data=hr.responseText;
            alert("yo");
            alert(return_data);
          }
        }
        hr.send(vars);
}
function supp_discu(id_transa)
{
        var hr= new XMLHttpRequest();
        var url="supp_discu.php";
        var vars="id_transa="+id_transa;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function(){
          if(hr.readyState==4 && hr.status==200){
            var return_data=hr.responseText;
            alert("yo");
            alert(return_data);
          }
        }
        hr.send(vars);
}
function refaire_offre(id_transa, prix_enchere)
{
        var hr= new XMLHttpRequest();
        var url="refaire_offre.php";
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





$(document).ready(function(){

        // script is now loaded and executed.
        // put your dependent JS here.
    $('.supp_item_panier').click(function(){
            
        var id_item=$(this).attr('name');
        supp_item_panier(id_item);
        refresh_mrp();
        refresh_ti();
            
            
    });
    $('.payer_panier').click(function(){
        
        payer_panier();
        refresh_mrp();
        refresh_ti();

    });
    $('.supp_discu').click(function(){
 
        var id_transa=$(this).attr('id');
        alert(id_transa);
        supp_discu(id_transa);
        refresh_mrp();
        refresh_ti();

    });
    $('.refaire_offre').click(function(){

        var id_item = $(this).attr('id');
        var prix_enchere = $('#prix_re_offre').val();
        refaire_offre(id_item,prix_enchere);
        refresh_mrp();
        refresh_ti();
    });



  /*  $(document).ready(function(){
        // Set the date we're counting down to
    
  var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

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


  });*/
    
});