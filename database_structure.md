# Itemizer backend database structure

## Table: api_keys

- id (int, primary, auto_increment)
- apikey (text)
- status (text)

## Table: categories

- id (int, primary, auto_increment)
- category (text)

## Table: items

- id (int, primary, auto_increment)
- category (int)
- name (text)
- qty (int)
- note (text)
- out_of_storage (boolean/tinyint)