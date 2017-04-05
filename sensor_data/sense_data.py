#coding=utf-8
#!/usr/bin/python
import MySQLdb
from datetime import datetime
from sense_hat import SenseHat
import time
import random

sense = SenseHat()

db = MySQLdb.connect(host="192.168.1.14", user="sensor_station", passwd="", db="domotic_project")
cur = db.cursor()

cpt_insert=0
cptAffichage=0

while(1):
    cpt_insert+=1
    cptAffichage+=1
    date=datetime.now()
    
    tempMaison=round(sense.get_temperature(), 2)
    pressMaison=round(sense.get_pressure(), 2)
    humMaison=round(sense.get_humidity(), 2)
    
    tempJardin=round(sense.get_temperature(), 2)+random.randrange(-10, 10, 1)
    pressJardin=round(sense.get_pressure(), 2)+random.randrange(-10, 20, 1)
    humJardin=round(sense.get_humidity(), 2)+random.randrange(-10, 10, 1)

    tempVeranda=round(sense.get_temperature(), 2)+random.randrange(-5, 10, 1)
    pressVeranda=round(sense.get_pressure(), 2)+random.randrange(-10, 20, 1)
    humVeranda=round(sense.get_humidity(), 2)+random.randrange(-10, 10, 1)

    temp_cave=round(sense.get_temperature(), 2)+random.randrange(-5, 0, 1)
    press_cave=round(sense.get_pressure(), 2)+random.randrange(-10, 20, 1)
    hum_cave=round(sense.get_humidity(), 2)+random.randrange(-10, 10, 1)

    infoMaison={"temperature": tempMaison, "pressure": pressMaison, "humidity": humMaison, "date":date}
    infoJardin={"temperature": tempJardin, "pressure": pressJardin, "humidity": humJardin, "date":date}
    infoVeranda={"temperature": tempVeranda, "pressure": pressVeranda, "humidity": humVeranda, "date":date}
    info_cave={"temperature": temp_cave, "pressure": press_cave, "humidity": hum_cave, "date":date}


    cur.execute("""UPDATE maison SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s, date= NOW() WHERE id=1""", infoMaison)
    cur.execute("""UPDATE jardin SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s, date= NOW() WHERE id=1""", infoJardin)
    cur.execute("""UPDATE veranda SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s, date= NOW() WHERE id=1""", infoVeranda)
    cur.execute("""UPDATE cave SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s, date= NOW() WHERE id=1""", info_cave)
   
    if (cpt_insert==30):
        cur.execute("""INSERT INTO maison(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", infoMaison)
        cur.execute("""INSERT INTO jardin(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", infoJardin)
        cur.execute("""INSERT INTO veranda(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", infoVeranda)
        cur.execute("""INSERT INTO cave(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", info_cave)

        cpt_insert=0

    if (cptAffichage==2):
        cur.execute("""SELECT * from maison""")
        row = cur.fetchall()
        print ('****Maion****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4])) 
            
        cur.execute("""SELECT * from maison""")
        row = cur.fetchall()
        print ('****Jardin****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4])) 
                
        cur.execute("""SELECT * from maison""")
        row = cur.fetchall()
        print ('****Veranda****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4]))

        cur.execute("""SELECT * from maison""")
        row = cur.fetchall()
        print ('****Cave****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4])) 
            
        cptAffichage=0

        
    db.commit()
    time.sleep(2)

    
db.close()

