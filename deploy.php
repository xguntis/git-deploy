<?php
/**
* GIT DEPLOYMENT SCRIPT
*
* Used for automatically deploying websites via github or bitbucket. Code Source Here:
*
*		https://github.com/xguntis/git-deploy
*/


// The commands
$commands = array(
	'echo $PWD',
	'whoami',
	'cd .. && git add --all .',
	'cd .. && git stash',
	'cd .. && git pull',
	'cd .. && git status',
// 'git submodule sync',
// 'git submodule update',
// 'git submodule status',
);

// Run the commands for output
$output = '';
foreach($commands AS $command){
// Run it
$tmp = shell_exec($command);
// Output
$output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
$output .= htmlentities(trim($tmp)) . "\n";
}

// echo "<pre>";
// if ($update) {
//   // Do a git checkout to the web root
//   exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' fetch', $output);
//   print_r($output);
//   exec('cd ' . $repo_dir . ' && GIT_WORK_TREE=' . $web_root_dir . ' ' . $git_bin_path  . ' checkout -f', $output);
//   print_r($output);
//   // Log the deployment
//   $commit_hash = shell_exec('cd ' . $repo_dir . ' && ' . $git_bin_path  . ' rev-parse --short HEAD');
//   file_put_contents('deploy.log', date('m/d/Y h:i:s a') . " Deployed branch: " .  $branch . " Commit: " . $commit_hash . "\n", FILE_APPEND);
// }


// Make it pretty for manual user access (and why not?)

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
		<title>GIT DEPLOYMENT SCRIPT</title>
	</head>
	<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
	<pre>
		.  ____  .    ____________________________
		|/      \|   |                            |
		[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  | Git Deployment Script v0.1 |
		|___==___|  /              &copy; oodavid 2012 |
		|____________________________|
		
		<?php echo $output; ?>
	</pre>
</body>
</html>

?>