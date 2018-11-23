import random
import datetime

f = open("INSERTS_BD3.sql","w")

lista_localidades = ['Oliveira do Hospital','Monchique','Abadia de Bouro','Abas da Raposeira','Aboá','Agra (Amorim)','Agra de Bouças',
'Águas Férreas (Póvoa de Varzim)','Águias (Brotas)','Aires (Setúbal)','Alcaniça','Alcorriol','Aldeia (Aguçadoura)',
'Aldeia (Amorim)','Aldeia Grande','Além (Póvoa de Varzim)','Algueirão','Aljustrel (Fátima)','Alqueidão (Cós)',
'Alto de Santa Catarina','Alto Varatojo','Alveijar (Fátima)','Amoreira (Fátima)','Amoreira Cimeira',
'Amoreira Fundeira','Amoreirinha','Amorim de Cima','Anços (Montelavar)','Antões','Arados (Samora Correia)',
'Arcena','Areosa (Aguçadoura)','Assequins','Azedia','Azoia (Sesimbra)','Bairro de Almodena','Balancho',
'Baldoia','Banática','Barretos (Beirã)','Barroca do Outeiro','Barros (Póvoa de Varzim)','Beiriz de Baixo',
'Belverde','Bicesse','Boavista (Póvoa de Varzim)','Boleiros (Fátima)','Bolfiar','Borda do Rio','Bouçã','Brunhido',
'Burgada','Busano (Cascais)','Bustelo (Oliveira de Azeméis)','Cabeda','Cabreira (Póvoa de Varzim)','Cacinheira',
'Cadilhe','Calvário (Póvoa de Varzim)','Calves','Caminho Largo','Campo (Caldas da Rainha)','Capuchos (Caparica)',
'Cardosas (Póvoa de Varzim)','Carrascos (Póvoa de Varzim)','Carregal (Póvoa de Varzim)','Carregosa (Póvoa de Varzim)',
'Carvoeiro (Pampilhosa da Serra)','Casa Velha (Fátima)','Casais de Além','Casais Brancos (Atouguia da Baleia)',
'Casais das Comeiras','Casais Loureiros','Casais do Porto','Casal (Póvoa de Varzim)','Casal dos Crespos',
'Casal de Santa Maria (Fátima)','Casal Farto (Fátima)','Casal do Lobo','Casal do Marco','Casal Mouro','Casal do Queijo',
'Casal Resoneiro','Casal da Rola','Casalinho','Casalinho (Fátima)','Casas Brancas','Casas Novas (Sintra)',
'Castanheira (Cós)','Castelhanas','Castelo Picão','Castro de Nossa Senhora da Confiança','Caturela','Cavadas',
'Cavaditas','Caxieira','Certainha','Chã (Fátima)','Charneca (Fátima)','Chieira','Chinicato',
'Codiceira','Codicheira','Contriz','Corga do Rossaio','Corga do Ouro','Costas de Cão','Cova da Iria',
'Cova do Vapor','Covilhã (Póvoa de Varzim)','Crasto (Póvoa de Varzim)','Cruz (Póvoa de Varzim)',
'Cruz de Pau','Cruz Quebrada','Cutéres','Eira da Pedra','Enxaminhos','Espadelos','Esperança (Ourém)',
'Espinhal (Póvoa de Varzim)','Estanganhola','Estrada (Póvoa de Varzim)','Estrada Nova','Facho da Azoia',
'Fanares','Favacal','Fogueteiro','Foitos','Fómega','Fontainha','Fontainhas (Amorim)','Fontainhas (Póvoa de Varzim)',
'Fonte Longa (Rio Maior)','Fonte Nova (Póvoa de Varzim)','Foros de Amora','Foros da Catrapona','Foz da Sertã',
'Fraião (Póvoa de Varzim)','Frinjo','Fujaco','Funchalinho','Gaio (Gaio-Rosário)','Gaiola (Fátima)','Gandra (Balazar)',
'Geraldes','Gesta (Freguesia de Oiã)','Gestrins','Giesteira (Fátima)','Gozundeira','Granho Novo','Granja de Alpriate',
'Granja do Marquês','Granjeiro (Aguçadoura)','Grota (Portela do Fojo)','Hortas','Igreja (Beiriz)','Igreja (Estela)',
'Igreja (Laundos)','Indioso','Janas','Janes (Cascais)','Lações','Lações de Baixo','Lações de Cima','Lameira (Fátima)',
'Laúndos (Póvoa de Varzim)','Lomba (Fátima)','Lomba (Sobrado-Valongo)','Lombo dÉgua (Fátima)','Lourel','Lousadelo',
'Lugar da Foz','Lugar da Pinta','Luilhas','Machuqueiras','Malveira da Serra','Mámua','Mandim','Manique de Baixo',
'Maria Vinagre','Matas do Louriçal','Matos da Vila','Mau Verde','Maxieira','Meleças','Mem Martins',
'Mercês (Rio de Mouro)','Miratejo','Mogos','Moimento (Fátima)','Moita do Boi','Moita Redonda','Montelo (Fátima)',
'Mourilhe (Póvoa de Varzim)','Muleneta','Murfacém','Navais (Póvoa de Varzim)','Ordem (Póvoa de Varzim)',
'Ortiga (Fátima)','Outeiro (Balazar)','Outeiro (Beiriz)','Outeiro (Estela)','Outeiro (Laundos)',
'Outeiro (Navais)','Outeiro do Louriçal','Paivas','Palença de Cima','Paradela (Trofa)','Paranho (Terroso)',
'Passô (Póvoa de Varzim)','Pasteleiro','Pau Gordo','Pé do Monte (Laundos)','Pé do Monte (Terroso)',
'Pé da Serra','Pederneira (Fátima)','Pedra das Ferraduras Pintadas','Pedreira (Beiriz)','Pedreira (Fátima)',
'Pedrinha (Póvoa de Varzim)','Pedroso (Póvoa de Varzim)','Pego Negro','Penela (Póvoa de Varzim)','Penhas Douradas',
'Penhas da Saúde','Pêra (Caparica)','Perofarinha','Pica Galo','Picoto dos Barbados','Pinhal do Vidal','Pinhal de Frades',
'Poço de Soudo (Fátima)','Pomarinho','Portela do Casal Novo','Porto Alto','Porto de Vacas','Porto Linhares','Porto da Romã',
'Porto Velho (Formigais)','Póvoa das Quartas','Localidades da Póvoa de Varzim','Póvoas (Póvoa de Varzim)','Prelades',
'Primeiro Torrão','Queluz de Baixo','Quintã (Balazar)','Quintã (Beiriz)','Quinta das Bicas','Quinta da Princesa',
'Quinta do Sebal','Raivo','Ramila (Fátima)','Rapijães','Raposo (Portugal)','Real (Póvoa de Varzim)',
'Rebocho','Recreio (Póvoa de Varzim)','Reinaldes','Ribeira de Santo Amaro','Ribeiro do Indioso',
'Ribeiro do Soutelinho','Rio Frio (Palmela)','Rosário (Moita)','Salgados','Santa Cruz (Torres Vedras)',
'Santa Marta do Pinhal','Santo André (Aguçadoura)','Santo António (Louriçal)','Santo António (Póvoa de Varzim)',
'São Cibrão','São Gregório (Melgaço)','Ouguela','São João das Tábuas','São Lourenço (Póvoa de Varzim)',
'São Pedro (Póvoa de Varzim)','São Salvador (Póvoa de Varzim)','Segundo Torrão','Sejães (Póvoa de Varzim)',
'Senhora da Saúde (Póvoa de Varzim)','Serra das Minas','Silvas','Sistelos','Sobreiro Curvo','Soltroia','Sonhim','Subserra',
'Tapada das Mercês','Tercena','Teso (Póvoa de Varzim)','Torre (Caparica)','Torre de Aires','Torre da Marinha',
'Torrinha (Póvoa de Varzim)','Travassos (Póvoa de Varzim)','Trinhão','Urgeiriça','Urzes','Valarinho','Vale da Cabra',
'Vale da Gata','Vale de Cavalos (Fátima)','Vale de Porto (Fátima)','Vale do Amieiro','Vale do Porco',
'Vale de Figueira (Sobreda)','Vale de Milhaços','Vale Mourão','Valinho de Fátima','Valinhos (Fátima)',
'Varatojo (Cós)','Vela (Póvoa de Varzim)','Verdizela','Vila Boa (Rego)','Vila Nova de Caparica',
'Vila Pouca (Póvoa de Varzim)','Vilar (Póvoa de Varzim)','Vinagra','Xisto (Póvoa de Varzim)','Zeive']

lista_nomes = ['Alice','Sophia','Helena','Valentina','Laura','Isabella',
'Manuela','Júlia','Heloísa','Luiza','Maria Luiza','Lorena','Lívia',
'Giovanna','Maria Eduarda','Beatriz','Maria Clara','Cecília',
'Eloá','Lara','Maria Júlia','Isadora','Mariana','Emanuelly',
'Ana Júlia','Ana Luiza','Ana Clara','Melissa','Yasmin',
'Maria Alice','Isabelly','Lavínia','Esther','Sarah','Elisa',
'Antonella','Rafaela','Maria Cecília','Liz','Marina',
'Nicole','Maitê','Isis','Alícia','Luna','Rebeca','Agatha',
'Letícia','Maria-','Gabriela','Ana Laura','Catarina','Clara',
'Ana Beatriz','Vitória','Olívia','Maria Fernanda','Emilly',
'Maria Valentina','Milena','Maria Helena','Bianca','Larissa',
'Mirella','Maria Flor','Allana','Ana Sophia','Clarice','Pietra',
'Maria Vitória','Maya','Laís','Ayla','Ana Lívia','Eduarda',
'Mariah','Stella','Ana','Gabrielly','Sophie','Carolina',
'Maria Laura','Maria Heloísa','Maria Sophia','Fernanda','Malu',
'Analu','Amanda','Aurora','Maria Isis','Louise','Heloise',
'Ana Vitória','Ana Cecília','Ana Liz','Joana','Luana','Antônia',
'Isabel','Bruna','Miguel','Arthur','Bernardo','Heitor','Davi',
'Lorenzo','Théo','Pedro','Gabriel','Enzo','Matheus','Lucas',
'Benjamin','Nicolas','Guilherme','Rafael','Joaquim','Samuel',
'Enzo Gabriel','João Miguel','Henrique','Gustavo','Murilo',
'Pedro Henrique','Pietro','Lucca','Felipe','João Pedro',
'Isaac','Benício','Daniel','Anthony','Leonardo','Davi Lucca',
'Bryan','Eduardo','João Lucas','Victor','João','Cauã','António',
'Vicente','Caleb','Gael','Bento','Caio','Emanuel','Vinícius',
'João Guilherme','Davi Lucas','Noah','João Gabriel','João Victor',
'Luiz Miguel','Francisco','Kaique','Otávio','Augusto','Levi',
'Yuri','Enrico','Thiago','Ian','Victor Hugo','Thomas',
'Henry','Luiz Felipe','Ryan','Arthur Miguel','Davi Luiz',
'Nathan','Pedro Lucas','Davi Miguel','Raul','Pedro Miguel',
'Luiz Henrique','Luan','Erick','Martin','Bruno','Rodrigo',
'Luiz Gustavo','Arthur Gabriel','Breno','Kauê','Enzo Miguel',
'Fernando','Arthur Henrique','Luiz Otávio','Carlos Eduardo',
'Tomás','Lucas Gabriel','André','José','Yago','Danilo',
'Anthony Gabriel','Ruan','Miguel Henrique','Oliver']

dicionario_video_Inicio_camara = {}
dicionario_video_Inicio_Fim = {}
dicionario_meioApoio = {}
dicionario_meioSocorro = {}
dicionario_Acciona_numMeio_nomeEntidade = {}
dicionario_Acciona_numMeio_numProcessoSocorro = {}

lista_camaras_reforco_Vigia_Monchique = []
dicionario_reforco_Vigia_Monchique = {}
lista_camaras_dicionario_Vigia_Monchique = []

iteracoes_minimas = 100
iteracoes_meio = 500
iteracoes_vigia = 300
iteracoes_eventoemergencia = 150
iteracoes_video = 150
iteracoes_segmentovideo = 3

def Camara():
    f.write("----------------------------------------\n")
    f.write("-- Camara - Values\n")
    f.write("----------------------------------------\n")
    for i in range(iteracoes_minimas):
        f.write("insert into Camara(numCamara) values(" + str(i+1) + ");\n")

def Coordenador():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Coordenador - Values\n")
    f.write("----------------------------------------\n")
    for i in range(iteracoes_minimas):
         f.write("insert into Coordenador(idCoordenador) values(" + str(i+1) + ");\n")

def EntidadeMeio():
    f.write("\n\n----------------------------------------\n")
    f.write("-- EntidadeMeio - Values\n")
    f.write("----------------------------------------\n")
    for i in range(iteracoes_minimas):
         f.write("insert into EntidadeMeio(nomeEntidade) values('EntidadeMeio" + str(i+1) + "');\n")

def Local():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Local - Values\n")
    f.write("----------------------------------------\n")
    for e in lista_localidades:
         f.write("insert into Local(moradaLocal) values('" + e + "');\n")

def ProcessoSocorro():
    f.write("\n\n----------------------------------------\n")
    f.write("-- ProcessoSocorro - Values\n")
    f.write("----------------------------------------\n")
    for i in range(iteracoes_minimas):
         f.write("insert into ProcessoSocorro(numProcessoSocorro) values(" + str(i+1) + ");\n")

def Meio():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Meio - Values\n")
    f.write("----------------------------------------\n")
    dici = {}
    nums = {}
    j=0
    k=1
    for i in range(iteracoes_minimas):
        dici[i+1] = []
        nums[i+1] = []
    for i in range(iteracoes_meio):
        j+=1
        rand = int(random.uniform(1,iteracoes_minimas+1))
        while rand in nums[k]:
            rand = int(random.uniform(1,iteracoes_minimas+1))
        nums[k]+=[rand]
        f.write("insert into Meio(numMeio, nomeMeio, nomeEntidade) values("+str(k)+", 'Meio"+str(j)+"', 'EntidadeMeio"+str(rand)+"');\n")
        dici[k] += ["EntidadeMeio"+str(rand)]
        if j%(iteracoes_meio//100) == 0:
            k+=1
    return dici

def Meio_Seleciona(string, dici):
    f.write("\n\n----------------------------------------\n")
    f.write("-- " + string + " - Values\n")
    f.write("----------------------------------------\n")
    lista_rnd = []
    for i in range(iteracoes_minimas):
        randM = int(random.uniform(1,iteracoes_minimas+1))
        while randM in lista_rnd:
            randM = int(random.uniform(1,iteracoes_minimas+1))
        lista_rnd += [randM]
        nomeEntidade = dici[randM][int(random.uniform(0,iteracoes_meio//100))]
        f.write("insert into "+string+"(numMeio, nomeEntidade) values(" + str(randM) + ", '" + nomeEntidade + "');\n")
        if string == "MeioApoio":
            dicionario_meioApoio[randM] = nomeEntidade
        elif string == "MeioSocorro":
            dicionario_meioSocorro[randM] = nomeEntidade

def Vigia():
    global lista_camaras_reforco_Vigia_Monchique
    f.write("\n\n----------------------------------------\n")
    f.write("-- Vigia - Values\n")
    f.write("----------------------------------------\n")
    lst_local = {}

    lista_print_Monchique = []

    for i in range(iteracoes_vigia):
        lst_local[i+1] = []
    
    for i in range(iteracoes_vigia):
        rand = int(random.uniform(1,iteracoes_minimas+1))
        rand_loc = int(random.uniform(0,len(lista_localidades)))
        while lista_localidades[rand_loc] in lst_local[rand]:
            rand_loc = int(random.uniform(0,len(lista_localidades)))

        if int(random.uniform(1,iteracoes_vigia+1))%10 == 0:
            while "Monchique" in lst_local[rand]:
                rand = int(random.uniform(1,iteracoes_minimas+1))
            lst_local[rand] += ["Monchique"]
            lista_camaras_reforco_Vigia_Monchique += [rand]
            f.write("insert into Vigia(moradaLocal, numCamara) values('Monchique', " + str(rand) + ");\n")
            lista_print_Monchique += [rand]
        else:
            lst_local[rand] += [lista_localidades[rand_loc]]
            f.write("insert into Vigia(moradaLocal, numCamara) values('" + lista_localidades[rand_loc] + "', " + str(rand) + ");\n")
            if lista_localidades[rand_loc] == "Monchique":
                lista_print_Monchique += [rand]
    
    lista_print_Monchique.sort()

    for e in lista_print_Monchique:
        print("Monchique - numCamara = "+ str(e))

def EventoEmergencia():
    f.write("\n\n----------------------------------------\n")
    f.write("-- EventoEmergencia - Values\n")
    f.write("----------------------------------------\n")

    oliveira_do_hospital = int(random.uniform(1, 101))
    monchique = int(random.uniform(1, 101))

    f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(" + 
    str(int(random.uniform(910000000, 930000000))) + ", '" + str(datetime.datetime(2018, 9, 10, 20, 31))  + "', 'Alice', 'Oliveira do Hospital', " + str(oliveira_do_hospital) + ");\n")
    f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(" + 
    str(int(random.uniform(910000000, 930000000))) + ", '" + str(datetime.datetime(2018, 8, 30, 18, 59))  + "', 'Oliver', 'Monchique', " + str(monchique) + ");\n")
    lst_local = [0,1]
    lst_nome = [0,len(lista_nomes)-1]



    dicio_localidades_numProcesso = {}

    for i in range(iteracoes_minimas):
        ano = int(random.uniform(2017, 2019))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))

        rand_loc = int(random.uniform(2,len(lista_localidades)))
        rand_nomes = int(random.uniform(0,len(lista_nomes)))

        dicio_localidades_numProcesso[i] = [lista_localidades[rand_loc]]

        if i == oliveira_do_hospital:
            dicio_localidades_numProcesso[i] += [lista_localidades[0]]
        elif i == monchique:
            dicio_localidades_numProcesso[i] += [lista_localidades[1]]

        f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(" + 
        str(int(random.uniform(910000000, 930000000))) + ", '" + str(datetime.datetime(ano, mes, dia, hora, minutos))  + "', '" +
         lista_nomes[rand_nomes] + "', '" + lista_localidades[rand_loc] + "', " + str(i+1) + ");\n")

    for i in range(iteracoes_eventoemergencia-iteracoes_minimas):
        ano = int(random.uniform(2017, 2019))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))
        
        rand_loc = int(random.uniform(0,len(lista_localidades)))

        rand_nomes = int(random.uniform(0,len(lista_nomes)))

        numProc = int(random.uniform(0, iteracoes_minimas))

        while lista_localidades[rand_loc] in dicio_localidades_numProcesso[numProc]:
            rand_loc = int(random.uniform(0,len(lista_localidades)))

        dicio_localidades_numProcesso[numProc] += [lista_localidades[rand_loc]]

        if int(random.uniform(0,200))%3 == 0:
            f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(" + 
            str(int(random.uniform(910000000, 930000000))) + ", '" + str(datetime.datetime(ano, mes, dia, hora, minutos))  + "', '" +
            lista_nomes[rand_nomes] + "', '" + lista_localidades[rand_loc] + "', NULL);\n")
        else:
            f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values(" + 
            str(int(random.uniform(910000000, 930000000))) + ", '" + str(datetime.datetime(ano, mes, dia, hora, minutos))  + "', '" +
            lista_nomes[rand_nomes] + "', '" + lista_localidades[rand_loc] + "', " + str(numProc+1) + ");\n")

def Video():
    global lista_camaras_dicionario_Vigia_Monchique
    f.write("\n\n----------------------------------------\n")
    f.write("-- Video - Values\n")
    f.write("----------------------------------------\n")
    temp = []

    for i in range(iteracoes_video):

        if int(random.uniform(1,iteracoes_minimas+1)) % 3 == 0:
            ano = 2018
            mes = 8
        else:
            ano = int(random.uniform(2017, 2019))
            mes = int(random.uniform(1, 13))
        
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 22))
        minutos = int(random.uniform(0, 60))

        Inicio = datetime.datetime(ano, mes, dia, hora, minutos)

        while Inicio in temp:
            if int(random.uniform(1,iteracoes_minimas+1)) % 3 == 0:
                ano = 2018
                mes = 8
            else:
                ano = int(random.uniform(2017, 2019))
                mes = int(random.uniform(1, 13))
            dia = int(random.uniform(1, 28))
            hora = int(random.uniform(0, 24))
            minutos = int(random.uniform(0, 60))

            Inicio = datetime.datetime(ano, mes, dia, hora, minutos)

        temp += [Inicio]
        dicionario_video_Inicio_camara[Inicio] = ""
    
    index_camara = 0
    
    for key in dicionario_video_Inicio_camara:

        ano = key.year
        mes = key.month
        dia = key.day
        hora = int(random.uniform(22, 24))
        minutos = int(random.uniform(0, 60))
        Fim = datetime.datetime(ano, mes, dia, hora, minutos)

        while Fim <= key:
            hora = int(random.uniform(22, 24))
            minutos = int(random.uniform(0, 60))
            Fim = datetime.datetime(ano, mes, dia, hora, minutos)
        
        dicionario_video_Inicio_Fim[key] = Fim
        
        camara = int(random.uniform(1, iteracoes_minimas+1))
        dicionario_video_Inicio_camara[key] = camara

        if camara in lista_camaras_reforco_Vigia_Monchique:
            dicionario_reforco_Vigia_Monchique[camara] = Inicio
            lista_camaras_dicionario_Vigia_Monchique += [camara]

        f.write("insert into Video(dataHoraInicio, dataHoraFim, numCamara) values('" + str(temp[index_camara]) + "', '" + str(Fim) + "', " + str(camara) + ");\n")

        index_camara += 1

def SegmentoVideo():
    f.write("\n\n----------------------------------------\n")
    f.write("-- SegmentoVideo - Values\n")
    f.write("----------------------------------------\n")
    k=1

    index_camara = 0

    flag_insert_Monchique = True
    flag_exc_time = False
    
    for key in dicionario_video_Inicio_camara:
        camara = dicionario_video_Inicio_camara[key]
        horaInicio = key
        horaFim = dicionario_video_Inicio_Fim[key]
        interval = horaFim-horaInicio
        interval = int(interval.total_seconds())

        for i in range( int(random.uniform(1,iteracoes_segmentovideo)) ):
            time_to_insert = int(random.uniform(0,interval+1))
            interval -= time_to_insert
            if interval < 0:
                interval = 0
                f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(interval//3600) + ":" + str((interval%3600)//60) + ":" + str((interval%3600)%60) + "', '" + str(key) + "', " + str(camara) + ");\n")
                k += 1
            elif interval != 0:
                f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(time_to_insert//3600) + ":" + str((time_to_insert%3600)//60) + ":" + str((time_to_insert%3600)%60) + "', '" + str(key) + "', " + str(camara) + ");\n")
                k += 1
        """

        for i in range(iteracoes_segmentovideo):
            hora = int(random.uniform(0, 21))
            minutos = int(random.uniform(0, 60))
            segundos = int(random.uniform(0, 60))
            if int(random.uniform(1,101)) % 3 == 0:
                f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(hora) + ":" + str(minutos) + ":" + str(segundos) + "', '" + str(e) + "', " + str(dicionario_video[e][int(random.uniform(0,len(dicionario_video[e])))]) + ");\n")
                k += 1
            else:
                if flag_insert_Monchique:
                    if int(random.uniform(1,101)) % 3 == 0:
                        camara = lista_camaras_dicionario_Vigia_Monchique[index_camara]
                        e = dicionario_reforco_Vigia_Monchique[camara]
                        camara = dicionario_video_Inicio_camara[e][int(random.uniform(0,len(dicionario_video_Inicio_camara[e])))]
                        
                        if index_camara == len(lista_camaras_dicionario_Vigia_Monchique)-1:
                            flag_insert_Monchique = False

                        f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(hora) + ":" + str(minutos) + ":" + str(segundos) + "', '" + str(e) + "', " + str(camara) + ");\n")
                        index_camara += 1
                        k += 1
    """
    #print("SegmentosVideos duração superior a 60 segundos - Monchique: " + str(index_camara))

Camara()
Coordenador()
EntidadeMeio()
Local()
ProcessoSocorro()
dicio = Meio()
Meio_Seleciona("MeioCombate",dicio)
Meio_Seleciona("MeioApoio",dicio)
Meio_Seleciona("MeioSocorro",dicio)
Vigia()
EventoEmergencia()
Video()
SegmentoVideo()

f.close()

exit()
