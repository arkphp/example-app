# example-app

## Usage

```
git clone git@github.com:arkphp/example-app.git
cd example-app
docker-compose up -d
```

Visit http://localhost:8090

## Cli

Command line example:

```
docker exec -it arkphp-example-app-cli php cli.php cache:clear
```

## Backend Process

See config/supervisor.conf

## Cron

See config/cron.conf