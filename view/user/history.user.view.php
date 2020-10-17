<form action="" method="POST">
    <input type="search" name="search" id="submit-search" value="" placeholder="Type a keyword">
    <button type="submit" id="submit-search" name="submit-search">Search</button>
</form><br/><br/>

<?php 

if(isset($alert)){
        ?>
        <h3><?=$alert?></h3>
        <?php
    }
    else{
    ?>
    <!--DISPLAY NUMBER OF RESULTS- UNDEFINED $-->
    <h3><?=$ar_numRow?> result(s) found</h3><br/>
    <?php 
    
    }
    ?>
<hr>
<?php 
if($ar_numRow > 0){
    
    while($ar_row){
?>
<b><?php echo $ar_user;?> : </b><?php echo $ar_message;?><br/><?php echo $ar_room;?> - <?php echo $ar_date;?><br/><br/>
<?php 
    }
}
?>
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

