"""Example Case of the Script"""
from instapy import InstaPy
import time
x=60*60*4
# time.sleep(x)
# if you don't provide arguments, the script will look for INSTA_USER and INSTA_PW in the environment
session = InstaPy(username='you_even_gym_bro', password='aafaq123456')
# session = InstaPy(username='asimw.s', password='datamining6')
#
# session = InstaPy(username='gym_infographics', password='aafaq12345')
# session = InstaPy(username='aafaqin', password='walfol2')

"""Logging in"""
# logs you in with the specified username and password
session.login()
# session.unfollow_users(amount=200)
#testing smthing#

# session.unfollow_users(onlyInstapyFollowed=True,amount=20)

print "starting to interact"+"**************** \n **********************\n ****************** \n"
#Interact with the people that is following a given user
#set_do_comment, set_do_follow and set_do_like are applicable
session.set_user_interact(amount=10, percentage=50, media='Photo')
session.set_do_follow(enabled=True, percentage=40)
session.set_do_like(enabled=True, percentage=90)
session.set_comments(["great content! do check out our page you would love it!","nice post! please check out my meme page! thank you!","Cool", "Super!","amazing!","wow!","great stuff!","we love your content! please do check out our page","thats one nice post! do check out our page am sure you would love our content!","your uploads are amazing! please do have a glance at our page!","inspiring man!","i really like what you are doing on here, btw like my few pictures please and follow me am a new fitness page and i need a fast start","yoooo!","thats awesome","i love your content!","awesome stuff"])
session.set_do_comment(enabled=True, percentage=30)
# session.interact_user_followers(['gym.memes.now','gym_meme','gymmemesofficial','gymfailnation','bro.science.life'], amount=10)
# session.interact_user_followers(['outalpha','omarisuf','jeffnipard','marksmellybell'], amount=2)
#
# session.interact_user_followers(['omarisuf','jeffnipard','marksmellybell'], amount=20)
# session.interact_user_followers(['beingsalmankhan','akshaykumar','tigerjackieshroff','kapilsharma'], amount=20)
# session.interact_user_followers(['blessing_awodibu','schwarzenegger','gymfailnation','bro.science.life'], amount=30)


# session.interact_user_followers(['jeet_selal'], amount=300)
# session.interact_user_followers(['sikhspack'], amount=300)
# session.interact_user_followers([''], amount=300)
# medium
longert1=300
# session.interact_user_followers(['the_indianbodybuilding'], amount=longert1)
# session.interact_user_followers(['sunitjadhavofficial'], amount=longert1)  #


# session.interact_user_followers(['pankajgajwani44'], amount=longert1)
session.interact_user_followers(['akber_hussain_fitness_model'], amount=longert1)

# very low level
# session.interact_user_followers(['inikhilwatts','gijojohnofficial','h_thakran','manishadvilkar','bhuwan_chauhan_ifbbpro'], amount=longert1)
# session.interact_user_followers(['sunny8x','ashwaniiduhan','wajid101','undefeatable_rohit_rajput','shivy231'], amount=longert1)


"""Ending the script"""
# clears all the cookies, deleting you password and all information from this session

