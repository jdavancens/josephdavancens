<?php
    class myDB extends SQLite3{
        function __construct()
        {
            $this->open('compositions.db');
        }
    }

    $title = $_POST["title"];
    $year = $_POST["year"];
    $inst = $_POST["instrumentation"];
    $dur = $_POST["duration"];
    $pdf = $_POST["pdf"];
    $sound = $_POST["soundcloud"];
    $desc = $_POST["description"];

    $db = new MyDB();

    $query = "INSERT INTO compositions(title, year, instrumentation, duration,
        pdf, soundcloud, description) VALUES ('%s', '%d', '%s', '%s', '%s',
        '%s', '%s')";

    $query = sprintf($query, $title, $year, $inst, $dur, $pdf, $sound, $desc);

    $db->exec($query);

    $path = $_SERVER['SCRIPT_NAME'];
    $path = str_replace('php','html',$path);
    # echo $path
    header( 'Location: ' . $path );

?>
