# TVDB api
This is based on my default template for connecting with external API's. I have implemented a few methods from the TVDB api and offer that up as a base for anyone who wants to continue working on it.

 Below is a description of the components used as well. Inside the repository are also a number of example files that can be used. Of course to use any of these you need to get your own API key.

## Credentials
I always seperate the credentials used for authentication in it's own class. The reason for this is because credentials can come from many different places like a settings.ini file(this is the method I use in the provided examples), a php file or even a cloud service like vault.

```
settings.ini file

apikey = ''
```

## Authentication
The authentication class requires the credentials class to do an actual authentication request. This can be anything ranging from oauth to a simple curl request depending on the API. I want to encapsulate that logic in it's own class.

## Requests
A request will always require an Authentication object and a Client (i tend to go with Guzzle). The Request is a base class that can't really run on it's own because it requires methods from classes that extend it to function. The Request class is really nothing more than a holder for the paramaters that depends on a few abstract methods to connect Authentication and Client together.

 If we then take a look at RequestSearch you can see that it extends Request and implements an interface. These classes(RequestSearch, RequestSeries and RequestSeriesEpisodes) are very small in setup, because all they have to do now is tell which API call to execute, what method to use and which paramaters are required by default.

 In this way all you need to do know to implement all of the remaining api callbacks provided by tvdb is to add more Request classes that match up with their API. I have found from past experience that a setup like this is easy to extend and work with from a team perspective.
