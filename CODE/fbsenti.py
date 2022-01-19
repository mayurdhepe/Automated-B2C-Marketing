import requests
import simplejson
import  sys
from textblob import TextBlob

postid = sys.argv[1]
actoken='EAAC0WaJ2OU0BANCbFNgSivRda9oHhyrx6D7J1jbx81lxeuG3op7wEccWkfBS4ZBdKOBCaKQFambcwYSHf7nW3HzhQP9sQgivB6wVqkVp7sH4sbrTrmkTWPN2ffQGs9NuiWNn3ZArl9GjEAGazvZB579zTPycJsp0cXAx3t0cQZDZD'

r= requests.get('https://graph.facebook.com/'+postid+'/comments?access_token='+str(actoken))
#print 'https://graph.facebook.com/'+postid+'/comments?access_token='+str(actoken)
a=[]
c = r.content
j=simplejson.loads(c)
#print j["data"]
#print "\n\n\n"
i=0
sum=0
for index in j['data']:
    a.append(index["message"])
    #print index["message"]
    # print index['from']['name']
    analysis = TextBlob(a[i])
    #print(analysis.sentiment)
    #print "hi " +str(analysis.polarity)
    sum += analysis.polarity
    i = i + 1

avg=sum/i
print avg
if -1<=avg<-0.25:
    print "Negative"
if 1>=avg>0.25:
    print "Positive"
if -0.25<=avg<=0.25:
    print "Neutral"





