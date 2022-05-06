#!/usr/bin/env python
#!pip install --upgrade praw
import sys
import os
import itertools
import praw
import csv
import pandas as pd
import datetime
import time
from IPython.display import display
import sentiment
from nltk.sentiment import SentimentIntensityAnalyzer


sia = SentimentIntensityAnalyzer()
print(os.getcwd())
os.chdir(os.path.expanduser("~"))
print(os.getcwd())


reddit = praw.Reddit(client_id='y97YLExnyHMfbXb3hwatyg',
                     client_secret='57lfKkP6ugVHOOjzde5w_5IPsZRk_Q',
                     user_agent='firstdraft',
                     username='CM2305-8',
                     )


def createDictionary():

    dict = { "title":[], "score":[], "id":[], "url":[], "date": [], "body":[], "subreddit":[], "upvote_ratio":[], "comment":[]}

    return dict

def appendDictionary(post,dict,commentrating):

    dict["title"].append(posts.title)
    dict["score"].append(posts.score)
    dict["id"].append(posts.id)
    dict["url"].append(posts.url)
    dict["date"].append(posts.created)
#    pd.to_datetime(datetime.datetime.fromtimestamp(posts.created)))
    dict["body"].append(posts.selftext)
    dict["subreddit"].append(posts.subreddit.display_name)
    dict["upvote_ratio"].append(posts.upvote_ratio)
    dict["comment"].append(commentrating)

start_time = time.time()
if len(sys.argv) > 1:
    INPUT = str(sys.argv[1])
    seconds = int(sys.argv[2])
else:
    seconds = 30                #timeout limit
    INPUT = 'biden'
    
if 'reddit.com' in INPUT:   #If link is a reddit post
    test_post= reddit.submission(url=INPUT)
    if test_post.url:        #If post is a link post it will search for the url
        post = '"'+test_post.url+'"'

    else:                    #Other wise it will search for the post's title
        post = '"'+test_post.title+'"'
else:                        #For a non reddit link reddit posts containing that link will be searched for
    post = '"'+INPUT+'"'
print(post)
submissions = reddit.subreddit("all").search(post)             #searches the subreddit 'all'
submissions2 = reddit.subreddit("news").search(post)           #searches a few other major
submissions3 = reddit.subreddit("nbl").search(post)            #subs that have opted out
submissions4 = reddit.subreddit("nfl").search(post)            #of being listed under 'all'

SearchResults=createDictionary() #create empty dictionary
print( "posts retrieved, analysing comments")


for posts in itertools.chain(submissions,submissions2,submissions3,submissions4): #interate thru each post found from the search
    print("tick")
    current_time= time.time()
    elapsed_time = current_time - start_time
    if elapsed_time > seconds:
        print("timeout: " +str(int(elapsed_time)) + "seconds")
        break
    # Comment processing and sentiment analysis
    posts.comments.replace_more(limit=0)
    count = 0
    totsent = 0

    for comments in posts.comments:
        if count == 5:
            break

        totsent += sia.polarity_scores(comments.body)["compound"]
        count += 1
    # a comment rating is made based on the average rating of the top comments
    commentrating = totsent/5
    appendDictionary(posts,SearchResults,commentrating)  #adds each posts deatails to dictionary

def getLineGraph(x):
    reposts = list(range(1,len(SearchResults['title'])))
    if len(SearchResults['title']) > x:
        dates = SearchResults['date'][0:x]
        sentiments = SearchResults['comment'][0:x]
    else:
        dates = SearchResults['date']
        sentiments = SearchResults['comment']

    print("LINEGRAPH: ", "dates: ", dates, "reposts:" , reposts)

    return reposts,dates,sentiments

def getBarChart(x):
    if len(SearchResults['title']) > x:
        title= SearchResults['title'][0:x]
        upvotes = SearchResults['score'][0:x]
        subreddits = SearchResults['subreddit'][0:x]
        upvoteratio = SearchResults['upvote_ratio'][0:x]
        urls = SearchResults['url'][0:x]
    else:
        title= SearchResults['title']
        upvotes = SearchResults['score']
        subreddits = SearchResults['subreddit']
        upvoteratio = SearchResults['upvote_ratio']
        urls = SearchResults['url']
    print("BARCHART:", "subreddits:", subreddits, " UPVOTES:", upvotes)
    return upvotes,subreddits,upvoteratio,title,urls



def writetocsv(x):
    header=['index','subreddit','timestamp','sentiment','name','upvotes','updown ratio','url']
    print("rawsearch")
    with open('rawsearchdata.csv', 'w', encoding='UTF8', newline='') as f:
        writer = csv.writer(f)
        writer.writerow(header)
        [upvotes,subreddits,upvoteratio,title,url]=getBarChart(x)
        [reposts,dates,sentiments]=getLineGraph(x)
        for posts in range(len(title)):

            data=[posts+1,str('r/'+subreddits[posts]),dates[posts],sentiments[posts],title[posts],upvotes[posts],upvoteratio[posts],url[posts]]
            writer.writerow(data)

writetocsv(20)
#sys.stdout.reconfigure(encoding='utf-8', errors='namereplace')
#sys.stderr.reconfigure(encoding='utf-8', errors='namereplace')

DD_data = pd.DataFrame(SearchResults)
pd.set_option('display.max_rows', None)
pd.set_option('display.max_columns', None)
pd.set_option('display.width', None)
pd.set_option('display.max_colwidth', None)
print("dataframe made")
