--
-- Create the containerator database
--
CREATE DATABASE IF NOT EXISTS `containerator`;
USE `containerator`;

--
-- Table structure for table `beers`
--
CREATE TABLE IF NOT EXISTS `beers` (
	`id` int NOT NULL AUTO_INCREMENT,
	`beer_name` VARCHAR(255) NOT NULL,
	`style` VARCHAR(255) NOT NULL,
	`og` decimal(4,3) NOT NULL,
	`fg` decimal(4,3) NOT NULL,
	`abv` decimal(3,1) NOT NULL,
	`ibu` decimal(3) NOT NULL,
	`srm` decimal(2) NOT NULL,
  `description` text,
	`brewed_on` DATE,
	`on_tap` BOOL NULL,

	PRIMARY KEY ( id )
);

--
-- Seed Starter Beers
--
INSERT INTO beers (beer_name, style, og, fg, abv, srm, ibu, description, brewed_on, on_tap)
  VALUES ('Cascade IPA',' American IPA','1.068','1.018','6.6','6', '68', 'The American IPA is a different soul from the reincarnated IPA style. More flavorful than the withering English IPA, color can range from very pale golden to reddish amber. Hops are typically American with a big herbal and / or citric character, bitterness is high as well. Moderate to medium bodied with a balancing malt backbone.', '2017-01-01', '1');
INSERT INTO beers (beer_name, style, og, fg, abv, srm, ibu, description, brewed_on, on_tap)
	  VALUES ('Vanilla Bourbon Stout', 'Sweet Stout','1.054','1.016','5.0','39','31', 'Milk / Sweet Stouts are basically stouts that have a larger amount of residual dextrins and unfermented sugars that give the brew more body and a sweetness that counters the roasted character.', '2017-01-01', '1');
INSERT INTO beers (beer_name, style, og, fg, abv, srm, ibu, description, brewed_on, on_tap)
	  VALUES ('Witbier', 'Witbier','1.052','1.012','5.2','4','17', 'A Belgian Style ale that is very pale and cloudy in appearance due to it being unfiltered and the high level of wheat, and sometimes oats, that are used in the mash. Always spiced, generally with coriander, orange peel and other oddball spices or herbs in the back ground.', '2017-01-01', '1');
