import random
import datetime

f = open("populate.sql","w")

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
'Letícia','Maria','Gabriela','Ana Laura','Catarina','Clara',
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

lista_textos = ['A auditoria marcada para o acontecimento 1 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 2 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 3 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 4 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 5 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 6 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 7 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 8 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 9 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 10 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 11 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 12 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 13 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 14 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 15 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 16 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 17 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 18 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 19 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 20 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 21 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 22 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 23 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 24 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 25 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 26 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 27 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 28 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 29 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 30 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 31 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 32 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 33 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 34 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 35 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 36 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 37 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 38 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 39 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 40 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 41 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 42 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 43 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 44 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 45 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 46 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 47 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 48 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 49 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 50 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 51 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 52 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 53 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 54 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 55 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 56 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 57 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 58 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 59 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 60 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 61 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 62 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 63 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 64 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 65 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 66 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 67 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 68 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 69 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 70 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 71 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 72 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 73 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 74 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 75 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 76 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 77 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 78 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 79 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 80 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 81 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 82 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 83 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 84 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 85 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 86 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 87 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 88 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 89 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 90 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 91 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 92 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 93 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 94 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 95 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 96 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 97 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 98 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 99 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 100 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 101 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 102 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 103 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 104 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 105 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 106 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 107 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 108 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 109 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 110 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 111 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 112 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 113 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 114 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 115 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 116 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 117 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 118 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 119 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 120 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 121 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 122 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 123 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 124 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 125 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 126 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 127 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 128 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 129 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 130 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 131 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 132 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 133 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 134 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 135 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 136 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 137 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 138 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 139 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 140 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 141 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 142 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 143 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 144 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 145 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 146 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 147 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 148 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 149 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 150 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 151 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 152 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 153 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 154 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 155 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 156 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 157 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 158 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 159 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 160 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 161 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 162 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 163 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 164 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 165 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 166 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 167 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 168 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 169 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 170 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 171 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 172 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 173 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 174 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 175 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 176 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 177 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 178 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 179 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 180 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 181 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 182 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 183 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 184 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 185 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 186 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 187 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 188 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 189 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 190 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 191 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 192 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 193 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 194 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 195 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 196 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 197 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 198 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 199 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 200 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 201 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 202 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 203 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 204 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 205 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 206 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 207 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 208 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 209 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 210 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 211 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 212 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 213 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 214 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 215 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 216 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 217 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 218 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 219 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 220 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 221 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 222 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 223 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 224 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 225 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 226 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 227 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 228 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 229 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 230 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 231 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 232 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 233 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 234 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 235 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 236 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 237 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 238 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 239 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 240 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 241 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 242 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 243 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 244 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 245 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 246 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 247 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 248 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 249 tem como efeito decidir os procedimentos a seguir.',
'A auditoria marcada para o acontecimento 250 tem como efeito decidir os procedimentos a seguir.']

dicionario_video_Inicio_camara = {}
dicionario_video_Inicio_Fim = {}
dicionario_meioApoio = {}
dicionario_meioSocorro = {}
dicionario_meioCombate = {}
dicionario_Acciona_numMeio_nomeEntidade = {}
dicionario_Acciona_numMeio_numProcessoSocorro = {}

lista_camaras_reforco_Vigia_Monchique = []
dicionario_reforco_Vigia_Monchique = {}
lista_camaras_dicionario_Vigia_Monchique = []

lista_numProcessos_reforco_Acciona_Audita = []

iteracoes_minimas = 100
iteracoes_meio = 500
iteracoes_vigia = 300
iteracoes_eventoemergencia = 150
iteracoes_video = 150
iteracoes_segmentovideo = 3
iteracoes_acciona = 300
iteracoes_audita = 120
iteracoes_solicita = 120
iteracoes_transporta_alocado = 100

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
        if j%(iteracoes_meio//iteracoes_minimas) == 0:
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
        
        index1 = int(random.uniform(0,iteracoes_meio//iteracoes_minimas))
        nomeEntidade = dici[randM][index1]

        if string == "MeioCombate":
            while nomeEntidade in dicionario_meioApoio[randM]:
                index1 = int(random.uniform(0,iteracoes_meio//iteracoes_minimas))
                nomeEntidade = dici[randM][index1]

        f.write("insert into "+string+"(numMeio, nomeEntidade) values(" + str(randM) + ", '" + nomeEntidade + "');\n")
        if string == "MeioApoio":
            if randM not in dicionario_meioApoio.keys():
                dicionario_meioApoio[randM] = [nomeEntidade]
            else:
                dicionario_meioApoio[randM] += [nomeEntidade]
        elif string == "MeioSocorro":
            if randM not in dicionario_meioSocorro.keys():
                dicionario_meioSocorro[randM] = [nomeEntidade]
            else:
                dicionario_meioSocorro[randM] += [nomeEntidade]
        elif string == "MeioCombate":
            if randM not in dicionario_meioCombate.keys():
                dicionario_meioCombate[randM] = [nomeEntidade]
            else:
                dicionario_meioCombate[randM] += [nomeEntidade]

        index2 = int(random.uniform(0,iteracoes_meio//iteracoes_minimas))
        while index1 == index2:
            index2 = int(random.uniform(0,iteracoes_meio//iteracoes_minimas))

        nomeEntidade = dici[randM][index2]

        if string == "MeioCombate":
            while nomeEntidade in dicionario_meioApoio[randM] or index1==index2:
                index2 = int(random.uniform(0,iteracoes_meio//iteracoes_minimas))
                nomeEntidade = dici[randM][index2]

        f.write("insert into "+string+"(numMeio, nomeEntidade) values(" + str(randM) + ", '" + nomeEntidade + "');\n")
        if string == "MeioApoio":
            if randM not in dicionario_meioApoio.keys():
                dicionario_meioApoio[randM] = [nomeEntidade]
            else:
                dicionario_meioApoio[randM] += [nomeEntidade]
        elif string == "MeioSocorro":
            if randM not in dicionario_meioSocorro.keys():
                dicionario_meioSocorro[randM] = [nomeEntidade]
            else:
                dicionario_meioSocorro[randM] += [nomeEntidade]
        elif string == "MeioCombate":
            if randM not in dicionario_meioCombate.keys():
                dicionario_meioCombate[randM] = [nomeEntidade]
            else:
                dicionario_meioCombate[randM] += [nomeEntidade]

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
    global lista_numProcessos_reforco_Acciona_Audita
    f.write("\n\n----------------------------------------\n")
    f.write("-- EventoEmergencia - Values\n")
    f.write("----------------------------------------\n")

    oliveira_do_hospital = int(random.uniform(1, iteracoes_minimas+1))
    monchique = int(random.uniform(1, iteracoes_minimas+1))

    f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values('" + 
    str(int(random.uniform(910000000, 930000000))) + "', '" + str(datetime.datetime(2018, 9, 10, 20, 31))  + "', 'Alice', 'Oliveira do Hospital', " + str(oliveira_do_hospital) + ");\n")
    f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values('" + 
    str(int(random.uniform(910000000, 930000000))) + "', '" + str(datetime.datetime(2018, 8, 30, 18, 59))  + "', 'Oliver', 'Monchique', " + str(monchique) + ");\n")
    lst_local = [0,1]
    lst_nome = [0,len(lista_nomes)-1]

    dicio_localidades_numProcesso = {}

    count_Oliveira = 0

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

        f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values('" + 
        str(int(random.uniform(910000000, 930000000))) + "', '" + str(datetime.datetime(ano, mes, dia, hora, minutos))  + "', '" +
         lista_nomes[rand_nomes] + "', '" + lista_localidades[rand_loc] + "', " + str(i+1) + ");\n")

    for i in range(iteracoes_eventoemergencia-iteracoes_minimas):
        ano = int(random.uniform(2017, 2019))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))
        
        if int(random.uniform(1,101))%3 == 0:
            rand_loc = 0
        else:
            rand_loc = int(random.uniform(0,len(lista_localidades)))

        rand_nomes = int(random.uniform(0,len(lista_nomes)))

        numProc = int(random.uniform(0, iteracoes_minimas))

        while lista_localidades[rand_loc] in dicio_localidades_numProcesso[numProc]:
            rand_loc = int(random.uniform(0,len(lista_localidades)))

        dicio_localidades_numProcesso[numProc] += [lista_localidades[rand_loc]]

        if rand_loc==0:
            count_Oliveira += 1
            lista_numProcessos_reforco_Acciona_Audita += [numProc]

        if int(random.uniform(0,200))%3 == 0:
            f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values('" + 
            str(int(random.uniform(910000000, 930000000))) + "', '" + str(datetime.datetime(ano, mes, dia, hora, minutos))  + "', '" +
            lista_nomes[rand_nomes] + "', '" + lista_localidades[rand_loc] + "', NULL);\n")
        else:
            f.write("insert into EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro) values('" + 
            str(int(random.uniform(910000000, 930000000))) + "', '" + str(datetime.datetime(ano, mes, dia, hora, minutos))  + "', '" +
            lista_nomes[rand_nomes] + "', '" + lista_localidades[rand_loc] + "', " + str(numProc+1) + ");\n")
    
    print("Oliveira do Hospital - EventoEmergencia: " + str(count_Oliveira))

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
        hora = int(random.uniform(key.hour+1, 24))
        minutos = int(random.uniform(0, 60))
        Fim = datetime.datetime(ano, mes, dia, hora, minutos)

        while Fim <= key:
            hora = int(random.uniform(key.hour+1, 24))
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

        total = int(random.uniform(0,2))
        limite = int(random.uniform(1,iteracoes_segmentovideo))

        for i in range( limite ):
            time_to_insert = int(random.uniform(0,interval+1))
            interval -= time_to_insert
            if i == limite-1:
                interval += time_to_insert
                f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(interval//3600) + ":" + str((interval%3600)//60) + ":" + str((interval%3600)%60) + "', '" + str(key) + "', " + str(camara) + ");\n")
                k += 1
            else:
                if interval < 0:
                    interval = 0
                    f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(interval//3600) + ":" + str((interval%3600)//60) + ":" + str((interval%3600)%60) + "', '" + str(key) + "', " + str(camara) + ");\n")
                    k += 1
                elif interval != 0:
                    f.write("insert into SegmentoVideo(numSegmento, duracao, dataHoraInicio, numCamara) values(" + str(k) + ", '" + str(time_to_insert//3600) + ":" + str((time_to_insert%3600)//60) + ":" + str((time_to_insert%3600)%60) + "', '" + str(key) + "', " + str(camara) + ");\n")
                    k += 1
    
    #print("SegmentosVideos duração superior a 60 segundos - Monchique: " + str(index_camara))

def Transporta():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Transporta - Values\n")
    f.write("----------------------------------------\n")

    for key in dicionario_meioSocorro:
        nomeEntidade = dicionario_meioSocorro[key][int(random.uniform(0,len(dicionario_meioSocorro[key])))]
        f.write("insert into Transporta(numMeio, nomeEntidade, numVitimas, numProcessoSocorro) values(" + str(key) + ", '" + str(nomeEntidade) + "', " + str(int(random.uniform(1,201))) + ", " + str(int(random.uniform(1,iteracoes_minimas+1))) + ");\n")

def Alocado():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Alocado - Values\n")
    f.write("----------------------------------------\n")

    for key in dicionario_meioApoio:
        nomeEntidade = dicionario_meioApoio[key][int(random.uniform(0,len(dicionario_meioApoio[key])))]
        horas = int(random.uniform(0,101))
        #horas = int(random.uniform(0,24))
        #minutos = int(random.uniform(0,60))
        f.write("insert into Alocado(numMeio, nomeEntidade, numHoras, numProcessoSocorro) values(" + str(key) + ", '" + str(nomeEntidade) + "', '" + str(horas) + "', " + str(int(random.uniform(1,iteracoes_minimas+1))) + ");\n")


def Transporta_acciona():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Transporta - Values\n")
    f.write("----------------------------------------\n")

    dicio_usado = {}
    dicio_usado_Proc = {}
    lista = list(dicionario_meioSocorro.keys())
    print(len(lista))
    for e in lista:
        dicio_usado[e] = []

    for i in range(iteracoes_transporta_alocado):
        key = lista[int(random.uniform(0,len(lista)))]

        nomeEntidade = dicionario_meioSocorro[key][int(random.uniform(0,len(dicionario_meioSocorro[key])))]

        index_numProcesso = dicionario_Acciona_numMeio_nomeEntidade[key].index(nomeEntidade)

        while nomeEntidade in dicio_usado[key]:
            key = lista[int(random.uniform(0,len(lista)))]

            nomeEntidade = dicionario_meioSocorro[key][int(random.uniform(0,len(dicionario_meioSocorro[key])))]

            index_numProcesso = dicionario_Acciona_numMeio_nomeEntidade[key].index(nomeEntidade)

        dicio_usado[key] += [nomeEntidade]
        
        numProcessoSocorro = dicionario_Acciona_numMeio_numProcessoSocorro[key][index_numProcesso]

        f.write("insert into Transporta(numMeio, nomeEntidade, numVitimas, numProcessoSocorro) values(" + str(key) + ", '" + str(nomeEntidade) + "', " + str(int(random.uniform(1,201))) + ", " + str(numProcessoSocorro) + ");\n")


def Alocado_acciona():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Alocado - Values\n")
    f.write("----------------------------------------\n")
    
    dicio_usado = {}
    dicio_usado_Proc = {}
    lista = list(dicionario_meioApoio.keys())
    print(len(lista))
    for e in lista:
        dicio_usado[e] = []

    for i in range(iteracoes_transporta_alocado):
        key = lista[int(random.uniform(0,len(lista)))]

        nomeEntidade = dicionario_meioApoio[key][int(random.uniform(0,len(dicionario_meioApoio[key])))]

        index_numProcesso = dicionario_Acciona_numMeio_nomeEntidade[key].index(nomeEntidade)

        while nomeEntidade in dicio_usado[key]:
            key = lista[int(random.uniform(0,len(lista)))]

            nomeEntidade = dicionario_meioApoio[key][int(random.uniform(0,len(dicionario_meioApoio[key])))]

            index_numProcesso = dicionario_Acciona_numMeio_nomeEntidade[key].index(nomeEntidade)

        dicio_usado[key] += [nomeEntidade]
        
        numProcessoSocorro = dicionario_Acciona_numMeio_numProcessoSocorro[key][index_numProcesso]

        horas = int(random.uniform(0,101))
        #horas = int(random.uniform(0,24))
        #minutos = int(random.uniform(0,60))
        f.write("insert into Alocado(numMeio, nomeEntidade, numHoras, numProcessoSocorro) values(" + str(key) + ", '" + str(nomeEntidade) + "', '" + str(horas) + "', " + str(numProcessoSocorro) + ");\n")


def Acciona(dici):
    f.write("\n\n----------------------------------------\n")
    f.write("-- Acciona - Values\n")
    f.write("----------------------------------------\n")
    dici_usado = {}
    lista_conta_meio = []
    index_reforco = len(lista_numProcessos_reforco_Acciona_Audita)-1
    count_Oliveira = 0
    for i in range(iteracoes_minimas):
        dici_usado[i+1] = []
        lista_conta_meio += [0]

    for i in range(iteracoes_acciona):
        numMeio = int(random.uniform(1,iteracoes_minimas+1))
        while lista_conta_meio[numMeio-1] == (iteracoes_meio//iteracoes_minimas) or len(dici_usado[numMeio]) == (iteracoes_meio//iteracoes_minimas):
            numMeio = int(random.uniform(1,iteracoes_minimas+1))
        
        nomeEntidade = dici[numMeio][int(random.uniform(0,len(dici[numMeio])))]
        
        while nomeEntidade in dici_usado[numMeio]:
            nomeEntidade = dici[numMeio][int(random.uniform(0,len(dici[numMeio])))]
        
        dici_usado[numMeio] += [nomeEntidade]

        if int(random.uniform(1,1001))%20 == 0 and index_reforco != 0:
            numProcessoSocorro = lista_numProcessos_reforco_Acciona_Audita[index_reforco]+1
            index_reforco -= 1
            count_Oliveira += 1
        else:
            numProcessoSocorro = int(random.uniform(1,iteracoes_minimas+1))

        f.write("insert into Acciona(numMeio, nomeEntidade, numProcessoSocorro) values(" + str(numMeio) + ", '" + str(nomeEntidade) + "', " + str(numProcessoSocorro) + ");\n")

        if numMeio in dicionario_Acciona_numMeio_nomeEntidade.keys():
            dicionario_Acciona_numMeio_nomeEntidade[numMeio] += [nomeEntidade]
            dicionario_Acciona_numMeio_numProcessoSocorro[numMeio] += [numProcessoSocorro]
        else:
            dicionario_Acciona_numMeio_nomeEntidade[numMeio] = [nomeEntidade]
            dicionario_Acciona_numMeio_numProcessoSocorro[numMeio] = [numProcessoSocorro]
        
        lista_conta_meio[numMeio-1]+=1
    
    print("Oliveira do Hospital - Acciona: " + str(count_Oliveira))

def Acciona_Transporta_Acciona(dici):
    global dicionario_meioApoio, dicionario_meioSocorro
    f.write("\n\n----------------------------------------\n")
    f.write("-- Acciona - Values\n")
    f.write("----------------------------------------\n")
    dici_usado = {}
    lista_conta_meio = []
    index_reforco = len(lista_numProcessos_reforco_Acciona_Audita)-1
    count_Oliveira = 0

    lista_meioApoio = list(dicionario_meioApoio.keys())
    lista_meioSocorro = list(dicionario_meioSocorro.keys())

    index_meioApoio = 0
    index_meioSocorro = 0

    new_dicio_meioApoio = {}
    new_dicio_meioSocorro = {}

    for i in range(iteracoes_minimas):
        dici_usado[i+1] = []
        lista_conta_meio += [0]

    for i in range(iteracoes_acciona):
        numMeio = int(random.uniform(1,iteracoes_minimas+1))
        while lista_conta_meio[numMeio-1] == (iteracoes_meio//iteracoes_minimas) or len(dici_usado[numMeio]) == (iteracoes_meio//iteracoes_minimas):
            numMeio = int(random.uniform(1,iteracoes_minimas+1))
        
        nomeEntidade = dici[numMeio][int(random.uniform(0,len(dici[numMeio])))]
        
        while nomeEntidade in dici_usado[numMeio]:
            nomeEntidade = dici[numMeio][int(random.uniform(0,len(dici[numMeio])))]
        
        dici_usado[numMeio] += [nomeEntidade]

        if int(random.uniform(1,1001))%20 == 0 and index_reforco != 0:
            numProcessoSocorro = lista_numProcessos_reforco_Acciona_Audita[index_reforco]+1
            index_reforco -= 1
            count_Oliveira += 1
        else:
            numProcessoSocorro = int(random.uniform(1,iteracoes_minimas+1))

        if numMeio in dicionario_meioCombate.keys() and nomeEntidade in dicionario_meioCombate[numMeio] and int(random.uniform(1,1001))%20 == 0:
            for i in range(iteracoes_minimas):
                numProcessoSocorro = i+1
                f.write("insert into Acciona(numMeio, nomeEntidade, numProcessoSocorro) values(" + str(numMeio) + ", '" + str(nomeEntidade) + "', " + str(numProcessoSocorro) + ");\n")

                if numMeio in dicionario_Acciona_numMeio_nomeEntidade.keys():
                    if nomeEntidade not in dicionario_Acciona_numMeio_nomeEntidade[numMeio]:
                        dicionario_Acciona_numMeio_nomeEntidade[numMeio] += [nomeEntidade]
                        dicionario_Acciona_numMeio_numProcessoSocorro[numMeio] += [numProcessoSocorro]
                else:
                    dicionario_Acciona_numMeio_nomeEntidade[numMeio] = [nomeEntidade]
                    dicionario_Acciona_numMeio_numProcessoSocorro[numMeio] = [numProcessoSocorro]
        else:
            f.write("insert into Acciona(numMeio, nomeEntidade, numProcessoSocorro) values(" + str(numMeio) + ", '" + str(nomeEntidade) + "', " + str(numProcessoSocorro) + ");\n")

            if numMeio in dicionario_Acciona_numMeio_nomeEntidade.keys():
                dicionario_Acciona_numMeio_nomeEntidade[numMeio] += [nomeEntidade]
                dicionario_Acciona_numMeio_numProcessoSocorro[numMeio] += [numProcessoSocorro]
            else:
                dicionario_Acciona_numMeio_nomeEntidade[numMeio] = [nomeEntidade]
                dicionario_Acciona_numMeio_numProcessoSocorro[numMeio] = [numProcessoSocorro]
        
        if numMeio in lista_meioApoio and nomeEntidade in dicionario_meioApoio[numMeio]:
            if numMeio in new_dicio_meioApoio.keys():
                new_dicio_meioApoio[numMeio] += [nomeEntidade]
            else:
                new_dicio_meioApoio[numMeio] = [nomeEntidade]
            
            index_meioApoio += 1

        if numMeio in lista_meioSocorro and nomeEntidade in dicionario_meioSocorro[numMeio]:
            if numMeio in new_dicio_meioSocorro.keys():
                new_dicio_meioSocorro[numMeio] += [nomeEntidade]
            else:
                new_dicio_meioSocorro[numMeio] = [nomeEntidade]
            index_meioSocorro += 1
        
        lista_conta_meio[numMeio-1]+=1
    
    dicionario_meioApoio = new_dicio_meioApoio
    dicionario_meioSocorro = new_dicio_meioSocorro
    
    print("Oliveira do Hospital - Acciona: " + str(count_Oliveira))
    print(index_meioApoio)
    print(index_meioSocorro)

def Audita():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Audita - Values\n")
    f.write("----------------------------------------\n")

    dici_usado = {}
    dici_usado_Processo = {}
    lista_conta_meio = []
    temp = []

    indexs_texto = []

    for i in range(iteracoes_minimas):
        dici_usado[i+1] = []
        dici_usado_Processo[i+1] = []
        lista_conta_meio += [0]

    lista_acciona_meios = list(dicionario_Acciona_numMeio_nomeEntidade.keys())

    for i in range(iteracoes_audita):
        numMeio = lista_acciona_meios[int(random.uniform(0,len(lista_acciona_meios)))]

        while lista_conta_meio[numMeio-1] == len(dicionario_Acciona_numMeio_nomeEntidade[numMeio]) or len(dicionario_Acciona_numMeio_nomeEntidade[numMeio]) == len(dici_usado[numMeio]):
            numMeio = lista_acciona_meios[int(random.uniform(0,len(lista_acciona_meios)))]
        
        index = int(random.uniform(0,len(dicionario_Acciona_numMeio_nomeEntidade[numMeio])))
        
        nomeEntidade = dicionario_Acciona_numMeio_nomeEntidade[numMeio][index]
        
        while nomeEntidade in dici_usado[numMeio]:
            index = int(random.uniform(0,len(dicionario_Acciona_numMeio_nomeEntidade[numMeio])))
            nomeEntidade = dicionario_Acciona_numMeio_nomeEntidade[numMeio][index]
        
        dici_usado[numMeio] += [nomeEntidade]

        processoSocorro = dicionario_Acciona_numMeio_numProcessoSocorro[numMeio][index]

        ano = int(random.uniform(2017, 2019))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))

        Inicio = datetime.datetime(ano, mes, dia, hora, minutos)

        while Inicio in temp:
            ano = int(random.uniform(2017, 2019))
            mes = int(random.uniform(1, 13))
            dia = int(random.uniform(1, 28))
            hora = int(random.uniform(0, 24))
            minutos = int(random.uniform(0, 60))

            Inicio = datetime.datetime(ano, mes, dia, hora, minutos)

        temp += [Inicio]

        ano = int(random.uniform(2017, 2019))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))
        Fim = datetime.datetime(ano, mes, dia, hora, minutos)

        while Fim <= Inicio:
            ano = int(random.uniform(2017, 2019))
            mes = int(random.uniform(1, 13))
            dia = int(random.uniform(1, 28))
            hora = int(random.uniform(0, 24))
            minutos = int(random.uniform(0, 60))
            Fim = datetime.datetime(ano, mes, dia, hora, minutos)
        
        ano = int(random.uniform(2018, 2020))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))
        dataAuditoria = datetime.datetime(ano, mes, dia, hora, minutos)

        while dataAuditoria <= datetime.datetime.now():
            ano = int(random.uniform(2018, 2020))
            mes = int(random.uniform(1, 13))
            dia = int(random.uniform(1, 28))
            hora = int(random.uniform(0, 24))
            minutos = int(random.uniform(0, 60))
            dataAuditoria = datetime.datetime(ano, mes, dia, hora, minutos)

        index_texto = int(random.uniform(0,len(lista_textos)))

        while index_texto in indexs_texto:
            index_texto = int(random.uniform(0,len(lista_textos)))
        
        indexs_texto += [index_texto]

        f.write("insert into Audita(idCoordenador, numMeio, nomeEntidade, numProcessoSocorro, dataHoraInicio, dataHoraFim, dataAuditoria, texto) values(" + 
        str(int(random.uniform(1,iteracoes_minimas+1))) + "," + str(numMeio) + ", '" + str(nomeEntidade) + "', " +
        str(processoSocorro) + ", '" + str(Inicio) + "', '" + str(Fim) + "', '" +
        str(dataAuditoria) + "', '" + lista_textos[index_texto] + "');\n" )
        
        lista_conta_meio[numMeio-1]+=1


def Solicita():
    f.write("\n\n----------------------------------------\n")
    f.write("-- Solicita - Values\n")
    f.write("----------------------------------------\n")

    lista_video = list(dicionario_video_Inicio_camara.keys())

    lista_temp = []
    inicio_temp = []

    for i in range(iteracoes_solicita):
        dataInicio = lista_video[int(random.uniform(0,len(lista_video)))]

        while dataInicio in lista_temp:
            dataInicio = lista_video[int(random.uniform(0,len(lista_video)))]
        
        key = dataInicio
        lista_temp += [key]

        ano = int(random.uniform(key.year, 2020))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))

        Inicio = datetime.datetime(ano, mes, dia, hora, minutos)

        while Inicio in inicio_temp:
            ano = int(random.uniform(key.year, 2020))
            mes = int(random.uniform(1, 13))
            dia = int(random.uniform(1, 28))
            hora = int(random.uniform(0, 24))
            minutos = int(random.uniform(0, 60))

            Inicio = datetime.datetime(ano, mes, dia, hora, minutos)

        inicio_temp += [Inicio]

        ano = int(random.uniform(key.year, 2020))
        mes = int(random.uniform(1, 13))
        dia = int(random.uniform(1, 28))
        hora = int(random.uniform(0, 24))
        minutos = int(random.uniform(0, 60))
        Fim = datetime.datetime(ano, mes, dia, hora, minutos)

        while Fim <= Inicio:
            ano = int(random.uniform(key.year, 2020))
            mes = int(random.uniform(1, 13))
            dia = int(random.uniform(1, 28))
            hora = int(random.uniform(0, 24))
            minutos = int(random.uniform(0, 60))
            Fim = datetime.datetime(ano, mes, dia, hora, minutos)

        f.write("insert into Solicita(idCoordenador, dataHoraInicioVideo, numCamara, dataHoraInicio, dataHoraFim) values(" +
        str(int(random.uniform(1,iteracoes_minimas+1))) + ", '" + str(key) + "', " + 
        str(dicionario_video_Inicio_camara[key]) + ", '" + str(Inicio) + "', '" + str(Fim) + "');\n")


Camara()
Coordenador()
EntidadeMeio()
Local()
ProcessoSocorro()
dicio = Meio()
Meio_Seleciona("MeioApoio",dicio)
Meio_Seleciona("MeioCombate",dicio)
Meio_Seleciona("MeioSocorro",dicio)
Vigia()
EventoEmergencia()
Video()
SegmentoVideo()
#Transporta()
#Alocado()
#Acciona(dicio)
Acciona_Transporta_Acciona(dicio)
Transporta_acciona()
Alocado_acciona()
Audita()
Solicita()

f.close()

exit()
