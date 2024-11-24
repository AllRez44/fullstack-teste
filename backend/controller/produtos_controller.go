package controller

import (
	"encoding/json"
	"fmt"
	"github.com/gorilla/mux"
	"go-api/model"
	"go-api/repository"
	"net/http"
	"strconv"
)

var produto model.Produto
var produtos []model.Produto

func GetProduto(w http.ResponseWriter, r *http.Request) {
	params := mux.Vars(r)
	id := params["id"]
	if id == "" {
		http.Error(w, "Id é obrigatório", http.StatusBadRequest)
		return
	}
	parsedId, err := strconv.Atoi(id)
	if err != nil {
		http.Error(w, "Id deve ser um número", http.StatusBadRequest)
		return
	}
	produto, err := repository.GetProdutoById(parsedId)
	if err != nil {
		if err.Error() == "sql: no rows in result set" {
			http.Error(w, "Produto não encontrado", http.StatusNotFound)
			return
		}
		http.Error(w, "Ocorreu um erro interno no servidor", http.StatusInternalServerError)
		return
	}
	json.NewEncoder(w).Encode(produto)
}

func GetProdutos(w http.ResponseWriter, r *http.Request) {
	produtos, err := repository.GetProdutos()
	if err != nil {
		http.Error(w, "Ocorreu um erro interno no servidor", http.StatusInternalServerError)
		return
	}
	if len(produtos) == 0 {
		http.Error(w, "Nenhum produto encontrado", http.StatusNoContent)
		return
	}
	json.NewEncoder(w).Encode(produtos)
}

func CreateProduto(w http.ResponseWriter, r *http.Request) {
	_ = json.NewDecoder(r.Body).Decode(&produto)
	if produto.Nome == "" || produto.Descricao == "" || produto.Preco == 0 || produto.Categoria == "" {
		http.Error(w, "Campos obrigatórios não preenchidos", http.StatusBadRequest)
		return
	}
	newProduto, err := repository.CreateProduto(produto)
	if err != nil {
		http.Error(w, "Ocorreu um erro interno no servidor", http.StatusInternalServerError)
		return
	}
	json.NewEncoder(w).Encode(newProduto)
}

func UpdateProduto(w http.ResponseWriter, r *http.Request) {
	params := mux.Vars(r)
	id := params["id"]
	if id == "" {
		http.Error(w, "Id é obrigatório", http.StatusBadRequest)
		return
	}
	parsedId, err := strconv.Atoi(id)
	if err != nil {
		http.Error(w, "Id deve ser um número", http.StatusBadRequest)
	}
	_ = json.NewDecoder(r.Body).Decode(&produto)
	if produto.Nome == "" || produto.Descricao == "" || produto.Preco == 0 || produto.Categoria == "" {
		http.Error(w, "Campos obrigatórios não preenchidos", http.StatusBadRequest)
		return
	}
	produto.ID = parsedId
	newProduto, err := repository.UpdateProduto(produto)
	if err != nil {
		if err.Error() == "sql: no rows in result set" {
			http.Error(w, "Produto não encontrado", http.StatusNotFound)
			return
		}
		http.Error(w, "Ocorreu um erro interno no servidor", http.StatusInternalServerError)
		return
	}
	json.NewEncoder(w).Encode(newProduto)
}

func DeleteProduto(w http.ResponseWriter, r *http.Request) {
	params := mux.Vars(r)
	id := params["id"]
	if id == "" {
		http.Error(w, "Id é obrigatório", http.StatusBadRequest)
		return
	}
	parsedId, err := strconv.Atoi(id)
	if err != nil {
		http.Error(w, "Id deve ser um número", http.StatusBadRequest)
		return
	}
	produto, err := repository.GetProdutoById(parsedId)
	fmt.Println(produto)
	if err != nil {
		if err.Error() == "sql: no rows in result set" {
			http.Error(w, "Produto não encontrado", http.StatusNotFound)
			return
		}
		http.Error(w, "Ocorreu um erro interno no servidor", http.StatusInternalServerError)
		return
	}
	err = repository.DeleteProduto(produto.ID)
	if err != nil {
		if err.Error() == "sql: no rows in result set" {
			http.Error(w, "Produto não encontrado", http.StatusNotFound)
			return
		}
		http.Error(w, "Ocorreu um erro interno no servidor", http.StatusInternalServerError)
		return
	}
	w.Write([]byte("Produto deletado com sucesso"))
}
