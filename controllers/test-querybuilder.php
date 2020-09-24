<?php

$req = new QueryBuilder();

$req->select("user_name")->from("users")->where(["user_email=?","user_password=?"]);
$verif = $req->getSQL();

echo $verif;