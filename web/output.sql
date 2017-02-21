--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE SEQUENCE category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE category_id_seq OWNER TO uswaoyvcwjxpvx;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE category (
    id integer DEFAULT nextval('category_id_seq'::regclass) NOT NULL,
    name text NOT NULL,
    person_id integer NOT NULL
);


ALTER TABLE category OWNER TO uswaoyvcwjxpvx;

--
-- Name: ingredient_id_seq; Type: SEQUENCE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE SEQUENCE ingredient_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ingredient_id_seq OWNER TO uswaoyvcwjxpvx;

--
-- Name: ingredient; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE ingredient (
    id integer DEFAULT nextval('ingredient_id_seq'::regclass) NOT NULL,
    name text NOT NULL,
    quantity text NOT NULL,
    unit text,
    recipe_id integer NOT NULL
);


ALTER TABLE ingredient OWNER TO uswaoyvcwjxpvx;

--
-- Name: item_id_seq; Type: SEQUENCE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE SEQUENCE item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE item_id_seq OWNER TO uswaoyvcwjxpvx;

--
-- Name: item; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE item (
    id integer DEFAULT nextval('item_id_seq'::regclass) NOT NULL,
    name text NOT NULL,
    expdate date,
    quantity text NOT NULL,
    person_id integer NOT NULL
);


ALTER TABLE item OWNER TO uswaoyvcwjxpvx;

--
-- Name: itemcategory_id_seq; Type: SEQUENCE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE SEQUENCE itemcategory_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE itemcategory_id_seq OWNER TO uswaoyvcwjxpvx;

--
-- Name: itemcategory; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE itemcategory (
    id integer DEFAULT nextval('itemcategory_id_seq'::regclass) NOT NULL,
    item_id integer NOT NULL,
    category_id integer NOT NULL,
    person_id integer NOT NULL
);


ALTER TABLE itemcategory OWNER TO uswaoyvcwjxpvx;

--
-- Name: person_id_seq; Type: SEQUENCE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE SEQUENCE person_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE person_id_seq OWNER TO uswaoyvcwjxpvx;

--
-- Name: person; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE person (
    id integer DEFAULT nextval('person_id_seq'::regclass) NOT NULL,
    name text NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE person OWNER TO uswaoyvcwjxpvx;

--
-- Name: recipe_id_seq; Type: SEQUENCE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE SEQUENCE recipe_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recipe_id_seq OWNER TO uswaoyvcwjxpvx;

--
-- Name: recipe; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE recipe (
    id integer DEFAULT nextval('recipe_id_seq'::regclass) NOT NULL,
    name text NOT NULL,
    directions text
);


ALTER TABLE recipe OWNER TO uswaoyvcwjxpvx;

--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY category (id, name, person_id) FROM stdin;
10	vegetable	25
11	Fruit	25
12	Spices	25
13	Peppers	25
14	Junk Food	25
15	Ice Cream	25
16	Meats	25
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uswaoyvcwjxpvx
--

SELECT pg_catalog.setval('category_id_seq', 16, true);


--
-- Data for Name: ingredient; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY ingredient (id, name, quantity, unit, recipe_id) FROM stdin;
\.


--
-- Name: ingredient_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uswaoyvcwjxpvx
--

SELECT pg_catalog.setval('ingredient_id_seq', 1, false);


--
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY item (id, name, expdate, quantity, person_id) FROM stdin;
62	chicken tender	\N	3	25
46	Chex Mix	2017-03-19	1	25
19	beef jerky	2018-12-01	1	26
28	Club Mate	2017-10-14	2	25
41	Grape	2017-03-19	1	25
60	Green Bean	2017-03-01	1	25
26	Peanut Butter	2018-12-01	1	26
47	Hot Cheetos	2017-10-13	1	25
63	Instant Ramen	2018-02-19	1	25
59	Oreo	2016-12-12	3	25
50	Chocolate Pudding	2016-12-12	12	25
\.


--
-- Name: item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uswaoyvcwjxpvx
--

SELECT pg_catalog.setval('item_id_seq', 65, true);


--
-- Data for Name: itemcategory; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY itemcategory (id, item_id, category_id, person_id) FROM stdin;
17	46	14	25
18	62	14	25
19	28	14	25
20	41	11	25
21	60	10	25
22	47	14	25
23	63	14	25
24	59	14	25
\.


--
-- Name: itemcategory_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uswaoyvcwjxpvx
--

SELECT pg_catalog.setval('itemcategory_id_seq', 26, true);


--
-- Data for Name: person; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY person (id, name, password) FROM stdin;
25	zac	$2y$10$FzN31U.iJGhX7SINLXX3EOfxf854Ifxfuys/rQPTiBjGHqX63lUVy
26	test	$2y$10$Uv.UmBs7VO/P/U9V.30zVO70ULHvLiDvqdMb/wSejC5s209w7wNuC
\.


--
-- Name: person_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uswaoyvcwjxpvx
--

SELECT pg_catalog.setval('person_id_seq', 26, true);


--
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY recipe (id, name, directions) FROM stdin;
\.


--
-- Name: recipe_id_seq; Type: SEQUENCE SET; Schema: public; Owner: uswaoyvcwjxpvx
--

SELECT pg_catalog.setval('recipe_id_seq', 1, false);


--
-- Name: category category_name_key; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_name_key UNIQUE (name);


--
-- Name: category category_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: ingredient ingredient_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY ingredient
    ADD CONSTRAINT ingredient_pkey PRIMARY KEY (id);


--
-- Name: item item_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_pkey PRIMARY KEY (id);


--
-- Name: itemcategory itemcategory_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY itemcategory
    ADD CONSTRAINT itemcategory_pkey PRIMARY KEY (id);


--
-- Name: person name_unique_con; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY person
    ADD CONSTRAINT name_unique_con UNIQUE (name);


--
-- Name: person person_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY person
    ADD CONSTRAINT person_pkey PRIMARY KEY (id);


--
-- Name: recipe recipe_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY recipe
    ADD CONSTRAINT recipe_pkey PRIMARY KEY (id);


--
-- Name: category category_person_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY category
    ADD CONSTRAINT category_person_id_fkey FOREIGN KEY (person_id) REFERENCES person(id);


--
-- Name: ingredient ingredient_recipe_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY ingredient
    ADD CONSTRAINT ingredient_recipe_id_fkey FOREIGN KEY (recipe_id) REFERENCES recipe(id);


--
-- Name: item item_person_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_person_id_fkey FOREIGN KEY (person_id) REFERENCES person(id);


--
-- Name: itemcategory itemcategory_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY itemcategory
    ADD CONSTRAINT itemcategory_category_id_fkey FOREIGN KEY (category_id) REFERENCES category(id);


--
-- Name: itemcategory itemcategory_item_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY itemcategory
    ADD CONSTRAINT itemcategory_item_id_fkey FOREIGN KEY (item_id) REFERENCES item(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: uswaoyvcwjxpvx
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO uswaoyvcwjxpvx;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO uswaoyvcwjxpvx;


--
-- PostgreSQL database dump complete
--

