# SCRIPT FEATHER BLOG

## Table of contents

- [General info](#general-info)
- [Technologies](#technologies)
- [Features](#features)
- [Setup](#setup)
- [Run](#run)

## Simple blogging system

This is an example of simple CRUD (Create, Read, Update, Delete) application, using php and MySql. It aims to demonstrate how does a dynamic website interact with server by developing both frontend (client-side) and backend (server-side) of a website to create simple blogging system.

## Technologies

Project is created with:

- HTML
- CSS
- Bootstrap version: 5.0.0
- PHP version: 7.4.5
- Sass
- MySql

## Features

- Admin Panel
- Create Posts
- Read Posts
- Update Posts
- Delete Posts
- View Admins
- Add Admins
- Remove Admins
- Edit Admin Profile
- Login-logout function

## Setup

1. Install XAMPP
2. Run XAMPP Control panel and start ‘Apache’ and ‘MySql’. Then click ‘Admin’ for ‘MySql’; it will run the ‘phpmyadmin’ on your default browser.
3. Extract the folder inside ‘htdocs’ folder. The main folder should be inside the ‘htdocs’ folder, otherwise it will not work.
4. Back to your ‘phpmyadmin’, create new database named ‘script-feather’.
5. Select the newly created database and click import on the top navigation bar. ‘Choose file’ and navigate the extracted folder, select ‘script-feather.sql’. Click go.

## Run

Search: localhost/folder_name\
If the set up is correct, your browser should load the landing page of our blog.\
Note that folder_name is the file folder name that you extracted inside the htdocs folder, 'script-feather' is the default, but it may vary when you download it.

For Admin panel: localhost/folder_name/Admin\
Note: Admin is the default.
