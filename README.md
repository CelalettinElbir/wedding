# Dream wedding
1. This project allows users to compare wedding venues' prices and find the place they want easily.
### What can you do?

1. There are three types of user vendor, user, Admin 
2. Vendors have wedding venues and all wedding venues can have multiple services like Parking, Tables
3. User can look at and filter wedding venues authenticated user can add venues to use favorites. Users can make an order for a day by sending mail via the website.
4. Admin can edit and delete vendors, users



### How to Install and Run the Project
#### Packages
 1. "PHP": "^8.0.2",
 2. guzzlehttp/guzzle: "^7.2",
 3. intervention/image: "^2.7",
 4. laravel/framework: "^9.19",
 5. laravel/sanctum: "^3.0",
 6. laravel/tinker: "^2.7",


#### Installing 
1. you need to install the packages specified above. 
2. you should go to the directory where the project exists and run PHP artisan migrate.
3. run the command 'manage.py runserver' now you can see my website at http://127.0.0.1:8000/.


### How to Use the Project
#### User
when you click the page you will see an entrance page like below.

<img src="https://user-images.githubusercontent.com/73540960/212673951-7553c7db-49d2-4020-ae8f-080ca25d7c6a.png" alt="Website home" height ="400px;" width = "auto;" >

when you click 'see more ' you will redirect to the page where you can list or filter wedding venues you can see it below.

<img src="https://user-images.githubusercontent.com/73540960/212677331-745162f1-3d91-4304-b30c-4468fc4beee3.png" alt="" height ="400px;" width = "auto;" >

when you click detail you will be navigated to the detail page for the wedding venue as you see below. On the detail page, you can add a favorite and make an order and send an auto-mail.

#### vendor

vendors have a home page you can go to that page by clicking DreamWedding you will see a page like below. 

<img src="https://user-images.githubusercontent.com/73540960/212679726-771878fd-7daa-48a3-9fba-75c0eb4f8a6a.png" alt="detail page" height ="400px;" width = "auto;" >

if you want to edit your wedding venue you should go company vendor page and edit your venue this page will be listed below. 

<img src="https://user-images.githubusercontent.com/73540960/212685464-ef6f9431-d6ae-4350-aff6-aebf357a3548.png" alt="vendor home" height ="400px;" width = "auto;" >


after you click edit you will see a page where you can edit your wedding venue 

<img src="https://user-images.githubusercontent.com/73540960/212686439-2c37494f-f2bf-49e2-b08c-3fa5fb17bd74.png" alt="vendor edit page" height ="400px;" width = "auto;" >


#### Admin 

On the admin page, you can see, edit, and delete user and vendor information.
<img src="https://user-images.githubusercontent.com/73540960/212696220-3ae11aec-1120-4b48-8f74-6666b43d6c02.png" alt="vendor edit page" height ="400px;" width = "auto;" >

### should be added 
1. order list page 
2. password forgot page.
3. User adresses can store in diffrent tables.




