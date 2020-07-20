#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
  header text DEFAULT '' NOT NULL,
  speaking_anchor VARCHAR(255) DEFAULT '' NOT NULL,
  header_font_color VARCHAR(255) DEFAULT '' NOT NULL,
  imageroundcorners tinyint(4) DEFAULT '0' NOT NULL,
  parallax tinyint(4) DEFAULT '0' NOT NULL,
  parallaxoption VARCHAR(255) DEFAULT '' NOT NULL,
  animatecss VARCHAR(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_form_generic_record'
#
CREATE TABLE tx_form_generic_record (
   uid int(11) NOT NULL auto_increment,
   pid int(11) DEFAULT '0' NOT NULL,
   crdate int(11) DEFAULT '0' NOT NULL,
   tstamp int(11) DEFAULT '0' NOT NULL,
   identifier VARCHAR(255) DEFAULT '' NOT NULL,
   text_field_1 text DEFAULT '' NOT NULL,
   text_field_2 text DEFAULT '' NOT NULL,
   text_field_3 text DEFAULT '' NOT NULL,
   text_field_4 text DEFAULT '' NOT NULL,
   text_field_5 text DEFAULT '' NOT NULL,
   input_field_1 VARCHAR(255) DEFAULT '' NOT NULL,
   input_field_2 VARCHAR(255) DEFAULT '' NOT NULL,
   input_field_3 VARCHAR(255) DEFAULT '' NOT NULL,
   input_field_4 VARCHAR(255) DEFAULT '' NOT NULL,
   input_field_5 VARCHAR(255) DEFAULT '' NOT NULL,
   check_field_1 tinyint(4) DEFAULT '0' NOT NULL,
   check_field_2 tinyint(4) DEFAULT '0' NOT NULL,
   check_field_3 tinyint(4) DEFAULT '0' NOT NULL,
   select_field_1 VARCHAR(255) DEFAULT '' NOT NULL,
   select_field_2 VARCHAR(255) DEFAULT '' NOT NULL,
   select_field_3 VARCHAR(255) DEFAULT '' NOT NULL,
   select_field_4 VARCHAR(255) DEFAULT '' NOT NULL,

   PRIMARY KEY (uid),
   KEY crdate (crdate)
);
