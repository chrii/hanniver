# Electronic Guest Serving Network (EGON)
EGON is an Application to Manage easily Products like drinks, food and stuff. 
It also handles Guest orders which came directly from the Guests Smartphone. The Concept behind is, that every Guest is an 
indivdual but also a group of Guests are still a group and have a whole Bill for the Table.

To Check the the own bill and single bons (single credentials of bill), gives the Guest a full overview about the consumed products without asking a waiter. It also lets you find older bills from foreign visits tho find a meal or a drink again.
On the other hand waiters arent in charge anymore if its not necessariy. Every guest does his order, the system will collect them and show them to a main terminal for the waiters who can check them in and process.

# Adding first admin
Theres a lesser important issue with the group allocation. 
1) If you clone this project, be shure you dont forget to copy the .env File and set up you Database
2) Go to your Terminal and head to the main Folder for a "phh artisan migrate" to get all Tables
3) Register your first Account and login. Its normal that you cant see anyhing.
4) Head to your Database and go to the user Table
5) Edit your desired User and give him group 3
6) Head back to the website and refresh
7) Go to "Users" and press the 3 points for creating the groups at "Gruppen"
8) **important** Make shure that you add the groups in this order: 1) User 2) Kellner (or Waiter) 3) Admin
9) Finished Now you can use it normally