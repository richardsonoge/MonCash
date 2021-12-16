# API REST MonCash
Vous pouvez choisir l'option de votre choix

# Introduction
Use the MonCash REST API to easily and securely accept payments from your website
or mobile app. This Rest API contains resources to Create Payment, Retrieve details of
payment using the MonCash Transaction Id or your order Id.

# Rest API HOST
HOST_REST_API can be moncashbutton.digicelgroup.com/Api for live and
sandbox.moncashbutton.digicelgroup.com/Api for test.

# MonCash Gateway Base URL
The GATEWAY_BASE can be https://moncashbutton.digicelgroup.com/Moncash-middleware for live and
https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware for test.

# Authentication
To call the resources of the Rest API MonCash, you must authenticate by including the bearer token in the
Authorization header with the Bearer authentication scheme. The value is Bearer <Access-Token> or Basic
**<client_id>:<client_secret>**. The client_id and client_secret can be generated from the business portal.

## SAMPLE AUTHENTICATION
  **POST** : /oauth/token
  
```Request
curl -X POST https://client_id:client_secret@HOST_REST_API/oauth/token -H "Accept: application/json"
-d "scope=read,write&grant_type=client_credentials"
Response
{
 "access_token": <Access-token>,
 "token_type":"bearer",
 "expires_in":59,
 "scope":"read,write",
 "jti":"the jti"
}
```
 
# Create Payment
To create a payment you must send the orderId and amount as HTTP POST with an
Authorization Bearer Token. The response will be a JSON (or other format) with the
parameters success and redirect URL to load the Payment Gateway of Moncash
Middleware.
 
# Sample Create Payment
**POST** : /v1/CreatePayment
 
 ```
 Request
curl -X POST https://HOST_REST_API/v1/CreatePayment -H 'accept: application/json' -H 'authorization:
Bearer <Access-token> ' -H 'content-type: application/json' -d '{"amount": <amount>, "orderId": <orderId>}'
Response
{
 "path": "/v1/CreatePayment",
 "payment_token": {
 "expired": "2019-05-24 12:46:55:107",
 "created": "2019-05-24 12:36:55:107",
 "token": <payment-token>
 },
 "timestamp": 1558715815122,
 "status": 202
 “mode”: <sandbox or live>
}
```
 
The redirect URL to load the Payment Gateway will be:
**GATEWAY_BASE**+/Payment/Redirect?token=<payment-token>
 
# Payment Details
 
To create a payment you must send the orderId and amount as HTTP POST with an
Authorization Bearer Token. The response will be a JSON (or other format) with the
parameters success and redirect URL to load the Payment Gateway of Moncash
Middleware.
 
To get a payment details from the return URL business script you must send the transactionId and orderId as
HTTP POST with an Authorization Bearer Token. The response will be a JSON (or other format) with the
payment details.
 
## Sample Capture payment by transaction Id
 **POST** : /v1/RetrieveTransactionPayment
 
 ```
 Request
curl -X POST https://HOST_REST_API/v1/ RetrieveTransactionPayment -H 'accept: application/json' -H
'authorization: Bearer <Access-token> ' -H 'content-type: application/json' -d '{ " transactionId": <
transactionId>}'
Response
{
 "path": "/v1/RetrieveTransactionPayment",
 "payment": {
 "reference": "1559796839",
 "transaction_id": "12874820",
 "cost": 10,
 "message": "successful",
 "payer": "50937007294"
 },
 "timestamp": 1560029360970,
 "status": 200
}
```
 # Sample Capture payment by order Id
  **POST** : /v1/RetrieveOrderPayment
 
 ```
 Request
curl -X POST http://HOST_REST_API/v1/RetrieveOrderPayment -H 'accept: application/json' -H
'authorization: Bearer <Access-token> ' -H 'content-type: application/json' -d '{ " orderId": < orderId>}'
Response
{
 "path": "/v1/RetrieveOrderPayment ",
 "payment": {
 "reference": "1559796839",
 "transaction_id": "12874820",
 "cost": 10,
 "message": "successful",
 "payer": "50937007294"
 },
 "timestamp": 1560029360970,
 "status": 200
}
```
 
 # Sample Create Payment
 **POST** : /v1/Transfert
 
 ```
 Request
curl -X POST https://HOST_REST_API/v1/Transfert -H 'accept: application/json' -H 'authorization: Bearer
<Access-token> ' -H 'content-type: application/json' -d '{"amount": <amount>, "receiver ": <Receive
Account>, "desc": <Some description>}'
Response
{
 "path": "/Api/v1/Transfert",
 "transfer": {
 "transaction_id": "Transaction id",
 "amount": 100.0,
 "receiver": "Receiver account",
 "message": "successful",
 "desc": "Test Api Transfer"
 },
 "timestamp": 1589927614388,
 "status": 200
}
```
