# Itemizer backend API documentation

For every request you need an API key. This API key should be in a header named `api-key`!

## GET requests

### Get item or items

Get ALL item:
```
https://yourdevserver.com/index.php/item
```

Get one specified item by ID:
```
https://yourdevserver.com/index.php/item/<id>
```

### Get category or categories

Get ALL category:
```
https://yourdevserver.com/index.php/category
```

Get one specified category by ID:
```
https://yourdevserver.com/index.php/category/<id>
```

## POST requests

### Create item

API endpoint:
```
https://yourdevserver.com/index.php/item
```

You should provide a JSON body in your POST request. This should look like this:

```json
{
  "category": 1,
  "name": "Demo item",
  "qty": 10,
  "note": "",
  "out_of_storage": 0
}
```

At `out_of_storage` 0 is false, everything else (higher than 0) is true. 

### Create category

API endpoint:
```
https://yourdevserver.com/index.php/category
```

You should provide a JSON body in your POST request. This should look like this:

```json
{
  "name": "Demo category"
}
```

## DELETE requests

### Delete an item

```
https://yourdevserver.com/index.php/item/<id>
```

### Delete a category

```
https://yourdevserver.com/index.php/category/<id>
```

Note that, if you delete a category, the script will check the dependency of that category. Any orphan item will be assigned with the category ID of 0.

## PUT requests

### Update an item

API endpoint:
```
https://yourdevserver.com/index.php/item/<id>
```

You should provide a JSON body in your PUT request. This should look like this:

```json
{
  "category": 1,
  "name": "Demo item",
  "qty": 10,
  "note": "",
  "out_of_storage": 0
}
```

### Update a category

API endpoint:
```
https://yourdevserver.com/index.php/category/<id>
```

You should provide a JSON body in your POST request. This should look like this:

```json
{
  "name": "Demo category"
}
```