# Rest example

## Create
Create customer
```shell script
curl -d '{"customers":[{"email":"test@example.com", "name": "User", lastName:"Test"}]}' -H "Content-Type: application/json" \
 -X POST http://localhost/v1/customers/
 ```

