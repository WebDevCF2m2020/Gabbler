<?php
// creation of the role child class extended from the parent class MappingTableAbstract
class Role extends MappingTableAbstract
{
    //fields of the role table in protected properties
    protected int $id_role;
    protected string $name_role;
    // we want to force the children of this class to recreate a constructor with the model below
    public function __construct(array $tab)
    {
    // we only use protected or public, because the children (here essential) must be able to inherit from the hydrate method
        $this->hydrate($tab);
    }
      /**
     * @return int
     */
    //GETTER of id_role
    public function getIdRole(): int
    {
        return $this->id_role;
    }
/**
     * @param int $id_role
     */
    //SETTER of id_role
    public function setIdRole(int $id_role): void
    {
        $id_role = (int) $id_role;
        if(empty($id_role)){
            trigger_error("Your id must be at least one!",E_USER_NOTICE);
        }
        else{
            $this->id_role = $id_role;
        }     
    }
       /**
     * @return string
     */
    //GETTER of name_role
    public function getNameRole(): string
    {
        return $this->name_role;
    }
  /**
     * @param string $name_role
     */
    //SETTER of name_role
    public function setNameRole(string $name_role): void
    {
         $name_role = html_specialchars(strip_tags(trim($name_role)));
        if(empty($name_role)){
            trigger_error("Your role cannot be empty",E_USER_NOTICE);
        }elseif (strlen($name_role)>45){
            trigger_error("The name of your role must not exceed 45 characters",E_USER_NOTICE);
        }else{
            $this->name_role = $name_role;
        }  
    }
};