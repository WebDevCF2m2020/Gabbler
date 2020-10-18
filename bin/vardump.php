<?php 
//Avec "John " comme keyword

MODEL

var_dump($ar_query)  :
object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(18) ["lengths"]=> NULL ["num_rows"]=> int(3) ["type"]=> int(0) }

et résultat identique pour

CONTROLLER

var_dump($ar_queryResult) :
object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(18) ["lengths"]=> NULL ["num_rows"]=> int(3) ["type"]=> int(0) }
(Gabbler procédural = object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(18) ["lengths"]=> NULL ["num_rows"]=> int(3) ["type"]=> int(0) } 3 result(s) found : 
)

var_dump($ar_search) : 
string(4) "John"
(Gp = string(4) "John" 3 result(s) found :)

var_dump($ar_numRow) :
int(3)
(Gabbler procedural = int(3))

var_dump($alert) avec un mot inexistant dans la db:
string(41) "There are no results matching your search"
et message :
Notice: Trying to access array offset on value of type null in /Applications/MAMP/htdocs/Gabbler1/Gabbler/controller/user/ar.historySearch.user.controller.php on line 26

var_dump($ar_row) :
array(18) { ["id_message"]=> string(1) "1" ["date_message"]=> string(19) "2020-10-06 09:10:11" ["content_message"]=> string(7) "Hello !" ["archived_message"]=> string(1) "1" ["fkey_user_id"]=> string(1) "5" ["fkey_room_id"]=> string(1) "1" ["id_user"]=> string(1) "5" ["nickname_user"]=> string(4) "John" ["pwd_user"]=> string(60) "$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm" ["mail_user"]=> string(14) "admin@test.com" ["signup_date_user"]=> string(19) "2020-09-17 10:17:51" ["color_user"]=> string(10) "0, #DF2F5C" ["confirmation_key_user"]=> string(32) "acd147d11882e3ea05e3229e7935768e" ["validation_status_user"]=> string(1) "1" ["id_room"]=> string(1) "1" ["public_room"]=> string(1) "0" ["name_room"]=> string(7) "general" ["last_activity__room"]=> string(19) "2020-10-06 09:10:11" }

(Gp = array(18) { ["id_message"]=> string(1) "1" ["date_message"]=> string(19) "2020-10-06 09:10:11" ["content_message"]=> string(7) "Hello !" ["archived_message"]=> string(1) "1" ["fkey_user_id"]=> string(1) "5" ["fkey_room_id"]=> string(1) "1" ["id_user"]=> string(1) "5" ["nickname_user"]=> string(4) "John" ["pwd_user"]=> string(60) "$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm" ["mail_user"]=> string(14) "admin@test.com" ["signup_date_user"]=> string(19) "2020-09-17 10:17:51" ["color_user"]=> string(10) "0, #DF2F5C" ["confirmation_key_user"]=> string(32) "acd147d11882e3ea05e3229e7935768e" ["validation_status_user"]=> string(1) "1" ["id_room"]=> string(1) "1" ["public_room"]=> string(1) "0" ["name_room"]=> string(7) "general" ["last_activity__room"]=> string(19) "2020-10-06 09:10:11" } John : Hello !
general - 2020-10-06 09:10:11

array(18) { ["id_message"]=> string(1) "3" ["date_message"]=> string(19) "2020-10-06 09:10:11" ["content_message"]=> string(13) "how are you ?" ["archived_message"]=> string(1) "1" ["fkey_user_id"]=> string(1) "5" ["fkey_room_id"]=> string(1) "1" ["id_user"]=> string(1) "5" ["nickname_user"]=> string(4) "John" ["pwd_user"]=> string(60) "$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm" ["mail_user"]=> string(14) "admin@test.com" ["signup_date_user"]=> string(19) "2020-09-17 10:17:51" ["color_user"]=> string(10) "0, #DF2F5C" ["confirmation_key_user"]=> string(32) "acd147d11882e3ea05e3229e7935768e" ["validation_status_user"]=> string(1) "1" ["id_room"]=> string(1) "1" ["public_room"]=> string(1) "0" ["name_room"]=> string(7) "general" ["last_activity__room"]=> string(19) "2020-10-06 09:10:11" } John : how are you ?
general - 2020-10-06 09:10:11

array(18) { ["id_message"]=> string(1) "5" ["date_message"]=> string(19) "2020-10-06 09:10:11" ["content_message"]=> string(12) "I am a robot" ["archived_message"]=> string(1) "1" ["fkey_user_id"]=> string(1) "5" ["fkey_room_id"]=> string(1) "1" ["id_user"]=> string(1) "5" ["nickname_user"]=> string(4) "John" ["pwd_user"]=> string(60) "$2y$10$X6Lu7QpJSxki2.wXAaxSteav1fTVWr/uYqnq9cFMbAo1U/vSXGtjm" ["mail_user"]=> string(14) "admin@test.com" ["signup_date_user"]=> string(19) "2020-09-17 10:17:51" ["color_user"]=> string(10) "0, #DF2F5C" ["confirmation_key_user"]=> string(32) "acd147d11882e3ea05e3229e7935768e" ["validation_status_user"]=> string(1) "1" ["id_room"]=> string(1) "1" ["public_room"]=> string(1) "0" ["name_room"]=> string(7) "general" ["last_activity__room"]=> string(19) "2020-10-06 09:10:11" } John : I am a robot
general - 2020-10-06 09:10:11)

var_dump($ar_user) :
string(52) "John" (John est surligné en jaune)
(Gp = idem x 3)

var_dump($ar_message) avec keyword = "Bye" :
string(58) "Okay. Bye."(Bye en jaune)
(Gp = idem)

var_dump($ar_date) avec keyword = 2020-10-06 : 
string(67) "2020-10-06 09:10:11"(2020-10-06 en jaune)
(Gp = idem x 6)

var_dump($ar_room) avec keyword = "general" :
string(55) "general"(general en jaune)
(Gp = idem x 6)