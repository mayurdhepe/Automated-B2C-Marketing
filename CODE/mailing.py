# Python code to illustrate Sending mail from
# your Gmail account
import smtplib
import sys

with open('/var/www/html/reminder.txt', 'r') as myfile:
  message = myfile.read()
mail = sys.argv[1]
# creates SMTP session
s = smtplib.SMTP('smtp.gmail.com', 587)

# start TLS for security
s.starttls()

# Authentication
s.login("testuser062017@gmail.com", "testuser@gse")

# message to be sent
#message = "Hello, you won 30000 Rs!"
with open('/var/www/html/reminder.txt', 'r') as myfile:
    message = myfile.read()
    
print message
# sending the mail
s.sendmail("testuser062017@gmail.com", mail, message)

# terminating the session
s.quit()
