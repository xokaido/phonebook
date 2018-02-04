## The Phonebook Test Application

The application is based on the latest codeigniter ( v.3.* )
In order to get tha application running on your host you need to first
clone the code and then issue:

# composer install

After composer installs update the ```ci/app/config/database.php``` file and put 
correct database credentials in it.

Set the URL of the application in ```ci/app/config/config.php```  

Run migration to get the database schemas in place:

# php index.php migrate

Setup the webserver ( Apache, Nginx or whatever you're using ) to point to the newly
created directory and acess the page with the same URL you used in your config file.

The default username / password is:

# admin@admin.com / password


Thank you!
