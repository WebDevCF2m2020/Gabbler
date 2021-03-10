<?php
// dependency
require_once "../model/MappingTableAbstract.php";

// create a pseudo extends files into this test

class MappingTableAbstractManualTest extends MappingTableAbstract{

    protected int $id_test;
    protected string $coucou_les_amis;
    protected string $est_ce_que_ca_fonctionne;


    // GETTERS

    /**
     * @return int
     */
    public function getIdTest(): int
    {
        return $this->id_test;
    }

    /**
     * @return string
     */
    public function getCoucouLesAmis(): string
    {
        return $this->coucou_les_amis;
    }

    /**
     * @return string
     */
    public function getEstCeQueCaFonctionne(): string
    {
        return $this->est_ce_que_ca_fonctionne;
    }

    // SETTERS

    /**
     * @param int $id_test
     */
    public function setIdTest(int $id_test): void
    {
        $this->id_test = $id_test;
    }

    /**
     * @param string $coucou_les_amis
     */
    public function setCoucouLesAmis(string $coucou_les_amis): void
    {
        $this->coucou_les_amis = $coucou_les_amis;
    }

    /**
     * @param string $est_ce_que_ca_fonctionne
     */
    public function setEstCeQueCaFonctionne(string $est_ce_que_ca_fonctionne): void
    {
        $this->est_ce_que_ca_fonctionne = $est_ce_que_ca_fonctionne;
    }


}

// tests
$a = new MappingTableAbstractManualTest([]);
$b = new MappingTableAbstractManualTest(["id_test"=>5,
                                         "coucou_les_amis"=>"Bonjour à tous!",
                                         "est_ce_que_ca_fonctionne"=>"Bien ou pas?"]);
?>
<pre><?php
    var_dump($a,$b) ;

    ?></pre>
