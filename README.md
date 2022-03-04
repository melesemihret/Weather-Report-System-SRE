Test Case: Weather report system

Requirements:

    •	language: PHP

    •	Framework: Laravel 8.+

    •	Allowed Database: MySQL

Use Case

Create simple page that displays user name, last name and the weather of the user’s current location.

    •	There must be a registration page, where the user can setup his/her credentials

    •	Weather information should be pulled through API to any free weather application available (example: https://openweathermap.org/)

    •	There needs to be a separate page only available to admins that can view information of any user that has used their application, like their name and their location (e.g. Shunattan Davelaar - Curacao Willemstad)    

    //The location name should be pulled based on the user geolocation, in other words the user doesn't need to enter their location but the browser will pop up with a request to allow share location and when the user clicks ok we can get that info.


Test Goals:

    •	How applicant handles API

    •	Permission management

    •	Encrypting user sensitive information such as password

    •	Create DB table



=====================================================
            **To start Project **   
=====================================================
     - start XAMPP Server
  
 ![image](https://user-images.githubusercontent.com/55538814/156812797-801ae3ba-a5be-43c4-aecc-8df92a8261fa.png)

 
 // Open git on Project folder(weather-report-app), 
 
 Basic steps:

        Step 1: Laravel Installation.
        Step 2: Install Packages.
        Step 3: Create Post Migration.
        Step 4: Create Models.
        Step 5: Add middleware.
        Step 6: Add Routes.
        Step 7: Add Controllers.
        Step 8: Add Requests.
  Then RUN Project:- 
     Now you are ready. Run the following command to test.

    php artisan serve

    Then access it to your browser:

     http://127.0.0.1:8000
     
 ![image](https://user-images.githubusercontent.com/55538814/156813786-0cd08982-8a5f-46c6-9d3a-91177b2de6f3.png)

 
 //// Home page/ Login Page Default
 
 ![image](https://user-images.githubusercontent.com/55538814/156814298-29c69afb-b3b0-423b-a149-8fa44487c32f.png)
 
 - Click on register with new account to get services. 

 - Fill all fields
 
 ![image](https://user-images.githubusercontent.com/55538814/156815097-aa35a41d-ca53-459d-8215-331a96af68e3.png)
 
 - emaily varifications for new register users.
 
 ![image](https://user-images.githubusercontent.com/55538814/156815351-642a02e6-7953-42de-af0c-b59048d73faa.png)

  please use mailtrap account ( https://mailtrap.io/inboxes/1652286/messages ) to varify incoming email varifications
  
   Account: melesemihretw@gmail.com
   
   password: Admin@1234
   
   ![image](https://user-images.githubusercontent.com/55538814/156815818-83332f68-b1fa-4ef9-b84e-777b6ec17a38.png)

- Then check from inbox(Weather-User-InBox) and varify it

![image](https://user-images.githubusercontent.com/55538814/156816116-194c61e4-62bb-4d34-b85f-2a3c1b1ad4f9.png)

click on it To verify

![image](https://user-images.githubusercontent.com/55538814/156816372-27ddab76-ebfc-49e4-8615-1a261844766b.png)

- After verify your email address

![image](https://user-images.githubusercontent.com/55538814/156816720-7ae3360a-a4b5-46eb-bb86-3c2eaaf6ef22.png)

Privilege Page for Admin

        email: admin@gmail.com

        password: admin@1234

![image](https://user-images.githubusercontent.com/55538814/156817748-5e595102-f5db-45d3-9ebe-916d53d8e1b6.png)

  - createing Middleware 
  - Let's create our custom middleware. Run the following command:
  -     php artisan make:middleware ISAdmin  And here is the custom code of our PermissionMiddlware class. Navigate to
  -     App\Http\Middleware\IsAdmin.php
 
 ![image](https://user-images.githubusercontent.com/55538814/156820563-9bc6876e-8b6a-4d7e-9774-ee6145e964aa.png)
 
-    App\Http\Controllers\LoginController;


![image](https://user-images.githubusercontent.com/55538814/156819247-972273ea-e260-4fd0-890b-5708b03ae31c.png)


And go to Database(**weather-report**) to give [**is_admin**] ->  value =  1 users you prefer to be admin. 

![image](https://user-images.githubusercontent.com/55538814/156819910-fa9c288d-ab4c-4079-a609-df7e39559f76.png)

**  All Admin pages**
  
![image](https://user-images.githubusercontent.com/55538814/156821270-a120d88f-afe0-4de3-ad09-206645be3bd5.png)
[image](https://user-images.githubusercontent.com/55538814/156821621-3063b746-4a5b-4d78-93ef-01dc3e735e17.png)

admin can also open link view weather report!


![image](https://user-images.githubusercontent.com/55538814/156821945-1e66942b-f340-4051-b91f-f0ed14e472e0.png)




Don't forget that your credential is for Admin:

email: admin@gmail.com

password: admin@1234

 

Thank you for reading.











 
 
 

