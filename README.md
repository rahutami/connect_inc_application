# Programming Test for Connect Inc.
This is an application created to complete the programming test issued by Connect Inc. as one of the application requirements.

## About the Application
### Framework
Laravel is used as the framework to make this application
### Development Environment
Docker is used as the development environment for this application
### Functionality
- Registration  
    Users are able to register to create a new account.
- Login  
    Users are able to login to the account they created.
- Get User Information  
    Users are able to get user information.
- Edit User Information  
    Users are able to edit user information.

## How to Run
1. Copy `.env.example` file to a new file called`.env`
2. Change the `DB_DATABASE` value to the path of the application in your computer
```
DB_DATABASE={{path to the application's directory}}/database/database.sqlite
```
3. Run command below to start the app
```terminal
php artisan serve
```
4. Program will run on http://localhost:8000

## Endpoints
The documentation for the endpoints can be accessed [here](https://documenter.getpostman.com/view/15711746/UVyn3K5a)
