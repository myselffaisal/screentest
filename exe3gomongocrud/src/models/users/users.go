package users

import (
	"config/db"

	"gopkg.in/mgo.v2/bson"
)

// Users users
type Users struct {
	ID      bson.ObjectId `bson:"_id" json:"id"`
	Name    string        `bson:"name" json:"name"`
	Email   string        `bson:"email" json:"email"`
	Country string        `bson:"country" json:"country"`
}

// AllUsers users arr
type AllUsers []Users

// TableName table name
func TableName() string {
	return "users"
}

// GetAllUsers get all users
func (u *Users) GetAllUsers() (AllUsers, error) {
	var users AllUsers
	err := db.GetConnection().C(TableName()).Find(bson.M{}).All(&users)
	return users, err
}

// Create create
func (u *Users) Create() error {
	err := db.GetConnection().C(TableName()).Insert(&u)
	return err
}

// Update update
func (u *Users) Update() error {
	err := db.GetConnection().C(TableName()).UpdateId(u.ID, &u)
	return err
}

// Delete delete
func (u *Users) Delete() error {
	err := db.GetConnection().C(TableName()).Remove(u)
	return err
}
