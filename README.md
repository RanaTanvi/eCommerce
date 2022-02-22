
# eCommerce
Ecommerce website with add to cart functionality and notification on order submission and order status updation


Installation

git clone https://github.com/RanaTanvi/eCommerce.git

Switch to the repo folder
cd eCommerce

Checkout to branch develop 
get fetch && checkout develop

Install all the dependencies using composer
composer Install

Copy the example env file and make the required configuration changes in the .env file
cp .env.example .env

Generate a new application key
php artisan key:generate

Run the database migrations (Set the database connection in .env before migrating)
php artisan migrate

Database seeding
php artisan db:seed

Start the local development server
php artisan serve


# Comments

This works for one cart at a time only. User can add products to cart then in the cart page quantity of products can be managed.
By Submit order a new order will be created frome whose list one can update the status of order chronologically. Default status is processing, can be updated to completed,cancelled and pending. Notification will appear on status updation which will show the order detail page.

