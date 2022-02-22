
# eCommerce
Ecommerce website with add to cart functionality and notification on order submission and order status updation


Installation
```sh
git clone https://github.com/RanaTanvi/eCommerce.git
```

Switch to the repo folder
```sh
cd eCommerce
```
Checkout to branch develop 
```sh
git checkout develop
```

Pull code to develop
```sh
git pull origin develop
```

Install all the dependencies using composer
```sh
composer Install
```
Copy the example env file and make the required configuration changes in the .env file
```sh
cp .env.example .env
```
Generate a new application key
```sh
php artisan key:generate
```

Run the database migrations (Set the database connection in .env before migrating)
```sh
php artisan migrate
```

Database seeding
```sh
php artisan db:seed
```

Start the local development server
```sh
php artisan serve
```

# Comments

This works for one cart at a time only. User can add products to cart then in the cart page quantity of products can be managed.
By Submit order a new order will be created from whose list one can update the status of order chronologically. Default status is processing, can be updated to completed,cancelled and pending. Notification will appear on status updation which will show the order detail page.

