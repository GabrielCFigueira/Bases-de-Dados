f=open("tentativa.sql","w")
i=0
j=0
k=0

f.write("insert into Local(moradaLocal) values('Loures');"+"\n")
f.write("insert into Vigia(moradaLocal, numCamara) values('Loures', 10);"+"\n")


for k in range(2):
    for i in range(60):
        for j in range(60):
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-10 "+("00"+str(k))[-2:]+ ":" +("00"+str(i))[-2:]+":"+("00"+str(j))[-2:]+"','2018-11-" + ("00"+str(10))[-2:] + " 22:00:00', 11);" +"\n")
            #if j<10 and i<10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":"+ "0" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #elif j<10 and i>=10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #elif j>=10 and i<10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" + "0" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #else:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            j+=1
        i+=1
        j=0

for k in range(2):
    for i in range(60):
        for j in range(60):
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-10 "+("00"+str(k))[-2:]+ ":" +("00"+str(i))[-2:]+":"+("00"+str(j))[-2:]+"','2018-11-" + ("00"+str(10))[-2:] + " 22:00:00', 12);" +"\n")
            #if j<10 and i<10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":"+ "0" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #elif j<10 and i>=10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #elif j>=10 and i<10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" + "0" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #else:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            j+=1
        i+=1
        j=0

for k in range(2):
    for i in range(60):
        for j in range(60):
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-10 "+("00"+str(k))[-2:]+ ":" +("00"+str(i))[-2:]+":"+("00"+str(j))[-2:]+"','2018-11-" + ("00"+str(10))[-2:] + " 22:00:00', 13);" +"\n")
            #if j<10 and i<10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":"+ "0" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #elif j<10 and i>=10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #elif j>=10 and i<10:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" + "0" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            #else:
            #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
            j+=1
        i+=1
        j=0

for i in range(60):
    for j in range(60):
        f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-10 "+("00"+str(k))[-2:]+ ":" +("00"+str(i))[-2:]+":"+("00"+str(j))[-2:]+"','2018-11-" + ("00"+str(10))[-2:] + " 22:00:00', 10);" +"\n")
        #if j<10 and i<10:
        #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":"+ "0" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
        #elif j<10 and i>=10:
        #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+"0"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
        #elif j>=10 and i<10:
        #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" + "0" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
        #else:
        #    f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 "+str(10+k)+ ":" +str(i)+":"+str(j)+"','2018-11-08 22:00:00', 10);" +"\n")
        j+=1
    i+=1
    j=0