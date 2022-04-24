from argparse import Action
import selenium
from selenium import webdriver 
from selenium.webdriver.common.by import By 
from selenium.webdriver.support.ui import WebDriverWait 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.common.exceptions import TimeoutException
import json

option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\Users\\Rytis\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
arr = []

for index in range(1, 6):
    browser.get("https://lkl.lt/get-players-stats?category=assists&tab=avg&season_id=30527&additional_filters=0&team_id=-&month=&search_text=&page="+str(index))

    WebDriverWait(browser, 10).until(EC.visibility_of_element_located((By.XPATH,"/html/body/div/div[2]/div[1]/table/tbody")))

    table = browser.find_element(By.XPATH, "/html/body/div/div[2]/div[1]/table/tbody")

    for row in table.find_elements(By.XPATH,".//tr"):
        temparr = {}
        pavadinimai = ['Rankas', 'Zaidejas', "Klubas",  "Rungtynes", "Suma", "Vidurkis"]
        i = 0 
        for cell in row.find_elements(By.XPATH,".//td"): 
            temparr[pavadinimai[i]]=cell.text
            i +=1
        arr.append(temparr)
 
file_json = open("puslapiai\\html\\scrapinam\\zaidejai4.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)