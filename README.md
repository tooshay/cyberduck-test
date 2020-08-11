# Cyber-Duck Test

This my go at Cyber-Duck's coding test: A simple company and employee CRM built in Laravel.

### Getting Started

To run, clone the repo as per usual and run composer to pull in the dependencies:

```
git clone git@github.com:tooshay/cyberduck-test.git
```

And then:
```
composer update
```

The easiest way to run the application would be Laravel's [Valet](https://laravel.com/docs/7.x/valet), which is what I used while building this.

Copy over .env.example to .env:
```
cp .env.example .env
```

Generate an application key:
```
php artisan key:generate
```

### Tests

Tests were written using [Pest](https://pestphp.com/), the (reasonably) new testing framework. To run the tests, run:

```
./vendor/bin/pest
```
