<?php

class detailApplication {

    public function showDetails()
    {
        $html = "
            <p>Traer datos, chat y poner estado</p>
        ";

        return $html;
    }

    public function constructor()
    {
        $html = $this->showDetails();

        return $html;
    }
}

?>