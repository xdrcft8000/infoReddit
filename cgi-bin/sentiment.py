from nltk.sentiment import SentimentIntensityAnalyzer


sia = SentimentIntensityAnalyzer()


def sentimentAnalysis(text):
    return sia.polarity_scores(text)
