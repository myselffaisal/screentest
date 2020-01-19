package routes

import (
	"controllers/userscontroller"
	"net/http"
)

// Route route
type Route struct {
	Name    string
	Method  string
	Path    string
	Handler http.HandlerFunc
}

// Routes routes
type Routes []Route

// AllRoutes all routes
var AllRoutes = Routes{
	Route{
		Name:    "index",
		Method:  "GET",
		Path:    "/",
		Handler: userscontroller.Index,
	},
	Route{
		Name:    "create",
		Method:  "POST",
		Path:    "/create",
		Handler: userscontroller.Create,
	},
	Route{
		Name:    "update",
		Method:  "PUT",
		Path:    "/update",
		Handler: userscontroller.Update,
	},
	Route{
		Name:    "delete",
		Method:  "DELETE",
		Path:    "/delete",
		Handler: userscontroller.Delete,
	},
}
