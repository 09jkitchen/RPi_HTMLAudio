Also tested on Raspberry Pi 3 running Apache2 and PHP5.

Static ip:
sudo nano /etc/network/interfaces
	auto eth0
	iface eth0 inet static
	address 192.168.0.220
	netmask 255.255.255.0
	netowrk 192.168.0.0
	broadcast 192.168.0.255
	gateway 192.168.0.1
	
Apache2: sudo apt-get install apache2 -y
PHP5: sudo apt-get install php5 libapache2-mod-php5 -y

Music files are on a thumbdrive connected to one of the USB ports.
The thumbdrive is mounted to a static location in the /var/www/html/usbdrv directory
Code:
	sudo nano /etc/fstab/
	/dev/sda1 /var/www/html/usbdrv auto uid=pi,gid=pi,umask=0022,sync,auto,nosuid,rw,nouser 0 0
