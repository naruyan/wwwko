DROP TABLE IF EXISTS cm_settings;
DROP TABLE IF EXISTS cm_members;
DROP TABLE IF EXISTS cm_member_statuses;
DROP TABLE IF EXISTS cm_inventory;
DROP TABLE IF EXISTS cm_inventory_alternate_names;
DROP TABLE IF EXISTS cm_items;
DROP TABLE IF EXISTS cm_locations;
DROP TABLE IF EXISTS cm_location_types;
DROP TABLE IF EXISTS cm_prices;
DROP TABLE IF EXISTS cm_item_prices;
DROP TABLE IF EXISTS cm_sales;
DROP TABLE IF EXISTS cm_sales_items;
DROP TABLE IF EXISTS cm_receipts;
DROP TABLE IF EXISTS cm_receipt_items;
DROP TABLE IF EXISTS cm_pages;

CREATE TABLE cm_settings
(
    id      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name    VARCHAR(100) NOT NULL,
    value   VARCHAR(100) NOT NULL,

    PRIMARY KEY(id),
    UNIQUE name_idx(name)
);

INSERT INTO cm_settings (name, value) VALUES ('term', '64');

CREATE TABLE cm_members
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    term        INT UNSIGNED NOT NULL,
    number      VARCHAR(100) CHARACTER SET 'utf8' NOT NULL, -- Allow all possible 'numbers' due to tradition
    name        VARCHAR(100) NOT NULL,
    email       VARCHAR(200),
    active      TINYINT NOT NULL DEFAULT 0,
    status      INT NOT NULL DEFAULT 0,
    forum_uid   INT UNSIGNED,

    PRIMARY KEY(id),
    UNIQUE term_number_idx(term, number)
);

CREATE TABLE cm_member_statuses
(
    id      INT UNSIGNED NOT NULL,
    status  VARCHAR(100) NOT NULL,

    PRIMARY KEY(id)
);

INSERT INTO cm_member_statuses (id, status) VALUES (0, 'Member');
INSERT INTO cm_member_statuses (id, status) VALUES (1, 'Honourary');
INSERT INTO cm_member_statuses (id, status) VALUES (2, 'Officer');
INSERT INTO cm_member_statuses (id, status) VALUES (3, 'Executive');

CREATE TABLE cm_inventory
(
    id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name            VARCHAR(200) NOT NULL,
    description     VARCHAR(1000),
    quantity        INT NOT NULL DEFAULT 0,
    concessions     TINYINT NOT NULL DEFAULT 0,
    prizes          TINYINT NOT NULL DEFAULT 0,

    PRIMARY KEY(id),
    UNIQUE name_idx(name),
    INDEX concessions_idx(concessions),
    INDEX prizes_idx(prizes)
);

CREATE TABLE cm_inventory_alternate_names
(
    id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
    inventory_id    INT UNSIGNED NOT NULL,
    name            VARCHAR(200) NOT NULL,

    PRIMARY KEY(id),
    INDEX inventory_idx(inventory_id),
    UNIQUE name_idx(name)
);

CREATE TABLE cm_items
(
    id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
    inventory_id    INT UNSIGNED NOT NULL,
    description     VARCHAR(200),
    quantity        INT NOT NULL DEFAULT 0,
    value           DECIMAL(5,2),
    location        INT UNSIGNED DEFAULT 0,

    PRIMARY KEY(id),
    INDEX inventory_idx(inventory_id),
    INDEX location_idx(location)
);

CREATE TABLE cm_locations
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name        VARCHAR(200) NOT NULL,
    description VARCHAR(1000),
    type        INT UNSIGNED,

    PRIMARY KEY(id),
    INDEX name_idx(name),
    INDEX type_idx(type)
);

CREATE TABLE cm_location_types
(
    id      INT UNSIGNED NOT NULL,
    type    VARCHAR(200) NOT NULL,

    PRIMARY KEY(id)
);

INSERT INTO cm_location_types (id, type) VALUES (0, 'Storage');
INSERT INTO cm_location_types (id, type) VALUES (1, 'Show Room');
INSERT INTO cm_location_types (id, type) VALUES (2, 'Event Room');
INSERT INTO cm_location_types (id, type) VALUES (3, 'Outside');
INSERT INTO cm_location_types (id, type) VALUES (4, 'Other');

CREATE TABLE cm_prices
(
    id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
    inventory_id    INT UNSIGNED NOT NULL,
    price           DECIMAL(5,2) NOT NULL DEFAULT 0.00,
    selective       TINYINT NOT NULL DEFAULT 0,
    code            INT UNSIGNED,

    PRIMARY KEY(id),
    INDEX inventory_idx(inventory_id)
);

CREATE TABLE cm_item_prices
(
    price_id    INT UNSIGNED NOT NULL,
    item_id     INT UNSIGNED NOT NULL,

    PRIMARY KEY(price_id, item_id)
);

CREATE TABLE cm_sales
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    total_price DECIMAL(5,2) NOT NULL DEFAULT 0.00 ,
    seller      INT UNSIGNED,
    buyer       INT UNSIGNED,

    PRIMARY KEY(id),
    INDEX seller_idx(seller),
    INDEX buyer_idx(buyer)
);

CREATE TABLE cm_sales_items
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    sale        INT UNSIGNED NOT NULL,
    item        INT UNSIGNED NOT NULL,
    total_price DECIMAL(5,2) NOT NULL DEFAULT 0.00,
    quantity    INT NOT NULL DEFAULT 0,

    PRIMARY KEY(id),
    INDEX sale_idx(sale),
    INDEX item_idx(item)
);

CREATE TABLE cm_receipts
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    buyer_name  VARCHAR(100),
    buyer_id    INT UNSIGNED,
    reimbursed  TINYINT NOT NULL DEFAULT 0,

    PRIMARY KEY (id),
    INDEX name_idx(buyer_name),
    INDEX id_idx(buyer_id)
);

CREATE TABLE cm_receipt_items
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    receipt     INT UNSIGNED NOT NULL,
    item        INT UNSIGNED NOT NULL,
    value       DECIMAL(5,2) NOT NULL DEFAULT 0.00,

    PRIMARY KEY(id),
    INDEX receipt_idx(receipt),
    INDEX item_idx(item)
);

CREATE TABLE cm_pages
(
    name        VARCHAR(200) NOT NULL,
    content     TEXT,
    read_perm   INT UNSIGNED NOT NULL,
    write_perm  INT UNSIGNED NOT NULL,

    PRIMARY KEY(name)
);
