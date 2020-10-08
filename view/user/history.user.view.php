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
