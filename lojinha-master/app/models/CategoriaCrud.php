<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 26/02/2018
 * Time: 11:27
 */

require_once 'Conexao.php';
require 'Categoria.php';

class CategoriaCrud
{
    private $conexao;
    private $categoria;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getCategoria($id){
        $consulta = $this->conexao->query("select * from categoria where id_categoria=".$id);
        $categoria = $consulta->fetch(PDO::FETCH_ASSOC);

        return new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria'], $categoria['id_categoria']);
    }

    public function getCategorias(){
        $consulta = $this->conexao->query("select * from categoria");
        $categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $listaCategorias = [];
        foreach ($categorias as $categoria){
            $listaCategorias[] = new Categoria($categoria['nome_categoria'], $categoria['descricao_categoria'], $categoria['id_categoria']);
        }
        return $listaCategorias;

    }

    public function altera(Categoria $categoria){
        $sql = "update categoria set nome_categoria='".$categoria->getNome()."', descricao_categoria='".$categoria->getDescricao()."' where id_categoria=".$categoria->getId();
        $this->conexao->exec($sql);
   }

   public function insere(Categoria $categoria){
        $sql = "insert into categoria (nome_categoria, descricao_categoria) values ('".$categoria->getNome()."', '".$categoria->getDescricao()."')";
        $this->conexao->exec($sql);

   }

   public function exclui($id){
        $sql = "delete from categoria where id_categoria=".$id;
        $this->conexao->exec($sql);
   }
}
