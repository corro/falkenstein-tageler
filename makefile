all:
	zip -r com_tageler.zip com_tageler/* -x com_tageler/.hg
	zip -r mod_tageler.zip mod_tageler/* -x mod_tageler/.hg

install:
	sudo -u www-data cp -r com_tageler/site/* /var/www/joomla/components/com_tageler/
	sudo -u www-data cp -r com_tageler/admin/* /var/www/joomla/administrator/components/com_tageler/
	sudo -u www-data cp -r mod_tageler/* /var/www/joomla/modules/mod_tageler/

uninstall:
	rm -R /var/www/joomla/components/com_tageler
	rm -R /var/www/joomla/modules/mod_tageler