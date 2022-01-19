"""Example Case of the Script"""
from instapy import InstaPy
import time
x=60*60*4
# time.sleep(x)
# if you don't provide arguments, the script will look for INSTA_USER and INSTA_PW in the environment
# session = InstaPy(username='you_even_gym_bro', password='aafaq123456')
session = InstaPy(username='gym_infographics', password='aafaq12345')
# session = InstaPy(username='aafaqin', password='walfol2')

"""Logging in"""
# logs you in with the specified username and password
session.login()
# session.unfollow_users(amount=60)
#testing smthing#





"""Comment util"""
# # default enabled=False, ~ every 4th image will be commented on
# session.set_do_comment(enabled=True, percentage=100)
# session.set_comments(['Awesome', 'Really Cool', 'I like your stuff'])
# # you can also set comments for specific media types (Photo / Video)
# session.set_comments(['Nice shot!'], media='Photo')
# session.set_comments(['Great Video!'], media='Video')

"""Follow util"""
# default enabled=False, follows ~ every 10th user from the images
# session.set_do_follow(enabled=True, percentage=10)

print "following is finished"  #aafu was here
"""Image Check with Image tagging api"""
# default enabled=False , enables the checking with the clarifai api (image tagging)
# if secret and proj_id are not set, it will get the environment Variables
# 'CLARIFAI_API_KEY'
# session.set_use_clarifai(enabled=True, api_key='d54cb7c9f9e046fdbc472901c07cc4c9')
#                                        ^
# ^If specified once, you don't need to add them again

#session.set_use_clarifai(enabled=False)
# session.set_use_clarifai(enabled=True)  # <- will use the one from above

# uses the clarifai api to check if the image contains nsfw content
# Check out their homepage to see which tags there are -> won't comment on image
# (you won't do this on every single image or the 5000 free checks are wasted very fast)
# session.clarifai_check_img_for(['nsfw'], comment=False)  # !if no tags are set, use_clarifai will be False

# checks the image for keywords food and lunch, if found, sets the comments possible comments
# to the given comments
# session.clarifai_check_img_for(['girl','women'], comment=True, comments=['you look so beautiful!!'])
# session.clarifai_check_img_for(['man','boy'], comment=True, comments=['you look so handsome!!'])
# session.clarifai_check_img_for(['bike', 'car'], comment=True, comments=['nice ride!'])
# session.clarifai_check_img_for(['food', 'lunch'], comment=True, comments=['Tasty!', 'Yum!'])
# session.clarifai_check_img_for(['dog', 'cat', 'cute'], comment=True, comments=['Sweet! that looks so cute', 'Cutie!!!'])

"""Like util"""
# completely ignore liking images from certain users
#session.set_ignore_users(['random_user', 'another_username'])
# searches the description and owner comments for the given words
# and won't like the image if one of the words are in there
#session.set_dont_like(['food', 'eat', 'meal'])
# will ignore the don't like if the description contains
# one of the given words


"""Unfollow util"""
# will prevent commenting and unfollowing your good friends
#session.set_dont_include(['friend1', 'friend2', 'friend3'])

"""Different tasks"""
# you can put in as much tags as you want, likes 100 of each tag
# session.like_by_tags(['#test'], amount=100)
# # you can also set to like a specific media (Photo / Video)
# session.like_by_tags(['#test'], amount=10, media='Photo')

# get's the tags from the description and likes 100 images of each tag
#session.like_from_image(url='www.instagram.com/image', amount=100)
# media filtering works here as well
#session.like_by_tags(['#test'], amount=10, media='Video')
# like 10 random posts of each given username
#session.like_by_users(usernames=['friend1', 'friend2', 'friend3'], amount=10, random=True)

""""Like by feed"""
# likes a given amount of posts on your feed, taking into account settings of commenting, like restrictions etc
# session.like_by_feed(amount=100)
# can also randomly skips posts to be liked
# session.like_by_feed(amount=100, randomize=True)
# if it comes across some posts I declared as inappropriate it will automatically unfollow its author user
# session.like_by_feed(amount=100, randomize=True, unfollow=True)
# visits the author's profile page of a certain post and likes a given number of his pictures, then returns to feed
#session.like_by_feed(amount=100, randomize=True, unfollow=True, interact=True)
###

# follows the followers of a given user
# The usernames can be either a list or a string
# The amount is for each account, in this case 30 users will be followed
# If random is false it will pick in a top-down fashion
# default sleep_delay=600 (10min) for every 10 user following, in this case sleep for 60 seconds
#session.follow_user_followers(['friend1', 'friend2', 'friend3'], amount=10, random=False, sleep_delay=60)
# For 50% of the 30 newly followed, move to their profile
# and randomly choose 5 pictures to be liked.
# Take into account the other set options like the comment rate
# and the filtering for inappropriate words or users
# session.set_user_interact(amount=100, random=True, percentage=100, media='Photo')
#session.follow_user_followers(['friend1', 'friend2', 'friend3'], amount=10, random=False, interact=True)
# default sleep_delay=600 (10min) for every 10 user following, in this case sleep for 60 seconds
#session.follow_user_followers(['friend1', 'friend2', 'friend3'], amount=10, random=False, interact=True, sleep_delay=60)

# follows the people that a given user is following
# Same rules as the function above
#session.follow_user_following('friend2', amount=10, random=True, sleep_delay=60)
# For 50% of the 30 newly followed, move to their profile
# and randomly choose 5 pictures to be liked.
# Take into account the other set options like the comment rate
# and the filtering for inappropriate words or users
#session.set_user_interact(amount=5, random=True, percentage=50, media='Photo')
#session.follow_user_following(['friend1', 'friend2', 'friend3'], amount=10, random=False, interact=True)
#session.follow_user_following(['friend1', 'friend2', 'friend3'], amount=10, random=False, interact=True, sleep_delay=60)


#Interact with the people that a given user is following
#set_do_comment, set_do_follow and set_do_like are applicable
#session.set_user_interact(amount=5, random=True, percentage=50, media='Photo')
#session.set_do_follow(enabled=False, percentage=70)
#session.set_do_like(enabled=False, percentage=70)
#session.set_comments(["Cool", "Super!"])
#session.set_do_comment(enabled=True, percentage=80)
#session.interact_user_following(['natgeo'], amount=10, random=True)

print "starting to interact"+"**************** \n **********************\n ****************** \n"
#Interact with the people that is following a given user
#set_do_comment, set_do_follow and set_do_like are applicable
session.set_user_interact(amount=10, percentage=100, media='Photo')
session.set_do_follow(enabled=True, percentage=40)
session.set_do_like(enabled=True, percentage=90)
session.set_comments(["great content! do check out our page you would love it!","nice post! please check out my meme page! thank you!","Cool", "Super!","amazing!","wow!","great stuff!","we love your content! please do check out our page","thats one nice post! do check out our page am sure you would love our content!","your uploads are amazing! please do have a glance at our page!","inspiring man!","i really like what you are doing on here, btw like my few pictures please and follow me am a new fitness page and i need a fast start","yoooo!","thats awesome","i love your content!","awesome stuff"])
session.set_do_comment(enabled=True, percentage=30)
session.interact_user_followers(['gym.memes.now','gym_meme','gymmemesofficial','gymfailnation','bro.science.life'], amount=10)
session.interact_user_followers(['outalpha','omarisuf','jeffnipard','marksmellybell'], amount=20)

session.interact_user_followers(['omarisuf','jeffnipard','marksmellybell'], amount=20)
session.interact_user_followers(['beingsalmankhan','akshaykumar','tigerjackieshroff','kapilsharma'], amount=20)
session.interact_user_followers(['blessing_awodibu','schwarzenegger','gymfailnation','bro.science.life'], amount=20)

longert1=15
longert2=8

session.interact_user_followers(['sangram_chougule_official','yatindersingh_official','akshat_xesthetix'], amount=longert1)
session.interact_user_followers(['vasumittal','rohitkhatrifitness','manojpatil_mr.physique'], amount=longert1)
#####low followers once a week

session.interact_user_followers(['kristian_ebenezer','vaibhav_63fitness','sangeet_nath'], amount=longert2)
session.interact_user_followers(['sc_web','mohsinkhanfitness'], amount=longert2)
session.interact_user_followers(['vijaybhoyar','shredded.singh'], amount=longert2)
session.interact_user_followers(['mybollywoodbody','aish_mehan','dalipsinghcwe'], amount=longert2)
session.interact_user_followers(['vipin_rathore_official','shredded_rajesh'], amount=longert2)

session.interact_user_followers(['gymfailnation','bro.science.life'], amount=longert1)
session.interact_user_followers(['taneja.gaurav'], amount=longert1)
session.interact_user_followers(['rohitkhatrifitness','beerbiceps'], amount=longert1)
session.interact_user_followers(['iamtarungill','sahilkhan'], amount=longert1)
session.interact_user_followers(['gurumann','sikhmuscle','abhinavfitness'], amount=longert1)


####indian big shots
#
# session.unfollow_users(amount=100)  # unfollows 10 of the accounts your following -> instagram will only unfollow 10 before you'll be 'blocked
# #  for 10 minutes' (if you enter a higher number than 10 it will unfollow 10, then wait 10 minutes and will continue then)
#
#
# """Extras"""
# #Reduces the amount of time under sleep to a given percentage
# #It might be useful to test the tool or to increase the time for slower connections (percentage > 100)
session.set_sleep_reduce(50)


"""Ending the script"""
# clears all the cookies, deleting you password and all information from this session
session.end()
