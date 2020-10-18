<form action="" method="POST">
    <input type="search" name="search" id="submit-search" value="" placeholder="Type a keyword">
    <button type="submit" id="submit-search" name="submit-search">Search</button>
</form><br/>


<?php 
if(isset($ar_numRow)):
    
if(isset($alert)){
        ?>
        <h3><?=$alert?></h3>
        <?php
}
?>
<hr>
<?php 
if($ar_numRow > 0){
    ?>
    <!--DISPLAY NUMBER OF RESULTS-->
    <h3><?=$ar_numRow?> result(s) found</h3><br/>
    <?php 
    
    //FIND AND HIGHLIGHT RESULTS
        foreach($ar_row as $item){
            $ar_user = !empty($ar_search) ? ar_highlightWords($item['nickname_user'],$ar_search) : "";
    
            $ar_message = !empty($ar_search) ? ar_highlightWords($item['content_message'],$ar_search) : "";
    
            $ar_date = !empty($ar_search) ? ar_highlightWords($item['date_message'],$ar_search) : "";
    
            $ar_room = !empty($ar_search) ? ar_highlightWords($item['name_room'],$ar_search) : "";
?>

<!--DISPLAY RESULTS---->
<b><?php echo $ar_user;?> : </b><?php echo $ar_message;?><br/><?php echo $ar_room;?> - <?php echo $ar_date;?><br/><br/>

<button><a href="?p=history.user">Back</a></button>
<?php 
    }
}
endif;
?>
<hr>

<?php 
if(!isset($_POST['submit-search'])){
?>

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
}
?>
