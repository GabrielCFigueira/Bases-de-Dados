--1.
select numProcessoSocorro
from Acciona
group by numProcessoSocorro
having count(1) >= all (select count(1)
from Acciona
group by numProcessoSocorro);

--2.
select nomeEntidade
from EventoEmergencia
natural join Acciona
where instanteChamada >= '2018-06-21'
and instanteChamada <= '2018-09-21'
group by nomeEntidade
having count(1) >= all (select count(1)
from EventoEmergencia
natural join Acciona
where instanteChamada >= '2018-06-21'
and instanteChamada <= '2018-09-21'
group by nomeEntidade);

--3.
select distinct numProcessoSocorro
from (select numProcessoSocorro, count(1) as numAcc
from Acciona
natural join EventoEmergencia
where moradaLocal = 'Oliveira do Hospital'
and date_part('year', instanteChamada) = 2018
group by numProcessoSocorro) as Acc_EE
natural join (select numProcessoSocorro, count(1) as numAud
from Audita
natural join EventoEmergencia
where moradaLocal = 'Oliveira do Hospital'
and date_part('year', instanteChamada) = 2018
group by numProcessoSocorro) as Aud_EE
where Acc_EE.numAcc > Aud_EE.numAud;

--4.
select count(numSegmento) as totalSegmentos
from (select numSegmento
from Vigia
natural join Video
natural join SegmentoVideo
where duracao > '00:59:00'
and moradaLocal = 'Monchique'
and date_part('year', dataHoraInicio) = '2018'
and date_part('month', dataHoraInicio) = '08'
group by numSegmento) as segmentos;

--5.
select distinct numMeio
from MeioCombate
where numMeio not in (select numMeio
                      from MeioApoio
                      natural join Acciona);

--6.
select nomeEntidade 
from MeioCombate m_c1
where not exists(
    select distinct numProcessoSocorro
    from ProcessoSocorro
    except
    select distinct numProcessoSocorro
    from (Acciona
    natural join MeioCombate) m_c2
where m_c2.numMeio=m_c1.numMeio and m_c2.nomeEntidade=m_c1.nomeEntidade);