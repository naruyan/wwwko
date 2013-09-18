DROP TABLE IF EXISTS cm_mailinglist;

CREATE TABLE cm_mailinglist
(
    id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    term        INT UNSIGNED NOT NULL,
    email       VARCHAR(200),

    PRIMARY KEY(id),
    UNIQUE email_idx(email)
);

