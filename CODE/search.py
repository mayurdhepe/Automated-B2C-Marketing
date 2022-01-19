from twython import Twython
import re
import codecs
import sys

keyword = sys.argv[1]

TWITTER_APP_KEY = 'QPzcMUSrtntz6YQx07oiPZ00a' #supply the appropriate value
TWITTER_APP_KEY_SECRET = 'jCD1SrbDOMz4Qm3pMK3Qg2MNxApD01cqvT9YVdIo447IvtuEeI'
TWITTER_ACCESS_TOKEN = '878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY'
TWITTER_ACCESS_TOKEN_SECRET = 'lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK'

f = open('/var/www/html/trends.txt', 'w')

t = Twython(app_key=TWITTER_APP_KEY,
            app_secret=TWITTER_APP_KEY_SECRET,
            oauth_token=TWITTER_ACCESS_TOKEN,
            oauth_token_secret=TWITTER_ACCESS_TOKEN_SECRET)


# def Find(string):
#     # findall() has been used
#     # with valid conditions for urls in string
#     url = re.findall('http[s]?://(?:[a-zA-Z]|[0-9]|[$-_@.&+] | [! * \(\),] | (?: %[0-9a-fA-F][0-9a-fA-F]))+', string)
#     return url

search = t.search(q= keyword, result_type='popular', count=6)
tweets = search['statuses']

# print tweets
for tweet in tweets:
  #print tweet['text']
  #print 'Favourites :'+str(tweet['favorite_count'])
  f.write ((tweet['text']).encode('utf8'))
  # capt = str.encode(tweet['text'])
  # capt.encode("utf-8")
  # f.write(capt)
  f.write('\n')
  f.write('Favourites :' + str(tweet['favorite_count']))
  f.write('\n\n')

  # x = tweet['text']
  # Find(x)
  # print '\n\n'
  f.write( '--------------------------------------------------------------------------------------------')
  f.write('\n')

