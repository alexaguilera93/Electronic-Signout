Electronic Signout:

This is an Electronic Signout system I created for students to be able to sign out items and for employees to keep track of what is signed out to who (very similar to a library sign out system). 

To set up this system, you must be running a linux server with mysql. Put all of the files in the webroot directory as they are, then run the init.sh script. You will be prompted for all necessary information to complete the system set up.

How it works for now:

Set up for multiple employees to have logins, for now to get into the system. You will be prompted for a username and password you want to use to log in.

How the system works:

The sign out system works by having uniquely named items(i.e. no 2 items have the same name in order to keep track of who has exactly which item so arduino 1, arduino 2,  finch 1, finch 2, etc). There is a constraint in the database to uphold this so no 2 items can have the same name. As for adding items/populating the database, this can be done by clicking the add item button on the homepage where you will be brought to a new page prompting you to input the name of the new item.

The sign out system deals with students a little differently. For a student to be able to sign out an item, they must first be added to the database. For this, go to the “add student” button on the home page where you will be brought to a new screen. On this screen, you must add the users name, ID, and email. No 2 students can have the same ID or email (they shouldn't anyway but the system checks to make sure). After a student has been added to the system, they can now have an item signed out under their name.

If we ever want to get rid of an item or a student signs their item in and says they do not want to be in the system anymore for whatever reason, there are 2 pages to remove items/students from the database. On these pages all you have to do is select the item/student and click the remove button.

Now, for signing an item out, you can click the “sign item out” button on the home page. On this page, there are 2 columns, each with a drop down box. One contains items, and the other contains our list of students. To sign an item out, just select the student, then select the item they want, and click the “sign out” button. 

For signing in, click the “sign item in” button. You will be brought to a new screen with one dropdown box. In this box, there is a list of all of the signed out items with the ID of the student who has the item next to it. Select the item you want to sign in and click the “sign item in” button

For a list of all of the signed out and in stock items, click the “Inventory” button on the home page. 

Always make sure you log out after you're done signing stuff in/out for people.

 
