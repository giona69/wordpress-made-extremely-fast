# wordpress-made-extremely-fast

This is just an example on how to turn every site, even an old wordpress elephant site, into a rocket.

It work just with 3 simple memcache functions, the contrsuctor new Memcache, and get/set.

If the page is in the memcache it just displays, if not it puts it in the cache.

You could add:
- management of deleting the cache
- management on setting and changing the cache when a post is added/deleted
