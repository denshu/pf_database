# pf_database

## About

"pf" stands for Project FLIPNOTIK, a game I tried making in RPG Maker XP between 2009 and 2013. 

Why did I make a database for an unfinished game? Because I can, basically.

This site was developed from scratch in early 2016 using HTML with SVG animations, CSS, JavaScript, jQuery, AJAX, PHP, MySQL, and the Bootstrap framework for a responsive, mobile-friendly design. I spent 4 days working on it. In 2017, I added a statistics page that makes use of Chart.js.

http://denshuto.me/pfdatabase

## Things you can do

- Look at a nice fade-in effect as the characters are loaded
- Click on a character to bring up a modal window containing information about them. Their stats are displayed using SVG.
- Switch pages between playable characters and NPCs (non-playable characters), using either the sidebar or navbar. NPCs will not have stats, naturally
- Run a search based on multiple parameters (e.g. gender, location) to display only the characters that fit the specified criteria. You get to see the cool fade effect again
- Check out a statistics page which displays a graph -- made with Chart.js -- comparing average stats for each "faction". The page also displays the strongest character in each "faction" for individual and overall stats
- Click on the "About" link in the navbar to learn about what the heck this thing is

## Notes

- I don't know if I'll ever finish the game itself, but I'd really like to
- I made an API for this for funsies. Check it out at https://github.com/denshu/pf_db_api
- config.php does not contain the actual MySQL login information used on the website. What do you think I am, stupid?