all:
	zip -r com_tageler.zip com_tageler/* -x com_tageler/.hg
	zip -r mod_tageler.zip mod_tageler/* -x mod_tageler/.hg

install:
	sudo -u http cp -r com_tageler/site/* /srv/http/joomla/components/com_tageler/
	sudo -u http cp -r com_tageler/admin/* /srv/http/joomla/administrator/components/com_tageler/
	sudo -u http cp -r mod_tageler/* /srv/http/joomla/modules/mod_tageler/

uninstall:
	rm -R /srv/http/joomla/components/com_tageler
	rm -R /srv/http/joomla/modules/mod_tageler