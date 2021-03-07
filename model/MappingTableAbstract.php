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
            $methodSetters = "set" . ucfirst($key);
            if (method_exists($this, $methodSetters)) {
                $this->$methodSetters($value);
            }
        }
    }
}