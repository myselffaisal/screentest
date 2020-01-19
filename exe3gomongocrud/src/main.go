package main

import (
	"config/router"
	"log"
	"net/http"
	"utils"
)

func main() {
	router := router.NewRouter()
	log.Fatal(http.ListenAndServe(":"+utils.GetEnv("LISTEN"), router))
}
