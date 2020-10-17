<?php 
    
     
    if(isset($alert)){
        ?>
        <h3><?=$alert?></h3>
        <?php
    }
    else{
    ?>
    <!--DISPLAY NUMBER OF RESULTS- UNDEFINED $-->
    <h1><?=$ar_numRow?> result(s) found</h1><br/>
    <?php 
    
    }
    
    ?>


<form action="" method="POST">
    <input type="search" name="search" id="submit-search" value="" placeholder="Type a keyword">
    <button type="submit" id="submit-search" name="submit-search">Search</button>
</form><br/><br/>

    
<hr>





<h3>Nombre total de message : <?=$countAllHistoryMessages?> </h3>
<p><?=$pagination?></p>
<?php
foreach($recupHistoryPage as $data):
?>
<hr>
<p><?=$data['nickname_user']?> writes to <?=$data['name_room']?>'s room at <?=$data['date_message']?> </p>
<p><?=$data['content_message']?></p>
<?php
endforeach;
?>
<p><?=$pagination?></p>

