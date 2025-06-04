DOCKER = docker run --rm -v $(PWD):/usr/src/mycliapp -w /usr/src/mycliapp
PHP = $(DOCKER) php:8.3-cli php
COMPOSER = $(DOCKER) composer composer

build:
	docker build -t mycliapp .

dump:
	$(COMPOSER) dump-autoload

student:
	$(PHP) ./src/Student/index.php

product:
	$(PHP) ./src/Product/index.php

velo:
	$(PHP) ./src/BikeShop/index.php

banque:
	$(PHP) ./src/CompteBancaire/index.php

livres:
	$(PHP) ./src/Livres/index.php

vehicule:
	$(PHP) ./src/Vehicule/index.php

zoo:
	$(PHP) ./src/Zoo/index.php

geometrie:
	$(PHP) ./src/Geometrie/index.php

ecommerce:
	$(PHP) ./src/Ecommerce/index.php

pve:
	$(PHP) ./src/PVe/index.php

messagerie:
	$(PHP) ./src/Messagerie/index.php

reservation:
	$(PHP) ./src/Reservation/index.php

agence:
	$(PHP) ./src/AgenceWeb/index.php


.PHONY: build dump student product velo banque livres vehicule zoo geometrie ecommerce pve messagerie reservation agence