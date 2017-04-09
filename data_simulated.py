#coding=utf-8
#!/usr/bin/python
import MySQLdb
import datetime
import time
import random
import generator

db = MySQLdb.connect(host="localhost", user="sensor_station", passwd="", db="domotic_project")
cur = db.cursor()

date = datetime.datetime(2017, 3, 1, 0, 0)
delta =datetime.timedelta(minutes=30)

temp = 20
temp_maison = []

nb_intervalles=random.randint(10, 20)
nb_pts_intervalle=int(1488/nb_intervalles)
len_maison = 0

while(len_maison + nb_pts_intervalle<1488):
    r = random.randrange(3)
    len_maison += nb_pts_intervalle
    if(r == 1):
        temp_maison=temp_maison+generator.suite_croissante(nb_pts_intervalle,0.01, temp)
    if (r == 2):
        temp_maison=temp_maison+generator.suite_decroissante(nb_pts_intervalle,0.01, temp)
    if (r == 3):
    temp_maison=temp_maison+generator.suite_constante(nb_pts_intervalle,0.01, temp)
    temp= temp_maison[-1]
    
for i in range(1488 - len(temp_maison)):
    r = random.randrange(3)
    if(r == 1):
        temp_maison=temp_maison+generator.suite_croissante(nb_pts_intervalle,0.01, temp)
    if (r == 2):
        temp_maison=temp_maison+generator.suite_decroissante(nb_pts_intervalle,0.01, temp)
    if (r == 3):
        temp_maison=temp_maison+generator.suite_constante(nb_pts_intervalle,0, temp)
    temp= temp_maison[-1]
        
print temp_maison
print len(temp_maison)
for i in xrange(1488):
    date=date + delta
    infoMaison={"temperature": temp_maison[i], "pressure": 1, "humidity": 2, "date":date}
    infoJardin={"temperature": 1, "pressure": 2, "humidity": 4, "date":date}
    infoVeranda={"temperature": 5, "pressure": 5, "humidity": 5, "date":date}
    info_cave={"temperature": 4, "pressure": 4, "humidity": 5, "date":date}
    
    cur.execute("""INSERT INTO maison (date, temperature, pressure, humidity) VALUES (%(date)s, %(temperature)s, %(pressure)s, %(humidity)s)""", infoMaison)
    #cur.execute("""INSERT INTO jardin (date, temperature, pressure, humidity) VALUES (%(date)s, %(temperature)s, %(pressure)s, %(humidity)s)""", infoJardin)
    #cur.execute("""INSERT INTO veranda (date, temperature, pressure, humidity) VALUES (%(date)s, %(temperature)s, %(pressure)s, %(humidity)s)""", infoVeranda)
    #cur.execute("""INSERT INTO cave(date, temperature, pressure, humidity) VALUES (%(date)s, %(temperature)s, %(pressure)s, %(humidity)s)""", info_cave)


db.commit()
db.close()
