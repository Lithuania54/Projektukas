from gettext import find
from lib2to3.pgen2 import driver
from operator import index
from select import select
import selenium
from selenium import webdriver 
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By 
from selenium.webdriver.support.ui import WebDriverWait 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.common.exceptions import TimeoutException
import json

option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
browser.get("https://lkl.lt/statistika")

search = browser.find_element(By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[1]/div[1]/div[1]/div/div[1]/select")
select = browser.find_element(By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[1]/div[1]/div[1]/div/div[1]/select/option[2]")

arr = []
lentele = browser.find_element(By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[2]/div[2]/ul")

urlarr  = []
for lentelesNr in lentele.find_elements(By.XPATH, ".//li"): 
    url = lentelesNr.find_element(By.XPATH, ".//a").get_attribute("href")  
    urlarr.append(url)

for url in urlarr:
    print(url)
    try:
        browser.get(url)
        WebDriverWait(browser, 10).until(EC.visibility_of_element_located((By.XPATH,"//*[@id=\"players-stats-widget\"]/div/div[2]/div[1]/table/tbody")))

        table = browser.find_element(By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[2]/div[1]/table/tbody")

        for row in table.find_elements(By.XPATH,".//tr"):
            temparr = {}
            pavadinimai = ['Rankas', 'Zaidejas', "Klubas",  "Rungtynes", "Suma", "Vidurkis"]
            i = 0 
            for cell in row.find_elements(By.XPATH,".//td"):     
                temparr[pavadinimai[i]]=cell.text
                i +=1
            arr.append(temparr)
    except: 
        print("err")

print(arr)
file_json = open("puslapiai\\html\\scrapinam\\zaidejai2.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)