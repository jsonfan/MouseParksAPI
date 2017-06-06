**Parks**
----
* **URL**

  /parks

* **Method:**
*
  `GET`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `[  {
    "name": "Disneyland",
    "short_name": "dlusa",
    "park_id": "330339",
    "resort": "dlr",
    "region": "us",
    "city": "Anaheim",
    "country": "USA",
    "is_intl": 0
  }, ...]`

* **Error Response:**

  * **Code:** 404 <br />
    **Content:** `404 page`


* **Sample Call:**

  ``curl -i -H "Accept: application/json" -H "Content-Type: application/json" localhost:8080/parks``



**Wait Times**
----
Valid parkName requests:

| Park | Location | {shortName}|
| ------------- |:-------------:| --------- |
| Disneyland    | Anaheim, CA | dlusa |
| California Adventure| Anaheim, CA | caladv |  
| Walt Disney World| Orlando, FL | mk|
| Epcot| Orlando, FL| epcot |
| Hollywood Studios| Orlando, FL | hlyst|
| Animal Kingdom| Orlando, FL | ak|
| Shanghai Disneyland | Shanghai, China | sh|
| Hong Kong Disneyland | Hong Kong, China | hk|
| Disneyland Paris | Paris, France | dlp|
| Walt Disney Studios | Paris, France | wdsp |

* **URL**

  /parks/:shortName/wait

* **Method:**
*
  `GET`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ links, offset, limit, total, entries, region }`

* **Error Response:**

  * **Code:** 404 <br />
    **Content:** `404 page`


* **Sample Call:**

  ``curl -i -H "Accept: application/json" -H "Content-Type: application/json" localhost:8080/parks/dlusa/wait``




**Attraction Info**
----

* **URL**

  /ride/:rideId/region/:region

* **Method:**
*
  `GET`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `{ links, id, name, urlFriendlyId, descriptions, admissionRequired, disneyOwned, disneyOperated, coordiantes, media, type, webLinks, facets, ancestorDestination, accessibilities, services, fastPassPlus, fastPass, riderSwapAvailable }`

* **Error Response:**
  * **Code:** 404 <br />
    **Content:** `404 page`

* **Sample Call:**

    ``curl -i -H "Accept: application/json" -H "Content-Type: application/json" localhost:8080/ride/attMeetDroidFriends;entityType=Attraction;destination=shdr/region/cn``
