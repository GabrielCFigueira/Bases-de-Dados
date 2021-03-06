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
    dataHoraFim timestamp not null,
    numCamara integer not null,
    constraint pk_Video primary key(dataHoraInicio, numCamara),
    constraint fk_Video_Camara foreign key(numCamara) references Camara(numCamara)
);

create table SegmentoVideo(
    numSegmento integer not null /*unique*/,
    duracao interval not null,
    dataHoraInicio timestamp not null,
    numCamara integer not null,
    constraint pk_SegmentoVideo primary key(numSegmento, dataHoraInicio, numCamara),
    constraint fk_SegmentoVideo_Video foreign key(dataHoraInicio, numCamara) references Video(dataHoraInicio, numCamara)
);

create table Local(
    moradaLocal varchar(255) not null /*unique*/,
    constraint pk_Local primary key(moradaLocal)
);

create table Vigia(
    moradaLocal varchar(255) not null,
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
    numTelefone varchar(15) not null,
    instanteChamada timestamp not null,
    nomePessoa varchar(80) not null,
    moradaLocal varchar(255) not null,
    numProcessoSocorro integer,
    constraint pk_EventoEmergencia primary key(numTelefone, instanteChamada),
    constraint fk_EventoEmergencia_Local foreign key(moradaLocal) references Local(moradaLocal),
    constraint fk_EventoEmergencia_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro) DEFERRABLE,
    unique(numTelefone, nomePessoa)
);

create table EntidadeMeio(
    nomeEntidade varchar(200) not null,
    constraint pk_EntidadeMeio primary key(nomeEntidade)
);

create table Meio(
    numMeio integer not null,
    nomeMeio varchar(200) not null,
    nomeEntidade varchar(200) not null,
    constraint pk_Meio primary key(numMeio, nomeEntidade),
    constraint fk_Meio_EntidadeMeio foreign key(nomeEntidade) references EntidadeMeio(nomeEntidade)
);

create table MeioCombate(
    numMeio integer not null,
    nomeEntidade varchar(200) not null,
    constraint pk_MeioCombate primary key(numMeio, nomeEntidade),
    constraint fk_MeioCombate_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade)
);

create table MeioApoio(
    numMeio integer not null,
    nomeEntidade varchar(200) not null,
    constraint pk_MeioApoio primary key(numMeio, nomeEntidade),
    constraint fk_MeioApoio_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade)
);

create table MeioSocorro(
    numMeio integer not null,
    nomeEntidade varchar(200) not null,
    constraint pk_MeioSocorro primary key(numMeio, nomeEntidade),
    constraint fk_MeioSocorro_Meio foreign key(numMeio, nomeEntidade) references Meio(numMeio, nomeEntidade)
);

create table Transporta(
    numMeio integer not null,
    nomeEntidade varchar(200) not null,
    numVitimas integer not null,
    numProcessoSocorro integer not null,
    constraint pk_Transporta primary key(numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Transporta_MeioSocorro foreign key(numMeio, nomeEntidade) references MeioSocorro(numMeio, nomeEntidade),
    constraint fk_Transporta_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro)
);

create table Alocado(
    numMeio integer not null,
    nomeEntidade varchar(200) not null,
    numHoras integer not null,
    numProcessoSocorro integer not null,
    constraint pk_Alocado primary key(numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Alocado_MeioApoio foreign key(numMeio, nomeEntidade) references MeioApoio(numMeio, nomeEntidade),
    constraint fk_Alocado_ProcessoSocorro foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro)
);

create table Acciona(
    numMeio integer not null,
    nomeEntidade varchar(200) not null,
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
    nomeEntidade varchar(200) not null,
    numProcessoSocorro integer not null,
    dataHoraInicio timestamp not null,
    dataHoraFim timestamp not null,
    dataAuditoria date not null,
    texto text not null,
    constraint pk_Audita primary key(idCoordenador ,numMeio, nomeEntidade, numProcessoSocorro),
    constraint fk_Audita_Coordenador foreign key(idCoordenador) references Coordenador(idCoordenador),
    constraint fk_Audita_Acciona foreign key(numMeio, nomeEntidade, numProcessoSocorro) references Acciona(numMeio, nomeEntidade, numProcessoSocorro),
    check (dataHoraInicio < dataHoraFim),
    check (dataAuditoria <= now())
);

create table Solicita(
    idCoordenador integer not null,
    dataHoraInicioVideo timestamp not null,
    numCamara integer not null,
    dataHoraInicio timestamp not null,
    dataHoraFim timestamp not null,
    constraint pk_Solicita primary key(idCoordenador, dataHoraInicioVideo, numCamara),
    constraint fk_Solicita_Coordenador foreign key(idCoordenador) references Coordenador(idCoordenador),
    constraint fk_Solicita_Video foreign key(dataHoraInicioVideo, numCamara) references Video(dataHoraInicio, numCamara)
);

CREATE OR REPLACE FUNCTION chk_proc_existance()
RETURNS TRIGGER AS $BODY$
DECLARE n_count INTEGER;
BEGIN
SELECT count(1) INTO n_count FROM(SELECT numProcessoSocorro FROM EventoEmergencia as e where e.numProcessoSocorro=NEW.numProcessoSocorro) as t;
IF n_count = 0 THEN RAISE EXCEPTION 'nonexistent process %', n_count
USING HINT = 'O processo de socorro tem de estar associado a um Evento de Emergencia';
END IF;
RETURN NEW;
END;
$BODY$ LANGUAGE plpgsql;
CREATE TRIGGER chk_proc BEFORE INSERT ON ProcessoSocorro FOR EACH ROW EXECUTE PROCEDURE chk_proc_existance();


CREATE OR REPLACE FUNCTION chk_proc_delete()
RETURNS TRIGGER AS $BODY$
DECLARE n_count INTEGER;
BEGIN
SELECT count(1) INTO n_count FROM(SELECT numProcessoSocorro FROM EventoEmergencia as e where e.numProcessoSocorro=OLD.numProcessoSocorro) as t;
IF n_count = 0 THEN RAISE EXCEPTION 'nonexistent event %', n_count
USING HINT = 'Existem processos nao asssociados a eventos de emrgencia. irao ser eliminados';
DELETE FROM ProcessoSocorro WHERE numProcessoSocorro=OLD.numProcessoSocorro;
END IF;
RETURN OLD;
END;
$BODY$ LANGUAGE plpgsql;
CREATE TRIGGER chk_proc_d AFTER UPDATE,DELETE ON EventoEmergencia FOR EACH ROW EXECUTE PROCEDURE chk_proc_delete();