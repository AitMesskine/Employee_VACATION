create table equipe(code_equipe char(3) not null primary key ,nom varchar(30),directeur varchar(30) );
create table pays(code_pays int not null primary key,nom varchar(30));
create table coureur(num_dossart int not null primary key ,code_equipe char(3),nom varchar(30),code_pays varchar(3)); 
create table etape(num_etape int not null primary key ,date_etape date ,kms int ,ville_depart varchar(20),ville_arrive varchar(20) );
create table temps(num_dossart int  , num_etape int ,temps_realise int ,primary key(num_dossart,num_etape));




--les foreign key ;
alter table coureur add constraint FK_avoir_equipe foreign key(code_equipe)  references equipe(code_equipe); 
alter table temps add constraint foreign key fk_avoir_num_dossart references coureur(num_dossart); 
alter table temps add constraint foreign key fk_avoir_num_etape references etape(num_etape); 
alter table coureur add constraint foreign key fk_avoir_code_pays references pays(code_equipe);

--1)
select max(temps_realise), min(temps_realise) from temps where num_etape=1;
--2)
select count(*) from coureur where code_equipe='TMT';
--3)**
select count(num_etape),sum(date_etape) as total from etape e ,temps t,coureur c where e.num_etape=t.num_etape and t.num_dossart=c.num_dossart and nom ='CHAVANEL Sylvain' group by num_etape;
--4)
select avg(e.date_etape) from e.etape group by e.num_etape;

-- Partie 2:
select count(num_etape) from etape e, coureur c,temps t order by nom asc   group by num_dossart having date_etape > 2  and num_etape <1;
--2
select code_pays , nom from pays group by code_pays order by nom asc ;
--3
select nom , sum(date_etape) as total from etape e ,coureur c group by nom  having total <9; 

--Partie 3:
select nom from coureur  where c.num_dossart=t.num_dossart and t.num_etape=e.num_etape and num_etape=2;
--2
select nom , temps_realise from coureur c , temps t group by num_etape;
--3
select t.num_etape,c.nom,t.temps_realise from coureur c ,temps t where c.num_dossart=t.num_dossart and num_dossart =(select min(temps_realise)from temps group by t.num_etape,t.temps_realise);
--5
 select nom from coureur c ,temps t where c.num_dossart=t.num_dossart order by temps_realise desc row_numbre <2;
 --6
 select nom from coureur c,temps t order by temps_realise desc row_numbre<3 group by num_etape;
 select c.nom from   coureur c where substr(cc,nom,1,1)=substr(c) and nom like (select nom from coureur where nom like '-%');
--2
 select t.num_etape,c.nom,t.temps_realise
 from coureur c,temps t where c.num_dossart=t.num_dossart and t.num_dossart and t.temps_realise>=
 (select max(temps_realise) from temps where t.num_etape=num_etape) order by t.num_etape;

--
select max(temps_realise) 






--tp3

1--
 CREATE view vwSalary(EMPLOYEE_ID, FIRST_NAME, LAST_NAME, SALARY) as select  EMPLOYEE_ID, FIRST_NAME, LAST_NAME, SALARY from employees
 select * from vwSalary where salaireemp=3000;
