# Git Deployment Using PHP And Linux Commands
## About and Credits

This deployment script is a combination of two scripts that I found on github and adjusted to my needs. Here are both of them:

* [Deploy your site with git](https://gist.github.com/oodavid/1809044) by [David King](https://gist.github.com/oodavid)
* [Simple PHP Git deploy script](https://github.com/markomarkovic/simple-php-git-deploy) by [Marko Marković](https://github.com/markomarkovic)

What this script does is - it:

* add all server changes and stash them for easy retrieval later in case, if there is problem after deploing or some changes on server are done directly - just to avoid loosing them.
* do git pull from the remote repository
* log all output to screen and to file

## Prerequisites, assumptions

* you must have Linux based server with Git installed on it;
* on the server you have git repository in the working dir - that is .git folder is in your web root;
* you have setup and working all repositories - local, github and server (how to do that is a separate topic);
* you have git command in your shell PATH. That means that invoking git command via php exec should find it;

## Setup

Place the contents of repository in a folder `deploy` in the web root of your project.

For security reasons you may want to rename the folder to anything you want, say `XHTwZWSfhGmq` - just to hide it from the world.

## Usage

After pushing your local changes to remote repository (Github, Bitbucket, or similar) you just go to your browser and enter url:

```
www.myserver.com/deploy/deploy.php
```

You will see the output on the screent.

When you are confident about your process you can go one more step further, by launching this script automatically after each commit. In order to do so you must set up web-hook in the remote repository (Github, Bitbucket, ...) and point to this script.

# My GIT deployment scenario

Here are some general notes of git commands that i used before manually and that are now implemented in script.

Also see how to revert back to the state prior to running deploy.php.

## Deploying

On your local computer do:

```
git add --all . # note the dot at the end
git commit
git push
```
On server do :

```
git add --all . # note the dot at the end
git stash
git pull
```

## Reverting back

This will detach your HEAD, that is, leave you with no branch checked out:

First get list of previous commits by

```
git log
```
then select the second from top *commit sha* and use it in the command
```
git checkout <commit sha>
```
Or if you want to make commits while you're there, go ahead and make a new branch while you're at it:
```
git checkout -b old-state <commit sha>
git stash pop
```
Read more options of reverting back at [git reset - Revert to a previous Git commit - Stack Overflow ](http://stackoverflow.com/questions/4114095/revert-to-a-previous-git-commit)

##ToDo

* [ ] need split log file by day so it does not get too big
* [ ] script for fast and automatic reverting to the state before deployment
