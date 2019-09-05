# Rest example

## Create
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

