![Blackgate logo](webroot/img/blackgate.jpg)

Blackgate is a user authentication module for use with Anax-MVC and the mos/cdatabase package. The module can be set up to use with your own database table or you could use the default one contained. The module uses a user lockout system which will soft-delete a user after three failed attempts in a session.

How to install?
------------
If you don't have the mos/cdatabase package it can be downloaded from packagist by adding the following to yor composer.json file in your Anax-MVC:

    "require-dev": {
        "mos/cdatabase": "dev-master"
    }

To install blackgate you just include: "jofe/blackgate": "dev-master" in the same way like this:

    "require-dev": {
        "mos/cdatabase": "dev-master",
        "jofe/blackgate": "dev-master"
    }

If you have integrated cdatabase with your Anax-MVC, it's time to integrate blackgate wit Anax and the cdatabase package. This will be done with the help of dependency injection. Add this to your front controller:

	$di->set('BlackgateOptions', function() use ($di) {
		$options = new \Jofe\Blackgate\COptions();
		$options->setDI($di);
		return $options;
	});

Now blackgates COption class is set as a service accessable in the whole framework. As you do this, the database to use with blackgate automatically will be set to the cdatabase object that is set.

Now you can just get the COptions object like this: $options = $app->BlackgateOptions;

If yor own user table you will now have to set the variables in COptions accordingly by assigning them to the getters and setters in the class.

NOTE that you may want to set the salt you use to hash passwords. This can be done in this class.

When you've set up your COptions class it's time to instantiate the CAuthenticator with the COptions object passed to the constructor like this:

$auth = new \Jofe\Blackgate\CAuthenticator($options);

And that is everything you need to do to start working with the functions of CAuthenticator.

However, in the webroot-folder you can find a file named demo.php which you can use in your Anax-MVC to try out the functionality of blackgate. In this file you can also se exactly how you must do to set it all up!

NOTE that the default user table is contained in the webroot of blackgate.

So... what can I use all this stuff for?
-----------------------------------------
This package is to be used along with your user login forms to validate the login input as well as comparing the user passwords. Everything is done by itself by calling the function "apply()" in the CAuthenticator. A boolean value will be returned, and you can also get readily written output text by calling "getOutput()".

What is a littele bit special with this package though is that it has a user lockout system that soft-delete the user after three failed login attempts on a session. The user can only be restored by an administrator directly through the database or with the function "userRestore()" which is also available in the CAuthenticator class.

How does it work?
-------------------
When you first instantiate the CAuthenticator, a database table will be added if not allready existing with the name attempt_log. This table will store user ID and session ID at every failed attempt. After three failed attempts, the user-column "active" will be set to NULL and the column "deleted" set to the current time. When restoring the user the attempt_log for that user will be cleared and the operations on the user-table will be done in reverse.


