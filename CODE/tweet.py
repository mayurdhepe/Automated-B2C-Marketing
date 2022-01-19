# importing the module
import tweepy
import sys

with open('/var/www/html/file1.txt', 'r') as myfile:
  caption = myfile.read()
image = sys.argv[1]
imagep = '/var/www/html/trainingimages/'+image

# personal information
consumer_key = "QPzcMUSrtntz6YQx07oiPZ00a"
consumer_secret = "jCD1SrbDOMz4Qm3pMK3Qg2MNxApD01cqvT9YVdIo447IvtuEeI"
access_token = "878515851401371648-Xj3ysAYH087d1BjSImQ74AmrtITPNiY"
access_token_secret = "lOAByEvFK2lYSieZcIE4frl3p7OFFNJOa4JXTLH89f3SK"

# authentication
auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)

api = tweepy.API(auth)
tweet = caption  # toDo
image_path = imagep  # toDo

# to attach the media file
status = api.update_with_media(image_path, tweet)

#print status

#api.update_status(status=tweet)

