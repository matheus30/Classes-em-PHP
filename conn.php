<?php
	/**
	* Autor: Matheus Felipe
	* Class para conexão com o banco de dados MySQL usando msqli
	* Public: cin.ufpe.br/~mflm
	* e-mail: mflm@cin.ufpe.br
	*/

	/* 
	A Class conn pode ser uma dor de cabeça se não for feito um tratamento de entrada de dados, até porque a var $sql não tem tratamento.
	E os metodos são privados só pode ser usados e visto dessa classe, as que herda ela que só vão poder usar a query, lá deve ser feito
	os tratamentos contra inject. Bem espero ter ajudado, para quem esta começando essa é uma otima class para o apredizado, qualquer duvida
	ou sujestão é só entra no git :).
	*/
	class conn{

		Private $_local = "localhost"; // localdo onde o banco esta, IP ou endereço.
		Private $_user  = "root"; // o usuário padrão
		Private $_pass  = ""; // senha padrão
		Private $_db    = "NomeDoBanco"; // nome do banco de dados
		private $_con  = NULL;
		private $_query = NULL;

		Public function __construct(){// Quando o objeto é criado já é chamado uma conexão com o banco de dados.
			$this->_con = new msqli($this->_local,$this->_user,$this->_pass,$this->_db);
			if($_con->connect_errno){// se de error ela retorna a mensagem.
				echo "<h1>Erro 01: verifique a conexao com o banco de dados.</h1>"; // <- Error 01, quando a conexão falha.
			}
		}

		Protected query($sql){// função simples para 
			$this->_query = $con->query($sql);
			return $this->_query;
		}

		// Mais informações -> http://php.net/manual/pt_BR/language.oop5.decon.php AND http://php.net/manual/pt_BR/language.oop5.overloading.php
		Public function __destruct(){// Quando o objeto e destruido a conexão e fechada evitando sobrecarga no servidor.
			$this->_con = close();
		}
	}
?>
