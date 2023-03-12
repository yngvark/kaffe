docker build . -t kaffe_v2
docker run -it -v $(pwd):/var/www/html --rm -p 8080:80 kaffe_v2
