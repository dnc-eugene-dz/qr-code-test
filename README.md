# QR Code content app #

## Installation on docker

- clone the repository

```bash
git clone git@github.com:dnc-eugene-dz/qr-code-test.git
```

- switch to the project folder
```bash
cd qr-code-test
```

-  setup development domains
```bash
echo "127.0.0.1    qr.test" | sudo tee -a /etc/hosts
```

- build and start app
```bash
make build
```

- configure permissions
```bash
chmod 777 -R storage bootstrap/cache
```

## Useful commands

- run tests

```bash
docker-compose exec phpfpm php artisan test
```

- stop application

```bash
docker-compose stop
```

- up application

```bash
docker-compose up -d
```
