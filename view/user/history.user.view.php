<?php 
    //if(isset($ar_search)){
    if(isset($alert)){
        ?>
        <h3><?=$alert?></h3>
        <?php
    }
    ?>
    <h3><?=$ar_queryResult?> result(s) found</h3><br/>
    <?php 
    
    /*}
    else{*/
    ?>


<form action="" method="GET">
    <input type="search" name="search" value="" placeholder="Type a keyword">
    <button type="submit" name="search">Search</button>
</form><br/>

    
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
<?php 
    //}
?>
