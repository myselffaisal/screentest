package db

import (
	"utils"

	mgo "gopkg.in/mgo.v2"
)

var db *mgo.Database

// GetConnection get connection
func GetConnection() *mgo.Database {
	if db == nil {
		session, _ := mgo.Dial(utils.GetEnv("MONGO"))
		db = session.DB(utils.GetEnv("DB_NAME"))
	}
	return db
}
