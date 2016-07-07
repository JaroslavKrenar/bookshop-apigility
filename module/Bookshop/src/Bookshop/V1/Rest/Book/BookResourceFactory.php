<?php
namespace Bookshop\V1\Rest\Book;

class BookResourceFactory extends \ZF\Rest\AbstractResourceListener
{
    public function __invoke($services)
    {
        $mapper = $services->get('Bookshop\V1\Rest\Book\BookMapper');
        return new BookResource($mapper);
    }
}
