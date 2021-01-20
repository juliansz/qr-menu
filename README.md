![QR Menu](https://github.com/juliansz/qr-menu/blob/master/public/img/logo.jpg?raw=true)
# QR Menu

Simple Laravel based QR generator application to upload files and generate landing pages to give your customers the ability to download the content using a QR code.

This could be especially useful during the COVID-19 pandemic, so your customers won't need to use paper menus.

### Features
- Create landing pages
- Add contents to the landing pages
- Multiple content types: PDF, Files, Images. HTML, embeddable and links coming in next releases.
- Add thumbnail to each content
- Add Google Analytics tag to track your visits
- Whatsapp share button
- 3 configurable sizes for the QR generation
- Add a logo to the QR

### Contact
For customization services or to talk about this or any project ping me on **getappsoftware (at) gmail (dot) com**

### Installation
#### 1. Run git clone:
```
git clone https://github.com/juliansz/qr-menu.git
```
#### 2. Make sure you have composer installed and run composer install on the project directory:
```
composer install
```
#### 3. Complete your .env file:
```
Complete your .env file with the database server, port, database, username and password.
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=QRdb
DB_USERNAME=QRuser
DB_PASSWORD=xxxxxx
```
#### 4. Run migrations:
```
php artisan migrate
```
#### 5. Run the server and visit the given url:
```
php artisan serve
```
