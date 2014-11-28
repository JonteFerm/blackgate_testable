<?php
require __DIR__.'/config_with_app.php';
$app = new \Anax\MVC\CApplicationBasic($di);
$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});

$di->session();

$app->router->add('', function() use ($app){
	$db = new \Mos\Database\CDatabaseBasic();
	$options = new \Jofe\Blackgate\COptions();
	$auth = new \Jofe\BlackGate\CAuthenthicator($options);
	$app->theme->setTitle("Hem");

	$form ="
		<form method=post>
		    <fieldset>
		    <legend>Login</legend>
		    <p><label>User ID:<br/><input type='text' name='content' /></label></p>
		    <p><label>Password:<br/><input type='password' name='name' value=''/></label></p>
		    <p><input type='submit' name='doSave' value='Save' /></p>
		    </fieldset>
		    </form>
		</div>
		<article>
		";
	

	$app->views->add("me/page", [
		'content' => $form
	]);

	if(isset($_POST['id']) && isset($_POST['password'])){

	}

});

$app->router->handle();
$app->theme->render();