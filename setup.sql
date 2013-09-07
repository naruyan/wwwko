DROP TABLE IF EXISTS cm_settings;
DROP TABLE IF EXISTS cm_members;
DROP TABLE IF EXISTS cm_member_statuses;

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
