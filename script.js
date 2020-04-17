$(document).ready(function(){

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
          }
        }
        hr.send(vars);
        document.getElementById('items').innerHTML="preparing your selection...";

    
    
    $("#bar_rech").keyup(function(){

        var name = $("#bar_rech").val();
        param["bar_rech"]=name;
        

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
          }
        }
        hr.send(vars);
        document.getElementById('items').innerHTML="preparing your selection...";
    });
     
     

    $('.option').click(function(){

        
        
        if(param[$(this).attr('id')]==false)
        {
          alert("devient true");
          param[$(this).attr('id')]=true;
          $(this).addClass('param_selected');
        }
        else
        {
          alert("devient false");
          param[$(this).attr('id')]=false;
          $(this).removeClass('param_selected');
        }


        if(($(this).hasClass("categorie"))&&($(this).attr('id')!="all-items"))
        {
          param['all-items']=false;
          $("#all-items").removeClass('param_selected');
        }


        if($(this).attr('id')=="all-items")
        {
          $('.option').removeClass('param_selected');
          $(this).addClass('param_selected');
          $.each(param, function(key, value){
              param[key]=false;
              
          });
          param["bar_rech"]="";
          param[$(this).attr('id')]=true;
          
        }
        
        
        
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
          }
        }
        hr.send(vars);
        document.getElementById('items').innerHTML="preparing your selection...";
        
    });


    $('#submit_new_item').click(function(){

      tab["nom"]=$("#inscri_item_nom").val();
      tab["prix"]=$("#inscri_item_prix").val();
      tab["qualite"]=$("#inscri_item_qualite").val();
      tab["default"]=$("#inscri_item_qualite").val();
      tab["id_cat"]=1;
      tab["enchere"]=$('#inscri_item_enchere').is(':checked');
      tab["meilloffre"]=$("#inscri_item_enchere").is(':checked');
      tab["achatimme"]=$("#inscri_item_enchere").is(':checked');
     
          var hr2= new XMLHttpRequest();
          var url2="ajout_item.php";
          var cmpt=0;
          var vars="";
          $.each(tab, function(key,value){

            alert(key+"="+value);
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
            document.getElementById('#formulaire_item').innerHTML = return_data2;
            }
          }
          hr2.send(vars);
          document.getElementById('#formulaire_item').innerHTML="uploading the new item...";




  });
    
});

