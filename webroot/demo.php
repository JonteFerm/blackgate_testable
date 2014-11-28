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
	$options = new \Jofe\Blackgate\COptions();

	//Set the options
	$options->setDB($app->db);
	$options->setTableName('user');
	$options->setIdColName('acronym');
	$options->setPassColName('password');

	//Instantiate the authenticator with the options
	$auth = new \Jofe\Blackgate\CAuthenticator($options);
	$app->theme->setTitle("Hem");
	$output = null;

	if(isset($_POST['id']) && isset($_POST['password'])){
		
		$output = $auth->apply($_POST['id'], $_POST['password']);
	}

	$form ="
		<form method=post>
		    <fieldset>
		    <legend>Login</legend>
		    <p><label>User ID:<br/><input type='text' name='id' /></label></p>
		    <p><label>Password:<br/><input type='password' name='password'/></label></p>
		    <p><input type='submit' name='doSave' value='Save' /></p>
		    $output
		    </fieldset>
		    </form>
		</div>
		";
	

	$app->views->add("me/page", [
		'content' => $form
	]);


});

$app->router->handle();
$app->theme->render();