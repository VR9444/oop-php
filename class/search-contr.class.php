<?php
class SearchContr extends Search {

    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }
    public function searchFunction(){
        $this->search($this->search);
    }

}