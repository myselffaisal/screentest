package controller

import (
	"encoding/json"
	"net/http"
)

// RespondWithError res
func RespondWithError(w http.ResponseWriter, code int, msg string) {
	ResponseWithJSON(w, code, map[string]string{"error": msg})
}

// ResponseWithJSON response with json
func ResponseWithJSON(w http.ResponseWriter, code int, payload interface{}) {
	response, _ := json.Marshal(payload)
	w.Header().Set("Content-Type", "application/json")
	w.WriteHeader(code)
	w.Write(response)
}
