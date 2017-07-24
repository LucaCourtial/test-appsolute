# test-appsolute

Courtial Luca

Context : Test realise dans le cadre d'une candidature pour être alternant developpeur Php à Appsolute.

Sujet :
	Votre defi si vous l'acceptez est de creer un petit site responsive Laravel ou Symfony (ou PHP/ Node si vous ne pouvez ni LV ni SF) qui aura les proprietes suivantes:

	- recuperer un flux JSON d'actualites de la BBC Sport: https://newsapi.org
	- Afficher la liste qui devra contenir les articles avec date / heure / image / titre / abstract
	- Au clic ouvrir la vue de detail de l'article en natif (pas dans le navigateur)
	- Ajouter possibilite de partage
	- Possibilite de s'inscrire avec email / password, puis d'ajouter un article en favoris lister les articles en favoris (avec donc une base mysql)

etapes :
	- Creation d'un fichier ".env" à la racine du projet et initilialiser les differentes variables suivant votre environnement (cf Annexes).
	- Lancer la commande "php artisan migrate" à la racine du projet pour creer les tables de la base de donnees.

Annexes :
	APP_NAME=
	APP_ENV=local
	APP_KEY=
	APP_DEBUG=true
	APP_LOG_LEVEL=debug
	APP_URL=

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=
	DB_USERNAME=
	DB_PASSWORD=

	BROADCAST_DRIVER=log
	CACHE_DRIVER=file
	SESSION_DRIVER=file
	QUEUE_DRIVER=sync

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_DRIVER=
	MAIL_HOST=
	MAIL_PORT=
	MAIL_USERNAME=
	MAIL_PASSWORD=
	MAIL_ENCRYPTION=

	PUSHER_APP_ID=
	PUSHER_APP_KEY=
	PUSHER_APP_SECRET=