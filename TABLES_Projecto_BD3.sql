drop table Solicita cascade;
drop table Audita cascade;
drop table Coordenador cascade;
drop table Acciona cascade;
drop table Alocado cascade;
drop table Transporta cascade;
drop table MeioSocorro cascade;
drop table MeioApoio cascade;
drop table MeioCombate cascade;
drop table Meio cascade;
drop table EntidadeMeio cascade;
drop table EventoEmergencia cascade;
drop table ProcessoSocorro cascade;
drop table Vigia cascade;
drop table Local cascade;
drop table SegmentoVideo cascade;
drop table Video cascade;
drop table Camara cascade;

create table Camara(
    numCamara integer not null /*unique*/,
    constraint pk_Camara primary key(numCamara)
);

create table Video(
    dataHoraInicio timestamp not null /*unique*/,
    dataHoraFim timestamp,
    numCamara integer,
    constraint pk_Video primary key(dataHoraInicio, numCamara),
    constraint fk_Video_Camara foreign key(numCamara) references Camara(numCamara)
);

create table SegmentoVideo(
    numSegmento integer not null /*unique*/,
    duracao interval,
    dataHoraInicio timestamp not null,
    numCamara integer not null,
    constraint pk_SegmentoVideo primary key(numSegmento, dataHoraInicio, numCamara),
    constraint fk_SegmentoVide_Video foreign key(dataHoraInicio, numCamara) references Video(dataHoraInicio, numCamara)
);

create table Local(
    moradaLocal varchar(50) not null /*unique*/,
    constraint pk_Local primary key(moradaLocal)
);

create table Vigia(
    moradaLocal varchar(50) not null,
    numCamara integer not null,
    constraint pk_Vigia primary key(moradaLocal, numCamara),
    constraint fk_Vigia_Local foreign key(moradaLocal) references Local(moradaLocal),
    constraint fk_Vigia_Camara foreign key(numCamara) references Camara(numCamara)
);

create table ProcessoSocorro(
    numProcessoSocorro integer not null,
    constraint pk_ProcessoSocorro primary key(numProcessoSocorro)
);

create table EventoEmergencia(
    numTelefone integer not null,
    instanteChamada timestamp not null,
    nomePessoa varchar(50),
    moradaLocal varchar(50) not null,
    numProcessoSocorro integer,
    constraint pk_EventoEmergencia primary key(numTelefone, instanteChamada),
    constraint fk_EventoEmergencia_Local foreign key(moradaLocal) references Local(moradaLocal),
    constraint fk_EventoEmergencia_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro),
    unique(numTelefone, nomePessoa)
);

create table EntidadeMeio(
    nomeEntidade varchar(50) not null,
    constraint pk_EntidadeMeio primary key(nomeEntidade)
);

create table Meio(
    numMeio integer not null,
    nomeMeio varchar(50),
    nomeEntidade varchar(50) not null,
    constraint pk_Meio primary key(numMeio, nomeEntidade),
    constraint fk_Meio_EntidadeMeio foreign key(nomeEntidade) references EntidadeMeio(nomeEntidade)
);

create table MeioCombate(
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    constraint pk_MeioCombate primary key(numMeio, nomeEntidade),
    constraint fk_MeioCombate_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade)
);

create table MeioApoio(
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    constraint pk_MeioApoio primary key(numMeio, nomeEntidade),
    constraint fk_MeioApoio_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade)
);

create table MeioSocorro(
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    constraint pk_MeioSocorro primary key(numMeio, nomeEntidade),
    constraint fk_MeioSocorro_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade)
);

create table Transporta(
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    numVitimas integer,
    numProcessoSocorro integer not null,
    constraint pk_Transporta primary key(numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Transporta_MeioSocorro foreign key(numMeio, nomeEntidade) references MeioSocorro(numMeio, nomeEntidade),
    constraint fk_Transporta_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro)
);

create table Alocado(
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    numHoras interval,
    numProcessoSocorro integer not null,
    constraint pk_Alocado primary key(numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Alocado_MeioApoio foreign key(numMeio, nomeEntidade) references MeioApoio(numMeio, nomeEntidade),
    constraint fk_Alocado_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro)
);

create table Acciona(
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    numProcessoSocorro integer not null,
    constraint pk_Acciona primary key(numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Acciona_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade),
    constraint fk_Acciona_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro)
);

create table Coordenador(
    idCoordenador integer not null,
    constraint pk_Coordenador primary key(idCoordenador)
);

create table Audita(
    idCoordenador integer not null,
    numMeio integer not null,
    nomeEntidade varchar(50) not null,
    numProcessoSocorro integer not null,
    dataHoraInicio timestamp,
    dataHoraFim timestamp,
    dataAuditoria date,
    texto text,
    constraint pk_Audita primary key(idCoordenador ,numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Audita_Coordenador foreign key(idCoordenador) references Coordenador(idCoordenador),
    constraint fk_Audita_Acciona foreign key(numMeio, nomeEntidade, numProcessoSocorro) references Acciona(numMeio, nomeEntidade, numProcessoSocorro)
);

create table Solicita(
    idCoordenador integer not null,
    dataHoraInicioVideo timestamp not null,
    numCamara integer not null,
    dataHoraInicio timestamp,
    dataHoraFim timestamp,
    constraint pk_Solicita primary key(idCoordenador, dataHoraInicioVideo, numCamara),
    constraint fk_Solicita_Coordenador foreign key(idCoordenador) references Coordenador(idCoordenador),
    constraint fk_Solicita_Video foreign key(dataHoraInicioVideo, numCamara) references Video(dataHoraInicio, numCamara)
);
