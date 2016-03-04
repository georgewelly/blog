# base-php
This is the base of blogging website written in PHP

## Setting Up Locally

Our end goal is to have our very own blog website that we can write posts on. The first step to having a website running on the Internet is to get one running on your local machine. No one will be able to access it, but at least you'll know it works.

To get the PHP based blog up and running locally we'll first need to grab a copy of the base code from Github. Here's [a link](https://github.com/CodeGuild-co/base-php/archive/master.zip). Download this zip file and unzip it onto the Desktop.

The unzipped folder is called `base-php-master` that's not particularly descriptive, change it to something nicer. I called mine `blog`.

We now have the code but we can't run it because we haven't installed the software dependencies. Let's do that. Open a `Konsole` window and type the following commands (don't type the `$` symbol, that's to show you that we're looking at a `Konsole` command line):

    $ sudo add-apt-repository ppa:ondrej/php5
    $ sudo apt-get --assume-yes update
    $ sudo apt-get --assume-yes install apache2 php5 libapache2-mod-php5
    $ sudo sed -i 's|/var/www/|home/vp/Desktop/blog|g' /etc/apache2/apache2.conf
    $ sudo sed -i 's|/var/www/html|/home/vp/Desktop/blog/web|g' /etc/apache2/sites-available/000-default.conf

That's installed PHP for us, now we need to get the PHP libraries that our website needs to run:

    $ cd Desktop/blog
    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar install

We're done!

You should now be able to open up a browser and visit http://localhost to see your blog. When you make changes to the files, refresh the page to see the website change.

## Saving Your Work

Once you've made some changes you'll want to save them. As well as saving them to your USB stick, you should save your projects in "the cloud". More accurately, you should save your code in a version control system. For this project we'll use `git`, and GitHub.

First, download `git`:

    $ sudo apt-get install git

Then set up `git` to use your name and email address:

    $ git config --global user.name "YOUR NAME"
    $ git config --global user.email "YOUR EMAIL ADDRESS"

Now visit [GitHub](https://github.com) and create an account (it's free).

In GitHub create a new repository by clicking the plus symbol in top-right of the page. Don't check the "Initialize this repository with a README" checkbox.

Let's save our local code to this new GitHub repository:

    $ git init
    $ git add .
    $ git commit -m "First commit"
    $ git remote add origin https://github.com/USERNAME/REPO.git
    $ git push -u origin master

You'll have to change `USERNAME` and `REPO` to match your username and repository name.

You're all done!

Anytime you want to save future changes you'll only need to run:

    $ git add .
    $ git commit -m "MESSAGE DESCRIBING YOUR CHANGES"
    $ git push origin master

## Getting Online

To get this base blog online you'll need to:

1. Get Billy to give you your own copy of this repo
    - You probably already have this
    - You'll have picked a unique domain name too
2. Signup to [Heroku](heroku.com)
3. Create an app on Heroku
    - Use the European region when asked
4. Connect your Heroku account to your Github account
5. Connect your Heroku app to your Github repo
6. Enable automatic deploys
7. Make a change to your repo (using the Github editor)
8. Visit your Heroku app's settings and add a custom domain
    - add your personal CodeGuild domain
    - e.g. `wm.codeguild.co`
8. Visit your domain and see your blog!


## Adding Posts

1. Create a file for your new post in `web/views/posts`
2. Update `web/views/layout.html` to include your new post
2. Update `web/views/index.twig` to include your new post

It's easy, but boring. You should try using PHP (and Silex) to automate these steps (be lazy!).
