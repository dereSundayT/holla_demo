 So. 

In the php code. Do less looping.
.

So if I am to read the payment information in another table for each user I will write a single SQL command to fetch the user'e data from the users table and the payment information (bank related information)

This way I am doing the fetching of all the data I will need in my code at once. And looping through all at once

At once or in small chunks (remember)

 Also while talking to the third party API. I simply send charge request, I won't wait for the response. So I can move to the other (hmmm is this possible in PHP?

So basically what I'm trying to say here is that

I will store a reference to the current user I am on. Send a charge, wait for the API to respond but I will have a limited timeout

A small amount of timeout in case of network connection or the third party API is taking time to do their stuffs

If all goes well and they respond on time I will mark the user billed and go to the next user
 Or I will leave the user unbilled (take note of this) and move to the next year, the chances that the user will be billed is high
It's just that I couldn't wait to listen to the responses
Then when all the users are billed
I do a check to know if the unbilled user has bene billed (verifying from the third party API using the reference I stored