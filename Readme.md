# Rest example

## Create customer
Create one customer
```shell script
# request
curl -d '{"customers":[{"email":"test@example.com", "name": "User", "lastName":"Test"}]}' \
 -H "Content-Type: application/json" \
 -X POST http://localhost/v1/customers/
# Response: user ids stored in the db
# < HTTP/1.1 200 OK
# {
#    "ids": [
#        "0f35708d4e33816990867db7f6a44055"
#    ]
 ```
## Update customer
```shell script
# request
curl -d '{"customers":[{"id":"123","email":"test2@example.com", "name": "User", "lastName":"Test"}]}' \
 -H "Content-Type: application/json" \
 -X PUT http://localhost/v1/customers/
# Response: user ids stored in the db
# < HTTP/1.1 200 OK
# {
#    "ids": [
#        "123"
#    ]
 ```

### Delete multiple customers
```shell script
# request
curl -d '{"ids":["a29cccaebbc352c8586aacdbf3c32dd9", "0f35708d4e33816990867db7f6a44055"]}' \
 -H "Content-Type: application/json" \
 -X DELETE http://localhost/v1/customers/
# Response: user ids deleted from the db
# < HTTP/1.1 200 OK
# {
#    "ids": [
#        "a29cccaebbc352c8586aacdbf3c32dd9",
#        "0f35708d4e33816990867db7f6a44055"
#    ]
 ```
## Fetch customers
```shell script
curl -X GET http://localhost/v1/customers/
curl -X GET http://localhost/v1/customers/?offset=2&size=2
curl -X GET http://localhost/v1/customers/?offset=4&size=4
 ```
