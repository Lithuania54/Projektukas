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

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
browser.get("https://lkl.lt/statistika")

mygtukas = browser.find_element(By.XPATH, "/html/body/div[1]/main/div[1]/div/div[2]/div[2]/div/div/div[1]/div[1]/div[1]/div/div[1]/select/option[2]")
mygtukas.click()
WebDriverWait(browser, 10).until(EC.visibility_of_element_located((By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[2]/div[2]/ul")))


arr = []
lentele = browser.find_element(By.XPATH, "//*[@id=\"players-stats-widget\"]/div/div[2]/div[2]/ul")


urlarr  = []
for lentelesNr in lentele.find_elements(By.XPATH, ".//li"): 
    url = lentelesNr.find_element(By.XPATH, ".//a").get_attribute("href")  
    urlarr.append(url)

print(urlarr)

for index in range(1, 6):
    browser.get("https://lkl.lt/get-players-stats?category=rebounds&tab=avg&season_id=30527&additional_filters=0&team_id=-&month=&search_text=&page="+str(index))

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
 

print(arr)
file_json = open("puslapiai\\html\\scrapinam\\KAMUOLIAI.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)