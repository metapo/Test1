## Device Scanner

Discovers and displays a list of devices connected to the local network

### Installation
- Clone the repository:<br>
```
git clone https://github.com/metapo/Test1.git project-name
```

- Install dependencies using Composer:
```
cd project-name

composer install -vvv
```

- Create a copy of the .env.example file and rename it to .env:
```
cp .env.example .env
```

- Generate a key for your application:
```
php artisan key:generate
```


- Update the .env file with your database credentials and other configuration settings.
```
desired in .env:
    NMAP_IP_RANGE=*.*.*.*
    NMAP_IP_RANGE=*.*.*.*/*
    NMAP_IP_RANGE=*.*.*.*-*
    NMAP_TIMEOUT=120
```

- Run the database migrations:
```
php artisan migrate
```

### Requirements
- nmap
```
sudo apt-get update
sudo apt-get install nmap
nmap --version
```

### use
- scan devices:
```
php artisan scan:devices
```

- devices list:
```
php artisan serv
```





