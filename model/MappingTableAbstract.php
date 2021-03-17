<?php

abstract class MappingTableAbstract
{
    // Final constructor
    final public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    // Final hydrate method
    final protected function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $keyToArray = explode("_",$key);
            $methodSetters = "set";
            foreach ($keyToArray as $word){
                $methodSetters.=ucfirst($word);
            }
            if (method_exists($this, $methodSetters)) {
                $this->$methodSetters($value);
            }
        }
    }

    // creation of an attribute generator (properties) using the __set magic method, only creates attributes that do not exist in the class
    public function __set($name, $value)
    {
        // if the property is not declared (automatically not public), it can be created
        if (!property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            // otherwise we indicate that we must go through the setter
            trigger_error("You are trying to rewrite an existing protected or private attribute without going through its setter! (__set)", E_USER_NOTICE);
        }
    }

    // creation of a retriever of attributes (properties) thanks to the magic method __get, retrieves only existing attributes in the class
    public function __get($name)
    {
        // if the property is declared (automatically not public), we can take it
        if (property_exists($this, $name)) {
            return $this->$name;
        } else {
            // otherwise we indicate that we must go through the getter or attribute does not exist
            trigger_error("You are trying to read an existing protected or private attribute without going through its getter! (__get) or a non-existent attribute", E_USER_NOTICE);
        }
    }

}