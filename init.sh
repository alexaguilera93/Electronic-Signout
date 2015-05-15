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
#echo $servername $databasename $username $password
sed -i -- 's/pw123/'$password'/g' *
sed -i -- 's/un123/'$username'/g' *
sed -i -- 's/sn123/'$servername'/g' *
sed -i -- 's/db123/'$databasename'/g' *
php init.php
echo "Done, the signout sheet is ready to use!"
