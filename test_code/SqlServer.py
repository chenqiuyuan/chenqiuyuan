# -*- encoding:utf8 -*-
import pyodbc

conn_info = 'DRIVER={SQL Server};DATABASE=stock;SERVER=DESKTOP-SDEEIE3\CQY;'
mssql_conn = pyodbc.connect(conn_info)
mssql_cur = mssql_conn.cursor()
sql = "Select * from [stock].[dbo].[vw_TickData] where BizDate = 20150403 and SecuCode = '600198'"
mssql_cur.execute(sql)
row = mssql_cur.fetchall()
for each in row:
    print each
print 123