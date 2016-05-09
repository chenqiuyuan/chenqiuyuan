from WindPy import *
w.start()
data = w.wsd("510050.SH", "close", "2006-04-06", "2016-05-05", "Fill=Previous")
num = len(data.Times)
f = open("50ETF.csv","a+")
for i in range(num):
    line =  str(data.Times[i])[0:10] + "," +str(data.Data[0][i]) + "\n"
    f.writelines(line)
f.close()
print 123