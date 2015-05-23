<?PHP

$webhookKey = 'Paqe7dNDjfVJGLwTZwKtiLt6'; // key from http://getredditalerts.com
$redditUsername = 'reddit-shit-bot'; //username of your bot
$redditPassword = 'skrillexfan'; //password of your bot


//you shouldn't need to edit anything below this line, unless you want to customize the response

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
echo "<pre>";

if(!isset($_POST['redditAlertJson'])){ 
	die('Missing redditAlertJson');
}

$redditAlertJson = $_POST['redditAlertJson'];

$redditAlert = json_decode($redditAlertJson);

if($redditAlert->webhookKey!=$webhookKey){
	die('Wrong webhookKey');
}

require 'reddit.php';
$reddit = new reddit($redditUsername,$redditPassword);

$response = $reddit->addComment($redditAlert->reddit->name,'***
**Your comment has been shit on! ヽ༼ຈل͜ຈ༽ﾉ**

Another user hated your comment so much that they shat on it, giving you **Reddit Shit**.

Reddit Shit is reddit's premium shit program. Here are the benefits:

* Extra shit

* Free YouTube comments (congratulations! )

* Discuss and get absolutely no help on the annoyances at /r/shitbenefits

* Grab a drink and join us in /r/Shitlounge, the super-secret-shit-only community that may or may not exist.

***

**Did you know**: Most Reddit Shit—78 percent of the yearly shit supply—is made into fedoras. Other industries, mostly electronics, medical, and dental, require about 12 percent. The remaining 10 percent of the yearly shit supply is used in financial transactions.');
var_dump($response);

exit;
