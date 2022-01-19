import requests
import simplejson
import sys

keyword = sys.argv[1]
r = requests.get('https://newsapi.org/v2/everything?q='+keyword+'&sortBy=publishedAt&apiKey=5f44e5bbe63043fe84ede5d6df96bac0')
c = r.content
j = simplejson.loads(c)

f = open('/var/www/html/trends.txt', 'w')
#print j

for item in j['articles']:
    f.write ("<label><b>"+item['description'].encode('utf8')+"</b></label>")
    #f.write ('\n')
    if(item['urlToImage']):
        f.write ("<img src='"+item['urlToImage'].encode('utf8')+"'height='200' width='200'>")
    #f.write ('\n')
    f.write ("<label>Published At: "+item['publishedAt'].encode('utf8')+"</label>")
    f.write( '\n')

# print j