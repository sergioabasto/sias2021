-----------------------------------------------------------------------------------------------------------------
----------------------------------------- MIGRACION TABLA "cargo" -----------------------------------------------
-----------------------------------------------------------------------------------------------------------------
--select * from "Auxiliar"."ALCALDIA"
--select * from "Auxiliar"."GOBERNACION"

--select * from cargos;



insert into cargos("Ambito",	"NombreCargo",	"Titularidad",	"Posicion")
select 'Municipal' as "Ambito", ltrim(rtrim("ALCALDIA"."NombreCandidatura")) as "NombreCargo", ltrim(rtrim("ALCALDIA"."NombreTitularSuplente")) as "Titularidad", cast("ALCALDIA"."PosicionCandidatura" as int) as "Posicion" from "autoridadDB"."Auxiliar"."ALCALDIA" where "NombreOrganizaciónPolitica" like '%MOVIMIENTO AL SOCIALISMO INSTRUMENTO POLITICO POR LA SOBERANIA DE LOS PUEBLOS%'
and provincia = 'Murillo' and "municipio" = 'Nuestra Señora de La Paz' order by 2,4;

insert into cargos("Ambito",	"NombreCargo",	"Titularidad",	"Posicion")
select 'Departamental' as "Ambito", ltrim(rtrim("NombreCandidatura")) as "NombreCargo", ltrim(rtrim("NombreTitularSuplente")) as "Titularidad", cast("PosicionCandidatura" as int) as "Posicion" from "autoridadDB"."Auxiliar"."GOBERNACION" where "NombreOrganizaciónPolitica" like '%MOVIMIENTO AL SOCIALISMO INSTRUMENTO POLITICO POR LA SOBERANIA DE LOS PUEBLOS%'
order by cast("PosicionCandidatura" as int),"NombreCandidatura" desc,"NombreTitularSuplente" desc

-----------------------------------------------------------------------------------------------------------------
----------------------------------------- MIGRACION TABLAS GEOGRAFIA --------------------------------------------
-----------------------------------------------------------------------------------------------------------------

----------------------------------------- Migracion "Departamento" ----------------------------------------------

--select * from "autoridadDB"."Auxiliar"."MesaGeografia_03022021";
--select * from departamentos;


insert into departamentos("IdDepartamento",	"NombreDepartamento")
values ('1','Chuquisaca'),('2','La Paz'),('3','Cochabamba'),('4','Oruro'),('5','Potosí'),('6','Tarija'),
('7','Santa Cruz'),('8','Beni'),('9','Pando');

----------------------------------------- Migracion "Circunscripcion" -----------------------------------------------
--delete from circunscripcion;
--select * from circunscripcions;

insert into circunscripcions("IdCircunscripcion","Circunscripcion", "IdDepartamento")
values ('1','1','2'),('6','6','2'),('7','7','2'),('8','8','2'),('9','9','2'),('10','10','2'),('11','11','2'),('12','12','2'),('13','13','2'),('14','14','2'),('15','15','2'),('16','16','2'),('17','17','2'),('18','18','2'),('19','19','2');

----------------------------------------- Migracion "Provincia" -----------------------------------------------
--select * from provincias;

insert into provincias("IdProvincia","NombreProvincia",	"IdDepartamento")
values (0,'Ninguno',2);

/*
insert into provincias("IdProvincia","NombreProvincia",	"IdDepartamento")
select distinct cast("Prov" as int),ltrim(rtrim("NomProv")), cast("Dep" as int) from "autoridadDB"."Auxiliar"."MesaGeografia_03022021" where "Dep" = '2' order by 1;
*/

DROP TABLE IF EXISTS "Temporal";
create temp table "Temporal" as(
select distinct(LTRIM(RTRIM(COALESCE(provincia,'')))) as provincia from "Auxiliar"."GOBERNACION" where provincia != 'Gral. Jose Manuel Pando' and provincia is not null
);

insert into provincias("IdProvincia","NombreProvincia",	"IdDepartamento")
select row_number () over (order by provincia) as Nro, provincia,'2' as Dep from "Temporal"

----------------------------------------- Migracion "Municipio" -----------------------------------------------
--select * from municipios;
--select * from "autoridadDB"."Auxiliar"."MesaGeografia_03022021" where "Dep" = '2' order by 1

--select * from "Auxiliar"."ALCALDIA" order by provincia
--select distinct provincia from "Auxiliar"."ALCALDIA" order by 1

INSERT INTO "public"."municipios" ("IdMunicipio","NombreMunicipio","IdDepartamento","IdProvincia","created_at","updated_at") VALUES (0, 'Ninguno', 2, 0, NULL, NULL),(1, 'ACHACACHI', 2, 18, NULL, NULL),(2, 'ACHOCALLA', 2, 16, NULL, NULL),(3, 'ALTO BENI', 2, 5, NULL, NULL),(4, 'APOLO', 2, 6, NULL, NULL),(5, 'AUCAPATA', 2, 15, NULL, NULL),(6, 'AYATA', 2, 15, NULL, NULL),(7, 'AYO AYO', 2, 2, NULL, NULL),(8, 'BATALLAS', 2, 13, NULL, NULL),(9, 'CAIROMA', 2, 12, NULL, NULL),(10, 'CAJUATA', 2, 10, NULL, NULL),(11, 'CALACOTO', 2, 19, NULL, NULL),(12, 'CALAMARCA', 2, 2, NULL, NULL),(13, 'CAQUIAVIRI', 2, 19, NULL, NULL),(14, 'CARANAVI', 2, 5, NULL, NULL),(15, 'CATACORA', 2, 7, NULL, NULL),(16, 'CHACARILLA', 2, 8, NULL, NULL),(17, 'CHARAÑA', 2, 19, NULL, NULL),(18, 'CHARAZANI', 2, 3, NULL, NULL),(19, 'CHUA COCANI', 2, 18, NULL, NULL),(20, 'CHULUMANI', 2, 20, NULL, NULL),(21, 'CHUMA', 2, 15, NULL, NULL),(22, 'COLLANA', 2, 2, NULL, NULL),(23, 'COLQUENCHA', 2, 2, NULL, NULL),(24, 'COLQUIRI', 2, 10, NULL, NULL),(25, 'COMANCHE', 2, 19, NULL, NULL),(26, 'COMBAYA', 2, 11, NULL, NULL),(27, 'COPACABANA', 2, 14, NULL, NULL),(28, 'CORIPATA', 2, 17, NULL, NULL),(29, 'COROCORO', 2, 19, NULL, NULL),(30, 'COROICO', 2, 17, NULL, NULL),(31, 'CURVA', 2, 3, NULL, NULL),(32, 'DESAGUADERO', 2, 9, NULL, NULL),(33, 'EL ALTO', 2, 16, NULL, NULL),(34, 'ESCOMA', 2, 4, NULL, NULL),(35, 'GUANAY', 2, 11, NULL, NULL),(36, 'HUARINA', 2, 18, NULL, NULL),(37, 'HUATAJATA', 2, 18, NULL, NULL),(38, 'HUMANATA', 2, 4, NULL, NULL),(39, 'ICHOCA', 2, 10, NULL, NULL),(40, 'INQUISIVI', 2, 10, NULL, NULL),(41, 'IRUPANA', 2, 20, NULL, NULL),(42, 'IXIAMAS', 2, 1, NULL, NULL),(43, 'JESÚS DE MACHAKA', 2, 9, NULL, NULL),(44, 'SAN ANDRÉS DE MACHACA', 2, 9, NULL, NULL),(45, 'LA ASUNTA', 2, 20, NULL, NULL),(46, 'LAJA', 2, 13, NULL, NULL),(47, 'LURIBAY', 2, 12, NULL, NULL),(48, 'MALLA', 2, 12, NULL, NULL),(49, 'MAPIRI', 2, 11, NULL, NULL),(50, 'MECAPACA', 2, 16, NULL, NULL),(51, 'MOCOMOCO', 2, 4, NULL, NULL),(52, 'NAZACARA DE PACAJES', 2, 19, NULL, NULL),(53, 'NUESTRA SEÑORA DE LA PAZ', 2, 16, NULL, NULL),(54, 'PALCA', 2, 16, NULL, NULL),(55, 'PALOS BLANCOS', 2, 20, NULL, NULL),(56, 'PAPEL PAMPA', 2, 8, NULL, NULL),(57, 'PATACAMAYA', 2, 2, NULL, NULL),(58, 'PELECHUCO', 2, 6, NULL, NULL),(59, 'PUCARANI', 2, 13, NULL, NULL),(60, 'PUERTO ACOSTA', 2, 4, NULL, NULL),(61, 'PUERTO CARABUCO', 2, 4, NULL, NULL),(62, 'PUERTO MAYOR DE GUAQUI', 2, 9, NULL, NULL),(63, 'PUERTO PEREZ', 2, 13, NULL, NULL),(64, 'QUIABAYA', 2, 11, NULL, NULL),(65, 'QUIME', 2, 10, NULL, NULL),(66, 'SAN BUENAVENTURA', 2, 1, NULL, NULL),(67, 'SAN PEDRO DE CURAHUARA', 2, 8, NULL, NULL),(68, 'SAN PEDRO DE TIQUINA', 2, 14, NULL, NULL),(69, 'SANTIAGO DE CALLAPA', 2, 19, NULL, NULL),(70, 'SANTIAGO DE HUATA', 2, 18, NULL, NULL),(71, 'SANTIAGO DE MACHACA', 2, 7, NULL, NULL),(72, 'SAPAHAQUI', 2, 12, NULL, NULL),(73, 'SICASICA', 2, 2, NULL, NULL),(74, 'SORATA', 2, 11, NULL, NULL),(75, 'TACACOMA', 2, 11, NULL, NULL),(76, 'TARACO', 2, 9, NULL, NULL),(77, 'TEOPONTE', 2, 11, NULL, NULL),(78, 'TIAHUANACU', 2, 9, NULL, NULL),(79, 'TIPUANI', 2, 11, NULL, NULL),(80, 'TITO YUPANQUI', 2, 14, NULL, NULL),(81, 'UMALA', 2, 2, NULL, NULL),(82, 'VIACHA', 2, 9, NULL, NULL),(83, 'ANCORAIMES', 2, 18, NULL, NULL),(84, 'LICOMA PAMPA', 2, 10, NULL, NULL),(85, 'WALDO BALLIVIAN', 2, 19, NULL, NULL),(86, 'YACO', 2, 12, NULL, NULL),(87, 'YANACACHI', 2, 20, NULL, NULL);

/*

UPDATE "Auxiliar"."ALCALDIA" SET provincia = 'General José Manuel Pando'
where provincia like '%Gral. Jose Manuel Pando%';

update "Auxiliar"."ALCALDIA" SET municipio = 'COROCORO' --Correcto COROCORO
where municipio = 'CORO CORO';

update "Auxiliar"."ALCALDIA" SET municipio = 'SICASICA' --Correcto SICASICA
where municipio = 'SICA SICA';

update "Auxiliar"."ALCALDIA" SET municipio = 'PUERTO PEREZ'
where municipio = 'Puerto Pérez';

update "Auxiliar"."ALCALDIA" SET municipio = LTRIM(RTRIM(municipio));

update "Auxiliar"."ALCALDIA" SET municipio = 'PUERTO MAYOR DE CARABUCO' where upper(municipio) like '%CARABUCO%';

update "Auxiliar"."ALCALDIA" SET municipio = 'LA (MARKA) SAN ANDRÉS DE MACHACA' where upper(municipio) like '%SAN ANDR%';

update "Auxiliar"."ALCALDIA" SET municipio = 'PUERTO MAYOR DE GUAQUI' where upper(municipio) like '%GUAQUI%';

update "Auxiliar"."ALCALDIA" SET municipio = 'VILLA LIBERTAD LICOMA' where upper(municipio) like '%LICOMA%';

update "Auxiliar"."ALCALDIA" SET municipio = 'VILLA ANCORAIMES' where upper(municipio) like '%ANCORAIMES%';



insert into municipios("IdMunicipio", "NombreMunicipio",	"IdDepartamento",	"IdProvincia")
values (0,'Ninguno',2,0);

insert into municipios("NombreMunicipio",	"IdDepartamento",	"IdProvincia")
select distinct upper(ltrim(rtrim("municipio"))) as "NombreMunicipio", 2 as "IdDepartamento", b."IdProvincia" from "autoridadDB"."Auxiliar"."ALCALDIA" a
inner join provincias b ON LTRIM(RTRIM(a.provincia)) = b."NombreProvincia"
order by 1
*/

select b."NombreProvincia", a."NombreMunicipio" from municipios a
inner join provincias b ON a."IdProvincia" = b."IdProvincia"
order by 1,2
----------------------------------------- Migracion "proceso_electoral" ------------------------------------------------
--select * from proceso_electorals;

insert into proceso_electorals("DetalleProceso") values('Elecciones Subnacionales 2021');


----------------------------------------- Migracion "antecedente" ------------------------------------------------
---------------------------------------- NO SE MIGRARA

--select * from "antecedentes"


----------------------------------------- Migracion "auditoria" ------------------------------------------------
---------------------------------------- NO SE MIGRARA

--select * from "auditorias"

----------------------------------------- Migracion "organizaciones_politica" ------------------------------------------------
--select * from "Auxiliar"."ALCALDIA";
--select * from "Auxiliar"."DEP"
--delete from "organizaciones_politica"
--select * from "organizacion_politicas"

insert into "organizacion_politicas"("NombreOrganizacion",	"Sigla")
select distinct ltrim(rtrim("NombreOrganizaciónPolitica")) as "OrganizacionPolitica",ltrim(rtrim("SiglaOrganizaciónPolitica")) as "Sigla" from "Auxiliar"."ALCALDIA"
union
select distinct ltrim(rtrim("NombreOrganizaciónPolitica")),ltrim(rtrim("SiglaOrganizacionPolitica")) from "Auxiliar"."GOBERNACION";


----------------------------------------- Migracion "candidato" ------------------------------------------------

--select * from "Auxiliar"."ALCALDIA";
--select * from "Auxiliar"."GOBERNACION";

--select * from "candidatos"

insert into "candidatos" ("Nombres",	"PrimerApellido",	"SegundoApellido",	"DocumentoIdentidad",	"ComplementoSegip",	"LugarExpedido",	"Genero",	"Direccion",	"Telefono",	"FechaNacimiento",	"IsElecto",	"IdCargo",	"IdOrganizacionPolitica",	"IdProcesoElectoral",	"IdDepartamento",	"IdProvincia",	"IdMunicipio")

select ltrim(rtrim(a."Nombre")) as "Nombres",ltrim(rtrim(a."Paterno")) as "PrimerApellido",ltrim(rtrim(a."Materno")) as "SegundoApellido",NULL as "NumeroDocumento", NULL as "ComplementoSegip", NULL as "LugarExpedido", ltrim(rtrim(a."sexo")) as "Genero", NULL as "Direccion", NULL as "Telefono", cast('1900-01-01' as date) as "FechaNacimiento", 'no' as "IsElecto", b."IdCargo",c."IdOrganizacionPolitica", (select "IdProcesoElectoral" from "proceso_electorals" limit 1) as "IdProcesoElectoral", (select "IdDepartamento" from "departamentos" where "NombreDepartamento" = 'La Paz'),d."IdProvincia",e."IdMunicipio" from "Auxiliar"."ALCALDIA" a
inner join "cargos" b ON b."NombreCargo" = a."NombreCandidatura" and b."Titularidad" = a."NombreTitularSuplente" and cast(b."Posicion" as int) = cast(a."PosicionCandidatura" as int)
inner join "organizacion_politicas" c ON ltrim(rtrim(a."SiglaOrganizaciónPolitica")) = ltrim(rtrim(c."Sigla")) and ltrim(rtrim(a."NombreOrganizaciónPolitica")) = ltrim(rtrim(c."NombreOrganizacion"))
inner join "provincias" d ON LTRIM(RTRIM(a."provincia")) = d."NombreProvincia"
inner join "municipios" e ON upper(a."municipio") = e."NombreMunicipio" where "ESTADO" = 'HABILITADO'

union


select ltrim(rtrim(a."Nombre")) as "Nombres",ltrim(rtrim(a."Paterno")) as "PrimerApellido",ltrim(rtrim(a."Materno")) as "SegundoApellido",NULL as "NumeroDocumento", NULL as "ComplementoSegip", NULL as "LugarExpedido", ltrim(rtrim(a."sexo")) as "Genero", NULL as "Direccion", NULL as "Telefono", cast('1900-01-01' as date) as "FechaNacimiento", 'no' as "IsElecto", b."IdCargo",c."IdOrganizacionPolitica", (select "IdProcesoElectoral" from "proceso_electorals" limit 1) as "IdProcesoElectoral", (select "IdDepartamento" from "departamentos" where "NombreDepartamento" = 'La Paz'), case when d."IdProvincia" is null then 0 else d."IdProvincia" end as "IdProvincia", '0' as "IdMunicipio" from "Auxiliar"."GOBERNACION" a
inner join "cargos" b ON b."NombreCargo" = a."NombreCandidatura" and b."Titularidad" = a."NombreTitularSuplente" and cast(b."Posicion" as int) = cast(a."PosicionCandidatura" as int)
inner join "organizacion_politicas" c ON ltrim(rtrim(a."SiglaOrganizacionPolitica")) = ltrim(rtrim(c."Sigla")) and ltrim(rtrim(a."NombreOrganizaciónPolitica")) = LTRIM(RTRIM(c."NombreOrganizacion"))
left join "provincias" d ON LTRIM(RTRIM(a.provincia)) = d."NombreProvincia" where "ESTADO" = 'HABILITADO'

----------------------------------------- Migracion "personal_teds" ------------------------------------------------
--select * from personal_teds

insert into "personal_teds" ("NombreCompleto",	"Cargo",	"Posicion")
values('Dr. Franz Victor Jiménez Vásquez','PRESIDENTE',1),('Dra. Zonia Yujra Porce','VICEPRESIDENTA',2),
('Dr. Antonio Condori Huanca','VOCAL',3),('Dra. Gisela Eugenia Pérez Escobar','VOCAL',4),('Lic. Sabino Chávez Mamani','VOCAL',5),
('Dr. Alfredo José Guzman Villarreal','VOCAL',6)

----------------------------------------- GENERACION "autoridad" ------------------------------------------------
select * from "autoridads";
select * from "municipios"
select * from "cargos"

insert into "autoridads"(	"DocumentoAdjunto",	"Observaciones",	"FechaSolicitud",	"FechaRespuesta",	"IsHabilitado",	"DetalleIsHabilitado",	"IdCandidato",	"IdCargo",	"IsActivo")
select  NULL,'Ninguna',NULL,NULL,'Habilitado','Candidato Electo 2021',"IdCandidato","IdCargo",'si' from
(
select "row_number"() over(	partition by a."IdCargo",a."IdMunicipio" /*order by a."IdMunicipio"*/) as CONT,a.* from "candidatos" a
inner join "cargos" b ON a."IdCargo" = b."IdCargo" where b."IdCargo" between 1 and 23
)z where z."cont" = 1;

select * from "candidatos" where
select * from cargos

select e."NombreMunicipio", d."NombreCargo",c."NombreOrganizacion",b."Nombres",b."PrimerApellido",b."SegundoApellido",d."NombreCargo",d."Posicion" from "autoridads" a
inner join "candidatos" b ON a."IdCandidato" = b."IdCandidato"
inner join organizacion_politicas c ON b."IdOrganizacionPolitica" = c."IdOrganizacionPolitica"
inner join cargos d ON b."IdCargo" = d."IdCargo"
inner join "municipios" e ON b."IdMunicipio" = e."IdMunicipio"
where b."IdMunicipio" = 56


-- INSERTAR GOBERNADOR:
insert into "autoridads"("DocumentoAdjunto",	"Observaciones",	"FechaSolicitud",	"FechaRespuesta",	"IsHabilitado",	"DetalleIsHabilitado",	"IdCandidato",	"IdCargo",	"IsActivo")
select  NULL,'Ninguna',NULL,NULL,'Habilitado','Candidato Electo 2021',"IdCandidato","IdCargo",'si' from
(
select a.*
from "candidatos" a
inner join "cargos" b ON a."IdCargo" = b."IdCargo"
where b."IdCargo" = 24
and a."IdCandidato" = 4904
) z


CREATE SEQUENCE "autoridads_IdAutoridad_seq";
SELECT pg_catalog.setval('"autoridads_IdAutoridad_seq"', 1045, true);

-- INSERTAR ASAMBLEISTAS:
insert into "autoridads"(	"DocumentoAdjunto",	"Observaciones",	"FechaSolicitud",	"FechaRespuesta",	"IsHabilitado",	"DetalleIsHabilitado",	"IdCandidato",	"IdCargo",	"IsActivo")
select  NULL,'Ninguna',NULL,NULL,'Habilitado','Candidato Electo 2021',"IdCandidato","IdCargo",'si' from
(
select "row_number"() over(	partition by a."IdCargo",a."IdMunicipio" /*order by a."IdMunicipio"*/) as CONT,a.* from "candidatos" a
inner join "cargos" b ON a."IdCargo" = b."IdCargo" where b."IdCargo" between 25 and 104
)z where z."cont" = 1;

--------------------------------------------------------------------------------------------------------------------------------
select * from municipios where "IdMunicipio" = 53
select * from cargos
select * from candidatos where "IdCargo" = '1' and "IdMunicipio" = 53



insert into "autoridads"(	"DocumentoAdjunto",	"Observaciones",	"FechaSolicitud",	"FechaRespuesta",	"IsHabilitado",	"DetalleIsHabilitado",	"IdCandidato",	"IdCargo",	"IsActivo")
select  NULL,'Ninguna',NULL,NULL,'Habilitado','Candidato Electo 2021',"IdCandidato","IdCargo",'si' from (
select ROW_NUMBER() OVER (partition by a."IdCargo",a."IdMunicipio" order by a."Nombres") as "CONT" ,a."IdCandidato",b."IdCargo" from candidatos a
inner join cargos b ON a."IdCargo" = b."IdCargo" where b."IdCargo" = '1'
)z where z."CONT" = 1



select ROW_NUMBER() OVER (partition by a."IdCargo",a."IdMunicipio" order by a."Nombres") as "CONT",a.* from candidatos a
inner join (select * from cargos where "IdCargo" between 2 and 23 and "Titularidad" = 'Titular') b ON a."IdCargo" = b."IdCargo"
where a."IdMunicipio" = 53


select b."Nombres",b."PrimerApellido",b."SegundoApellido",c."NombreMunicipio",d."NombreCargo"  from "autoridads" a
inner join "candidatos" b ON a."IdCandidato" = b."IdCandidato"
inner join municipios c ON b."IdMunicipio" = c."IdMunicipio"
inner join cargos d ON b."IdCargo" = d."IdCargo"
----------------------------------------------------------------------------------------------------------------
select * from municipios where "NombreMunicipio" like '%NUESTRA%'

select upper(e."NombreMunicipio") as "NombreMunicipio", upper(f."NombreProvincia") as "NombreProvincia",COALESCE(
case 	when "Genero" = 'FEMENINO' and "NombreCargo" = 'Alcaldesa(e)' then 'ALCALDESA'
			when "Genero" = 'MASCULINO' and "NombreCargo" = 'Alcaldesa(e)' then 'ALCALDE'
			when "Genero" = 'FEMENINO' and "NombreCargo" = 'Concejalas(es)' then 'CONCEJALA'
			when "Genero" = 'MASCULINO' and "NombreCargo" = 'Concejalas(es)' then 'CONCEJAL'
end ,'') || ' ' || coalesce(upper(d."Titularidad"),'') as "NombreCargo", c."NombreOrganizacion",
coalesce("Nombres", '') || ' ' || coalesce("PrimerApellido", '') || ' ' || coalesce("SegundoApellido", '') as "Nombres"
,d."Posicion",
case when "Genero" = 'FEMENINO' then 'A la ciudadana:' when "Genero" = 'MASCULINO' then 'Al ciudadano:' end as "Denominacion"
from "autoridads" a
inner join "candidatos" b ON a."IdCandidato" = b."IdCandidato"
inner join organizacion_politicas c ON b."IdOrganizacionPolitica" = c."IdOrganizacionPolitica"
inner join cargos d ON b."IdCargo" = d."IdCargo"
inner join "municipios" e ON b."IdMunicipio" = e."IdMunicipio"
inner join "provincias" f ON b."IdProvincia" = f."IdProvincia"
order by 1,2,d."Posicion"

select * from autoridads a
inner join cargos b ON a."IdCargo" = b."IdCargo"
where a."IdCandidato" = '1773'

select * from candidatos where "Nombres" like '%FRANZ%'

select * from organizacion_politicas a
inner join

--------------------------------------- CONTROL DE CALIDAD ---------------------------------------------------

DROP TABLE IF EXISTS "TemporalAlcaldia";
create temp table "TemporalAlcaldia" as
(
select a."IdCandidato", a."Nombres", a."PrimerApellido", a."SegundoApellido", a."Genero",b."NombreCargo", b."Titularidad",b."Posicion", c."NombreOrganizacion",c."Sigla", d."NombreProvincia", e."NombreMunicipio"
--select *
from candidatos a
inner join cargos b ON a."IdCargo" = b."IdCargo"
inner join organizacion_politicas c ON a."IdOrganizacionPolitica" = c."IdOrganizacionPolitica"
inner join provincias d ON coalesce(a."IdProvincia", '0') = d."IdProvincia"
inner join municipios e ON coalesce(a."IdMunicipio", '0') = e."IdMunicipio"
where b."Ambito" = 'Municipal'
)

select * from "TemporalAlcaldia";
select * from  "Auxiliar"."QC_ALCALDIA"

select * from "TemporalAlcaldia" a
right join "Auxiliar"."QC_ALCALDIA" b ON a."Nombres" = LTRIM(RTRIM(b."Nombre")) and LTRIM(RTRIM(coalesce(a."PrimerApellido",''))) = LTRIM(RTRIM(coalesce(b."Paterno",''))) and LTRIM(RTRIM(coalesce(a."SegundoApellido",''))) = LTRIM(RTRIM(coalesce(b."Materno",'')))
and a."NombreCargo" = b."NombreCandidatura" and a."Titularidad" = b."NombreTitularSuplente" and LTRIM(RTRIM(a."NombreOrganizacion")) = LTRIM(RTRIM(b."NombreOrganizaciónPolitica")) and cast (a."Posicion" as int) = cast(b."PosicionCandidatura" as int)
where a."NombreCargo" is null and  b."ESTADO" = 'HABILITADO'
order by 2,3,4





DROP TABLE IF EXISTS "TemporalGobernacion";
create temp table "TemporalGobernacion" as
(
select a."IdCandidato", a."Nombres", a."PrimerApellido", a."SegundoApellido", a."Genero",b."NombreCargo", b."Titularidad",b."Posicion", c."NombreOrganizacion",c."Sigla", d."NombreProvincia", e."NombreMunicipio"
--select *
from candidatos a
inner join cargos b ON a."IdCargo" = b."IdCargo"
inner join organizacion_politicas c ON a."IdOrganizacionPolitica" = c."IdOrganizacionPolitica"
inner join provincias d ON coalesce(a."IdProvincia", '0') = d."IdProvincia"
inner join municipios e ON coalesce(a."IdMunicipio", '0') = e."IdMunicipio"
where b."Ambito" = 'Departamental'
)

select * from "TemporalGobernacion";
select * from "Auxiliar"."QC_GOBERNACION";

select * from "TemporalGobernacion" a
inner join "Auxiliar"."QC_GOBERNACION" b ON a."Nombres" = LTRIM(RTRIM(b."Nombre")) and LTRIM(RTRIM(coalesce(a."PrimerApellido",''))) = LTRIM(RTRIM(coalesce(b."Paterno",''))) and LTRIM(RTRIM(coalesce(a."SegundoApellido",''))) = LTRIM(RTRIM(coalesce(b."Materno",'')))
and a."NombreCargo" = b."NombreCandidatura" and a."Titularidad" = b."NombreTitularSuplente" and LTRIM(RTRIM(a."NombreOrganizacion")) = LTRIM(RTRIM(b."NombreOrganizaciónPolitica")) and cast (a."Posicion" as int) = cast(b."PosicionCandidatura" as int)
--where a."NombreCargo" is null and  b."ESTADO" = 'HABILITADO'
order by 2,3,4


select * from "Auxiliar"."ALCALDIA" where "ESTADO" = 'HABILITADO'		--3716
select * from "Auxiliar"."GOBERNACION";
select * from "TemporalAlcaldia" where "Nombres" = 'ADRIANA'
select * from "Auxiliar"."QC-ALCALDIA" where "Nombre" = 'ADRIANA '
select * from "Auxiliar"."QC-ALCALDIA" where "Nro" = '36'

