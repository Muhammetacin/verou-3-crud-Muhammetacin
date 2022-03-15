# Create, read, update and delete

- Repository: `crud`
- Type of Challenge: `Learning`
- Duration: `3 days`
- Team challenge : `solo`

## 🌱 Must-have features

As a kid, chances are you liked collecting things. Seashells, Pokemon cards, stamps, ...
While waiting for our collections to be (even more) popular and thus making our collections skyrocket in value, it can be interesting to build a site to make an inventory of your collection.

> 💡 There's a lot to forms: validation, styling or retaining data when validation fails. Doing all this can be time consuming, so focus any the logic first for this exercise.

A typical `CRUD` implementation allows the user or admin to create, read, update and delete data and will typically be used for any systems relying on dynamic data.

### Preparation
- Think of a collection you'd like to have an inventory for.
- What information is interesting to keep track of for that kind of objects?
- Prepare the database structure to contain this info, and add some quick dummy content
- Have a look at the provided structure (make as much use of it as you can, it will pay off later)

### Step 1: read
- On the overview page, build an overview of everything in the collection (you will find some provided code that's helpful for this)

### Step 2: create
- Build a form that contains all the relevant fields
- Once the form is submitted, save this info as a new entry in the database
- In a real application, you'd validate all of the data. In this case it's optional: focus on the database parts first

### Step 3: update
- Make a new page edit.php
- When clicking on an edit link for an entry, the edit page is loaded for that specific item
- When the edit form is submitted, the relevant entry in the database is updated

### Step 4: delete
- Build a link to delete.php that will delete a specific product from the database
- Afterwards, it will redirect to the overview

## 🌼 Nice to have

- Check who might need your help. Maybe your discoveries can already prove valuable to your peers?
- Pair up with someone: what difference do you have in your approach? Discuss and look for opportunities to further improve your code.
- Once an item is clicked, a detail page is loaded (called show.php, no styling needed). What PHP technique can you use to specify the id of that product on the detail page?
- So everything works for the good guys? Nice! What if the bad guys discover your site too...? Read up on SQL injection and protect your code against it.
- What interesting data can you include for your collection: images or fetch some stuff from an API - found something? Go for it!

## 🌳 Nice to have (Hard)
- Create a filter for your collection:
    - Update your database: instead of a simple list of items, give every item in your list their own properties. (E.g.: add element type to your Pokemon)
    - Have a filter bar that will display whatever has been selected (if not, it shows the whole list)
- Timestamp changes and use soft deletes instead of permanent deletions:
  - Add `updated_at` as a new column to your table.
  - Whenever you update an item on your list, make sure a new timestamp is saved in `updated_at` as well.
  - Upon deleting an item from your list, instead of removing the item from the database, check how you can apply **soft deletes** in your application.

  
![](https://media.giphy.com/media/l3V0mgFspVuDAJK9y/giphy.gif)

Sorry, best I could find...