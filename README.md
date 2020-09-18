# Gabbler
#### CF2m Team Gabbler.
Gabbler is a community chat project created by the students of the CF2M web developer class.

## Instruction 

- copy and rename the file config.php.local to config.php

- Import data/db/db_gabbler.sql *( port `3308`, use the same port )*

## Description

__TO DO LIST__ :
- [trello.com](https://trello.com/b/w4Htib05)

__Graphic charter__ :
- ![Alt text](data/charte/Maquette%20XD/white%20mode/Rooms.png)

__Database__ :
- ![Alt text](data/db/db_gabbler.png)

## Global project charter

- Main language of the project : `ENGLISH`
    
- Nomenclature of variables, functions and files *( ex : `$ad_variable` (variable) / `ad.history.controller.php` (file) )*
    - `ad_ / ad.` : Adrien
    - `au_ / au.` : Audrey
    - `al_ / al.` : Alain
    - `cl_ / cl.` : Clovis
    - `ma_ / ma.` : Marjorie
    - `br_ / br.` : Bryan
    - `mi_ / mi.` : Michaël
    
- Writing code in `procedural language`

- MVC structure :
    - Model : file containing functions and queries `SQL` *( ex: `ad.history.model.php` )*
    - Controller : file containing the transformation and security of data between the `Model` & `View` *( ex: `ad.history.controller.php` )*
    - View: file containing the HTML that displays the content - file provided in the `view` folder.
    
- Use pre-defined constants for folders. *( ex: `DIRECTORY_SEPARATOR` )*

- Pull request to `upstream`, no class or id for `CSS` must be in the view files

- At pull request add comment with the name of your `issues`