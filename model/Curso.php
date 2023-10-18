<?php

class Curso
{

    /* ATRIBUTOS */
    private String $nombreCurso;
    private String $lugarCurso;
    private String $id_docente;

    /* CONSTRUCTORES */
    public function __construct($nombreCurso, $lugarCurso, $id_docente)
    {
        $this->nombreCurso = $nombreCurso;
        $this->lugarCurso = $lugarCurso;
        $this->id_docente = $id_docente;
    }

    /* GETTER */
    public function getNombreCurso(): String
    {
        return $this->nombreCurso;
    }
    public function getLugarCurso(): String
    {
        return $this->lugarCurso;
    }
    public function getIdDocente(): String
    {
        return $this->id_docente;
    }

    /* SETTER */
    public function setNombreCurso($nombreCurso)
    {
        $this->nombreCurso = $nombreCurso;
    }
    public function setLugarCurso($lugarCurso)
    {
        $this->lugarCurso = $lugarCurso;
    }
    public function setIdDocente($id_docente)
    {
        $this->id_docente = $id_docente;
    }
}
