from argparse import Action
from email.mime import image
import io
from pathlib import Path
from sre_constants import SUCCESS
from PIL import Image
import selenium
import requests
from selenium import webdriver 
from selenium.webdriver.common.by import By 
from selenium.webdriver.support.ui import WebDriverWait 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.common.exceptions import TimeoutException
import json

option = webdriver.ChromeOptions()
option.add_argument("--muted")

PATH = "C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe"

wd = webdriver.Chrome(PATH)

def get_images_from_kazkur(wd, delay, max_images):
    url = "https://lkl.lt/get-players-stats?category=efficiency&tab=avg&season_id=30527&additional_filters=0&team_id=-&month=&search_text=&page="
    wd.get(url)

    image_urls = set()

    while len(image_urls) < max_images:


def download_image(download_path, url, file_name):
    image_content = requests.get(url).content
    image_file = io.BytesIO(image_content)
    image = Image.open(image_file)
    file_path = download_path + file_name

    with open(file_path, "wb") as f:
        image.save(f, "png")

    print("SUCCESS")

get_images_from_kazkur(wd, 2, 20)
