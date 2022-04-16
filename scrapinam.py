import selenium
from selenium import webdriver 
from selenium.webdriver.common.by import By 
from selenium.webdriver.support.ui import WebDriverWait 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.common.exceptions import TimeoutException
import json

option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option) 
browser.get("https://lkl.lt/statistika")

table = browser.find_element(By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[2]/div[1]/table/tbody")

arr = []
for row in table.find_elements(By.XPATH,".//tr"):
    temparr =[]
    for cell in row.find_elements(By.XPATH,".//td"): 
        temparr.append(cell.text)
    arr.append(temparr)

print(arr)
file_json = open("Zaidejai.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)