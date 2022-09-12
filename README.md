# PHP-Laravel-Pusher

## Installation

- `composer install` - to install all dependencies.

- `npm install` - to install npm packages.

- `npm run dev` - to publish updates from resources to public.

- `cp .env.example .env` - to duplicate .env.

- Edit the env configurations below:
```
APP_NAME="PHP-Laravel-Pusher"
...
PUSHER_APP_ID=<ID>
PUSHER_APP_KEY=<KEY>
PUSHER_APP_SECRET=<SECRET>
PUSHER_APP_CLUSTER=ap1
...
BROADCAST_DRIVER=pusher
```

- `php artisan key:generate` - to generate new app key.

- Edit the env with you database credentials. NOTE: Don't forget to create the database directly in MySQL first.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test_pushe
DB_USERNAME=root
DB_PASSWORD=<PASSWORD>
```

- `php artisan migrate:fresh --seed` - to migrate database and create sample data.

## Testing and Debugging

- Run the artisan server: `php artisan serve`

- Register/Login an account (test account) to Web. You will be redirected to dashboard RTM.

- Open the link broadcast in a separate browser tab/page - http://localhost:8000/aux-change?employee_id=5&aux_main=ON&aux_sub=Calling

- Make changes to query params the employee_id = (1 - 6)

- Make changes to auxes

- aux_main/aux_sub >>> (LOGOUT/LOGOUT), (OFF/OFF), (ON/Calling), (BREAK/Personal Break), (OTHER/Pre-shift OT). You can see more sample auxes in auxes table.



## Developer

- [Jerome Soriano](https://github.com/dvxgit-jsoriano)

*"Feel free to read, use, and apply to your projects."*