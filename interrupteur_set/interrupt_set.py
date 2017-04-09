#!/usr/bin/env python
# -*- coding: utf-8 -*-
import serial
import time
import MySQLdb
from gpiozero import LED

list_interrupt=[]
spot_jardin = LED (4)
salon_lustre = LED (15)
cave_lum = LED (2)
chambre_chevet = LED (18)
salon_tele = LED (14)


list_interrupt.append(spot_jardin)
list_interrupt.append(salon_lustre)
list_interrupt.append(cave_lum)
list_interrupt.append(chambre_chevet)
list_interrupt.append(salon_tele)

while True:
    db = MySQLdb.connect(host="localhost", user="switch_setter", passwd="", db="domotic_project")
    cur = db.cursor()
    cur.execute("""SELECT * FROM switches""")
    i=0
    for row in cur.fetchall():
        if (row[2] == 1):
            list_interrupt[i].on()
        elif (row[2] == 0):
            list_interrupt[i].off()
        i+=1
    cur.close()
    db.close()
    time.sleep(0.05)
