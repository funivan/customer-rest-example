## Requirements
1. Small and simple REST API web service.
2. Customers CRUD 
3. Customer entity fields: id, name, last name, email.

## Endpoints
1. Create customer
2. Read all customers that currently registered in service (without any additional conditions)
3. Update customer by Id
4. Delete customer by id

## Main points:
- The service should follow REST methodology.
- JSON
- Pure PHP without any external library, only standard functionality of PHP.
- PHP 7.1 only.
- Service can be covered with unit tests (optional)

## Additional info: 
- There is no need to implement authentication (we assume that service will be located behind some proxy that manages it)
- Service will use MYSQL as storage for customer data
- Store DB schema in .sql file and code in the archive
- OOP

