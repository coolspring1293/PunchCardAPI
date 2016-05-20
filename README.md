# PunchCardAPI
The API Server for [PunchCard](https://github.com/coolspring1293/punchcard), Android project of Software Engineering in 2016 by Team 10.

# Framework: Apigility
Apigility is an API Builder, designed to simplify creating and maintaining useful, easy to consume, and well structured APIs. Regardless of your experience in API building, with Apigility you can build APIs that enable mobile apps, developer communities, and any other consumer controlled access to your applications.
See [Documentation](https://apigility.org/documentation).

## Run Apigility UI
'''cd ../apigility/
php -S 0.0.0.0:8888 -ddisplay_errors=0 -t public public/index.php'''
## GET
> get all user info: http://localhost:8888/user
> get a user by id: http://localhost:8888/user/id
## POST
> create a new user(newusername, nopasswordinfact, nopasswordinfact): http://localhost:8888/user?userName=newusername&password_hash=nopasswordinfact&name=nopasswordinfact

## PUT
> wait a moment!

# Zend Framework 2
Apigility can be used to implement APIs in PHP. We developed Apigility using Zend Framework 2, but this doesn't mean you have to use this framework to develop your API. You can use Apigility in any PHP application, using all the libraries and frameworks that you want.
