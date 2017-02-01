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

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: category; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE category (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE category OWNER TO uswaoyvcwjxpvx;

--
-- Name: ingredient; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE ingredient (
    id integer NOT NULL,
    name text NOT NULL,
    quantity text NOT NULL,
    unit text,
    recipe_id integer NOT NULL
);


ALTER TABLE ingredient OWNER TO uswaoyvcwjxpvx;

--
-- Name: item; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE item (
    id integer NOT NULL,
    name text NOT NULL,
    expdate date,
    quantity text NOT NULL,
    pantry_id integer NOT NULL
);


ALTER TABLE item OWNER TO uswaoyvcwjxpvx;

--
-- Name: itemcategory; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE itemcategory (
    id integer NOT NULL,
    item_id integer NOT NULL,
    category_id integer NOT NULL
);


ALTER TABLE itemcategory OWNER TO uswaoyvcwjxpvx;

--
-- Name: pantry; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE pantry (
    id integer NOT NULL,
    name text NOT NULL,
    person_id integer NOT NULL
);


ALTER TABLE pantry OWNER TO uswaoyvcwjxpvx;

--
-- Name: person; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE person (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE person OWNER TO uswaoyvcwjxpvx;

--
-- Name: recipe; Type: TABLE; Schema: public; Owner: uswaoyvcwjxpvx
--

CREATE TABLE recipe (
    id integer NOT NULL,
    name text NOT NULL,
    directions text
);


ALTER TABLE recipe OWNER TO uswaoyvcwjxpvx;

--
-- Data for Name: category; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY category (id, name) FROM stdin;
\.


--
-- Data for Name: ingredient; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY ingredient (id, name, quantity, unit, recipe_id) FROM stdin;
\.


--
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY item (id, name, expdate, quantity, pantry_id) FROM stdin;
\.


--
-- Data for Name: itemcategory; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY itemcategory (id, item_id, category_id) FROM stdin;
\.


--
-- Data for Name: pantry; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY pantry (id, name, person_id) FROM stdin;
\.


--
-- Data for Name: person; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY person (id, name) FROM stdin;
\.


--
-- Data for Name: recipe; Type: TABLE DATA; Schema: public; Owner: uswaoyvcwjxpvx
--

COPY recipe (id, name, directions) FROM stdin;
\.


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
-- Name: pantry pantry_pkey; Type: CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY pantry
    ADD CONSTRAINT pantry_pkey PRIMARY KEY (id);


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
-- Name: ingredient ingredient_recipe_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY ingredient
    ADD CONSTRAINT ingredient_recipe_id_fkey FOREIGN KEY (recipe_id) REFERENCES recipe(id);


--
-- Name: item item_pantry_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY item
    ADD CONSTRAINT item_pantry_id_fkey FOREIGN KEY (pantry_id) REFERENCES pantry(id);


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
-- Name: pantry pantry_person_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: uswaoyvcwjxpvx
--

ALTER TABLE ONLY pantry
    ADD CONSTRAINT pantry_person_id_fkey FOREIGN KEY (person_id) REFERENCES person(id);


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

