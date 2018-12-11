
select au.idCoordenador, ev.moradaLocal, vid.dataHoraInicio, vid.dataHoraFim, vid.numCamara
from eventoemergencia ev inner join acciona acc on ev.numProcessoSocorro = acc.numProcessoSocorro
inner join audita au on acc.numMeio = au.numMeio and acc.nomeEntidade = au.nomeEntidade and acc.numProcessoSocorro = au.numProcessoSocorro
inner join vigia vig on vig.moradaLocal = ev.moradaLocal
inner join video vid on vig.numCamara = vid.numCamara except (
select sol.idCoordenador, videos.moradaLocal, sol.dataHoraInicioVideo, videos.dataHoraFim, sol.numCamara from solicita sol inner join (select au.idCoordenador, ev.moradaLocal, vid.*
from eventoemergencia ev inner join acciona acc on ev.numProcessoSocorro = acc.numProcessoSocorro
inner join audita au on acc.numMeio = au.numMeio and acc.nomeEntidade = au.nomeEntidade and acc.numProcessoSocorro = au.numProcessoSocorro
inner join vigia vig on vig.moradaLocal = ev.moradaLocal
inner join video vid on vig.numCamara = vid.numCamara) as videos
on sol.idCoordenador = videos.idCoordenador
and sol.dataHoraInicioVideo = videos.dataHoraInicio
and sol.numCamara = videos.numCamara);


select au.idCoordenador, videos.moradaLocal, videos.dataHoraInicio, videos.dataHoraFim, videos.numCamara
from (eventoemergencia natural join acciona
natural join vigia
natural join video) as videos
inner join audita au on videos.numMeio = au.numMeio and videos.nomeEntidade = au.nomeEntidade and videos.numProcessoSocorro = au.numProcessoSocorro group by au.idCoordenador, videos.moradaLocal, videos.dataHoraInicio, videos.dataHoraFim, videos.numCamara except (
select sol.idCoordenador, videos.moradaLocal, sol.dataHoraInicioVideo, videos.dataHoraFim, sol.numCamara
from (eventoemergencia natural join acciona
natural join vigia
natural join video) as videos
inner join audita au on videos.numMeio = au.numMeio and videos.nomeEntidade = au.nomeEntidade and videos.numProcessoSocorro = au.numProcessoSocorro
inner join solicita sol on sol.idCoordenador = au.idCoordenador
and sol.dataHoraInicioVideo = videos.dataHoraInicio
and sol.numCamara = videos.numCamara group by sol.idCoordenador, videos.moradaLocal, sol.dataHoraInicioVideo, videos.dataHoraFim, sol.numCamara);



/*-----------------------------------------------------------------ALINEA A)-----------------------------------------------------------------*/
CREATE OR REPLACE FUNCTION chk_coordenador_solicita()
RETURNS TRIGGER AS $BODY$
BEGIN
    IF NOT EXISTS ( select * from (
        select au.idCoordenador, videos.moradaLocal, videos.dataHoraInicio, videos.dataHoraFim, videos.numCamara
        from (eventoemergencia natural join acciona
        natural join vigia
        natural join video) as videos
        inner join audita au on videos.numMeio = au.numMeio and videos.nomeEntidade = au.nomeEntidade and videos.numProcessoSocorro = au.numProcessoSocorro
        group by au.idCoordenador, videos.moradaLocal, videos.dataHoraInicio, videos.dataHoraFim, videos.numCamara
        except (
        select sol.idCoordenador, videos.moradaLocal, sol.dataHoraInicioVideo, videos.dataHoraFim, sol.numCamara
        from (eventoemergencia natural join acciona
        natural join vigia
        natural join video) as videos
        inner join audita au on videos.numMeio = au.numMeio and videos.nomeEntidade = au.nomeEntidade and videos.numProcessoSocorro = au.numProcessoSocorro
        inner join solicita sol on sol.idCoordenador = au.idCoordenador
        and sol.dataHoraInicioVideo = videos.dataHoraInicio
        and sol.numCamara = videos.numCamara group by sol.idCoordenador, videos.moradaLocal, sol.dataHoraInicioVideo, videos.dataHoraFim, sol.numCamara) ) as c where idCoordenador = NEW.idCoordenador and dataHoraInicio = NEW.dataHoraInicioVideo and numCamara = NEW.numCamara
        ) THEN
        RAISE EXCEPTION 'Video nao solicitado'
        USING HINT = 'So pode solicitar videos de camaras colocadas num local cujo accionamento de meios esteja a ser (ou tenha sido) auditado';
    END IF;
    RETURN NEW;
END;
$BODY$ LANGUAGE plpgsql;
CREATE TRIGGER chk_coordenador_solicita BEFORE INSERT OR UPDATE ON Solicita FOR EACH ROW EXECUTE PROCEDURE chk_coordenador_solicita();

/*-----------------------------------------------------------------ALINEA B)-----------------------------------------------------------------*/
CREATE OR REPLACE FUNCTION chk_aloc_meioapoio()
RETURNS TRIGGER AS $BODY$
BEGIN
    IF NOT EXISTS (SELECT numMeio,nomeEntidade,numProcessoSocorro FROM Acciona NATURAL JOIN MeioApoio where nummeio = NEW.numMeio and nomeentidade = NEW.nomeEntidade and numprocessosocorro = NEW.numProcessoSocorro) THEN
        RAISE EXCEPTION 'Meio nao accionado'
        USING HINT = 'O meio de apoio só pode ser alocado se tiver sido accionado';
    END IF;
RETURN NEW;
END;
$BODY$ LANGUAGE plpgsql;

CREATE TRIGGER chk_alocar_meioapoio BEFORE INSERT OR UPDATE ON Alocado FOR EACH ROW EXECUTE PROCEDURE chk_aloc_meioapoio();

CREATE OR REPLACE FUNCTION chk_aloc_meioapoio()
RETURNS TRIGGER AS $BODY$
BEGIN
    IF (NEW.numMeio,NEW.nomeEntidade,NEW.numProcessoSocorro) NOT IN (SELECT numMeio,nomeEntidade,numProcessoSocorro FROM Acciona NATURAL JOIN MeioApoio ) THEN
        RAISE EXCEPTION 'Meio nao accionado'
        USING HINT = 'O meio de apoio só pode ser alocado se tiver sido accionado';
    END IF;
RETURN NEW;
END;
$BODY$ LANGUAGE plpgsql;

CREATE TRIGGER chk_alocar_meioapoio BEFORE INSERT OR UPDATE ON Alocado FOR EACH ROW EXECUTE PROCEDURE chk_aloc_meioapoio();

