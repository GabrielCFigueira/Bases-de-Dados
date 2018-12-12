create table d_evento(
    idEvento serial not null,
    numTelefone varchar(15) not null,
    instanteChamada timestamp not null
);

insert into d_evento(numTelefone, instanteChamada) (
select numTelefone, instanteChamada
from eventoemergencia
group by numTelefone, instanteChamada
);

create table d_meio(
    idMeio serial not null,
    numMeio integer not null,
    nomeMeio varchar(200) not null,
    nomeEntidade varchar(200) not null,
    tipo varchar(20) not null
);

insert into d_meio(numMeio, nomeMeio, nomeEntidade, tipo) (
select numMeio, nomeMeio, nomeEntidade, 'MeioApoio' as tipo from meio natural join meioapoio
UNION
select numMeio, nomeMeio, nomeEntidade, 'MeioSocorro' as tipo from meio natural join meiosocorro
UNION
select numMeio, nomeMeio, nomeEntidade, 'MeioCombate' as tipo from meio natural join meiocombate);

create table d_tempo(
dia integer not null,
mes integer not null,
ano integer not null
);

insert into d_tempo values(1,1,2017),(2,1,2017),(3,1,2017),(4,1,2017),(5,1,2017),(6,1,2017),(7,1,2017),(8,1,2017),(9,1,2017),(10,1,2017),(11,1,2017),(12,1,2017),(13,1,2017),(14,1,2017),(15,1,2017),(16,1,2017),(17,1,2017),(18,1,2017),(19,1,2017),(20,1,2017),(21,1,2017),(22,1,2017),(23,1,2017),(24,1,2017),(25,1,2017),(26,1,2017),(27,1,2017),(28,1,2017),(29,1,2017),(30,1,2017),(31,1,2017),(1,2,2017),(2,2,2017),(3,2,2017),(4,2,2017),(5,2,2017),(6,2,2017),(7,2,2017),(8,2,2017),(9,2,2017),(10,2,2017),(11,2,2017),(12,2,2017),(13,2,2017),(14,2,2017),(15,2,2017),(16,2,2017),(17,2,2017),(18,2,2017),(19,2,2017),(20,2,2017),(21,2,2017),(22,2,2017),(23,2,2017),(24,2,2017),(25,2,2017),(26,2,2017),(27,2,2017),(28,2,2017),(1,3,2017),(2,3,2017),(3,3,2017),(4,3,2017),(5,3,2017),(6,3,2017),(7,3,2017),(8,3,2017),(9,3,2017),(10,3,2017),(11,3,2017),(12,3,2017),(13,3,2017),(14,3,2017),(15,3,2017),(16,3,2017),(17,3,2017),(18,3,2017),(19,3,2017),(20,3,2017),(21,3,2017),(22,3,2017),(23,3,2017),(24,3,2017),(25,3,2017),(26,3,2017),(27,3,2017),(28,3,2017),(29,3,2017),(30,3,2017),(31,3,2017),(1,4,2017),(2,4,2017),(3,4,2017),(4,4,2017),(5,4,2017),(6,4,2017),(7,4,2017),(8,4,2017),(9,4,2017),(10,4,2017),(11,4,2017),(12,4,2017),(13,4,2017),(14,4,2017),(15,4,2017),(16,4,2017),(17,4,2017),(18,4,2017),(19,4,2017),(20,4,2017),(21,4,2017),(22,4,2017),(23,4,2017),(24,4,2017),(25,4,2017),(26,4,2017),(27,4,2017),(28,4,2017),(29,4,2017),(30,4,2017),(1,5,2017),(2,5,2017),(3,5,2017),(4,5,2017),(5,5,2017),(6,5,2017),(7,5,2017),(8,5,2017),(9,5,2017),(10,5,2017),(11,5,2017),(12,5,2017),(13,5,2017),(14,5,2017),(15,5,2017),(16,5,2017),(17,5,2017),(18,5,2017),(19,5,2017),(20,5,2017),(21,5,2017),(22,5,2017),(23,5,2017),(24,5,2017),(25,5,2017),(26,5,2017),(27,5,2017),(28,5,2017),(29,5,2017),(30,5,2017),(31,5,2017),(1,6,2017),(2,6,2017),(3,6,2017),(4,6,2017),(5,6,2017),(6,6,2017),(7,6,2017),(8,6,2017),(9,6,2017),(10,6,2017),(11,6,2017),(12,6,2017),(13,6,2017),(14,6,2017),(15,6,2017),(16,6,2017),(17,6,2017),(18,6,2017),(19,6,2017),(20,6,2017),(21,6,2017),(22,6,2017),(23,6,2017),(24,6,2017),(25,6,2017),(26,6,2017),(27,6,2017),(28,6,2017),(29,6,2017),(30,6,2017),(1,7,2017),(2,7,2017),(3,7,2017),(4,7,2017),(5,7,2017),(6,7,2017),(7,7,2017),(8,7,2017),(9,7,2017),(10,7,2017),(11,7,2017),(12,7,2017),(13,7,2017),(14,7,2017),(15,7,2017),(16,7,2017),(17,7,2017),(18,7,2017),(19,7,2017),(20,7,2017),(21,7,2017),(22,7,2017),(23,7,2017),(24,7,2017),(25,7,2017),(26,7,2017),(27,7,2017),(28,7,2017),(29,7,2017),(30,7,2017),(31,7,2017),(1,8,2017),(2,8,2017),(3,8,2017),(4,8,2017),(5,8,2017),(6,8,2017),(7,8,2017),(8,8,2017),(9,8,2017),(10,8,2017),(11,8,2017),(12,8,2017),(13,8,2017),(14,8,2017),(15,8,2017),(16,8,2017),(17,8,2017),(18,8,2017),(19,8,2017),(20,8,2017),(21,8,2017),(22,8,2017),(23,8,2017),(24,8,2017),(25,8,2017),(26,8,2017),(27,8,2017),(28,8,2017),(29,8,2017),(30,8,2017),(31,8,2017),(1,9,2017),(2,9,2017),(3,9,2017),(4,9,2017),(5,9,2017),(6,9,2017),(7,9,2017),(8,9,2017),(9,9,2017),(10,9,2017),(11,9,2017),(12,9,2017),(13,9,2017),(14,9,2017),(15,9,2017),(16,9,2017),(17,9,2017),(18,9,2017),(19,9,2017),(20,9,2017),(21,9,2017),(22,9,2017),(23,9,2017),(24,9,2017),(25,9,2017),(26,9,2017),(27,9,2017),(28,9,2017),(29,9,2017),(30,9,2017),(1,10,2017),(2,10,2017),(3,10,2017),(4,10,2017),(5,10,2017),(6,10,2017),(7,10,2017),(8,10,2017),(9,10,2017),(10,10,2017),(11,10,2017),(12,10,2017),(13,10,2017),(14,10,2017),(15,10,2017),(16,10,2017),(17,10,2017),(18,10,2017),(19,10,2017),(20,10,2017),(21,10,2017),(22,10,2017),(23,10,2017),(24,10,2017),(25,10,2017),(26,10,2017),(27,10,2017),(28,10,2017),(29,10,2017),(30,10,2017),(31,10,2017),(1,11,2017),(2,11,2017),(3,11,2017),(4,11,2017),(5,11,2017),(6,11,2017),(7,11,2017),(8,11,2017),(9,11,2017),(10,11,2017),(11,11,2017),(12,11,2017),(13,11,2017),(14,11,2017),(15,11,2017),(16,11,2017),(17,11,2017),(18,11,2017),(19,11,2017),(20,11,2017),(21,11,2017),(22,11,2017),(23,11,2017),(24,11,2017),(25,11,2017),(26,11,2017),(27,11,2017),(28,11,2017),(29,11,2017),(30,11,2017),(1,12,2017),(2,12,2017),(3,12,2017),(4,12,2017),(5,12,2017),(6,12,2017),(7,12,2017),(8,12,2017),(9,12,2017),(10,12,2017),(11,12,2017),(12,12,2017),(13,12,2017),(14,12,2017),(15,12,2017),(16,12,2017),(17,12,2017),(18,12,2017),(19,12,2017),(20,12,2017),(21,12,2017),(22,12,2017),(23,12,2017),(24,12,2017),(25,12,2017),(26,12,2017),(27,12,2017),(28,12,2017),(29,12,2017),(30,12,2017),(31,12,2017),(1,1,2018),(2,1,2018),(3,1,2018),(4,1,2018),(5,1,2018),(6,1,2018),(7,1,2018),(8,1,2018),(9,1,2018),(10,1,2018),(11,1,2018),(12,1,2018),(13,1,2018),(14,1,2018),(15,1,2018),(16,1,2018),(17,1,2018),(18,1,2018),(19,1,2018),(20,1,2018),(21,1,2018),(22,1,2018),(23,1,2018),(24,1,2018),(25,1,2018),(26,1,2018),(27,1,2018),(28,1,2018),(29,1,2018),(30,1,2018),(31,1,2018),(1,2,2018),(2,2,2018),(3,2,2018),(4,2,2018),(5,2,2018),(6,2,2018),(7,2,2018),(8,2,2018),(9,2,2018),(10,2,2018),(11,2,2018),(12,2,2018),(13,2,2018),(14,2,2018),(15,2,2018),(16,2,2018),(17,2,2018),(18,2,2018),(19,2,2018),(20,2,2018),(21,2,2018),(22,2,2018),(23,2,2018),(24,2,2018),(25,2,2018),(26,2,2018),(27,2,2018),(28,2,2018),(1,3,2018),(2,3,2018),(3,3,2018),(4,3,2018),(5,3,2018),(6,3,2018),(7,3,2018),(8,3,2018),(9,3,2018),(10,3,2018),(11,3,2018),(12,3,2018),(13,3,2018),(14,3,2018),(15,3,2018),(16,3,2018),(17,3,2018),(18,3,2018),(19,3,2018),(20,3,2018),(21,3,2018),(22,3,2018),(23,3,2018),(24,3,2018),(25,3,2018),(26,3,2018),(27,3,2018),(28,3,2018),(29,3,2018),(30,3,2018),(31,3,2018),(1,4,2018),(2,4,2018),(3,4,2018),(4,4,2018),(5,4,2018),(6,4,2018),(7,4,2018),(8,4,2018),(9,4,2018),(10,4,2018),(11,4,2018),(12,4,2018),(13,4,2018),(14,4,2018),(15,4,2018),(16,4,2018),(17,4,2018),(18,4,2018),(19,4,2018),(20,4,2018),(21,4,2018),(22,4,2018),(23,4,2018),(24,4,2018),(25,4,2018),(26,4,2018),(27,4,2018),(28,4,2018),(29,4,2018),(30,4,2018),(1,5,2018),(2,5,2018),(3,5,2018),(4,5,2018),(5,5,2018),(6,5,2018),(7,5,2018),(8,5,2018),(9,5,2018),(10,5,2018),(11,5,2018),(12,5,2018),(13,5,2018),(14,5,2018),(15,5,2018),(16,5,2018),(17,5,2018),(18,5,2018),(19,5,2018),(20,5,2018),(21,5,2018),(22,5,2018),(23,5,2018),(24,5,2018),(25,5,2018),(26,5,2018),(27,5,2018),(28,5,2018),(29,5,2018),(30,5,2018),(31,5,2018),(1,6,2018),(2,6,2018),(3,6,2018),(4,6,2018),(5,6,2018),(6,6,2018),(7,6,2018),(8,6,2018),(9,6,2018),(10,6,2018),(11,6,2018),(12,6,2018),(13,6,2018),(14,6,2018),(15,6,2018),(16,6,2018),(17,6,2018),(18,6,2018),(19,6,2018),(20,6,2018),(21,6,2018),(22,6,2018),(23,6,2018),(24,6,2018),(25,6,2018),(26,6,2018),(27,6,2018),(28,6,2018),(29,6,2018),(30,6,2018),(1,7,2018),(2,7,2018),(3,7,2018),(4,7,2018),(5,7,2018),(6,7,2018),(7,7,2018),(8,7,2018),(9,7,2018),(10,7,2018),(11,7,2018),(12,7,2018),(13,7,2018),(14,7,2018),(15,7,2018),(16,7,2018),(17,7,2018),(18,7,2018),(19,7,2018),(20,7,2018),(21,7,2018),(22,7,2018),(23,7,2018),(24,7,2018),(25,7,2018),(26,7,2018),(27,7,2018),(28,7,2018),(29,7,2018),(30,7,2018),(31,7,2018),(1,8,2018),(2,8,2018),(3,8,2018),(4,8,2018),(5,8,2018),(6,8,2018),(7,8,2018),(8,8,2018),(9,8,2018),(10,8,2018),(11,8,2018),(12,8,2018),(13,8,2018),(14,8,2018),(15,8,2018),(16,8,2018),(17,8,2018),(18,8,2018),(19,8,2018),(20,8,2018),(21,8,2018),(22,8,2018),(23,8,2018),(24,8,2018),(25,8,2018),(26,8,2018),(27,8,2018),(28,8,2018),(29,8,2018),(30,8,2018),(31,8,2018),(1,9,2018),(2,9,2018),(3,9,2018),(4,9,2018),(5,9,2018),(6,9,2018),(7,9,2018),(8,9,2018),(9,9,2018),(10,9,2018),(11,9,2018),(12,9,2018),(13,9,2018),(14,9,2018),(15,9,2018),(16,9,2018),(17,9,2018),(18,9,2018),(19,9,2018),(20,9,2018),(21,9,2018),(22,9,2018),(23,9,2018),(24,9,2018),(25,9,2018),(26,9,2018),(27,9,2018),(28,9,2018),(29,9,2018),(30,9,2018),(1,10,2018),(2,10,2018),(3,10,2018),(4,10,2018),(5,10,2018),(6,10,2018),(7,10,2018),(8,10,2018),(9,10,2018),(10,10,2018),(11,10,2018),(12,10,2018),(13,10,2018),(14,10,2018),(15,10,2018),(16,10,2018),(17,10,2018),(18,10,2018),(19,10,2018),(20,10,2018),(21,10,2018),(22,10,2018),(23,10,2018),(24,10,2018),(25,10,2018),(26,10,2018),(27,10,2018),(28,10,2018),(29,10,2018),(30,10,2018),(31,10,2018),(1,11,2018),(2,11,2018),(3,11,2018),(4,11,2018),(5,11,2018),(6,11,2018),(7,11,2018),(8,11,2018),(9,11,2018),(10,11,2018),(11,11,2018),(12,11,2018),(13,11,2018),(14,11,2018),(15,11,2018),(16,11,2018),(17,11,2018),(18,11,2018),(19,11,2018),(20,11,2018),(21,11,2018),(22,11,2018),(23,11,2018),(24,11,2018),(25,11,2018),(26,11,2018),(27,11,2018),(28,11,2018),(29,11,2018),(30,11,2018),(1,12,2018),(2,12,2018),(3,12,2018),(4,12,2018),(5,12,2018),(6,12,2018),(7,12,2018),(8,12,2018),(9,12,2018),(10,12,2018),(11,12,2018),(12,12,2018),(13,12,2018),(14,12,2018),(15,12,2018),(16,12,2018),(17,12,2018),(18,12,2018),(19,12,2018),(20,12,2018),(21,12,2018),(22,12,2018),(23,12,2018),(24,12,2018),(25,12,2018),(26,12,2018),(27,12,2018),(28,12,2018),(29,12,2018),(30,12,2018),(31,12,2018);

create table d_facto(
idEvento integer not null,
idMeio integer not null,
dia integer not null,
mes integer not null,
ano integer not null
);

insert into d_facto(select idevento,idmeio,dia,mes,ano
from d_evento,d_meio,d_tempo
where ((idmeio between 200 and 301) or (idmeio between 400 and 501))
and idevento between 50 and 71
and ((dia between 10 and 21 and mes between 5 and 7 and ano=2017) or (dia between 10 and 21 and mes between 7 and 9 and ano=2018)));