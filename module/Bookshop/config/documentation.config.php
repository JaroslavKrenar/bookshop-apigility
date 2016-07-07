<?php
return array(
    'Bookshop\\V1\\Rest\\Book\\Controller' => array(
        'collection' => array(
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/books"
       },
       "first": {
           "href": "/books?page={page}"
       },
       "prev": {
           "href": "/books?page={page}"
       },
       "next": {
           "href": "/books?page={page}"
       },
       "last": {
           "href": "/books?page={page}"
       }
   }
   "_embedded": {
       "book": [
           {
               "_links": {
                   "self": {
                       "href": "/books[/:book_id]"
                   }
               }
              "isbn": "Book ISBN",
              "author": "Book author",
              "title": "Book title",
              "rating": "Book rating",
              "release_date": "Book release date"
           }
       ]
   }
}',
            ),
        ),
    ),
);
