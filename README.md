<p align="center"><a href="https://ban-dera.com" target="_blank"><img src="https://ban-dera.com/img/ban-dera-logo.svg" width="400"></a></p>

# Ban-DERA
#### BAN Digital Environment for Russian Assets

## About

On Feb 24, 2022 at 4:00 (GMT +2, Kyiv) Russia has launched a devastating attack on Ukraine, a European democracy of 44 million people, bombarding its cities.

That's why we create ban-dera.com. It is a website for running continuous russian websites stress-test.

## How to use website?

We're tried to make this website as simple as possible. There are no any special skills required for using it, just open website: all the processes will be executed automatically.
Here is exactly how this script works:
1) The list with target websites will be loaded.
2) First 10 websites to attack will be chosen randomly. You can also change amount of target.
3) Your device will send requests 10 times per second to each website from selected list. You can change this speed too.
 
## Settings

- Change the number of simultaneously attacked targets.
- Change the speed of requests.
- Manually remove website from attack list.
- Pin target.

## Deploying project on your server

This project created with Laravel and Vue framework. Here is instruction how you can copy it to your own server.

1) Clone git repository.
2) Open terminal in destination path root.
3) Install composer dependencies

```shell
path/to/your/repo> composer install
```
4) Make copy of .env.example file and save it without .example extension.
5) Change APP_URL with your webserver endpoint.
6) Set APP_SECRET key to use it later in your cron task to call ```check-host``` API endpoint.
```
curl --header "X-App-Secret: {your_app_secret_here}" {your_route_here}
```
6) Set the key that Laravel will use when doing encryption.
```shell
php artisan key:generate
```
7) Write down your credentials to DB_DATABASE, DB_USERNAME and DB_PASSWORD.
8) Run database migration. This action will create all required tables in your database.
```shell
php artisan migrate
```
9) Fill up targets table by running DB seeder.
```shell
php artisan db:seed
```
10) Run NPM build
```shell
npm install
npm run production
```
11) You can also run local webserver:
```shell
php artisan serve
```
12) To preview and compile all the assets in live mode (if you have separate local env like WAMP) run:
```shell
npx mix watch
```

That's it! Now you have your own ban-dera!

## VPN usage

There are no any requirements for using VPN, but it is recommended.
Here is some popular VPN services:

- **[ExpressVPN](https://www.expressvpn.com/offer/coupon)**
- **[NordVPN](https://nordvpn.com/)**
- **[Surfshark](https://surfshark.com/)**

# Notes

Thank you for considering contributing to the Ban-DERA!

WARNING! Using this website may slow down your computer and network. We are not responsible for any damage that may be caused by the use of the site.
