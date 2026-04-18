#!/bin/bash
cd /home/prince/ticketFile
./vendor/bin/sail artisan make:model Service -m
./vendor/bin/sail artisan make:model Counter -m
./vendor/bin/sail artisan make:model Ticket -m
./vendor/bin/sail artisan make:seeder ServiceSeeder
./vendor/bin/sail artisan make:seeder CounterSeeder
./vendor/bin/sail artisan make:seeder UserSeeder
