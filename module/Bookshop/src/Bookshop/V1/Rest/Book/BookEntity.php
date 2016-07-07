<?php

namespace Bookshop\V1\Rest\Book;

class BookEntity {

    protected $id;
    protected $isbn;
    protected $author;
    protected $title;
    protected $rating;
    protected $release_date;

    /**
     * Casting an array to the object
     * 
     * @param array $array
     * @return BookEntity
     */
    public function exchangeArray(array $array)
    {
        $this->id = $array['id'];
        $this->isbn = $array['isbn'];
        $this->author = $array['author'];
        $this->title = $array['title'];
        $this->rating = $array['rating'];
        $this->release_date = $array['release_date'];
        
        return $this;
    }

    /**
     * Extracting an array representation 
     * 
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
