<?php 

function ar_keywordCleaning($keyword){
    return htmlspecialchars(strip_tags(trim($keyword)), ENT_QUOTES);
}

function ar_searchByKeyword($db,$ar_search){
    $ar_sql = "SELECT * FROM message
                INNER JOIN user
                ON id_user = fkey_user_id
                INNER JOIN room
                ON id_room = fkey_room_id
                WHERE content_message LIKE '%$ar_search%' OR nickname_user LIKE '%$ar_search%' OR date_message LIKE '%$ar_search%' OR name_room LIKE '%$ar_search%' 
                ORDER BY date_message ASC";
    $ar_query = mysqli_query($db,$ar_sql) or die (mysqli_error($db));
        if(mysqli_num_rows($ar_query)){

        return mysqli_fetch_assoc($ar_query);
        }
        return false;
}


function ar_highlightWords($ar_text, $ar_keyword){
    $ar_text = preg_replace('#'. preg_quote($ar_keyword) .'#i', '<span style="background-color: #F9F902;">\\0</span>', $ar_text);
    return $ar_text;
}



