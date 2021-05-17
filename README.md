## Day 21 (and 22)

### Implementing the project to a local Wordpress environment

Set up a local XAMPP server for PHP and Wordpress to start the implementation process. Currently I am turning the made project into a custom theme for wordpress.

## Day 23

### Fixed broken spots in SASS, JS, webpack.config.js and wordpress files

Fixed a missed class change in accordion related JS files (active class for opening the accordion panel). Fixed webpack compiling, so running ***npm run build*** will compile bundle.js and main.css respectively and CSS is not mixed into bundle.js anymore.

## Day 24

### Created custom post type (and unfinished taxonomy)

Currently trying to make accordion content modifiable in the wordpress environment. Created Events custom post type and started on custom taxonomies.

## Day 25

### Created meta fields and started making accordion creation loop

Meta fields for the front page can be edited, to display written text. If cover does not have enough text, then cover squeezes into itself and breaks the CSS a little bit.
Started accordion creation loop (unfinished). Idea is to create an accordion for every wanted "event theme", then create labels into that accordion with given parent category in "Events".

Meta fields in wordpress
![Meta fields in wordpress](https://i.imgur.com/ZFCLR9m.png)

Front page meta fields showcase  
https://user-images.githubusercontent.com/73487474/118296504-b90bc980-b4e5-11eb-9b17-636565e3541b.mp4


