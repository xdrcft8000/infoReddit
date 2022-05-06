import requests
from requests.structures import CaseInsensitiveDict
import json

url = "http://text-processing.com/api/sentiment/"



headers = CaseInsensitiveDict()
headers["Content-Type"] = "application/json"


def sentimentAnalysis(text):
    data = "text="+text
    data = data.encode('latin-1','ignore')

    resp = requests.post(url, headers=headers, data=data)


    dic = json.loads(resp.text)
    return dic
