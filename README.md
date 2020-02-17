<p align="center"><img src="public/ftpreader.png" width="400"></p>

## 📚 About Ftpreader

Simple data reader on ftp server.


## 🔧 Usage
Laravel's Flysystem integrations works great with FTP; however, a sample configuration is not included with the framework's default filesystems.php configuration file. If you need to configure a FTP filesystem, you may use the example configuration below:

```php
'ftp' => [
    'driver'   => 'ftp',
    'host'     => 'ftp.example.com',
    'username' => 'your-username',
    'password' => 'your-password',
]
```

## 🔧 Steps

firstly, make sure you have docker installed on your machine.

```
docker-compose build
```
Up containers. (Web container, msyql container, queue container and redis container.)

```
docker-compose up
```

```
docker ps
```
<p align="center"><img src="public/containers.png"></p>

Okey, your app is running on localhost:8001. You can read ftp files from /categoriesImport path.


