<?php

namespace App\Entity;

class PropertySearch
{

    private $searchbar;

    /**
     * @return mixed
     */
    public function getSearchbar()
    {
        return $this->searchbar;
    }

    /**
     * @param mixed $searchbar
     */
    public function setSearchbar($searchbar): void
    {
        $this->searchbar = $searchbar;
    }

}