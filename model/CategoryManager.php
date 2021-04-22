<?php 

class CategoryManager extends ManagerTableAbstract implements ManagerTableInterface {
//A bit convoluted as I see it so I started with a selection of all entries based on my category mapping:
//I do not know if $sql, $query and $prepare are the conventional agreed upon!!
    public function selectAll(): array {
    
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

    public function newCategory(Category $input): bool {
        //Category ==> to use Category Class:
        //$input ==> will hold getters results:

        $addCategory = "INSERT INTO category (name_category) VALUES (?)";
        $goAddCategory = $this->db->prepare($addCategory);

        try {
            $goAddCategory->execute([
                $input->getNameCategory()
            ]);
            return true;
        } catch (Exception $error) {
            trigger_error($error->getMessage());
            return false;
        }  
    }

    public function updateCategory(Category $input): bool {
        //Category ==> same as above!!
        //$input ==> same as above!!

        $updateCategory = "UPDATE category SET name_category = ? WHERE id_category = ?";
        $goUpdateCategory = $this->db->prepare($updateCategory);

        $goUpdateCategory->bindValue(1,$input->getNameCategory(),PDO::PARAM_STR);
        $goUpdateCategory->bindValue(2,$input->getIdCategory(),PDO::PARAM_INT);
        return $goUpdateCategory->execute();   

    }

    public function deleteCategory(int $idCategory): bool {

        $deleteCategory = "DELETE FROM category WHERE id_category = ?";
        $prepare = $this->db->prepare($deleteCategory);

        try {
            $prepare->execute([$idCategory]);
            return true;
        } catch (Exception $error) {
            trigger_error($error->getMessage());
            return false;
        }
    }
}

