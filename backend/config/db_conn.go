package config

import (
	"database/sql"
	_ "github.com/go-sql-driver/mysql"
	_ "github.com/joho/godotenv/autoload"
	"os"
)

var dbConn, hostname, database, username, password string

func initProps() {
	dbConn = os.Getenv("DB_CONNECTION")
	hostname = os.Getenv("DB_HOSTNAME")
	database = os.Getenv("DB_DATABASE")
	username = os.Getenv("DB_USERNAME")
	password = os.Getenv("DB_PASSWORD")
}

func Connection() *sql.DB {
	initProps()
	db, err := sql.Open(dbConn, username+":"+password+"@tcp("+hostname+")/"+database)
	if err != nil {
		panic(err.Error())
	}
	return db
}
