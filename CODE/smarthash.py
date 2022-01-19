import requests
import simplejson
import operator

import sys

print "hellloooo"
with open("/var/www/html/objrecog.txt","r") as ins:
     array = []
     for line in ins:
          array.append(line)
f = open('/var/www/html/hashtag.txt', 'w')


def printhash(indi):
          var1=array[indi]
          var1=str(var1[8:])
          var1=str(var1[:-1])
          var1=var1.replace(" ","")

          # print var1

          # inputarg=myarg[9:]
          # print inputarg
          # print "\n\n\n"
          # print file.readline(2)
          # print file.readline(3)
          # print file.readline(4)
          # print file.readline(5)


          r = requests.get('https://d212rkvo8t62el.cloudfront.net/tag/'+var1)
          c = r.content
          j = simplejson.loads(c)
          i=0
          # dictlist = [dict() for x in range(100)]
          dictlist={}
          besthasht={}

          for item in j['results']:
               dictlist.update({item['tag']:item['media_count']})
               # dictlist[i]=item['tag']
               # dictlist["key"][i]= item['relevance']
               # i=i+1
          # print  dictlist
          sorted(dictlist.items(), key=lambda x:x[1])
          if dictlist.__len__()>5:
               # print "yes"
               for i in range(5):
                    inverse = [(value, key) for key, value in dictlist.items()]
                    a=max(inverse)[1]
                    f.write("#"+a)
                    f.write("\n")
                    besthasht.update({a:dictlist[a]})
                    del dictlist[a]

          # print  dictlist

          # print "best hashtags are"

          # print besthasht

printhash(0)
printhash(1)
printhash(2)
printhash(3)
printhash(4)
