select count(*), 'Solicita' as T from Solicita
UNION 
select count(*), 'Audita' as T from Audita
UNION
select count(*), 'Coordenador' as T from Coordenador
UNION
select count(*), 'Acciona' as T from Acciona
UNION
select count(*), 'Alocado' as T from Alocado
UNION
select count(*), 'Transporta' as T from Transporta
UNION
select count(*), 'MeioSocorro' as T from MeioSocorro
UNION
select count(*), 'MeioApoio' as T from MeioApoio
UNION
select count(*), 'MeioCombate' as T from MeioCombate
UNION
select count(*), 'Meio' as T from Meio
UNION
select count(*), 'EntidadeMeio' as T from EntidadeMeio
UNION
select count(*), 'EventoEmergencia' as T from EventoEmergencia
UNION
select count(*), 'ProcessoSocorro' as T from ProcessoSocorro
UNION
select count(*), 'Vigia' as T from Vigia
UNION
select count(*), 'Local' as T from Local
UNION
select count(*), 'SegmentoVideo' as T from SegmentoVideo
UNION
select count(*), 'Video' as T from Video
UNION
select count(*), 'Camara' as T from Camara;