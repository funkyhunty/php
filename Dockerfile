# 使用PHP官方镜像作为基础镜像
FROM php:7.4-apache

# 安装zip扩展所需的依赖库
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev

# 安装必要的PHP扩展和工具
RUN docker-php-ext-install mysqli pdo_mysql zip
RUN a2enmod rewrite

# 添加ServerName指令
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# 将项目文件复制到工作目录
COPY . /var/www/html

# 创建upload文件夹并设置正确的权限
RUN mkdir -p /var/www/html/upload && chown -R www-data:www-data /var/www/html/upload

# 更改文件和文件夹的权限
RUN chown -R www-data:www-data /var/www/html

# 暴露端口
EXPOSE 80
————————————————
版权声明：本文为CSDN博主「qq_35008710」的原创文章，遵循CC 4.0 BY-SA版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/qq_35008710/article/details/130462218
