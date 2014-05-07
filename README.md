# ArrayKeyFilter

Array filtering by key.

````
use MarkWilson\ArrayKeyFilter;

$myArray = [ ... ];

$filter = new ArrayKeyFilter\KeyPatternFilter('/^prefix/');

$filtering = new ArrayFiltering($myArray);

$filteredArray = $filtering->filterBy($filter);
````
