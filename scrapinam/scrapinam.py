import selenium
from selenium import webdriver 
from selenium.webdriver.common.by import By 
from selenium.webdriver.support.ui import WebDriverWait 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.common.exceptions import TimeoutException
import json

option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\scrapinam\\chromedriver.exe")  
browser.get("https://lkl.lt/statistika")

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
            temparr =[]
            for cell in row.find_elements(By.XPATH,".//td"): 
                temparr.append(cell.text)
            arr.append(temparr)
    except: 
        print("err")

print(arr)
file_json = open("scrapinam\\Zaidejai.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)