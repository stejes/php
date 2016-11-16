<?php

class GetallenReeksMaker {

    public function getReeks() {
        $tab = array();
        for ($i = 0; $i < 10; $i++) {
            array_push($tab, rand(1, 100));
        }
        rsort($tab);
        return $tab;
    }

}
