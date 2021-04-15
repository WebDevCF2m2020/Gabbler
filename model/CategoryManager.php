<?php 

class CategoryManager extends ManagerTableAbstract implements ManagerTableInterface {
//A bit convoluted as I see it so I started with a selection of all entries based on my category mapping:
//I do not know if $sql, $query and $prepare are the conventional agreed upon!!
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

    public function viewCategoryById(int $idCategory): array {

        $viewCategoryFetch = "SELECT * FROM category WHERE id_category = ?";
        $viewCategoryGoFetch = $this->db->prepare($viewCategoryFetch);
        //Not the same as above!! Due to the prepare() stament we must "try" and if fail "catch"!!
        try{

            $viewCategoryGoFetch->execute([$idCategory]);
            if($viewCategoryGoFetch->rowCount()){
                return $viewCategoryGoFetch->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return [];
            }
        }

        catch(Exception $error){
            trigger_error($error->getMessage());
        }
    }

    public function newCategory($data): boolean {

        
    }























}

