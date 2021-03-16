<?php 

//Class purpose as described by mother.
class Status extends MappingTableAbstract {

        //All properties are protected!!
        protected int $id_status;
        protected string $name_status;

        public function getIdStatus(): int{  
                //Getting the id_status field.      
                return $this->id_status;
        }

        public function getNameStatus(): string {   
                //Getting the name_status field.      
                return $this->name_status;
        }

        public function setIdStatus(int $id_status): void {  

                $id_status = (int) $id_status;
                //Checking if is zero value.  
                if(($id_status === 0) && (ctype_digit($id_status))){  
                trigger_error("This can not equal to zero!!",E_USER_NOTICE);   
                }elseif(empty($id_status)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE); 
                }else{
                $this->id_status = $id_status;                    
                }
        }

        public function setNameStatus(string $name_status): string{  

                //Variable securing.
                $name_status = filter_var(trim(htmlspecialchars(strip_tags($name_status)),ENT_QUOTES),FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
                if(empty($name_status)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE);
                }else if(strlen($name_status)>25){
                //Checking the length of the value of the variable.
                trigger_error("This ca not be longer than 25 characters!!",E_USER_NOTICE);
                }else{
                $this->name_status = $name_status;
                }
        }
}