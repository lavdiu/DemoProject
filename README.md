## Demo Project
#### How to Set up:
Clone the code to a local directory using:
```bash
git clone git@github.com:lavdiu/DemoProject.git
```

then, in PowerShell run:
```
docker-compose build
docker-compose up -d
docker exec web.app composer install --no-interaction --no-progress --no-suggest --no-ansi
```

#### How to Run:
Navigate to http://localhost:8080/ to see the demo.  
The credentials are:
```
username: administrator
password: administrator
```

#### Database Access
To explore the database structure and data, use the following credentials:
```
Database Type: MariaDB
Host: localhost
Port: 3307
User: app
Password: app
```


