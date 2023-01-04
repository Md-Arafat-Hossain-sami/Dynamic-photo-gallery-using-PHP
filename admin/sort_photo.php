<?
include('../connection/connect.php');
include('./ajaxpost.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Photo Sorting</title>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<div class="container">
    <a href="javascript:void(0);" class="reorder_link" id="saveReorder">reorder photos</a>
    <div id="reorderHelper" class="light_box" style="display:none;">1. Drag photos to reorder.<br>2. Click 'Save Reordering' when finished.</div>
    <div class="gallery">
        <ul class="reorder_ul reorder-photos-list">
        <?php 
        // Include and create instance of DB class
        // require_once 'connect.php'; 
        // $db = new DB();
         
        // Fetch all images from database 
        $images = getRows(); 
        if(!empty($images)){ 
            foreach($images as $row){ 
        ?>
            <li id="image_li_<?php echo $row['photo_id']; ?>" class="ui-sortable-handle">
                <a href="javascript:void(0);" style="float:none;" class="image_link">
                    <img src="images/<?php echo $row['image1']; ?>" alt="">
                </a>
            </li>
        <?php } } ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.reorder_link').on('click',function(){
        $("ul.reorder-photos-list").sortable({ tolerance: 'pointer' });
        $('.reorder_link').html('save reordering');
        $('.reorder_link').attr("id","saveReorder");
        $('#reorderHelper').slideDown('slow');
        $('.image_link').attr("href","javascript:void(0);");
        $('.image_link').css("cursor","move");
        
        $("#saveReorder").click(function( e ){
            if( !$("#saveReorder i").length ){
                // $(this).html('').prepend('<img src="./images/Reload-Image-Gif-1.gif"/>');
                $("ul.reorder-photos-list").sortable('destroy');
                $("#reorderHelper").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');
                
                var h = [];
                $("ul.reorder-photos-list li").each(function() {
                    h.push($(this).attr('id').substr(4));
                });
                var myJSONText = JSON.stringify( h );
  alert(myJSONText)
                $.ajax({
                    type: "POST",
                    url: 'ordepdate.php',
                    data: {ids: },
                    success: function(){
                        window.location.reload();
                    }
                }); 
                return false;
            }   
            e.preventDefault();
        });
    })
});
</script>

</body>
</html>