- This task uses Php7.4.3
-Composer version is 2.0.14

Run via docker
-Navigate to the root of the project

-run
-- docker-compose up -d --build
-- docker-compose run composer dump -o

-run a task/symfony command
-- ./phpdev-proxy-cli 3sc:temp:converter -t 40 -u celcius

run tests
-- tests/test-proxy-cli tests
