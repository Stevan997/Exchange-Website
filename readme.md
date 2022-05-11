# Laravel/Lumen Docker Scaffold

### **Description**

This will create a dockerized stack for a Laravel/Lumen application, consisted of the following containers:
-  **app**, your PHP application container

        Nginx, PHP7.2 PHP7.2-fpm, Composer
    
-  **mysql**, MySQL database container ([mysql](https://hub.docker.com/_/mysql/) official Docker image)

#### **Directory Structure**
```
+-- src <project root>
+-- resources
|   +-- default
|   +-- nginx.conf
|   +-- supervisord.conf
|   +-- www.conf
+-- .gitignore
+-- Dockerfile
+-- docker-compose.yml
+-- readme.md <this file>
```

### **Setup instructions**

**Prerequisites:** 

* Depending on your OS, the appropriate version of Docker Community Edition has to be installed on your machine.  ([Download Docker Community Edition](https://hub.docker.com/search/?type=edition&offering=community))

**Installation steps:** 

1. Create a new directory in which your OS user has full read/write access and clone this repository inside.

2. Create two new textfiles named `db_root_password.txt` and `db_password.txt` and place your preferred database passwords inside:

    ```
    $ echo "myrootpass" > db_root_password.txt
    $ echo "myuserpass" > db_password.txt
    ```

3. Open a new terminal/CMD, navigate to this repository root (where `docker-compose.yml` exists) and execute the following command:

    ```
    $ docker-compose up -d
    ```

    This will download/build all the required images and start the stack containers. It usually takes a bit of time, so grab a cup of coffee.

4. After the whole stack is up, enter the app container and install the framework of your choice:

    **Laravel**

    ```
    $ docker exec -it app bash
    $ `composer create-project --prefer-dist laravel/laravel .`
    $ nano .env
    $ php artisan migrate --seed
    ```

    **Lumen**

    ```
    $ docker exec -it app bash
    $ composer create-project --prefer-dist laravel/lumen .
    $ nano .env
    $ php artisan migrate --seed
    ```

4. Setup `.env` file. You can see how it should look like in `.env.example` file

5. Log in to docker instance with following command `docker exec -it app_payments bash`

6. Then run `composer install`

7. Generate App key by entering manually generated key by running `$ php artisan tinker` then `Illuminate\Support\Str::random(32)`. Copy generated string and paste it as a value of `APP_KEY` inside `.env` file  

8. That's it! Navigate to [http://127.0.0.1:8080](http://127.0.0.1:8080) to access the application.

9. After the application is Accessible try to create Docker network with following command 
    ```
    $ docker network create internal
        ```

10. Next assign the container to the network 
    ```
    $ docker network connect internal app_bby_mrp
    ```