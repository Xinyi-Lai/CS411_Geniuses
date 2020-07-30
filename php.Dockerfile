FROM php:7.3-apache
ADD requirement.txt requirement_cp.txt
RUN docker-php-ext-install mysqli
RUN apt-get update && apt-get install -y python3 python3-pip
RUN pip3 install -r requirement_cp.txt
EXPOSE 80