<?php
//model
function count_msg($db){

    $sql = "SELECT COUNT(id_message) as nbMsg FROM message";
    $query = mysqli_query($db,$sql) or die (mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    $nbMsg = $data['nbMsg'];
    return  $nbMsg;
}

    function pagination($db, $theGetUrl = "history.user", $theGetPagination = "pagination",$msgPerPage=3,$currentPage=1){
        $numberPage = $numberPage=ceil(count_msg($db)/$msgPerPage);
         if (isset($_GET['pagination']) && $_GET['pagination'] > 1 && $_GET['pagination'] <= $numberPage && ctype_digit($_GET['pagination'])) {
            $currentPage = $_GET['pagination'];
         }   
             $sql = "SELECT * FROM `message` 
             JOIN `user`
             ON `id_user` = `fkey_user_id`
             JOIN `room`
             ON `id_room` = `fkey_room_id`
             ORDER BY `nickname_user` ASC LIMIT " . (($currentPage) * $msgPerPage - $msgPerPage) . ", $msgPerPage";
             $query = mysqli_query($db, $sql) or die (mysqli_error($db));
             while ($data = mysqli_fetch_assoc($query)) {
                 ?>
                <?php $nickname_user = $data['nickname_user'];?>
                <?php $name_room = $data ['name_room'];?>
                <?php $date_message = $data['date_message'];?>
                <?php $content_message = $data['content_message'];?>

                <?php echo "<hr/>";?>
                <?php
 
                echo $nickname_user . ' a écrit dans la room '  .  $name_room . ' le '  . $date_message . ' <br />' . $content_message .' <br />' . ' <br />';
                ?> 
                <?php }
                ?>
                <?php
            if ($currentPage > 1) {
                echo " <a href ='?p=$theGetUrl&$theGetPagination=" . ($currentPage - 1) . "'>Previous</a> "; 
            }
            for ($i = 1; $i <= $numberPage; $i++) {
                echo "<a href='?p=$theGetUrl&$theGetPagination=$i'>$i</a> /";
            }
        
            if ($currentPage < $numberPage) {
                echo "<a href ='?p=$theGetUrl&$theGetPagination=" . ($currentPage + 1) . "'>Next</a>";
                echo " <a href ='?p=$theGetUrl&$theGetPagination=" . ($numberPage) . "'>lastpage</a>";

           
            }
        }
        pagination($db, $theGetUrl = "history.user", $theGetPagination = "pagination");

 
 ?>