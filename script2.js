function refresh_mr(){
    var hr= new XMLHttpRequest();
    var url="moteurRech.php";
    var cmpt=0;
    var vars="";
    $.each(param, function(key,value){
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
        document.getElementById('items').innerHTML = return_data;
        function reload_js() {
          $('script[src="script2.js"]').remove();
          $('<script>').attr('src', 'script2.js').appendTo('head');
          }
          reload_js();
      }
    }
    hr.send(vars);
    document.getElementById('items').innerHTML="preparing your selection...";
}
function create_enchere(dateFin, id_vendeur, nom_item, enchere)
{
      var hr= new XMLHttpRequest();
      var url="create_enchere.php";
      var vars="dateFin="+dateFin+"&id_vendeur="+id_vendeur+"&nom_item="+nom_item+"&enchere="+enchere;
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

function add_panier(id_item){

        var hr= new XMLHttpRequest();
        var url="add_panier.php";
        var vars="id_item="+id_item;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function(){
          if(hr.readyState==4 && hr.status==200){
            var return_data=hr.responseText;
           
          }
        }
        hr.send(vars);


}
function  supp_item(id_item){

  var hr= new XMLHttpRequest();
  var url="supp_item.php";
  var vars="id_item="+id_item;
  hr.open("POST", url, true);
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  hr.onreadystatechange = function(){
    if(hr.readyState==4 && hr.status==200){
      var return_data=hr.responseText;
      
      
    }
  }
  hr.send(vars);


}



$(document).ready(function(){

    $('.add_panier').click(function(){
        
        var id_item=$(this).attr('id');
        
        add_panier(id_item);
        refresh_mr();
        $('#'+id_item).addClass('invisible');
        alert('item added to panier!');

        

    });
    $('.supp_item').click(function(){
        
      var id_item=$(this).attr('id');
      
      supp_item(id_item);
      refresh_mr();
      $('#'+id_item).addClass('invisible');

      alert('item deleted!');

    });
    $("div.modal-body select.cat").change(function(){
      var cat = $(this).children("option:selected").val();
      var index= cat.indexOf('#');
      var cat1= cat.substr(index+1);
      tab['id_cat']=cat1;
    });
    

     $('div.modal-footer button.submit_new_item').click(function(){
          
            tab["nom"]=$("#inscri_item_nom").val();
            tab["prix"]=$("#inscri_item_prix").val();
            tab["qualite"]=$("#inscri_item_qualite").val();
            tab["default"]=$("#inscri_item_default").val();
            
            //tab['dateF']=$("#inscri_dateF").val();
        
           
            var dateTot =$("#inscri_dateF").val();
            var index= dateTot.indexOf('T');
            var heure = dateTot.substr(index+1);
            var jour = dateTot.substr(0, index);
            dateTot= jour+" "+heure;
            tab['dateF']=dateTot;

            alert(dateTot);
            
            tab["enchere"]=$('#inscri_item_enchere').prop('checked');
            
            tab["meilloffre"]=$("#inscri_item_meilloffre").prop('checked');
            tab["achatimme"]=$("#inscri_item_achatimme").prop('checked');
            
           
          if(tab["nom"].length ==null || tab["prix"]==null || tab["id_cat"]==null || (tab["enchere"]==false && tab["meilloffre"]==false && tab["achatimme"]==false) || (tab["dateF"]=="" && tab["enchere"]==true))
          {
               alert("Vous n'avez pas rempli tous les champs nécessaire à l'ajout d'un item");
          }
          else
          {

            
            var hr2= new XMLHttpRequest();
            var url2="ajout_item.php";
            var cmpt=0;
            var vars="";
            
            
            $.each(tab, function(key,value){
              
              
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
            
            hr2.open("POST", url2, true);
            hr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr2.onreadystatechange = function(){
              if(hr2.readyState==4 && hr2.status==200){
                var return_data2 = hr2.responseText;
                //alert(return_data2);
                
                create_enchere(tab['dateF'], id_user_actual, tab["nom"], tab["enchere"]);
                alert("items created !");
                refresh_mr();

              }
            }
            hr2.send(vars);
            document.getElementById('#news').innerHTML="<p>uploading the new item...</p>";
          }

           


    });



});