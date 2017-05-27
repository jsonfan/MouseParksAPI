**Wait Times**
----
Valid parkName requests:

| Park | Location | {parkName}|
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

  /wait/:parkName

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

  ``curl -i -H "Accept: application/json" -H "Content-Type: application/json" localhost:8080/wait/dlusa``




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
