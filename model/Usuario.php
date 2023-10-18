<?php

    Class Usuario {

        /* ATRIBUTOS */
        private String $primerNombre;
        private String $segundoNombre;
        private String $primerApellido;
        private String $segundoApellido;
        private String $email;
        private String $contrasena;

        /* CONSTRUCTORES */
        public function __construct($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $email, $contrasena) {
            $this->primerNombre = $primerNombre;
            $this->segundoNombre = $segundoNombre;
            $this->primerApellido = $primerApellido;
            $this->segundoApellido = $segundoApellido;
            $this->email = $email;
            $this->contrasena = $contrasena;
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
        public function getEmail(): String{
            return $this->email;
        }
        public function getContrasena(): String{
            return $this->contrasena;
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
        public function setEmail($email){
            $this->email = $email;
        }
        public function setContrasena($contrasena){
            $this->contrasena = $contrasena;
        }

    }

?>