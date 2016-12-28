#EasyPHP-Kit

EasyPHP-Kit is a easy to implement PHP class designed to allow website developers to implement essential and common features into their website with little to no work. Don't understand how to protect against CSRF attacks? Not sure how to have a safe database session storage implementation? No problem! EasyPHP-Kit is as easy as dropping the EasyPHP-Kit file into your working directory, and including it in your PHP scripts. 

EasyPHP-Kit is currently in development from scratch, and as such it is **not** suggested to implement this into any production staged projects. Feel free to create pull requests and contribute in any way you can.

##EasyPHP-Kit planned features:


 - **Password Storage** [Not Started]
   - Simple password storage for website who need simple authentication
   - Advanced & Secure password storage for websites focused on security
 - **Easy Sanitation** [Not Started]
   - Dynamically configurable Input sanitation (Injection prevention)
   - dynamically configurable output sanitation (Anti-XSS)
 - **Website Authentication** [Not Started]
   - Dynamic permission control for authentication
   - Easy page and feature restriction
   - Secure authentication with multiple login types
   - Secure and responsible storage of authentication data
 - **Top OWASP vulnerability prevention** [Not Started]
   - Easy to use PHP-Config hardener
   - CSRF Attack mitigation
     - Signed cookie authentication
     - Optional database storage for CSRF sessions
     - User/Authentication session level CSRF token locking 
  - Rate limiting and anti-bruteforce measures
  - Easy to implement captcha support
  - (More to come)
 - **Other basic features** [Started]
   - Sitewide instant updating settings
   - Secure database interaction