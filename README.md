# ArrayKeyFilter

Array filtering by key.

````

use MarkWilson\ArrayKeyFilter\ArrayKeyFilter;

$myArray = [ ... ];

$filter = new ArrayKeyFilter($myArray);

$filteredArray = $filter->filterByPattern('/^prefix/');
$filteredArray = $filter->filter(function ($key) {
    return $key !== 'testing';
});
$filteredArray = $filter->filter(array($myClass, 'myFilterMethod')));

````
