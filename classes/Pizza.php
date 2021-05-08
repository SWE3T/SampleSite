<?php
    class Pizza{
        private $tamanho;
        private $sabores; // array(cod, nome)
        private $borda;

        public function getTamanho(){
            switch($this->tamanho){
                case "p":
                    return "Piccola";
                    break;    
                case "m":
                    return "Media";
                    break; 
                case "g":
                    return "Grandi";
                    break; 
                case "gg":
                    return "Gigante";
                    break;                                                                                  
            }
        }

        public function setTamanho($tamanho){
            $this->tamanho = $tamanho;
        }

        public function getSabores(){
            return $this->sabores;
        }

        public function setSabores($sabores){ 
            $this->sabores = $sabores;
        }

        public function getListaSabores(){ // formato textual 
            $str = "";
            foreach($this->sabores as $s)
                $str .=$s[1].", "; // separa por virgula e espaço
             
            return substr($str, 0, strlen($str)-2); // retira ultima virgula e espaço
        }        

        public function getBorda(){
            return $this->borda;
        }

        public function setBorda($borda){
            $this->borda = $borda;
        }  
        
        public function getPreco(){
            switch($this->tamanho){
                case "p":
                    return 15;
                    break;    
                case "m":
                    return 18;
                    break; 
                case "g":
                    return 22;
                    break; 
                case "gg":
                    return 27;
                    break;                                                                                  
            }
        }
    }
?>