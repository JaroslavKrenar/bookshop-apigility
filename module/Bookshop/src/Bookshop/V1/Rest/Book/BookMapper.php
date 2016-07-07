<?php

namespace Bookshop\V1\Rest\Book;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

class BookMapper {

    protected $adapter;

    /**
     * 
     * @param AdapterInterface $adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * Save data
     * 
     * @param array $data
     * @param int $id
     * @return \Bookshop\V1\Rest\Book\AlbumEntity
     */
    public function save($data)
    {
        $data = (array) $data;

        if (!isset($data['rating'])) {
            $data['rating'] = NULL;
        }

        $sql = 'INSERT INTO book (isbn, author, title, rating, release_date) VALUES(:isbn, :author, :title, :rating, :release_date)';
        $result = $this->adapter->query($sql, $data);
        $data['id'] = $this->adapter->getDriver()->getLastGeneratedValue();
        
        return (new BookEntity())->exchangeArray($data);
    }

    /**
     * Apply filtering
     * 
     * @param Select $select
     * @param array $params
     * @return void
     */
    protected function applyFilter(Select $select, array $params)
    {
        if (isset($params['isbn'])) {
            /* $select->where('isbn LIKE ?', "%9791035336684%"); */ // I can't understand why it doesn't works
            $select->where('isbn LIKE \'%' . trim($params['isbn']) . '%\'');
        }

        if (isset($params['author'])) {
            $select->where('author LIKE \'%' . trim($params['author']) . '%\'');
        }

        if (isset($params['title'])) {
            $select->where('title LIKE \'%' . trim($params['title']) . '%\'');
        }

        if (isset($params['release_date'])) {
            $dateParts = explode('|', $params['release_date']);

            if (count($dateParts) === 2) {
                $select->where('release_date >= \'' . $dateParts[0] . '\'')
                        ->where('release_date <= \'' . $dateParts[1] . '\'');
            } else {
                $select->where('release_date = \'' . $dateParts[0] . '\'');
            }
        }

        if (isset($params['minimum_rating'])) {
            $select->where('rating >= \'' . $params['minimum_rating'] . '\'');
        }
    }

    /**
     * Fetch all book and apply filtering if params defined
     * 
     * @param \Zend\Stdlib\Parameters $params
     * @return \Bookshop\V1\Rest\Book\BookCollection
     */
    public function fetchAll(\Zend\Stdlib\Parameters $params = NULL)
    {
        $select = new Select('book');

        if (!is_null($params)) {
            $this->applyFilter($select, $params->toArray());
        }

        $paginatorAdapter = new DbSelect($select, $this->adapter);

        return new BookCollection($paginatorAdapter);
    }

    /**
     * Fetch one book
     * 
     * @param int $bookId
     * @return boolean|\Bookshop\V1\Rest\Book\BookEntity
     */
    public function fetchOne($bookId)
    {
        $sql = 'SELECT * FROM book WHERE id = ?';
        $results = $this->adapter->query($sql, array($bookId));

        $data = $results->toArray();

        if (!$data) {
            return false;
        }

        return (new BookEntity())->exchangeArray($data[0]);
    }

}
