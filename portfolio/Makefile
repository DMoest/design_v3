BIN        := .bin
VENDORBIN  := vendor/bin
PHPLOC     := $(BIN)/phploc
PHPCS      := $(BIN)/phpcs
PHPCBF     := $(BIN)/phpcbf
PHPCPD     := $(BIN)/phpcpd
PHPMD      := $(BIN)/phpmd
PHPSTAN    := $(VENDORBIN)/phpstan
PHPUNIT    := $(VENDORBIN)/phpunit

help:
	@echo ""
	@echo "This 'Makefile' supports the following options:"
	@echo "-----------------------------------------------"
	@echo "1.  clean............	Remove generated files in directory 'build' and .phpunit.result.cache file."
	@echo "2.  clean-all............Remove all generated files."
	@echo "3.  install..............Installs the php-tools and the project dependencies from 'composer.json' file."
	@echo "4.  check-version........Checks the php version and all the php-tools version."
	@echo "5.  prepare..............Removes old and prepare a new 'build' directory."
	@echo "6.  phploc...............Runs the prepare command and remakes the 'build' directory if necessary."
	@echo "7.  phpcs................Runs the 'prepare' command and PHP Code Sniffer."
	@echo "8.  phpcbf...............?"
	@echo "9.  phpcpd...............?"
	@echo "10. phpmd................Runs PHP Mess Detector detects potential problems related to code size, inconsistency, unused code, violation of naming conventions, poor design, and so on"
	@echo "11. phpstan..............Runs PHP Static Analysis, looking for obvious and tricky bugs in your code."
	@echo "12. phpunit..............Runs PHPUnit, unit testing from tests you apply in your code base."
	@echo "13. cs...................Runs PHP Code Sniffer."
	@echo "14. lint.................Lints your code base."
	@echo "15. test.................Runs all the PHP testing tools."
	@echo "16. metric...............Runs the 'phploc' command."
	@echo ""

clean:
	rm -rf build .phpunit.result.cache

clean-all: clean
	rm -rf .bin vendor composer.lock

install: install-php-tools
	composer install

install-php-tools:
	install -d .bin

	# phploc
	curl -Lso $(PHPLOC) https://phar.phpunit.de/phploc.phar && chmod 755 $(PHPLOC)

	# phpcs
	curl -Lso $(PHPCS) https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && chmod 755 $(PHPCS)

	# phpcbf
	curl -Lso $(PHPCBF) https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar && chmod 755 $(PHPCBF)

	# phpcpd
	curl -Lso $(PHPCPD) https://phar.phpunit.de/phpcpd.phar && chmod 755 $(PHPCPD)

	# phpmd
	curl -Lso $(PHPMD) https://github.com/phpmd/phpmd/releases/download/2.9.1/phpmd.phar && chmod 755 $(PHPMD)

check-version:
	uname -a
	@which make
	make --version
	@which php
	php --version
	@which composer
	composer --version
	$(PHPLOC) --version
	$(PHPCS) --version
	$(PHPCBF) --version
	$(PHPCPD) --version
	$(PHPMD) --version
	$(PHPSTAN) --version
	$(PHPUNIT) --version

prepare:
	[ -d build ] || mkdir build
	rm -rf build/*

phploc: prepare
	[ ! -d src ] || $(PHPLOC) src | tee build/phploc

phpcs: prepare
	[ ! -f .phpcs.xml ] || $(PHPCS) --standard=.phpcs.xml | tee build/phpcs

phpcbf:
ifneq ($(wildcard test),)
	- [ ! -f .phpcs.xml ] || $(PHPCBF) --standard=.phpcs.xml
else
	- [ ! -f .phpcs.xml ] || $(PHPCBF) --standard=.phpcs.xml src
endif

phpcpd: prepare
	- $(PHPCPD) app | tee build/phpcpd

phpmd: prepare
	- [ ! -f .phpmd.xml ] || [ ! -d src ] || $(PHPMD) . text .phpmd.xml | tee build/phpmd

phpstan: prepare
	- [ ! -f .phpstan.neon ] || $(PHPSTAN) analyse -c .phpstan.neon | tee build/phpstan

phpunit: prepare
	- [ ! -d "tests" ] || XDEBUG_MODE=coverage $(PHPUNIT) --configuration phpunit.xml $(options) | tee build/phpunit

cs: phpcs

lint: cs phpcpd phpmd phpstan

test: lint phpunit
	composer validate

metric: phploc
