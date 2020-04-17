
<!--  creation de la table

 CREATE TABLE `tbl_images` (
  `image_id` int(11) NOT NULL,
  `images` longblob NOT NULL
) CHARSET=latin1;

ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`image_id`);

ALTER TABLE `tbl_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT; -->


<!DOCTYPE html>  
<html>  
    <head>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head>  
    <body>  
        <br /><br />  
        <div class="container">  
   <h3 align="left">ALT+clic pour upload plusieurs photos d'un coup</h3>  
            <br />  
            <form method="post" id="up" enctype="multipart/form-data">
                <input type="file" name="image[]" id="image" multiple accept=".jpg, .png, .gif" />
                <br />
                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
            </form>
            <br />  
            <br />
   
            <div id="images_list"></div>
            
        </div>  
    </body>  
</html>  
<script>  
$(document).ready(function(){

    load_images();


    function load_images()

    {
        $.ajax({
            url:"fetch_images.php", 
            success:function(data)
            {
                $('#images_list').html(data);
            }
        });
    }
 
    $('#up').on('submit', function(event){
        event.preventDefault();
        var image_name = $('#image');
        if(image_name == '')
        {
            alert("Please Select Image");
            return false;
        }
        else
        {
            $.ajax({
                url:"insert.php",
                method:"POST",
                data: new FormData(this), // Data du formulaire
                contentType:false, //pour l'empecher de se set automatiquement
               // cache:false,
                processData:false, 
                success:function(data)
                {
                    $('#image');
                    load_images();
                    location.reload();
                }
            });

        }
    });
 
});  
</script>

