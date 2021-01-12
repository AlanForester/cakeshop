# Laravel cake shop example

An example Laravel App with Shopping Cart functionality. 

## Automatic install, build and run

This is just local installation using Docker. 
- Download docker from [Docker site](https://www.docker.com/products/docker-desktop).
- Clone this project and cd into it
~~~ bash
git clone https://github.com/AlexCollin/cakeshop.git 
cd cakeshop
~~~
- Build project running script 
`` ./build.sh``
- Visit http://localhost:8000 in your browser
s
## Handle start or stop project after build
Run command in the project folder to start
```bash
docker-compose up -d
```
Run command in the project folder to stop
```bash
docker-compose down
```