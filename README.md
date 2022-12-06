# Design_v3
A repo for the [design course version 3](https://dbwebb.se/kurser/design-v3) @ Blekinge 
Institute of Technology.

## Setup & run the project
First of all you need to have `PHP`, the package manager `Composer`, the package manager `NPM` and 
preferably also `make` installed in your environment. As a reference; at the time of writing 
this I'm using `PHP v8.1.11`, `Composer v2.2.7` and `GNU make v3.81` in my local development 
environment but this just might work as well with other versions. If you for any reason do not 
have these tools installed, trust in google and search for how to install them on your platform. 
There are plenty of guides out there to describe this better than I possibly could here.

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
and
```
npm install
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

## Styles & Themes
All styles in this project have been written in `SASS` and from there compiled to `CSS` using 
`NPM scripts` from the `package.json` file.

If you intend to develop more themes or update existing styles for this project, you want to 
compile the stylesheets from the source files to see the changes. This is done by running the 
NPM command.
```
npm run style
```
or
```
npm run style-min
```
for a minified version of the stylesheet.

For more convenience in development you can use the `watch` command to automatically compile the 
stylesheets when you make changes to the source files.
```
npm run watch-sass
```
or
```
npm run watch-sass-min
```
to watch and compile a minified version of the stylesheet.
