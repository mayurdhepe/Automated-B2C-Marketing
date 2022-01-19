# importing the module
import tweepy
import simplejson

# personal information
consumer_key = "QPzcMUSrtntz6YQx07oiPZ00a"
consumer_secret = "jCD1SrbDOMz4Qm3pMK3Qg2MNxApD01cqvT9YVdIo447IvtuEeI"
access_token = "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY"
access_token_secret = "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK"

# authentication
auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)

api = tweepy.API(auth)
tweet = "This is Iphone 5S1 #iphonerocks1"  # toDo
image_path = "/home/mayur/ipgone.jpg"  # toDo

# to attach the media file
status = api.update_with_media(image_path, tweet)


#print tweetid
print status.__getattribute__('id_str')
print '\n'
print status.__getattribute__('favorite_count')

#s2=api.create_favorite(978471054573211648)
#print s2

