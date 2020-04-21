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
function test_type_user($id_user_actual)
{
  if($id_user_actual!=1)
    {
      $('#only_buy').addClass('invisible');
    }
}
$(document).ready(function(){

      refresh_mr();
    


    
    
    $('div.modal-body input.form-check-input').click(function(){
        $cas1=$('#inscri_item_enchere').prop('checked');//checkbox enchere
        $cas2=$('#inscri_item_meilloffre').prop('checked');//checkbox meilloffre
        $cas3=$('#inscri_item_achatimme').prop('checked');//checkbox achatimme
      if($cas1==true)
        {
          
          $('#inscri_item_meilloffre').prop( "disabled", true );
        }
        if($cas2==true)
        {
          
          $('#inscri_item_enchere').prop( "disabled", true );
        }

        if($cas1==false)
        {
          $('#inscri_item_meilloffre').prop( "disabled", false );
        }
        if($cas2==false)
        {
          
          $('#inscri_item_enchere').prop( "disabled", false );
        }

        
    });
    
   
    
    
      $("#bar_rech").keyup(function(){

          var name = $("#bar_rech").val();
          param["bar_rech"]=name;
          
          refresh_mr();

          
      });
     
     

    $('.option').click(function(){

        
        
        if(param[$(this).attr('id')]==false)
        {
          
          param[$(this).attr('id')]=true;
          $(this).addClass('param_selected');
        }
        else
        {
          
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
        
        
       refresh_mr();
        
    });
    

    
    
});

