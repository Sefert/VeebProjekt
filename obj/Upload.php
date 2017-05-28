<?php

/**
 * Created by PhpStorm.
 * User: marko
 * Date: 14/05/2017
 * Time: 15:26
 */
class Upload
{
    private $folder;
    private $prompt=array();
    function __construct($n,$f){
        $this->name = $n;
        $this->folder= $f;
        $this->upload();
    }
    public function _getFeed(){
        return $this->prompt;
    }
    private function upload()
    {
        $allowedExts = array("jpg", "jpeg", "gif", "png");
        $allowedTypes = array("image/gif", "image/jpeg", "image/png", "image/pjpeg");

        for ($i=0;$i<count($_FILES[$this->name]['name']);$i++) {
            if (isset($_FILES[$this->name]["name"][$i]))
                $extension = pathinfo($_FILES[$this->name]["name"][$i])['extension'];
//            $exp = explode(".", $_FILES[$this->name]["name"][$i]);
//            $extension = end($exp);

            if (in_array($_FILES[$this->name]["type"][$i], $allowedTypes)
                && ($_FILES[$this->name]["size"][$i] < 1000000)
                && in_array($extension, $allowedExts)) {
                // fail õiget tüüpi ja suurusega
                if ($_FILES[$this->name]["error"][$i] > 0) {
                    $_SESSION['notices'][] = "Return Code: " . $_FILES[$this->name]["error"];
                    $this->prompt[$i] = "Esinevad errorid";
                } else {
                    // vigu ei ole
                    if (file_exists("img/galerii/" . $this->folder . "/" . $_FILES[$this->name]["name"][$i])) {
                        // fail olemas ära uuesti lae, tagasta failinimi
                        $_SESSION['notices'][] = $_FILES[$this->name]["name"][$i] . " juba eksisteerib. ";
                        $this->prompt[$i] = "Fail juba olemas:img/galerii/" . $this->folder . "/" . $_FILES[$this->name]["name"][$i];
                    } else {
                        // kõik ok, aseta pilt
                        move_uploaded_file($_FILES[$this->name]["tmp_name"][$i], "img/galerii/" . $this->folder . "/" . $_FILES[$this->name]["name"][$i]);
                        $this->prompt[$i] = "Pildid asetatud:img/galerii/" . $this->folder . "/" . $_FILES[$this->name]["name"][$i];
                    }
                }
            } else {
                $this->prompt[$i] = "Fail ".$_FILES[$this->name]["name"][$i]." ei ole nõuetekohane";
            }
        }
    }
}