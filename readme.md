# Garage Controller

An basic application to control the opening and closing of a garage door and the rasing and lowering of an attic hoist. The application is intended to run on raspberry pi using a touch screen as the interface.


# Raspberry Pi Setup Instructions

### Download the Latest Raspian (Screen Version) or Rasbian Lite (Headless)
https://www.raspberrypi.org/downloads/raspbian/

### Prepare the SD Card *(Min 8GB Class 10)*
`diskutil list` *identify the {{disk number}}*  
`diskutil unmountDisk /dev/disk{{disk number}}`  
*NOTE: use `rdisk` for much faster destination write*  
`sudo dcfldd if=/path/to/image.img of=/dev/rdisk{{disk number}}`  
*if `dcfldd` is not available use `dd`)*  

### Set the IP Address
Replace `quiet init=/usr/lib/raspi-config/init_resize.sh` after `rootwait` in the file `cmdline.txt` with **no return**   directly on the SD card with this line (change the IP as needed)
`ip=10.10.10.2:::255.255.255.0:rpi:eth0:off`

### Enable SSH (create and empty file named ssh on the boot partition)  
`touch /Volumes/boot/ssh`

---

## Install SD card into the Raspberry PI, connect it to the local network and boot


### SSH into the RPi
`ssh pi@10.10.10.2`  
Password: `raspberry`  

### Basic Configuration for new RPi
Expand the file system to use the entire drive and set the locale, timezone, and keyboard defaults  
`sudo raspi-config`

- Expand the Filesystem
- reset the default password
- Set the locale to `en_US.UTF-8`
- Set the timezone `US/Pacific-new`
- Reboot

---

### *(Optional)* Remove any unwanted applications to make the final image size smaller  
```shell
sudo apt-get remove --purge libreoffice-* wolfram-engine claws-mail scratch sonic-pi minecraft-pi python-minecraftpi smartsim penguinspuzzle python-pygame
```
`sudo apt-get autoclean`  
`sudo reboot`

---

### Reconnect and Update the RPi
`sudo apt-get update`  
`sudo apt-get upgrade`  
`sudo apt-get autoremove && sudo apt-get autoclean`

### Install Various Utilities
`sudo apt-get install vim git`

--------

### Install NodeJs
*First update apt to use the most recent node (https://github.com/nodesource/distributions)*  
`curl -sL https://deb.nodesource.com/setup_7.x | sudo -E bash -`  
`sudo apt-get install nodejs`  

### Add php7 to the apt-get repository
At the time of this documentation php7 is not available in the stable jessie release

#### Edit `/etc/apt/sources.list` to include the stretch repository
`sudo vim /etc/apt/sources.list`

Paste the following at the end of the file:  
`deb http://mirrordirector.raspbian.org/raspbian/ stretch main contrib non-free rpi`

#### Create the file `/etc/apt/preferences` to insure that stables release have a higher priority
`sudo vim /etc/apt/preferences`  

Paste the following and save the file:
```shell
Package: *
Pin: release n=jessie
Pin-Priority: 600
```

### Apt-get Update  
`sudo apt-get update`  

### Install nginx & PHP 7.0
```shell
sudo apt-get install -t stretch nginx php7.0 php7.0-curl php7.0-gd php7.0-fpm php7.0-cli php7.0-opcache php7.0-mbstring php7.0-xml php7.0-zip php7.0-mcrypt
```

### Make nginx and php start on boot
`sudo update-rc.d nginx defaults`  
`sudo update-rc.d php7.0-fpm defaults`

### Configure nginx and enable php by editing the default site to match the following:
`sudo mv /etc/nginx/sites-available/default /etc/nginx/sites-available/default.bak`  
`sudo vim /etc/nginx/sites-available/default`  

```shell
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    root /var/www/public;

    index index.php index.html index.htm;

    server_name _;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    access_log off;
    error_log /var/log/nginx/default-error.log error;

    error_page 404 /index.php;

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

### Restart nginx
`sudo service nginx restart`

### Restart Php
`sudo /etc/init.d/php7.0-fpm restart`

### Install composer
https://getcomposer.org/download/  

### make composer available globally
`sudo mv composer.phar /usr/local/bin/composer`  

### Create the symlink from `/var/www`  
`sudo rm -rf /var/www`  
`sudo ln -s ~/garage /var/www`

### Setup git ssh to pull the code from the git repo
~~`ssh-keygen -t rsa -b 4096 -C "youremail@domain.com"`~~

### Copy the new public key and add it to the puretec github account
~~`cat ~/.ssh/id_rsa.pub`~~

### Clone the `garage` repository
`git@github.com:barrymortenson/garage.git`  
`cp garage/.env.example garage/.env`   

### Update the `storage` and `bootstrap/cache` folder permissions
`sudo chgrp -R www-data storage bootstrap/cache`  
`sudo chmod -R ug+rwx storage bootstrap/cache`  

---


## Auto Start Chromium in Kiosk Mode

### hide the mouse when not in use
`sudo apt-get install unclutter`

### edit auto start parameters and webpage
sudo vim ~/.config/lxsession/LXDE-pi/autostart
```
@xset s off
@xset -dpms
@xset s noblank
@chromium-browser --incognito --kiosk http://localhost/
@unclutter
```

---

## Final Cleanup
`sudo apt-get autoremove`  
`sudo apt-get autoclean`
