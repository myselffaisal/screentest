1. Run below command before starting
sh init.sh

2. Get all users
curl -X GET http://localhost:8888

3. Create user
curl -i -H "Content-Type: application/json" -X POST -d '{"name":"John Doe","email":"johndoe@yopmail.com", "country": "US"}' http://localhost:8888/create

4. Update user
curl -i -H "Content-Type: application/json" -X PUT -d '{"id":"5e24284fc3f955605b568e4c","name":"Updated John Doe","email":"edites@gmail.com"}' http://localhost:8888/update

5. Delete user
curl -i -H "Content-Type: application/json" -X DELETE -d '{"id":"5e24284fc3f955605b568e4c","name":"Updated John Doe","email":"edites@gmail.com"}' http://localhost:8888/delete