package router

import "net/http"

func Start() {
	r := Router()
	http.ListenAndServe(":8080", r)
}
