package router

import (
	"config/routes"

	"github.com/gorilla/mux"
)

// NewRouter new router
func NewRouter() *mux.Router {
	router := mux.NewRouter().StrictSlash(true)
	for _, route := range routes.AllRoutes {
		router.Name(route.Name).Methods(route.Method).Path(route.Path).Handler(route.Handler)
	}
	return router
}
