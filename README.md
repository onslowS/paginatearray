# paginatearray

Yet another interview bit of code. 

The task is:

The task is to write a function which will take a list of items and then return an array containing a list of pages and an offset and item count for each page. Initially we want a MINIMUM of 30 items on each page but the function should allow them to change this and still produce the correct result.
Critically we require each page to contain the same number of items (or as close as possible) so if there were 61 items, rather than splitting onto 3 pages with 30, 30 and 1 we would want the list split into 2 pages with 31 and 30 items.
