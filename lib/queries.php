<?php

function get_carpetas($idUsuario) {
    $query = SQLite::getInstance()->query('SELECT * FROM TbCarpeta where IdUsuario=:idUsuario');
    $query->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
    //return $query->fetchAll();
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_integrantes($idGrupo) {
    $query = SQLite::getInstance()->query('SELECT * FROM tbUsuario where idUsuario in(select idUsuario from tbUsuariosXgrupo where idgrupo=:idGrupo)');
    $query->bindValue(':idGrupo', $idGrupo, PDO::PARAM_INT);
    //return $query->fetchAll();
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_carpetasXetiqueta($idetiqueta) {
    $query = SQLite::getInstance()->query('SELECT * FROM tbCarpeta where idCarpeta in(SELECT idCarpeta FROM tbetiquetasxcarpeta where idetiqueta=:idetiqueta)');
    $query->bindValue(':idetiqueta', $idetiqueta, PDO::PARAM_INT);
    //return $query->fetchAll();
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}


function get_integrante($idIntegrante) {
    $query = SQLite::getInstance()->query('SELECT * FROM tbUsuario where idUsuario =:idIntegrante');
    $query->bindValue(':idIntegrante', $idIntegrante, PDO::PARAM_INT);
    //return $query->fetchAll();
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_archivos($idCarpeta) {
    $query = SQLite::getInstance()->query('SELECT * FROM TbDocumento where IdCarpeta=:idCarpeta');
    $query->bindValue(':idCarpeta', $idCarpeta, PDO::PARAM_INT);
    //return $query->fetchAll();
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function get_grupos() {
    $query = SQLite::getInstance()->query("SELECT * FROM TbGrupo");
    return $query->fetchAll();
}

function get_etiquetas() {
    $query = SQLite::getInstance()->query("SELECT * FROM TbEtiqueta");
    return $query->fetchAll();
}

function get_categories() {
    $query = SQLite::getInstance()->query("SELECT * FROM mailbox");
    return $query->fetchAll();
}

function get_items_bycat($pos) {
    $query = SQLite::getInstance()->prepare("SELECT * FROM mailmessage WHERE cat_id=:pos");
    $query->bindValue(':pos', strval($pos), PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll();
}

function get_detail_bypos($pos) {
    $query = SQLite::getInstance()->prepare("SELECT * FROM mailmessage WHERE rowid=:pos");
    $query->bindValue(':pos', strval($pos), PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
