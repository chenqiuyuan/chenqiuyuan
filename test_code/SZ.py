#-*- encoding:utf8 -*-
from selenium import webdriver
import time
driver = webdriver.Chrome()
driver.get("http://www.sse.com.cn/market/sseindex/overview/")

element = driver.find_element_by_xpath('/html/body/div[7]/div[2]/div[2]/div[2]/div/div[1]/div/div[2]/div[2]')
# element = driver.find_element_by_xpath('//*[@id="tableData_introduction"]')
# element = driver.find_element_by_xpath('//*[@id="tableData_introduction"]/div[2]/table')
time.sleep(1)
x = element.text
y = x.split()
name = y[0]
f = open(name + '.csv','w')
line = ''
for i in range(11):
    for j in range(6):
        index = i * 6 + j + 1
        line = line + y[index] + ","
    line = line.strip(",")
    line = line + "\n"
    f.write(line.encode("gbk"))
    line = ''
#qliu.net@gmail.com


f.close()
print x