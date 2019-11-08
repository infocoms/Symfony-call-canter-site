create table migration_versions
(
    version     varchar(14) not null
        primary key,
    executed_at datetime    not null comment '(DC2Type:datetime_immutable)'
)
    collate = utf8mb4_unicode_ci;

create table user
(
    id       int auto_increment
        primary key,
    email    varchar(180)                 not null,
    roles    longtext collate utf8mb4_bin not null,
    password varchar(255)                 not null,
    constraint UNIQ_8D93D649E7927C74
        unique (email),
    constraint roles
        check (json_valid(`roles`))
)
    collate = utf8mb4_unicode_ci;

create table question
(
    id       int auto_increment
        primary key,
    user_id  int                                  not null,
    question varchar(255)                         not null,
    body     longtext                             null,
    views    int      default 0                   not null,
    created  datetime default current_timestamp() not null,
    constraint FK_B6F7494EA76ED395
        foreign key (user_id) references user (id)
)
    collate = utf8mb4_unicode_ci;

create table answer
(
    id          int auto_increment
        primary key,
    user_id     int      not null,
    question_id int      not null,
    body        longtext not null,
    created     datetime not null,
    constraint FK_DADD4A251E27F6BF
        foreign key (question_id) references question (id),
    constraint FK_DADD4A25A76ED395
        foreign key (user_id) references user (id)
)
    collate = utf8mb4_unicode_ci;

create index IDX_DADD4A251E27F6BF
    on answer (question_id);

create index IDX_DADD4A25A76ED395
    on answer (user_id);

create index IDX_B6F7494EA76ED395
    on question (user_id);


