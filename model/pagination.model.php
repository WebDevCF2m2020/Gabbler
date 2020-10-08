<?php
// pagination function for the project
function pagination($nbTot, $currentPage,$msgPerPage=3, $theGetUrl = "?", $theGetPagination = "&pg"){

    $out = "";
    $numberPage = ceil($nbTot/$msgPerPage);

    if($numberPage<2) return $out;

    for ($i=1;$i<=$numberPage;$i++) {
        if($i==1){
            if($i==$currentPage){
                $out .= "First | ";
                $out .= "Previous | ";
            }else{
                $out .= "<a href='$theGetUrl$theGetPagination=$i'>First</a> | ";
                $out .= "<a href='$theGetUrl$theGetPagination=".($currentPage-1)."'>Previous</a> | ";
            }
        }
        $out .= ($i==$currentPage)
            ? "$i | "
            : "<a href='$theGetUrl$theGetPagination=$i'>$i</a> | ";

        if($numberPage==$i){

            if($currentPage==$i){
                $out.="Next | ";
                $out.="Last ";
            }else{
                $out.="<a href='$theGetUrl$theGetPagination=".($currentPage+1)."'>Next</a> | ";
                $out.="<a href='$theGetUrl$theGetPagination=$i'>Last</a> ";
            }
        }
    }
    return $out;
}

