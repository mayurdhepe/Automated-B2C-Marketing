from twython import Twython
import sys

placeid = sys.argv[1]

TWITTER_APP_KEY = 'QPzcMUSrtntz6YQx07oiPZ00a' #supply the appropriate value
TWITTER_APP_KEY_SECRET = 'jCD1SrbDOMz4Qm3pMK3Qg2MNxApD01cqvT9YVdIo447IvtuEeI'
TWITTER_ACCESS_TOKEN = '878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY'
TWITTER_ACCESS_TOKEN_SECRET = 'lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK'

t = Twython(app_key=TWITTER_APP_KEY,
            app_secret=TWITTER_APP_KEY_SECRET,
            oauth_token=TWITTER_ACCESS_TOKEN,
            oauth_token_secret=TWITTER_ACCESS_TOKEN_SECRET)

#search = t.search(q='#omg',   #**supply whatever query you want here**
                  #count=100)

# search = t.search(q='python programming', result_type='popular', count=6)
# tweets = search['statuses']
#
# #print tweets
# for tweet in tweets:
#   print tweet['id_str'], '\n', tweet['text'], tweet['urls']['display_url'], '\n\n\n'

# print tweets[0]

search = t.get_place_trends(id=placeid)

trend_array = []

if search:
    for trend in search[0].get('trends', []):
        trend_array.append(trend['name'])

i=0
for i in range(0,len(trend_array)):
    print trend_array[i]+'\t'+"    "
        #print trend

