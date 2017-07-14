# pf_database

## About

"pf" stands for Project FLIPNOTIK, a game I tried making in RPG Maker XP between 2009 and 2013. 

Why did I make a database for an unfinished game? Because I can, basically.

This site was developed from scratch using HTML with SVG animations, CSS, JavaScript, jQuery, AJAX, PHP, MySQL, and the Bootstrap framework for a responsive, mobile-friendly design. I spent 4 days working on it.

http://denshuto.me/pfdatabase

## Start

- Base HTML is loaded through index.php. 
- Inside, a connection is made to the MySQL database via "require_once('config.php');" and through SQL queries the dropdown menus for search refinement are populated with the unique values for each category (gender, nation, location).
- Further down the code, SQL queries collect the data to populate the grid of characters, wrapping a div around each character's name and static sprite URL. Four characters per row, no matter what the size of the browser.
- Skeleton for modal window for character stats is created.
- "About" modal window is created.
- JS files are loaded.
- When everything is loaded, jQuery adds the class "in" to each character's cell in a queue system with a 120 ms delay, creating a gradual fade-in effect. It looks cool to me, at least.

## Going From "Playable Characters" <-> "Antagonists and NPCs"

If either the sidebar or navbar is clicked and the user isn't already viewing that page, a function is called in "script.js" that fades out and removes the main content, and uses AJAX to POST data from either "load_characters.php" or "load_npcs.php". Upon finishing the request, it appends the data to the previously empty div container and applies the "in" class to fade in the character grid.

## Search

When the search button is clicked, the grid of characters fades out, and either populateGrid() or populateGridNPC() is called, depending on which one you're using. These functions make an AJAX request to POST data from "search_generate_grid.php" or "search_generate_grid_npc.php", passing along the selections made in the search parameters. Within the PHP file, an SQL query is made to get only the characters who match those search parameters, and a new grid is created. Another fade in effect.

## Viewing Character Stats

When a character's grid cell is clicked, the content inside '#character-detail-body' (i.e. the modal window) is emptied, and the Bootstrap framework is utilized to call said modal window. From there, an AJAX request is made to POST data from "generate_character_stats.php" or "generate_npc_stats.php", passing along the name of the character clicked as a parameter. Inside the PHP file, an SQL query is made to get the character's information -- description, animated sprite URL, and statistics. If this is a playable character, an SVG image will be created based on these statistics, representing their proficiency in things like strength, agility, etc. The data is then appended to the modal window's body.