all:
	zip com_tageler.zip com_tageler/* -x com_tageler/.hg
	zip mod_tageler.zip mod_tageler/* -x mod_tageler/.hg

install:
	cp -r com_tageler/site/* /var/www/joomla/components/com_tageler/
	cp -r mod_tageler/* /var/www/joomla/modules/mod_tageler/

uninstall:
	rm -R /var/www/joomla/components/com_tageler
	rm -R /var/www/joomla/modules/mod_tageler