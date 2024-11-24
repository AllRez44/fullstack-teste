package repository

import (
	"database/sql"
	"go-api/config"
	"go-api/model"
)

func GetProdutoById(id int) (model.Produto, error) {
	db := config.Connection()
	var produto model.Produto
	query, err := db.Query("SELECT * FROM produtos WHERE id = ?", id)
	if err != nil {
		return produto, err
	}
	for query.Next() {
		var descricao, dataAtualizacao sql.NullString
		err = query.Scan(&produto.ID, &produto.Nome, &descricao, &produto.Preco, &produto.Categoria, &produto.DataCriacao, &dataAtualizacao)
		if err != nil {
			return produto, err
		}
		produto.Descricao = descricao.String
		produto.DataAtualizacao = dataAtualizacao.String
	}
	if produto.ID == 0 {
		return produto, sql.ErrNoRows
	}
	return produto, nil
}

func GetProdutos() (model.Produtos, error) {
	db := config.Connection()
	var produtos model.Produtos
	query, err := db.Query("SELECT * FROM produtos")
	if err != nil {
		return produtos, err
	}
	for query.Next() {
		var produto model.Produto
		var descricao, dataAtualizacao sql.NullString
		err = query.Scan(&produto.ID, &produto.Nome, &descricao, &produto.Preco, &produto.Categoria, &produto.DataCriacao, &dataAtualizacao)
		if err != nil {
			return produtos, err
		}
		produto.Descricao = descricao.String
		produto.DataAtualizacao = dataAtualizacao.String
		produtos = append(produtos, produto)
	}
	return produtos, nil
}

func CreateProduto(produto model.Produto) (model.Produto, error) {
	db := config.Connection()
	var newProduto model.Produto
	query, err := db.Prepare("INSERT INTO produtos (nome, descricao, preco, categoria) VALUES (?, ?, ?, ?)")
	if err != nil {
		return newProduto, err
	}
	result, err := query.Exec(produto.Nome, produto.Descricao, produto.Preco, produto.Categoria)
	if err != nil {
		return newProduto, err
	}
	id, err := result.LastInsertId()
	if err != nil {
		return newProduto, err
	}
	newProduto, err = GetProdutoById(int(id))
	if err != nil {
		return newProduto, err
	}
	return newProduto, nil
}

func UpdateProduto(produto model.Produto) (model.Produto, error) {
	db := config.Connection()
	var newProduto model.Produto
	query, err := db.Prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, categoria = ? WHERE id = ?")
	if err != nil {
		return newProduto, err
	}
	_, err = query.Exec(produto.Nome, produto.Descricao, produto.Preco, produto.Categoria, produto.ID)
	if err != nil {
		return newProduto, err
	}
	newProduto, err = GetProdutoById(produto.ID)
	if err != nil {
		return newProduto, err
	}
	return newProduto, nil
}

func DeleteProduto(id int) error {
	db := config.Connection()
	query, err := db.Prepare("DELETE FROM produtos WHERE id = ?")
	if err != nil {
		return err
	}
	_, err = query.Exec(id)
	if err != nil {
		return err
	}
	return nil
}
