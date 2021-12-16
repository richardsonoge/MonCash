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
 "jti":"t
```
