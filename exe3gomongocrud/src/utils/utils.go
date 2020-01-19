package utils

import (
	"os"

	"github.com/joho/godotenv"
)

// GetEnv get env
func GetEnv(key string) string {
	err := godotenv.Load()
	return map[bool]string{true: os.Getenv(key), false: ""}[err == nil]
}
