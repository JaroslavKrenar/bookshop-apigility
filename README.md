# bookshop
bookshop REST API example in APIGILITY

## Requirements
* PHP 5.5+
* ext-intl

## installation

```
$ git clone https://github.com/JaroslavKrenar/bookshop-apigility.git
$ php composer.phar install
```

## Configuration

You can configure database connection in ```config/autoload/user.global.php``` (```mysql``` is selected as default) and create table from file ```data/book.sql```:

## Usage

```
$ php -S localhost:8000 -t public/ public/index.php
```

## API

### GET /books

##### Parameters

| Name  | Type | Description |
| ------------- | ------------- | -------------|
| isbn  | string | ISBN |
| author | string | Author name |
| title | string  | Book title |
| release_date | string  | Release data. You can use ```"|"``` to find between dates, e.g. ```2015-01-01|2016-01-01```  |
| minimum_rating | float  | Search by minimum rating |

#### Example

```
$ http://localhost:8000/books?release_date=2005-07-04
```
### POST /books

##### Parameters

| Name  | Type | Description |
| ------------- | ------------- | -------------|
| isbn  | string | ISBN |
| author | string | Author name |
| title | string  | Book title |
| rating | float  | Book rating  |
| release_date | string  | Release data in format ```Y-m-d``` |

#### Example

Request
```
$ http://localhost:8000/books

{
  'isbn' => "9780833052643"
  'author' => "Pascale Lesch"
  'title' => "WILL do next! If they had to fall a long way. So."
  'rating' => 3.44
  'release_date' => "2016-01-23"
}
