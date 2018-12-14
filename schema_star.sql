drop table facto;
drop table d_tempo;
drop table d_meio;
drop table d_evento;

create table d_evento(
    idEvento serial not null,
    numTelefone varchar(15) not null,
    instanteChamada timestamp not null
);

create table d_meio(
    idMeio serial not null,
    numMeio integer not null,
    nomeMeio varchar(200) not null,
    nomeEntidade varchar(200) not null,
    tipo varchar(20) not null
);

create table d_tempo(
    idTempo serial not null,
    dia integer not null,
    mes integer not null,
    ano integer not null
);

create table facto(
    idEvento integer not null,
    idMeio integer not null,
    idTempo integer not null
);
