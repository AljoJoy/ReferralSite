# ReferralSite
Laravel app which generates referral urls for each registered users and add referal points when others join through that link

Installation Procedure (Windows OS):

Install XAMMP by using this url.
https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe
open and run the executable file to install XAAMP on your system.
After successfull completion run the XAAMP control panel and start Apache server and MySQL services.
click on admin button which is in the same row of MySql and open phpmyadmin. click new button on left side and insert referral_site on create database form and hit create button. 

Install Nodejs
https://nodejs.org/en/download

Install Composer from below link.
https://getcomposer.org/download/

Install Git from below link.
https://git-scm.com/downloads

setting up Git:
https://docs.github.com/en/get-started/quickstart/set-up-git

Go to C:\xampp\htdocs (htdocs folder of xaamp in your system)
open a terminal in that path
run this commands there
git clone https://github.com/AljoJoy/ReferralSite.git
cd ReferralSite
composer install

now update .env file with database credentials
Then run this command.
php artisan migrate
php artisan app:add-admin --email --password

open a new terminal and run following commands
npm install
npm run dev