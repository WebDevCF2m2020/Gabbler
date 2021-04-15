<?php 

class CategoryManager extends ManagerTableAbstract implements ManagerTableInterface {
//A bit convoluted as I see it so I started with a selection of all entries based on my category mapping:
    public function getAllCategory(): array {
    
        $categoryFetch = "SELECT * FROM category;";
        $categoryGoFetch = $this->db->query($categoryFetch);
        //Using rowCount() method for one or more results:
        if ($categoryGoFetch->rowCount()) {
            return $categoryGoFetch->fetchAll(PDO::FETCH_ASSOC);
        }
        //If none returns an empty array:
            return [];
        
    }























}

