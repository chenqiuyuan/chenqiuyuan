import redis
r = redis.Redis(host='localhost',port=6379,db=0)
x = r.get('market')

print 'chenqiuyuan'