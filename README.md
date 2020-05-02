# WP GraphQL Relevanssi

A plugin to use Relevanssi on WP GraphQL 

## Tests

To run test locally you need to have Docker installed on your machine:

Then you can run:

```bash
docker-compose up
```

In case you are wondering how I've been able to setup the Docker environment and Codeception files:

1. Run `docker-compose up` which will generate all the containers
1. If you haven't bootstraped already concept you can do that by running `docker-compose run --rm --entrypoint bash codecept` and, once inside the container, `codecept bootstrap` .

Reference:
https://codeception.com/docs/12-ParallelExecution#using-codeception-docker-image

You can use the following command to access the Codeception container (it requires having run `docker-compose up` on another shell):

```bash
docker-compose run --rm --entrypoint bash codecept
```

Once inside the container you can run any Codeception command you need. For example:

```bash
codecept generate:test unit Example
```

Initially I was thinking about following [Codeception for Wordpress Guide](https://codeception.com/for/wordpress), but I got stuck and investigating the issue more I've found few articles – [part #1](https://theaveragedev.com/parallel-docker-builds-for-the-wp-browser-project-01/), [#2](https://theaveragedev.com/parallel-docker-builds-for-the-wp-browser-project-02/) and [#3](https://theaveragedev.com/parallel-docker-builds-for-the-wp-browser-project-03/) – from the author explaining the complexities of running this on Docker. Diving deeper I've found [this thread](https://github.com/lucatume/wp-browser/issues/275) which gave me more info and lead me to this [testing tool for Wordpress](https://github.com/valu-digital/wp-testing-tools) based on WP Browser suite.
