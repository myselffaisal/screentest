package userscontroller

import (
	"controllers/controller"
	"encoding/json"
	"models/users"
	"net/http"

	"gopkg.in/mgo.v2/bson"
)

// Index index
func Index(w http.ResponseWriter, r *http.Request) {
	var u users.Users
	users, err := u.GetAllUsers()
	if err != nil {
		controller.RespondWithError(w, http.StatusInternalServerError, err.Error())
		return
	}
	controller.ResponseWithJSON(w, http.StatusOK, users)
}

// Create create
func Create(w http.ResponseWriter, r *http.Request) {
	defer r.Body.Close()
	var user users.Users
	if err := json.NewDecoder(r.Body).Decode(&user); err != nil { // not valid data struct
		controller.RespondWithError(w, http.StatusBadRequest, "Invalid Request")
	}
	user.ID = bson.NewObjectId()
	if err := user.Create(); err != nil { // insert to db
		controller.RespondWithError(w, http.StatusInternalServerError, err.Error())
	}

	controller.ResponseWithJSON(w, http.StatusCreated, user)
}

// Update update
func Update(w http.ResponseWriter, r *http.Request) {
	defer r.Body.Close()
	var user users.Users
	if err := json.NewDecoder(r.Body).Decode(&user); err != nil { // invalid data struct
		controller.RespondWithError(w, http.StatusBadRequest, "Invalid Request")
		return
	}
	if err := user.Update(); err != nil { // update to db
		controller.RespondWithError(w, http.StatusInternalServerError, err.Error())
		return
	}
	controller.ResponseWithJSON(w, http.StatusOK, map[string]string{"result": "success"})
}

// Delete delete
func Delete(w http.ResponseWriter, r *http.Request) {
	defer r.Body.Close()
	var user users.Users
	if err := json.NewDecoder(r.Body).Decode(&user); err != nil { // invalid data struct
		controller.RespondWithError(w, http.StatusBadRequest, "Invalid Request")
		return
	}
	if err := user.Delete(); err != nil { // delete user
		controller.RespondWithError(w, http.StatusInternalServerError, err.Error())
		return
	}

	controller.ResponseWithJSON(w, http.StatusOK, map[string]string{"result": "success"})
}
