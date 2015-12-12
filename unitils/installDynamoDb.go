// To download DynamoDb file on the internet
package main

import (
	_ "errors"
	_ "io"
	"log"
	_ "net/http"
	"os"

	"net/http"
)

func main() {

}

func download(url string) {

	res, err := http.Get(url)

	if err != nil {

		panic(err)
	}

	defer res.Body.Close()
}

func directoryIsExist(name string) bool {

	file, err := os.Open(name)

	defer file.Close()

	if err != nil {

		return true
	}

	return false
}

// create directory
func createDirectory(name string) error {

	return os.Mkdir(name, 655)
}
