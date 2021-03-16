<?php 

//Class purpose as described by mother.
class UserRoom extends MappingTableAbstract {

        //All properties are protected!!
        protected int $id_user_room;
        protected int $favorite_user_room;
        protected int $fkey_room_id;
        protected int $fkey_user_id;

        public function getIdUserRoom(): int{  
                //Getting the id_user_room field.      
                return $this->id_user_room;
        }

        public function getFavoriteUserRoom(): int {   
                //Getting the favorite_user_room field.      
                return $this->favorite_user_room;
        }

        public function getFkeyRoomId(): int{  
                //Getting the fkey_room_id field.      
                return $this->fkey_room_id;
        }

        public function getFkeyUserId(): int {   
                //Getting the fkey_user_id field.      
                return $this->fkey_user_id;
        }
        

        public function setIdUserRoom(int $id_user_room): void {  

                $id_user_room = (int) $id_user_room;
                //Checking if is zero value.  
                if(($id_user_room === 0) && (ctype_digit($id_user_room))){  
                trigger_error("This can not equal to zero!!",E_USER_NOTICE);   
                }elseif(empty($id_user_room)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE); 
                }else{
                $this->id_user_room = $id_user_room;                    
                }
        }

        public function setFavoriteUserRoom(int $favorite_user_room): void {  

                $favorite_user_room = (int) $favorite_user_room;
                //Checking if is zero value.  
                if(($favorite_user_room === 0) && (ctype_digit($favorite_user_room))){  
                trigger_error("This can not equal to zero!!",E_USER_NOTICE);   
                }elseif(empty($favorite_user_room)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE); 
                }else{
                $this->favorite_user_room = $favorite_user_room;                    
                }
        }

        public function setFkeyRoomId(int $fkey_room_id): void {

                $fkey_room_id = (int) $fkey_room_id;  
                //Checking if is zero value.  
                if(($fkey_room_id === 0) && (ctype_digit($fkey_room_id))){  
                trigger_error("This can not equal to zero!!",E_USER_NOTICE);   
                }elseif(empty($fkey_room_id)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE); 
                }else{
                $this->fkey_room_id = $fkey_room_id;                    
                }
        }
        
        public function setFkeyUserId(int $fkey_user_id): void {
                
                $fkey_user_id = (int) $fkey_user_id;              
                //Checking if is zero value.  
                if(($fkey_user_id === 0) && (ctype_digit($fkey_user_id))){  
                trigger_error("This can not equal to zero!!",E_USER_NOTICE);   
                }elseif(empty($fkey_user_id)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE); 
                }else{
                $this->fkey_user_id = $fkey_user_id;                    
                }
        }


}