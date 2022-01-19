import requests
import simplejson
import sys


postid = sys.argv[1]

r = requests.get('https://graph.facebook.com/v2.11/'+postid+'/likes?&summary=total_count&access_token=EAAC0WaJ2OU0BANCbFNgSivRda9oHhyrx6D7J1jbx81lxeuG3op7wEccWkfBS4ZBdKOBCaKQFambcwYSHf7nW3HzhQP9sQgivB6wVqkVp7sH4sbrTrmkTWPN2ffQGs9NuiWNn3ZArl9GjEAGazvZB579zTPycJsp0cXAx3t0cQZDZD')
c = r.content
j = simplejson.loads(c)

#print j



print j['summary']['total_count']