<?php


class Paciente
{
    private ?int $id;
    private string $nome;
    private string $cpf;
    private string $sexo;
    private string $dtNascimento;
    private string $telefone;
    private string $email;
    private string $queixaPrincipal;
    private string $valorSecao;
    private ?string $dtCriacao;


    public function __construct(?int $id, string $nome, string $cpf, string $sexo, string $dtNascimento, 
    string $telefone, string $email, string $queixaPrincipal, string $valorSecao, ?string $dtCriacao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->dtNascimento = $dtNascimento;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->queixaPrincipal = $queixaPrincipal;
        $this->valorSecao = $valorSecao;
        $this->dtCriacao = $dtCriacao;
    }
     

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of cpf
         */ 
        public function getCpf()
        {
                return $this->cpf;
        }

        /**
         * Set the value of cpf
         *
         * @return  self
         */ 
        public function setCpf($cpf)
        {
                $this->cpf = $cpf;

                return $this;
        }

        /**
         * Get the value of sexo
         */ 
        public function getSexo()
        {
                return $this->sexo;
        }

        /**
         * Set the value of sexo
         *
         * @return  self
         */ 
        public function setSexo($sexo)
        {
                $this->sexo = $sexo;

                return $this;
        }

        /**
         * Get the value of dtNas
         */ 
        public function getDtNas()
        {
                return $this->dtNascimento;
        }

        /**
         * Set the value of dtNas
         *
         * @return  self
         */ 
        public function setDtNas($dtNascimento)
        {
                $this->dtNas = $dtNascimento;

                return $this;
        }

        /**
         * Get the value of telefone
         */ 
        public function getTelefone()
        {
                return $this->telefone;
        }

        /**
         * Set the value of telefone
         *
         * @return  self
         */ 
        public function setTelefone($telefone)
        {
                $this->telefone = $telefone;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of descrcao
         */ 
        public function getQueixa()
        {
                return $this->queixaPrincipal;
        }

        /**
         * Set the value of descrcao
         *
         * @return  self
         */ 
        public function setQueixa($queixaPrincipal)
        {
                $this->queixaPrincipal = $queixaPrincipal;

                return $this;
        }

        /**
         * Get the value of preco
         */ 
       

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of dtCriacao
         */ 
        public function getDtCriacao()
        {
                return $this->dtCriacao;
        }

        /**
         * Set the value of dtCriacao
         *
         * @return  self
         */ 
        public function setDtCriacao($dtCriacao)
        {
                $this->dtCriacao = $dtCriacao;

                return $this;
        }

        /**
         * Get the value of valorSecao
         */ 
       

        /**
         * Get the value of valorSecao
         */ 
        public function getValorSecao()
        {
                return $this->valorSecao;
        }

        /**
         * Set the value of valorSecao
         *
         * @return  self
         */ 
        public function setValorSecao($valorSecao)
        {
                $this->valorSecao = $valorSecao;

                return $this;
        }
}