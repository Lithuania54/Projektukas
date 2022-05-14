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
arr = []

browser.get("https://lkl.lt/get-games-stats?season_id=30527&team_id=-")

WebDriverWait(browser, 5).until(EC.visibility_of_element_located((By.XPATH,"/html/body/div/div[3]/table")))

table = browser.find_element(By.XPATH, "/html/body/div/div[3]/table")

for row in table.find_elements(By.XPATH,".//tr"):
    temparr = {}
    pavadinimai = ['Nuopelnai', 'Verte', "Namukomanda",  "Sveciukomanda", "Data", "Rezultatas"]
    i = 0
    for cell in row.find_elements(By.XPATH,".//td"): 
        temparr[pavadinimai[i]]=cell.text
        i +=1
    arr.append(temparr)
 
file_json = open("puslapiai\\html\\scrapinam\\TPR.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)



option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
arr = []

browser.get("https://lkl.lt/get-games-stats?season_id=30527&team_id=-")

WebDriverWait(browser, 5).until(EC.visibility_of_element_located((By.XPATH,"/html/body/div/div[4]/table")))

table = browser.find_element(By.XPATH, "/html/body/div/div[4]/table")

for row in table.find_elements(By.XPATH,".//tr"):
    temparr = {}
    pavadinimai = ['Nuopelnai', 'Verte', "Namukomanda",  "Sveciukomanda", "Data", "Rezultatas"]
    i = 0
    for cell in row.find_elements(By.XPATH,".//td"): 
        temparr[pavadinimai[i]]=cell.text
        i +=1
    arr.append(temparr)
 
file_json = open("puslapiai\\html\\scrapinam\\TPK.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)



option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
arr = []

browser.get("https://lkl.lt/get-games-stats?season_id=30527&team_id=-")

WebDriverWait(browser, 5).until(EC.visibility_of_element_located((By.XPATH,"/html/body/div/div[6]/table")))

table = browser.find_element(By.XPATH, "/html/body/div/div[6]/table")

for row in table.find_elements(By.XPATH,".//tr"):
    temparr = {}
    pavadinimai = ['Nuopelnai', 'Verte', "Komanda"]
    i = 0
    for cell in row.find_elements(By.XPATH,".//td"): 
        temparr[pavadinimai[i]]=cell.text
        i +=1
    arr.append(temparr)
 
file_json = open("puslapiai\\html\\scrapinam\\IS.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)



option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
arr = []

browser.get("https://lkl.lt/get-games-stats?season_id=30527&team_id=-")

WebDriverWait(browser, 5).until(EC.visibility_of_element_located((By.XPATH,"/html/body/div/div[7]/table")))

table = browser.find_element(By.XPATH, "/html/body/div/div[7]/table")

for row in table.find_elements(By.XPATH,".//tr"):
    temparr = {}
    pavadinimai = ['Nuopelnai', 'Verte', "Komanda"]
    i = 0
    for cell in row.find_elements(By.XPATH,".//td"): 
        temparr[pavadinimai[i]]=cell.text
        i +=1
    arr.append(temparr)
 
file_json = open("puslapiai\\html\\scrapinam\\IR.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)




option = webdriver.ChromeOptions()
option.add_argument("--muted")

browser = webdriver.Chrome(options=option, executable_path="C:\\xampp\\htdocs\\Projektukas\\puslapiai\\html\\scrapinam\\chromedriver.exe")  
arr = []

browser.get("https://lkl.lt/get-games-stats?season_id=30527&team_id=-")

WebDriverWait(browser, 5).until(EC.visibility_of_element_located((By.XPATH,"/html/body/div/div[5]/table")))

table = browser.find_element(By.XPATH, "/html/body/div/div[5]/table")

for row in table.find_elements(By.XPATH,".//tr"):
    temparr = {}
    pavadinimai = ['Nuopelnai', 'Verte', "Namukomanda",  "Sveciukomanda", "Data", "Rezultatas"]
    i = 0
    for cell in row.find_elements(By.XPATH,".//td"): 
        temparr[pavadinimai[i]]=cell.text
        i +=1
    arr.append(temparr)
 
file_json = open("puslapiai\\html\\scrapinam\\LDS.json", 'w+', encoding='utf-8')

json.dump(arr, file_json, indent = 6, ensure_ascii=False)