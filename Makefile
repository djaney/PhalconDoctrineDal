all:
	@make -s setup
	@make -s build
	@make -s test
	@make -s docs
	@make -s install

setup:

build:
	composer update
run:
	php -S 127.0.0.1:9876 -t Tests/app
test:
	php -S 127.0.0.1:9876 -t Tests/app & ./vendor/phpunit/phpunit/phpunit
	ps -eaf | awk '/ph[p] -S/{ print $$2 }' | xargs kill
docs:

install:
