![crud 1](https://user-images.githubusercontent.com/98800594/231281085-f4865704-61f2-4a16-a1f2-32226b6da017.JPG)
<h2> App Setup (localhost) XAMPP</h2>
git clone  https://github.com/AdelekeOfAfrica/Crud.git<br />
composer install <br />

cp .env.example .env <br />

php artisan cache:clear<br /> 

composer dump-autoload<br /> 

php artisan key:generate<br />

composer require laravel/breeze --dev<br />

php artisan breeze:install (FOR THIS SELECT THE API INSTALL)<br />

php artisan db:seed (a factory has already been created for books)<br />

php artisan serve<br />
![crud 2](https://user-images.githubusercontent.com/98800594/231281092-ea024cbd-2d55-4193-a7b1-d385be7db37d.JPG)

<h2> for the frontend </h2>

![crud 3](https://user-images.githubusercontent.com/98800594/231281098-c2ed28ee-ad23-41a3-ba8b-66355a0dfac4.JPG)
install node.js<br />
cd frontend<br /> 
npm install<br />
npm run dev<br />
