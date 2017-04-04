#coding=utf-8
#!/usr/bin/python
import MySQLdb
from datetime import datetime
from sense_hat import SenseHat
import time

sense = SenseHat()

db = MySQLdb.connect(host="192.168.99.70", user="sensor_station", passwd="", db="domotic_project")
cur = db.cursor()

cptMaj=0
cptAffichage=0

while(1):
    cptMaj+=1
    cptAffichage+=1
    
    tempMaison=round(sense.get_temperature(), 2)
    pressMaison=round(sense.get_pressure(), 2)
    humMaison=round(sense.get_humidity(), 2)
    
    tempJardin=round(sense.get_temperature(), 2)
    pressJardin=round(sense.get_pressure(), 2)
    humJardin=round(sense.get_humidity(), 2)

    tempVeranda=round(sense.get_temperature(), 2)
    pressVeranda=round(sense.get_pressure(), 2)
    humVeranda=round(sense.get_humidity(), 2)

    temp_cave=round(sense.get_temperature(), 2)
    press_cave=round(sense.get_pressure(), 2)
    hum_cave=round(sense.get_humidity(), 2)
        
    infoMaison={"temperature": tempMaison, "pressure": pressMaison, "humidity": humMaison}
    infoJardin={"temperature": tempJardin, "pressure": pressJardin, "humidity": humJardin}
    infoVeranda={"temperature": tempVeranda, "pressure": pressVeranda, "humidity": humVeranda}
    info_cave={"temperature": temp_cave, "pressure": press_cave, "humidity": hum_cave}


    cur.execute("""UPDATE maison SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s WHERE id=1""", infoMaison)
    cur.execute("""UPDATE jardin SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s WHERE id=1""", infoJardin)
    cur.execute("""UPDATE veranda SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s WHERE id=1""", infoVeranda)
    cur.execute("""UPDATE cave SET temperature=%(temperature)s, pressure=%(pressure)s, humidity=%(humidity)s WHERE id=1""", info_cave)
   
    if (cptMaj==1800):
        cur.execute("""INSERT INTO maison(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", infoMaison)
        cur.execute("""INSERT INTO jardin(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", infoJardin)
        cur.execute("""INSERT INTO veranda(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", infoVeranda)
        cur.execute("""INSERT INTO cave(date,temperature,pressure,humidity) VALUES (NOW(), %(temperature)s, %(pressure)s, %(humidity)s)""", info_cave)

        cptMaj=0

    if (cptAffichage==1):
        cur.execute("""SELECT * from maison""")
        for row in cur.fetchall():
            print ('****Maion****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4])) 
            
        cur.execute("""SELECT * from maison""")
        for row in cur.fetchall():
            print ('****Jardin****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4])) 
                
        cur.execute("""SELECT * from maison""")
        for row in cur.fetchall():
            print ('****Veranda****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4]))

        cur.execute("""SELECT * from maison""")
        for row in cur.fetchall():
            print ('****Cave****\ntemperature: {0}\npressure: {1}\nhumidity: {2}\n'.format(row[2], row[3], row[4])) 
            
        cptAffichage=0

        
    db.commit()
    time.sleep(2)

    
db.close()

