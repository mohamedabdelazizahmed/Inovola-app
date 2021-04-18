## About Task

This task is to paginate and sort a list of news gotten from a RESTFUL API which paginate nad sort list of news from 3 different news agencies by date and rating.


## Task Technics

- MVC Pattern, sort API.
- API paginate using custom laravel paginate() function.
- API sorting using laravel sortBy() function.
- Using Query Parameter to Sort The api
- Table using bootstrap.
- FrontEnd Handled using VueJS.


## Getting Start

1- Run Command [npm install] to install node-modules in the package.json.
2- Run Command [npm run dev] to compile vue project into the laravel project.
3- Run Command [php run serve] to run php server as localhost.


## Usage API 
```bash
localhost:8000/api/news?rating=asc 
localhost:8000/api/news?rating=desc
localhost:8000/api/news?date=asc
localhost:8000/api/news?date=desc
```
## API Response
```bash
{
current_page: 1,
data: [
{
title: "title 9 ",
Content: "content 9 ",
rating: "1/10",
datetime: "2020-12-14T12:00:00.000000Z",
rating_number: 1
},
{
title: "title 3 ",
Content: "content 3 ",
rating: "2/10",
datetime: "2020-12-14T06:04:59.000000Z",
rating_number: 2
},
{
title: "title 4 ",
Content: "content 4 ",
rating: "3/10",
datetime: "2020-12-14T13:01:59.000000Z",
rating_number: 3
}
],
first_page_url: "/?page=1",
from: 1,
last_page: 3,
last_page_url: "/?page=3",
links: [
{
url: null,
label: "&laquo; Previous",
active: false
},
{
url: "/?page=1",
label: "1",
active: true
},
{
    url: "/?page=2",
    label: "2",
    active: false
},
{
    url: "/?page=3",
    label: "3",
    active: false
},
{
    url: "/?page=2",
    label: "Next &raquo;",
    active: false
}
],
next_page_url: "/?page=2",
path: "/",
per_page: 3,
prev_page_url: null,
to: 3,
total: 9
}
```