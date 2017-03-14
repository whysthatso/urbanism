# create users on the cli

````
php oil console

Auth::instance()->create_user('username','password','example@email.com','<group as integer>');
