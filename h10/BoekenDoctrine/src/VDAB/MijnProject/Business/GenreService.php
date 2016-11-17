<?php

//business/GenreService.php
//require_once("data/GenreDAO.php");
namespace VDAB\MijnProject\Business;
use VDAB\MijnProject\Data\GenreDAO;

class GenreService {

    public function getGenresOverzicht() {
        $genreDAO = new GenreDAO();
        $lijst = $genreDAO->getAll();
        return $lijst;
    }

}
