all:
	zip -r com_tageler.zip com_tageler/* -x com_tageler/.hg
	zip -r mod_tageler.zip mod_tageler/* -x mod_tageler/.hg
	zip -r pkg_tageler.zip pkg_tageler.xml com_tageler.zip mod_tageler.zip
