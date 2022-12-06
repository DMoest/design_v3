# Design_v3
A repo for the [design course version 3](https://dbwebb.se/kurser/design-v3) at 
[Blekinge Institute of Technology](https://www.bth.se/).


## Setup the project

First of all you need to have [PHP](https://www.php.net/), the package manager 
[Composer](https://getcomposer.org/), the package manager [NPM](https://www.npmjs.com/) and 
preferably also [make](https://www.gnu.org/software/make/) installed in your environment. As a 
reference, at the time of writing this I'm using `PHP v8.1.11`, `Composer v2.2.7`, `NPM v8.19.2` 
and `GNU make v3.81` on my local environment but this just might work as well with 
other versions. If you for any reason do not have these tools installed, trust in google and 
search for how to install them on your platform. There are plenty of guides out there to 
describe this way better than I possibly could here.

Now, open a terminal shell and position your self in the directory you like to place this 
project and follow these three steps.

### 1. Clone this GitHub repository.
```
git clone https://github.com/DMoest/design_v3
```

### 2. Install the project dependencies using package managers `Composer` and `NPM`.
```
composer install
```
<strong>AND</strong>
```
npm install
```
Alternatively you can use the `Makefile` to install all the dependencies. It's setup to run both 
the `Composer` and `NPM` commands above.
```
make install
```

If you find yourself in a position where you might want to reinstall the project for any reason.
```
make clean-all install
```

### 3. If the steps above passed correctly you may now `start up a local webserver` and point 
your browsers url to `http://localhost:<THE_PORT_YOU_CHOOSE>/` and you should see the project 
running once the browser have loaded it.


## Styles & Themes
All styles in this project have been written in [SASS](https://sass-lang.com/guide) and from there compiled to `CSS` using 
`NPM scripts` in the `package.json` file.

If you intend to develop more themes or update existing styles for this project, you want to 
compile the stylesheets from the source files to see the changes made. This is done by running the 
`NPM script`.
```
npm run style
```
<strong>OR</strong> run this for a minified version of the stylesheet.
```
npm run style-min
```

For more convenience in development you can use the `watch` command to automatically compile the 
stylesheets when you make changes to the source files.
```
npm run watch-sass
```
<strong>OR</strong>
```
npm run watch-sass-min
```
to watch and compile a minified version of the stylesheet.
