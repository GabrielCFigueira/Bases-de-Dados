drop table if exists facto;
drop table if exists d_tempo;
drop table if exists d_meio;
drop table if exists d_evento;

create table d_evento(
    idEvento serial not null,
    numTelefone varchar(15) not null,
    instanteChamada timestamp not null,
    constraint pk_d_evento primary key(idEvento)
);

create table d_meio(
    idMeio serial not null,
    numMeio integer not null,
    nomeMeio varchar(200) not null,
    nomeEntidade varchar(200) not null,
    tipo varchar(20) not null,
    constraint pk_d_meio primary key(idMeio)
);

create table d_tempo(
    idTempo serial not null,
    dia integer not null,
    mes integer not null,
    ano integer not null,
    constraint pk_d_tempo primary key(idTempo)
);

create table facto(
    idEvento integer not null,
    idMeio integer not null,
    idTempo integer not null,
    constraint pk_facto primary key(idEvento, idMeio, idTempo),
    constraint fk_facto_d_evento foreign key(idEvento) references d_evento(idEvento),
    constraint fk_facto_d_meio foreign key(idMeio) references d_meio(idMeio),
    constraint fk_facto_d_tempo foreign key(idTempo) references d_tempo(idTempo)
);
