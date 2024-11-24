package model

type Produto struct {
	ID              int     `json:"id"`
	Nome            string  `json:"nome"`
	Descricao       string  `json:"descricao"`
	Preco           float64 `json:"preco,string"`
	Categoria       string  `json:"categoria"`
	DataCriacao     string  `json:"data_criacao"`
	DataAtualizacao string  `json:"data_atualizacao"`
}

type Produtos []Produto
