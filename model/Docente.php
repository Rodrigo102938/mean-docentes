<?php

    Class Docente {

        /* ATRIBUTOS */
        private String $primerNombre;
        private String $segundoNombre;
        private String $primerApellido;
        private String $segundoApellido;
        private String $edad;

        /* CONSTRUCTORES */
        public function __construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $edad) {
            $this->primerNombre = $primerNombre;
            $this->segundoNombre = $segundoNombre;
            $this->primerApellido = $primerApellido;
            $this->segundoApellido = $segundoApellido;
            $this->edad = $edad;
        }

        /* GETTER */
        public function getPrimerNombre(): String{
            return $this->primerNombre;
        }
        public function getSegundoNombre(): String{
            return $this->segundoNombre;
        }
        public function getPrimerApellido(): String{
            return $this->primerApellido;
        }
        public function getSegundoApellido(): String{
            return $this->segundoApellido;
        }
        public function getEdad(): String{
            return $this->edad;
        }

        /* SETTER */
        public function setPrimerNombre($primerNombre){
            $this->primerNombre = $primerNombre;
        }
        public function setSegundoNombre($segundoNombre){
            $this->segundoNombre = $segundoNombre;
        }
        public function setPrimerApellido($primerApellido){
            $this->primerApellido = $primerApellido;
        }
        public function setSegundoApellido($segundoApellido){
            $this->segundoApellido = $segundoApellido;
        }
        public function setEdad($edad){
            $this->edad = $edad;
        }
    }

?>