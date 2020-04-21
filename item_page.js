function do_enchere(id_item, prix_enchere)
{
    var hr= new XMLHttpRequest();
    var url="do_enchere.php";
    var vars="id_item="+id_item+"&prix="+prix_enchere;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
    if(hr.readyState==4 && hr.status==200){
        var return_data=hr.responseText;
        
      }
    }
    hr.send(vars);
}
function do_meilloffre(id_item, prix_enchere)
{
    var hr= new XMLHttpRequest();
    var url="do_meilloffre.php";
    var vars="id_item="+id_item+"&prix="+prix_enchere;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
    if(hr.readyState==4 && hr.status==200){
        var return_data=hr.responseText;
        alert("do_meilloffre");
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



$(document).ready(function(){

        $('.do_enchere').click(function(){
            var id_item = $(this).attr('id');
            var prix_enchere = $('#prix_enchere').val();
            
            do_enchere(id_item,prix_enchere);
        });
        $('.do_meilloffre').click(function(){
            var id_item = $(this).attr('id');
            var prix_enchere = $('#prix_moffre').val();
            
            do_meilloffre(id_item,prix_enchere);
        });
        $('.add_panier').click(function(){
            alert("yo");
            var id_item=$(this).attr('id');
            alert(id_item);
            add_panier(id_item);
            refresh_mr();
            $('#'+id_item+'.carte_item').addClass('invisible');
    
    
    
        });


});