DOCKER = docker run --rm -v $(PWD):/usr/src/mycliapp -w /usr/src/mycliapp
PHP = $(DOCKER) php:8.3-cli php
COMPOSER = $(DOCKER) composer composer

build:
	docker build -t mycliapp .

dump:
	$(COMPOSER) dump-autoload

student:
	$(PHP) ./Student/index.php


.PHONY: build dump student