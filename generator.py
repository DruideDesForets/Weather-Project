import random


def suite_croissante (r,ecart ,temp):
    tmp = temp
    liste=[]
    for i in range(r):
        r1 = random.random()
        n = r1*ecart
        if(tmp>tmp+n):
            diff = tmp - tmp+n
            tmp = tmp + diff
        else:
            tmp = tmp + n
        liste.append(tmp)
    return liste

def suite_decroissante (r,ecart, temp):
    tmp = temp
    liste=[]
    for i in range(r):
        r1 = random.random()
        n = r1*ecart
        if(tmp>tmp+n):
            diff = tmp - tmp+n
            tmp = tmp - diff
        else:
            tmp = tmp - n
        liste.append(tmp)
    return liste


def suite_constante (r,ecart, temp):
    tmp=temp
    liste=[]
    r1 = random.random()
    n = r1*ecart
    for i in range(r):
        tmp = tmp + n
        liste.append(tmp)
    return liste
