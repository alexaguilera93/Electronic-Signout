#Shell script to initialize your signout sheet: need Database name
#sql username, sqlpassword, server name (most likely localhost)
clear
echo "Starting initialization"
echo "Please enter server name (if you're not sure, probably localhost):"
read servername
echo "Now enter what you would like the database name to be:"
read databasename
echo "Now enter your mysql username:"
read username
echo "Now enter your mysql password:"
read password
echo "Enter your name:"
read name
echo "Enter the username you want to use to log in to system:"
read sysusername
echo "Enter the password you want to use to log in to system:"
read syspassword

sed -i -- 's/pw123/'$password'/g' *
sed -i -- 's/un123/'$username'/g' *
sed -i -- 's/sn123/'$servername'/g' *
sed -i -- 's/db123/'$databasename'/g' *
sed -i -- 's/sysu123/'$sysusername'/g' *
sed -i -- 's/sysp123/'$syspassword'/g' *
sed -i -- 's/klmno/'$name'/g' *
php init.php
echo "Done, the signout sheet is ready to use!"
