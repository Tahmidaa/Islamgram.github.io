# Webapp Project: ISLAMGRAM                 
  # PREPARED BY: ZAYAN GROUP
  
  *Codes are in master branch*


# Group Members:

  1) Tahmida Haque Sumbula 1819216
  2) Sehrish Kantroo 1726406
  3) Hadil Muhammadal Almekhlafi 1618880

# WORK DISTRIBUTION:

Tahmida - 

1. Post
2. Show
3. Finding user with id to bring user name to profile

Sehrish-

1. Edit
2. Policy
3. Logo & profile design, one to one relationship

Hadil-

1. Delete
2. Follow
3. Adding username to registration

# ABSTRACT

ICT has brought many changes in human life. It has drawn the world closer as a global village with the introduction of social media. Social media has put both negative and positive impacts on people but plays a very vital role in exchanging ideas and sharing information. Social media has a significant positive impact on Islam if appropriately used, it can help to spread the cause of Allah (SWT) and put a positive impact on the ummah. Hence, for this intention, we have come up to build a social media platform ISLAMGRAM, where people can post only Islamic messages and spread the words of Allah and our Prophet (PBUH).

# INTRODUCTION

For our project, a web application, ISLAMGRAM, has been developed. In today’s world, social media has taken over the youngsters as it’s a fun way to waste time and socialize with people. Therefore, we planned to make a web app that will benefit the users by gaining Islamic knowledge from this platform as well as interact with other users by following them. This app is for posting Islamic posts only, hence we named it ISLAMGRAM. We have implemented the use of CRUD operations, Laravel Model-View-Controller, and routes. This app also had the use of one-one, one-many, and many-many relationships. We made this app very interactive for the users so they get interested in using it. 

# OBJECTIVE

To introduce to the society a new social media where they can post Islamic content only and benefit the Ummah. As we know, there are many social media but none of them are for Islamic content only, so we wanted to create something different and attract the users as we have many options in this web app.


# Features & Functionalities 

 - Authentication: Users can register where they have to key in some record as follows:
 Name
 Username: Must be unique
 Email: Must be unique
 Password
 confirm password 
If a user already has an account, they can login with their username and password only. One user can only have one account with the same username. So a user and profile have a one-one relationship.
 - Users can add posts and write captions for the posts by clicking on the “Add New Post” option. Adding a post will update the user’s profile and show how many posts a user has. 
 - Users can add as many posts as they want. Users and posts have a one-many relationship.
 - Users can edit their profile information by clicking the “Edit Profile” button. They can change the title of their bio, add a description, add a URL of their choice, and change their profile pictures by uploading an image.
 - Users can follow other users by visiting their profiles and it’ll be shown on their profile bio how many people they are following and how many people are following them. User can have many followers and can follow many so this a many-many relationship.

 - Users can delete a post by just clicking on the delete button under post as well as if they wish to delete their account they can delete it as well.


# DEFINE THE VIEWS, CONTROLLERS, ROUTES & MODELS

# VIEWS

   # Auth: 

It has the authentication files which allows users to login and register to the application. Only change that we made is in register view.
  - Login
  - Register: In register view we added one more field of username.
  - Verify

  # Layouts: 

This folder contains app.blade.php, the HTML design for the app’s home page and navigation bar, logo, and name of the app and username of the user. 

  # Profiles: 

- Index.blade.php:

In this file, we have designed our users profile page which contains profile picture, username, follow-button, add new posts button, edit profile button, delete user button, title, description and url. The counts of posts, followers, and following have been added as well. Moreover, a column of  posts which display the posts of the user is added which is wrapped within for each loop along with its delete button. Some of the elements inside this blade have been protected with policy so that they do not appear if the user is logged out and searches for any profile. We have added csrf and some required methods like @method('post') as well.


- Edit.blade.php:

This blade is for edit profile page so when the user clicks on edit profile he is redirected to this page. Firstly, we made a class container and a form of method post. Even though we are posting through the method of POST we actually used PATCH internally. We used PATCH here as we are updating. We made the title “Edit Profile”. We made three div class form-group rows for the title, description, URL, and one div class row for profile picture uploading. Finally made a button for “Save Profile”. As some of these are required fields so we have added some error handlers which wrap these fields, and display a message on screen eg: “the image should be an image”.
                                 In order to make the edit form prefilled, in the edit blade we are setting an old title, in the case when we fail to validate and come back again and expect those fields to be populated with the data that we entered. We also passed another thing, which shows whatever is inside the current profile, just in case ‘old’ is not set. We did this for title, description and URL. 

   # Posts: 

- Create.blade.php

This blade has been created for the add new post page which includes a form of methods post and this form has the title of ‘Add new post’ and two sections: uploading image and writing image caption along with the button that adds the new post and redirect to the profile page. As these are required fields so we have added some error handlers which wrap these two fields, and display a message on screen eg: “this field is required”.

- Index.blade.php

This blade has been created for our feed page where when a user follows other users, this page fetches their posts along with their profile picture, username and caption of that image. They have been wrapped within the foreach loop to show all posts whenever the user posts new ones. Also users posts and usernames are clickable which takes to the profile of that particular user.

- Show.blade.php

This blade has been created for a page when a user clicks on a particular post, the post along with username and caption is displayed in another page with a new view. And this blade creates that view. This view shows one post in a big round circle and the posts’ users name and that image’s caption. Also, the user name is clickable which takes back to the profile page.

# CONTROLLERS

  # RESTFUL Resource Controller:

We have followed the convention of this controller as it makes web apps easier to update and the codebase cleaner. It is a predetermined number of verbs that we used in this project. We used seven of them. Each of the actions is matched with a particular URL, method, and has a route name. We have used below controllers for our project:
Register Controller: We are mentioning this controller because we modified it a little bit as we have added a username in the form of register so we had to include that here for validation purpose and fetching its data under validator and create function respectively.


  # ProfilesController:

This represents the index.blade.php and edit.blade.php files from the profiles views directory. It has three functions.
- The function index gives the route access to the user variable by passing through an argument in the function which gives the id of the user. This shows the profile of users with actual usernames. Instead of passing through an array, we used a compact function where we passed the ‘user’ and ‘follow’.

- The function edit receives users which are passed through the edit route and it views the edit profile. To protect the edit view of users from other users from accessing, the update profile of a particular user has been authorized and protected. 

- The update function lets the user key in their profile details such as; title, description, URL, and profile picture by passing an array. This function fetches the user and validates them and gets data. 

   - We made the title and description a must by setting them to ‘required’. 
   - The URL is set to URL since this field is for updating URL.
To keep users from accessing other accounts and editing their profile, we used an extra layer of protection which is that the update will only work when it's           from the authenticated users doesn’t matter if they’re updating even through the query.
   - In order to update profile picture which is also a part of edit we have set an image path in this controller which on image request stores the picture inside public\storage\profile and we have used the intervention library for manipulating image in order to resize it like we wrapped image around intervention class so we can manipulate it. We also used a php function array merge for this that takes two arrays one the user data and another image array that has condition so if the user does not want to update profile picture the second array will pass empty array in such case and will override the first one and the profile picture will remain the same.

- The destroy function: This function deals with the deleting user button. It finds the particular user id and deletes it and redirects users to the login page.

  # PostsController:

This represents the create.blade.php,  index.blade.php and index.blade.php files from the posts views directory. The functions used in it are:
   - The function construct: Under this function, middleware helps to hide create page and show page if the user is not logged in as everything in this controller will require authentication.
   - The function index: This function deals with the index.blade.php which is our feed page so in this function we grab all the user ids a user is following and we use pluck method for this and hence we get the posts of user id which is in the list that we grabbed and return view and compact function where we passed posts.
   - The function create: This function returns a ‘create’ view of posts.
   - The function store: Under this function, first we did the validate part that is on request the data will be first validated and then it will fetch data. In order to upload images we have set an image path in this controller which on image request stores the image inside public\storage\uploads (local storage) and we have used the intervention library here as well for manipulating image in order to resize it and make all the posts of the same size. Moreover, we have used the auth function to get authenticated users and get into their posts and create, this create is also a method which passes an array of data that is caption and image and then when its successful user is redirected to profile page. 
   - The function show: This function deals with the show page which is when a user clicks on a post it shows post details in another page. This method takes a post and return view which displays post image, username and caption.
   - The function destroy: This function deals with the deleting post button. It finds the particular post id and deletes it and redirects users to the same profile page.
        
  # FollowsController: 

This controller deals most with the authentication, the middleware protects follow action from unauthorized follow request like if the user is not logged in he cannot follow a user and if he tries to he will be redirected to the login page. 
   - Function store: This function grabs the authenticated user and attaches or detaches the follow relationship that is toggle between follow or unfollow by toggling user profile.


# ROUTES

In our project, we have a total of 8 routes and each of them works with different views and displays different functions.

1. Route::post('follow/{user}', 'App\Http\Controllers\FollowsController@store');
It fetches the user’s information on follow by first hitting the store function inside the FollowsController.

2. Route::get('/', 'App\Http\Controllers\PostsController@index');
This route grabs the information of the posts of other users and shows it on the feed by hitting the index method in PostsController.

3. Route::get('/p/create', 'App\Http\Controllers\PostsController@create');
This route pulls the form for create.blade.php by hitting the PostsController.

4. Route::post('/p', 'App\Http\Controllers\PostsController@store');
The GET route will post to the resource itself which will hit the store method in the PostController.

5. Route::get('/p/{post}', 'App\Http\Controllers\PostsController@show');
This route pulls the view of posts from show.blade.php by hitting the show function inside the PostsController.

6. Route::get('/profile/{user}', 'App\Http\Controllers\ProfilesController@index')->name('profile.show');
This route shows the profile of the user by first hitting the index function inside the profile controller.

7. Route::get('/profile/{user}/edit', 'App\Http\Controllers\ProfilesController@edit')->name('profile.edit');
This route is for editing the profile. It shows the form by first hitting the edit function inside the profiles controller.

8. Route::patch('/profile/{user}', 'App\Http\Controllers\ProfilesController@update')->name('profile.update');
This route will do the process of updating the records by first hitting the edit function inside the profiles controller.

# MODELS

  # User.php:

This model represents a single row in our database and that represents a single user in our database. The attributes that are mass assignable are 'name', ‘email', username', ‘password'. The attribute that needs to be hidden is ‘password’. It has some functions:
- Function boot: a boot method has been used here which gets called up whenever we are booting this model. We have used a laravel event ‘created’ inside it which gets fired when a new user is created and with that profile is also created for that user and a default of title is also set inside it to their username.
- Function posts: Under this function, we have defined the relationship that a user has many posts (one to many relationship with post). And we have set the order of posts here so they appear according to created_at. 
- Function profile: Under this function we have defined the relationship that a user has one profile. (one to one relationship with profile)
- Function following: Under this function we have defined the relationship that a user can follow many profiles. (many to many relationship with profile). For follow, we have also made a separate pivot table which holds id of two related models (user and profile).

  # Profile.php: 

This model has a relationship of one to one with the user that is a profile belongs to a user. And hence we fetched this relationship on both sides. In order to avoid the mass assignment exception error, in this model we use protected guarded which passes an empty array and hence laravel will not guard it and will allow us to fill everything. We have added two more functions in it:
- Function followers: Under this function we have defined the relationship that a profile can have many followers. (many to many relationship) and hence we also fetched this relationship on both sides.
- Function profileImage: This is basically for the default picture of the user. Like when a new user registers this function will check whether to return default picture or users picture. If the user is new it will return the default picture that we have setup or else the users profile picture.

  # Post.php : 

This model has a relationship with a user of one to many that  a post belongs to a user. And hence we fetched this relationship on both sides. Again, in order to avoid the mass assignment exception error, in this model, we also use protected guarded which passes an empty array and will allow us to fill everything.

  # FollowButton.vue:

We have used vue also in our project for follow button that is we turned follow button into a vue component in order to turn it from follow to unfollow, so in this way we can interact with server to follow the user and in response it should show unfollow.  We renamed the component in resources/js as FollowButton and made changes accordingly in bootstrap.js and in our view. Then we run npm watch which continues to watch our files so if any changes are made, it can recompile all files. Our follow button is inside the vue component when clicked reaches the server and connects two users. We have followUser method inside it which when receives successful response changes status from follow to unfollow. We have taken two properties inside it userid and follows. And for the whole response process we used axios which is already installed and is a js library which allows to make API calls easily.

# Policy: 

Users should not be able to see the ‘edit profile’ button, ‘add a new post’ button, and both ‘delete’ buttons on other users' profiles. So for that, we used policy and it is a very simple way to restrict what a user can/cannot do with a particular resource. Policies are associated with a specific model and in our project, we have created a policy for the Profile model. This policy file has functions for all actions and we just had to return true or false. In our case, we just used the update function and then used the same idea with other buttons to hide them. It determines who can update the profile. The user_id of the user needs to match the profile user_id to be able to update a profile. So, the user who has owned the profile can only see these operations.

 # Relationships
 - One to one
 - One to many
 - Many to many
 
 # CLI used in our project

- PHP ARTISAN MAKE: AUTH
- NPM RUN DEV
- PHP ARTISAN MIGRATE
- PHP ARTISAN TINKER
- PHP ARTISAN MIGRATE: FRESH
- PHP ARTISAN MAKE: CONTROLLER PROFILESCONTROLLER
- PHP ARTISAN MAKE:CONTROLLER POSTSCONTROLLER
- PHP ARTISAN MAKE:CONTROLLER FOLLOWSCONTROLLER
- PHP ARTISAN MAKE:MODEL PROFILE -m
- PHP ARTISAN MAKE:MODEL POST -m
- PHP ARTISAN STORAGE:LINK
- COMPOSER REQUIRE INTERVENTION\IMAGE
- PHP ARTISAN MAKE: POLICY PROFILEPOLICY -m PROFILE
- PHP ARTISAN UI VUE
- PHP ARTISAN MAKE:MIGRATION CREATES_PROFILE_USER_PIVOT_TABLE --CREATE PROFILE_USER
- NPM RUN WATCH
    
# ERD 

![WhatsApp Image 2021-01-12 at 5 06 48 PM](https://user-images.githubusercontent.com/48441196/104745668-4d109300-5789-11eb-8d2e-b84cfbec7aa2.png)

# Sequence Diagram

![ISLAMGRAM](https://user-images.githubusercontent.com/48441196/104746060-c14b3680-5789-11eb-8602-c6f6acd60135.png)


# References
https://laravel.com/docs/5.2/controllers#restful-resource-controllers
https://laravel.com/docs/5.2/validation#available-validation-rules
https://laravel.com/docs/5.2/controllers#restful-resource-controllers
http://image.intervention.io/
https://laravel.com/docs/8.x/authorization#creating-policies
https://laravel.com/docs/5.2/validation#rule-url
https://laravel.com/docs/5.2/eloquent#events
https://laravel.com/docs/5.7/frontend#writing-vue-components
https://vuejs.org/v2/guide/single-file-components.html




