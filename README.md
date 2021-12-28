# Temperature Reader

This is a small application that's designed to read date/time and temperature measurement data from a database and render it.
It's not flash, but does the job that it was requested to do. 
The information is retrieved from an SQLite database in the default route's handler and rendered.

## Project Requirements

To run this project, you will need the following requirements:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose V2](https://docs.docker.com/compose/cli-command/)

### New to Docker?

If you're new to Docker, grab a copy of [Docker Essentials](https://dockeressentials.com), the **free** book and course. 
It will teach you the core of what you need to know.

## Install

To install the project, clone the repository and then run the following command:

```bash
composer install
```

After that, start the project by running the following command:

```bash
docker compose --file docker-compose.dev.yml up -d
```

## Questions?

If you have questions, email matthew@matthewsetter.com.

## Found a Bug?

Report it in [a new issue](https://github.com/settermjd/temperature-reader/issues/new/choose).
