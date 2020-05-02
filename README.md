# WP GraphQL Relevanssi

A plugin to use Relevanssi on WP GraphQL 

## Tests

This plugin make use of a [testing tool for Wordpress](https://github.com/valu-digital/wp-testing-tools) which lets us test Wordpress with Codeception (many thanks to [lucatume](https://github.com/lucatume) for its [wp-browser](https://github.com/lucatume/wp-browser) integration and to [valu-digital](https://github.com/valu-digital) for wrapping the complex part needed to run this with ease).

In order to run tests locally you need to install Docker.

To run tests spin up Docker containers. *DO NOT RUN the default `docker-compose up` command*. Tests use a different `docker-compose.yml` file. In order to use that run:

```bash
./docker/run compose
```

Once containers are ready access the container where Codeception is installed. To do so there is a convenient command that avoid any overhead.

```bash 
./docker/run shell
``` 

Now you should be inside the container. Here you can use any Codeception command. A good start can be:

```bash
codecept run wpunit
```

For more info check [wp-testing-tools guide](https://github.com/valu-digital/wp-testing-tools).