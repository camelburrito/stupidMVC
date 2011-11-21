stupidMVC
==========

This project helps you start with a very light weight MVC, with Mustache templating to start with 

Usage
----------

Once you download this mvc put it in your htdocs (or where ever you want ). You should see a folder structure like this 
My-Folder/
|-application/
  |-helpers/
    |-Mustache.php
    |-Route.php
    |-Router.php
  |-model/
    |-index.php
  |-view/
    |-templates/
      |-index.mustache
|-static/
  |-css/
    |-test.css
  |-images
  |-js
|-.DS_Store
|-.htaccess
|-README



Now you can put your Models inside the model folder , views in the view folder etc.

You can add new entrypoints in the entrypoints.json file

This should help you get started with the web application


For details about mustache see http://mustache.github.com/

Requirements
-------------
Turn Mod rewrite on - on your apache
I am working with php v 5.3+ (not sure if this is backwards compatible please test it yourself and let me know)

Assumptions
------------

The Model class (say index.php) is assumed to have a class called Page, which is assumed to have a getData method which returns the PHP array which is to be used by the mustache template (view)

TODO
-----
Add support for widgets and permissions










