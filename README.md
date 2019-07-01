# Scudent Score Tracking (Backend)
Application for recording student's score and view their details in form of charts.

## Pre-requisite

  - Laravel version 5.5.x
  - Mongo 3.x
  - php version 7.0.x
  - composer version 1.8.6


### Installation 

- Create a project folder Student_Score_Tracker
    ```sh
    $ mkdir Student_Score_Tracker
    ```

- Go to a project root folder Student_Score_Tracker
    ```sh
    $ cd Student_Score_Tracker
    ```

- Clone the repo from git to the current directory.
    ```sh
    $ git clone <URL>
    ```
- Sync from remote branch into your local .
    ```sh
    $ git pull origin master
    ```
- Install all the backend dependency
    ```sh
    $ composer install
    ```
- locally boot mongo by following commands
    ```sh
    $ sudo su
    ```
    ```sh
    $ mongod
    ```
- Open another terminal and login to mongo shell by the below command.
    ```sh
    $ mongo
    ```
- Create database `temp` in MongoDB.
    ```sh
    $ db.use('temp')
    ```
- Create collection `student` inside database  `temp` .
    ```sh
    $ db.createCollection('student')
    ```
    
### Deploy
- Run the Student Score Tracking app locally.

    >Booting the application. Go to the root folder of the project on terminal and run the below command

    ```sh
    $ php artisan serve
    ```

### To use the app
[http://localhost:8000/](http://localhost:8000/)
