<?php 

//Class purpose as described by mother.
class Category extends MappingTableAbstract {

        //All properties are protected!!
        protected int $id_category;
        protected string $name_category;

        public function getIdCategory(): int{  
                //Getting the id_category field.      
                return $this->id_category;
        }

        public function getNameCategory(): string {   
                //Getting the name_category field.      
                return $this->name_category;
        }

        public function setIdCategory(int $id_category): void {  

                $id_category = (int) $id_category;
                //Checking if is zero value.  
                if(($id_category === 0) && (ctype_digit($id_category))){  
                trigger_error("This can not equal to zero!!",E_USER_NOTICE);   
                }elseif(empty($id_category)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE); 
                }else{
                $this->id_category = $id_category;                    
                }
        }

        public function setNameCategory(string $name_category): string{  

                //Variable securing.
                $name_category = filter_var(trim(htmlspecialchars(strip_tags($name_category)),ENT_QUOTES),FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
                if(empty($name_category)){
                //Checking if not empty.
                trigger_error("This ca not be empty!!",E_USER_NOTICE);
                }else if(strlen($name_category)>25){
                //Checking the length of the value of the variable.
                trigger_error("This ca not be longer than 25 characters!!",E_USER_NOTICE);
                }else{
                $this->name_category = $name_category;
                }
        }
}