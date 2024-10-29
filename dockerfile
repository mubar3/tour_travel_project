# Gunakan image dasar PHP dengan Apache
FROM php:8.1-apache

# Salin semua file dari direktori lokal ke /var/www/html di container
COPY . /var/www/html/

# Install paket yang diperlukan
RUN apt-get update && apt-get install -y \
    openssh-client \
    git \
    curl \
    zip \
    unzip \
    nano \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Aktifkan mod_rewrite untuk Apache
RUN a2enmod rewrite

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd pdo_mysql mysqli

# Berikan izin akses penuh pada direktori yang dibutuhkan
RUN chmod -R 777 /var/www/html/assets/img/ktp
RUN chmod -R 777 /var/www/html/assets/img/user

# Buat direktori untuk menyimpan session dan atur izin
RUN mkdir -p /var/www/html/sessions && \
    chown -R www-data:www-data /var/www/html/sessions && \
    chmod 700 /var/www/html/sessions

# Konfigurasi PHP untuk menggunakan direktori session khusus
RUN echo "session.save_path = '/var/www/html/sessions'" >> /usr/local/etc/php/conf.d/docker-php.conf

# Bersihkan cache apt untuk mengurangi ukuran image
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install exif

# Eksekusi container dan jalankan Apache
CMD ["apache2-foreground"]
