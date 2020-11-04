import mysql.connector

mydb = mysql.connector.connect(
  host="127.0.0.1",
  user="root",
  password="*PASSWORD*",
  database="*DATABASE*"

)

mycursor = mydb.cursor()

mycursor.execute("DELETE from textChat")
mydb.commit()

myresult = mycursor.fetchall()
for y in myresult:
  print(y)
