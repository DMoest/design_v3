# design_v3
A repo for the design course version 3 @ BTH.

## Setup & run the project
First of all you need to have `PHP`, the package manager `Composer` and preferably also `make` 
installed in your environment. As a reference; at the time of writing this Im using `PHP v8.1.11`, 
`Composer v2.2.7` and `GNU make v3.81` in my local development environment but this just might work 
as well with other versions. If you for any reason do not have these tools installed, trust in 
google and search for how to install them on your platform. There are plenty of guides out there 
to describe this better than I possibly could here.

Second, open a terminal shell and position your self in the directory you like to place this 
project.  

Third, clone this repository.
```
git clone https://github.com/DMoest/design_v3
```

Fourth, install the project dependencies.
```
composer install
```
Alternatively you can use the `Makefile` and install the dependencies.
```
make install
```
If you find yourself in a position where you might want to reinstall the project for any reason.
```
make clean-all install
```

Lastly, start up a local webserver and point your browser to the url 
`http://localhost:<THE_PORT_YOU_CHOOSE>/` and you should see the project running.