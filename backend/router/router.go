package router

import (
	"github.com/gorilla/mux"
	"go-api/controller"
)

func Router() *mux.Router {
	r := mux.NewRouter()
	r.HandleFunc("/produtos", controller.GetProdutos).Methods("GET")
	r.HandleFunc("/produtos/{id}", controller.GetProduto).Methods("GET")
	r.HandleFunc("/produtos", controller.CreateProduto).Methods("POST")
	r.HandleFunc("/produtos/{id}", controller.UpdateProduto).Methods("PUT")
	r.HandleFunc("/produtos/{id}", controller.DeleteProduto).Methods("DELETE")
	return r
}
