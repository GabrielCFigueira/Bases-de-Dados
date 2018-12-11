f=open("tentativa.sql","w")
i=0
j=0

for i in range(60):
    for j in range(60):
        if j<10 and i<10:
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 08:" + "0" +str(i)+":"+"0"+str(j)+"','2018-11-08 11:00:00', 10);" +"\n")
        elif j<10 and i>=10:
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 08:" +str(i)+":"+"0"+str(j)+"','2018-11-08 11:00:00', 10);" +"\n")
        elif j>=10 and i<10:
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 08:" + "0" +str(i)+":"+str(j)+"','2018-11-08 11:00:00', 10);" +"\n")
        else:
            f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('2018-11-08 08:" +str(i)+":"+str(j)+"','2018-11-08 11:00:00', 10);" +"\n")
        j+=1
    i+=1
    j=0