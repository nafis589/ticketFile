#!/bin/bash
./vendor/bin/sail exec -T mysql mysql -u root -ppassword -e "GRANT ALL PRIVILEGES ON ticketfile.* TO 'sail'@'%'; FLUSH PRIVILEGES;"
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan make:migration add_role_to_users_table
./vendor/bin/sail artisan make:middleware RoleMiddleware
