Tested on Raspberry Pi 2 with a lighttp server and PHP5.
Also tested on Raspberry Pi 3 running Apache2 and PHP5.

Music files are on a thumbdrive connected to one of the USB ports.
The thumbdrive is mounted to a static location in the /var/www/html/usbdrv directory
Code:
	sudo nano /etc/fstab/
	/dev/sda1 /var/www/html/usbdrv auto uid=pi,gid=pi,umask=0022,sync,auto,nosuid,rw,nouser 0 0
