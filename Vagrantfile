$script = <<SCRIPT
    locale-gen en_GB.UTF-8
    add-apt-repository ppa:ondrej/php5
    apt-get --assume-yes update
    apt-get --assume-yes install apache2 php5 libapache2-mod-php5
    sed -i 's|/var/www|/vagrant|g' /etc/apache2/apache2.conf
    sed -i 's|/var/www/html|/vagrant/web|g' /etc/apache2/sites-available/000-default.conf
    apachectl restart
SCRIPT
$user_script = <<SCRIPT
    cd /vagrant
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install
SCRIPT

Vagrant.configure(2) do |config|
    config.vm.box = "ubuntu/trusty64"
    config.vm.network "private_network", ip: "192.168.33.27"
    config.vm.provision "shell", inline: $script
    config.vm.provision "shell", privileged: false,inline: $user_script
end
