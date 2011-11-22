stupidMVC
==========

This project helps you start with a very light weight MVC, with Mustache templating to start with 

Usage
----------

Once you download this mvc put it in your htdocs (or where ever you want ). You should see a folder structure like this 

<pre>
My-Folder/
|-application/
|  |-helpers/
|  | |-Mustache.php
|  | |-Route.php
|  | |-Router.php
|  |
|  |-model/
|  | |-Index.php
|  |
|  |-view/
|  | |-templates/
|  |  |-index.mustache
|  |-widgets/
|    |-Address.php
|    |-test/
|      |-TestWidget.php
|
|-static/
|  |-css/
|  | |-test.css
|  |
|  |-images/
|  |
|  |-js/
|  
|-.DS_Store
|-.htaccess
|-README
</pre>


Now you can put your Models inside the model folder , views in the view folder etc.

You can add new entrypoints in the entrypoints.json file

This should help you get started with the web application


For details about mustache see http://mustache.github.com/

Requirements
-------------
Turn Mod rewrite on - on your apache
I am working with php v 5.3+ (not sure if this is backwards compatible please test it yourself and let me know)

How Things Work
================

entrypoints.json 
-----------------
This files define all permissible entry points and the model classes , views, widgets to be used for rendering content with respect to that entrypoint.
This file has to be in the serialised JSON format . (use double quotes to stringify stuff , single quote means invalid JSON)

if there is any error in this file the application will not work.


Models
-------

Models reside in the Models Folder

The Model class (say "Index.php") is assumed to have a class that has the same name as the file, ignoring the file extension(so for "Index.php" , the class name should be "Index" for "TestClass.inc" the class name should be "TestClass" ). This class should extend the class "Page". Override the "gatData" method of "Page" class to return the data to the mustache template (view).

Widgets
--------

Widgets reside in the widgets folder

Widgets are smaller modules that can be included in pages just by including them in the respective entrypoint config in the entrypoints.json file
The Widgets have a similar naming requirement to the Models , and the Widgets should extend the class "Widget". Data can be returned by the widgets by overriding the "getData" method.

widgets data can be accessed in the mustache templates like this 

<pre>
  {{#widgets}}
    {{address.street_name}}
  {{/widgets}}
</pre>

View
-----
View templates (extension ".mustache") reside in the view folder

For details about mustache see http://mustache.github.com/

See the example config for the entry point "index" and try to figure out its model classes and widgets , view and you should get an understanding of how things work .

Serving Static Files
---------------------

Put all the static files in the static folder ( you can create any path in the static folder ). and they will be served from urls like these

"http://localhost/static/css/test.css"

(see index.mustache it has a css example)






