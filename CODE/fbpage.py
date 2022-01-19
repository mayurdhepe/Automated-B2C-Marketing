import sys
import facebook

#caption = sys.argv[1]
with open('/var/www/html/file1.txt', 'r') as myfile:
  caption = myfile.read()
image = sys.argv[1]
imagep = '/var/www/html/trainingimages/'+image
def main():
  # Fill in the values noted in previous steps here
  cfg = {
    "page_id"      : "879858028854213",  # Step 1
    "access_token" : "EAAC0WaJ2OU0BANCbFNgSivRda9oHhyrx6D7J1jbx81lxeuG3op7wEccWkfBS4ZBdKOBCaKQFambcwYSHf7nW3HzhQP9sQgivB6wVqkVp7sH4sbrTrmkTWPN2ffQGs9NuiWNn3ZArl9GjEAGazvZB579zTPycJsp0cXAx3t0cQZDZD"   # Step 3
    }

  api = get_api(cfg)
  #msg = "Hello, world12333!"
  #status = api.put_wall_post(msg)
  pic = api.put_photo(image=open(imagep, 'rb'),
                  album_path="879858028854213" + "/photos", message = caption)
  
  print pic['id']



def get_api(cfg):
  graph = facebook.GraphAPI(cfg['access_token'])
  # Get page token to post as the page. You can skip
  # the following if you want to post as yourself.
  resp = graph.get_object('me/accounts')
  page_access_token = None
  for page in resp['data']:
    if page['id'] == cfg['page_id']:
      page_access_token = page['access_token']
  graph = facebook.GraphAPI(page_access_token)
  return graph
  # You can also skip the above if you get a page token:
  # http://stackoverflow.com/questions/8231877/facebook-access-token-for-pages
  # and make that long-lived token as in Step 3

if __name__ == "__main__":
  main()