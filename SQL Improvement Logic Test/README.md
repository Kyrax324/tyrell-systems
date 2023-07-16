# SQL Improvement Logic Test

- Time Spent: `1 Hour`

## Observations:
1. The SQL query are trying to display data from three tables (Jobs, JobCategories and JobTypes)
1. While others left joined tables are for mapping between pivot table for filtering with Like statement

## Suggestions:
1. Use 'INNER JOIN' statement to join the three main tables in main query
1. Use 'EXISTS' statement with subquery in WHERE condition to INNER JOIN each of the pivot table group
1. If necessary, we can also consider adding index to column/columns to increase the speed in 'ON' condition and 'WHERE' condition

[Suggested SQL query](./index.sql)