/*
SQLyog Ultimate v8.55 
MySQL - 5.6.20 : Database - homeopathy
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`homeopathy` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `homeopathy`;

/*Table structure for table `hme_cities` */

DROP TABLE IF EXISTS `hme_cities`;

CREATE TABLE `hme_cities` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `country_id` mediumint(9) NOT NULL,
  `state_id` mediumint(9) NOT NULL,
  `city` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=utf8;

/*Data for the table `hme_cities` */

insert  into `hme_cities`(`id`,`country_id`,`state_id`,`city`,`status`) values (1,1,1,'Ariyalur','1'),(2,1,1,'Chennai','1'),(3,1,1,'Coimbatore','1'),(4,1,1,'Cuddalore','1'),(5,1,1,'Dharmapuri','1'),(6,1,1,'Dindigul','1'),(7,1,1,'Erode','1'),(8,1,1,'Kanchipuram','1'),(9,1,1,'Kanyakumari','1'),(10,1,1,'Karur','1'),(11,1,1,'Madurai','1'),(12,1,1,'Nagapattinam','1'),(13,1,1,'The Nilgiris','1'),(14,1,1,'Namakkal','1'),(15,1,1,'Perambalur','1'),(16,1,1,'Pudukkottai','1'),(17,1,1,'Ramanathapuram','1'),(18,1,1,'Salem','1'),(19,1,1,'Sivagangai','1'),(20,1,1,'Tiruppur','1'),(21,1,1,'Tiruchirappalli','1'),(22,1,1,'Theni','1'),(23,1,1,'Tirunelveli','1'),(24,1,1,'Thanjavur','1'),(25,1,1,'Thoothukudi','1'),(26,1,1,'Thiruvallur','1'),(27,1,1,'Thiruvarur','1'),(28,1,1,'Tiruvannamalai','1'),(29,1,1,'Vellore','1'),(30,1,1,'Villupuram','1'),(31,1,2,'Alappuzha','1'),(32,1,2,'Ernakulam','1'),(33,1,2,'Idukki','1'),(34,1,2,'Kollam','1'),(35,1,2,'Kannur','1'),(36,1,2,'Kasaragod','1'),(37,1,2,'Kottayam','1'),(38,1,2,'Kozhikode','1'),(39,1,2,'Malappuram','1'),(40,1,2,'Palakkad','1'),(41,1,2,'Pathanamthitta','1'),(42,1,2,'Thrissur','1'),(43,1,2,'Thiruvananthapuram','1'),(44,1,2,'Wayanad','1'),(45,1,3,'North and Middle Andaman','1'),(46,1,3,'South Andaman','1'),(47,1,3,'Nicobar','1'),(48,1,4,'Adilabad','1'),(49,1,4,'Anantapur','1'),(50,1,4,'Chittoor','1'),(51,1,4,'East Godavari','1'),(52,1,4,'Guntur','1'),(53,1,4,'Hyderabad','1'),(54,1,4,'Kadapa','1'),(55,1,4,'Karimnagar','1'),(56,1,4,'Khammam','1'),(57,1,4,'Krishna','1'),(58,1,4,'Kurnool','1'),(59,1,4,'Mahbubnagar','1'),(60,1,4,'Medak','1'),(61,1,4,'Nalgonda','1'),(62,1,4,'Nellore','1'),(63,1,4,'Nizamabad','1'),(64,1,4,'Prakasam','1'),(65,1,4,'Rangareddi','1'),(66,1,4,'Srikakulam','1'),(67,1,4,'Vishakhapatnam','1'),(68,1,4,'Vizianagaram','1'),(69,1,4,'Warangal','1'),(70,1,4,'West Godavari','1'),(71,1,5,'Anjaw','1'),(72,1,5,'Changlang','1'),(73,1,5,'East Kameng','1'),(74,1,5,'Lohit','1'),(75,1,5,'Lower Subansiri','1'),(76,1,5,'Papum Pare','1'),(77,1,5,'Tirap','1'),(78,1,5,'Dibang Valley','1'),(79,1,5,'Upper Subansiri','1'),(80,1,5,'West Kameng','1'),(81,1,6,'Barpeta','1'),(82,1,6,'Bongaigaon','1'),(83,1,6,'Cachar','1'),(84,1,6,'Darrang','1'),(85,1,6,'Dhemaji','1'),(86,1,6,'Dhubri','1'),(87,1,6,'Dibrugarh','1'),(88,1,6,'Goalpara','1'),(89,1,6,'Golaghat','1'),(90,1,6,'Hailakandi','1'),(91,1,6,'Jorhat','1'),(92,1,6,'Karbi Anglong','1'),(93,1,6,'Karimganj','1'),(94,1,6,'Kokrajhar','1'),(95,1,6,'Lakhimpur','1'),(96,1,6,'Marigaon','1'),(97,1,6,'Nagaon','1'),(98,1,6,'Nalbari','1'),(99,1,6,'North Cachar Hills','1'),(100,1,6,'Sibsagar','1'),(101,1,6,'Sonitpur','1'),(102,1,6,'Tinsukia','1'),(103,1,7,'Araria','1'),(104,1,7,'Aurangabad','1'),(105,1,7,'Banka','1'),(106,1,7,'Begusarai','1'),(107,1,7,'Bhagalpur','1'),(108,1,7,'Bhojpur','1'),(109,1,7,'Buxar','1'),(110,1,7,'Darbhanga','1'),(111,1,7,'Purba Champaran','1'),(112,1,7,'Gaya','1'),(113,1,7,'Gopalganj','1'),(114,1,7,'Jamui','1'),(115,1,7,'Jehanabad','1'),(116,1,7,'Khagaria','1'),(117,1,7,'Kishanganj','1'),(118,1,7,'Kaimur','1'),(119,1,7,'Katihar','1'),(120,1,7,'Lakhisarai','1'),(121,1,7,'Madhubani','1'),(122,1,7,'Munger','1'),(123,1,7,'Madhepura','1'),(124,1,7,'Muzaffarpur','1'),(125,1,7,'Nalanda','1'),(126,1,7,'Nawada','1'),(127,1,7,'Patna','1'),(128,1,7,'Purnia','1'),(129,1,7,'Rohtas','1'),(130,1,7,'Saharsa','1'),(131,1,7,'Samastipur','1'),(132,1,7,'Sheohar','1'),(133,1,7,'Sheikhpura','1'),(134,1,7,'Saran','1'),(135,1,7,'Sitamarhi','1'),(136,1,7,'Supaul','1'),(137,1,7,'Siwan','1'),(138,1,7,'Vaishali','1'),(139,1,7,'Pashchim Champaran','1'),(140,1,8,'Bastar','1'),(141,1,8,'Bilaspur','1'),(142,1,8,'Dantewada','1'),(143,1,8,'Dhamtari','1'),(144,1,8,'Durg','1'),(145,1,8,'Jashpur','1'),(146,1,8,'Janjgir-Champa','1'),(147,1,8,'Korba','1'),(148,1,8,'Koriya','1'),(149,1,8,'Kanker','1'),(150,1,8,'Kawardha','1'),(151,1,8,'Mahasamund','1'),(152,1,8,'Raigarh','1'),(153,1,8,'Rajnandgaon','1'),(154,1,8,'Raipur','1'),(155,1,8,'Surguja','1'),(156,1,9,'Diu','1'),(157,1,9,'Daman','1'),(158,1,10,'Central Delhi','1'),(159,1,10,'East Delhi','1'),(160,1,10,'New Delhi','1'),(161,1,10,'North Delhi','1'),(162,1,10,'North East Delhi','1'),(163,1,10,'North West Delhi','1'),(164,1,10,'South Delhi','1'),(165,1,10,'South West Delhi','1'),(166,1,10,'West Delhi','1'),(167,1,11,'North Goa','1'),(168,1,11,'South Goa','1'),(169,1,12,'Ahmedabad','1'),(170,1,12,'Amreli District','1'),(171,1,12,'Anand','1'),(172,1,12,'Banaskantha','1'),(173,1,12,'Bharuch','1'),(174,1,12,'Bhavnagar','1'),(175,1,12,'Dahod','1'),(176,1,12,'The Dangs','1'),(177,1,12,'Gandhinagar','1'),(178,1,12,'Jamnagar','1'),(179,1,12,'Junagadh','1'),(180,1,12,'Kutch','1'),(181,1,12,'Kheda','1'),(182,1,12,'Mehsana','1'),(183,1,12,'Narmada','1'),(184,1,12,'Navsari','1'),(185,1,12,'Patan','1'),(186,1,12,'Panchmahal','1'),(187,1,12,'Porbandar','1'),(188,1,12,'Rajkot','1'),(189,1,12,'Sabarkantha','1'),(190,1,12,'Surendranagar','1'),(191,1,12,'Surat','1'),(192,1,12,'Vadodara','1'),(193,1,12,'Valsad','1'),(194,1,13,'Ambala','1'),(195,1,13,'Bhiwani','1'),(196,1,13,'Faridabad','1'),(197,1,13,'Fatehabad','1'),(198,1,13,'Gurgaon','1'),(199,1,13,'Hissar','1'),(200,1,13,'Jhajjar','1'),(201,1,13,'Jind','1'),(202,1,13,'Karnal','1'),(203,1,13,'Kaithal','1'),(204,1,13,'Kurukshetra','1'),(205,1,13,'Mahendragarh','1'),(206,1,13,'Mewat','1'),(207,1,13,'Panchkula','1'),(208,1,13,'Panipat','1'),(209,1,13,'Rewari','1'),(210,1,13,'Rohtak','1'),(211,1,13,'Sirsa','1'),(212,1,13,'Sonepat','1'),(213,1,13,'Yamuna Nagar','1'),(214,1,13,'Palwal','1'),(215,1,14,'Bilaspur','1'),(216,1,14,'Chamba','1'),(217,1,14,'Hamirpur','1'),(218,1,14,'Kangra','1'),(219,1,14,'Kinnaur','1'),(220,1,14,'Kulu','1'),(221,1,14,'Lahaul and Spiti','1'),(222,1,14,'Mandi','1'),(223,1,14,'Shimla','1'),(224,1,14,'Sirmaur','1'),(225,1,14,'Solan','1'),(226,1,14,'Una','1'),(227,1,15,'Anantnag','1'),(228,1,15,'Badgam','1'),(229,1,15,'Bandipore','1'),(230,1,15,'Baramula','1'),(231,1,15,'Doda','1'),(232,1,15,'Jammu','1'),(233,1,15,'Kargil','1'),(234,1,15,'Kathua','1'),(235,1,15,'Kupwara','1'),(236,1,15,'Leh','1'),(237,1,15,'Poonch','1'),(238,1,15,'Pulwama','1'),(239,1,15,'Rajauri','1'),(240,1,15,'Srinagar','1'),(241,1,15,'Samba','1'),(242,1,15,'Udhampur','1'),(243,1,16,'Bokaro','1'),(244,1,16,'Chatra','1'),(245,1,16,'Deoghar','1'),(246,1,16,'Dhanbad','1'),(247,1,16,'Dumka','1'),(248,1,16,'Purba Singhbhum','1'),(249,1,16,'Garhwa','1'),(250,1,16,'Giridih','1'),(251,1,16,'Godda','1'),(252,1,16,'Gumla','1'),(253,1,16,'Hazaribagh','1'),(254,1,16,'Koderma','1'),(255,1,16,'Lohardaga','1'),(256,1,16,'Pakur','1'),(257,1,16,'Palamu','1'),(258,1,16,'Ranchi','1'),(259,1,16,'Sahibganj','1'),(260,1,16,'Seraikela and Kharsawan','1'),(261,1,16,'Pashchim Singhbhum','1'),(262,1,16,'Ramgarh','1'),(263,1,17,'Bidar','1'),(264,1,17,'Belgaum','1'),(265,1,17,'Bijapur','1'),(266,1,17,'Bagalkot','1'),(267,1,17,'Bellary','1'),(268,1,17,'Bangalore Rural District','1'),(269,1,17,'Bangalore Urban District','1'),(270,1,17,'Chamarajnagar','1'),(271,1,17,'Chikmagalur','1'),(272,1,17,'Chitradurga','1'),(273,1,17,'Davanagere','1'),(274,1,17,'Dharwad','1'),(275,1,17,'Dakshina Kannada','1'),(276,1,17,'Gadag','1'),(277,1,17,'Gulbarga','1'),(278,1,17,'Hassan','1'),(279,1,17,'Haveri District','1'),(280,1,17,'Kodagu','1'),(281,1,17,'Kolar','1'),(282,1,17,'Koppal','1'),(283,1,17,'Mandya','1'),(284,1,17,'Mysore','1'),(285,1,17,'Raichur','1'),(286,1,17,'Shimoga','1'),(287,1,17,'Tumkur','1'),(288,1,17,'Udupi','1'),(289,1,17,'Uttara Kannada','1'),(290,1,17,'Ramanagara','1'),(291,1,17,'Chikballapur','1'),(292,1,17,'Yadagiri','1'),(293,1,18,'Alirajpur','1'),(294,1,18,'Anuppur','1'),(295,1,18,'Ashok Nagar','1'),(296,1,18,'Balaghat','1'),(297,1,18,'Barwani','1'),(298,1,18,'Betul','1'),(299,1,18,'Bhind','1'),(300,1,18,'Bhopal','1'),(301,1,18,'Burhanpur','1'),(302,1,18,'Chhatarpur','1'),(303,1,18,'Chhindwara','1'),(304,1,18,'Damoh','1'),(305,1,18,'Datia','1'),(306,1,18,'Dewas','1'),(307,1,18,'Dhar','1'),(308,1,18,'Dindori','1'),(309,1,18,'Guna','1'),(310,1,18,'Gwalior','1'),(311,1,18,'Harda','1'),(312,1,18,'Hoshangabad','1'),(313,1,18,'Indore','1'),(314,1,18,'Jabalpur','1'),(315,1,18,'Jhabua','1'),(316,1,18,'Katni','1'),(317,1,18,'Khandwa','1'),(318,1,18,'Khargone','1'),(319,1,18,'Mandla','1'),(320,1,18,'Mandsaur','1'),(321,1,18,'Morena','1'),(322,1,18,'Narsinghpur','1'),(323,1,18,'Neemuch','1'),(324,1,18,'Panna','1'),(325,1,18,'Rewa','1'),(326,1,18,'Rajgarh','1'),(327,1,18,'Ratlam','1'),(328,1,18,'Raisen','1'),(329,1,18,'Sagar','1'),(330,1,18,'Satna','1'),(331,1,18,'Sehore','1'),(332,1,18,'Seoni','1'),(333,1,18,'Shahdol','1'),(334,1,18,'Shajapur','1'),(335,1,18,'Sheopur','1'),(336,1,18,'Shivpuri','1'),(337,1,18,'Sidhi','1'),(338,1,18,'Singrauli','1'),(339,1,18,'Tikamgarh','1'),(340,1,18,'Ujjain','1'),(341,1,18,'Umaria','1'),(342,1,18,'Vidisha','1'),(343,1,19,'Ahmednagar','1'),(344,1,19,'Akola','1'),(345,1,19,'Amrawati','1'),(346,1,19,'Aurangabad','1'),(347,1,19,'Bhandara','1'),(348,1,19,'Beed','1'),(349,1,19,'Buldhana','1'),(350,1,19,'Chandrapur','1'),(351,1,19,'Dhule','1'),(352,1,19,'Gadchiroli','1'),(353,1,19,'Gondiya','1'),(354,1,19,'Hingoli','1'),(355,1,19,'Jalgaon','1'),(356,1,19,'Jalna','1'),(357,1,19,'Kolhapur','1'),(358,1,19,'Latur','1'),(359,1,19,'Mumbai City','1'),(360,1,19,'Mumbai suburban','1'),(361,1,19,'Nandurbar','1'),(362,1,19,'Nanded','1'),(363,1,19,'Nagpur','1'),(364,1,19,'Nashik','1'),(365,1,19,'Osmanabad','1'),(366,1,19,'Parbhani','1'),(367,1,19,'Pune','1'),(368,1,19,'Raigad','1'),(369,1,19,'Ratnagiri','1'),(370,1,19,'Sindhudurg','1'),(371,1,19,'Sangli','1'),(372,1,19,'Solapur','1'),(373,1,19,'Satara','1'),(374,1,19,'Thane','1'),(375,1,19,'Wardha','1'),(376,1,19,'Washim','1'),(377,1,19,'Yavatmal','1'),(378,1,20,'Bishnupur','1'),(379,1,20,'Churachandpur','1'),(380,1,20,'Chandel','1'),(381,1,20,'Imphal East','1'),(382,1,20,'Senapati','1'),(383,1,20,'Tamenglong','1'),(384,1,20,'Thoubal','1'),(385,1,20,'Ukhrul','1'),(386,1,20,'Imphal West','1'),(387,1,21,'East Garo Hills','1'),(388,1,21,'East Khasi Hills','1'),(389,1,21,'Jaintia Hills','1'),(390,1,21,'Ri-Bhoi','1'),(391,1,21,'South Garo Hills','1'),(392,1,21,'West Garo Hills','1'),(393,1,21,'West Khasi Hills','1'),(394,1,22,'Aizawl','1'),(395,1,22,'Champhai','1'),(396,1,22,'Kolasib','1'),(397,1,22,'Lawngtlai','1'),(398,1,22,'Lunglei','1'),(399,1,22,'Mamit','1'),(400,1,22,'Saiha','1'),(401,1,22,'Serchhip','1'),(402,1,23,'Dimapur','1'),(403,1,23,'Kohima','1'),(404,1,23,'Mokokchung','1'),(405,1,23,'Mon','1'),(406,1,23,'Phek','1'),(407,1,23,'Tuensang','1'),(408,1,23,'Wokha','1'),(409,1,23,'Zunheboto','1'),(410,1,24,'Angul','1'),(411,1,24,'Boudh','1'),(412,1,24,'Bhadrak','1'),(413,1,24,'Bolangir','1'),(414,1,24,'Bargarh','1'),(415,1,24,'Baleswar','1'),(416,1,24,'Cuttack','1'),(417,1,24,'Debagarh','1'),(418,1,24,'Dhenkanal','1'),(419,1,24,'Ganjam','1'),(420,1,24,'Gajapati','1'),(421,1,24,'Jharsuguda','1'),(422,1,24,'Jajapur','1'),(423,1,24,'Jagatsinghpur','1'),(424,1,24,'Khordha','1'),(425,1,24,'Kendujhar','1'),(426,1,24,'Kalahandi','1'),(427,1,24,'Kandhamal','1'),(428,1,24,'Koraput','1'),(429,1,24,'Kendrapara','1'),(430,1,24,'Malkangiri','1'),(431,1,24,'Mayurbhanj','1'),(432,1,24,'Nabarangpur','1'),(433,1,24,'Nuapada','1'),(434,1,24,'Nayagarh','1'),(435,1,24,'Puri','1'),(436,1,24,'Rayagada','1'),(437,1,24,'Sambalpur','1'),(438,1,24,'Subarnapur','1'),(439,1,24,'Sundargarh','1'),(440,1,25,'Karaikal','1'),(441,1,25,'Mahe','1'),(442,1,25,'Puducherry','1'),(443,1,25,'Yanam','1'),(444,1,26,'Amritsar','1'),(445,1,26,'Bathinda','1'),(446,1,26,'Firozpur','1'),(447,1,26,'Faridkot','1'),(448,1,26,'Fatehgarh Sahib','1'),(449,1,26,'Gurdaspur','1'),(450,1,26,'Hoshiarpur','1'),(451,1,26,'Jalandhar','1'),(452,1,26,'Kapurthala','1'),(453,1,26,'Ludhiana','1'),(454,1,26,'Mansa','1'),(455,1,26,'Moga','1'),(456,1,26,'Mukatsar','1'),(457,1,26,'Nawan Shehar','1'),(458,1,26,'Patiala','1'),(459,1,26,'Rupnagar','1'),(460,1,26,'Sangrur','1'),(461,1,27,'Ajmer','1'),(462,1,27,'Alwar','1'),(463,1,27,'Bikaner','1'),(464,1,27,'Barmer','1'),(465,1,27,'Banswara','1'),(466,1,27,'Bharatpur','1'),(467,1,27,'Baran','1'),(468,1,27,'Bundi','1'),(469,1,27,'Bhilwara','1'),(470,1,27,'Churu','1'),(471,1,27,'Chittorgarh','1'),(472,1,27,'Dausa','1'),(473,1,27,'Dholpur','1'),(474,1,27,'Dungapur','1'),(475,1,27,'Ganganagar','1'),(476,1,27,'Hanumangarh','1'),(477,1,27,'Juhnjhunun','1'),(478,1,27,'Jalore','1'),(479,1,27,'Jodhpur','1'),(480,1,27,'Jaipur','1'),(481,1,27,'Jaisalmer','1'),(482,1,27,'Jhalawar','1'),(483,1,27,'Karauli','1'),(484,1,27,'Kota','1'),(485,1,27,'Nagaur','1'),(486,1,27,'Pali','1'),(487,1,27,'Pratapgarh','1'),(488,1,27,'Rajsamand','1'),(489,1,27,'Sikar','1'),(490,1,27,'Sawai Madhopur','1'),(491,1,27,'Sirohi','1'),(492,1,27,'Tonk','1'),(493,1,27,'Udaipur','1'),(494,1,28,'East Sikkim','1'),(495,1,28,'North Sikkim','1'),(496,1,28,'South Sikkim','1'),(497,1,28,'West Sikkim','1'),(498,1,29,'Dhalai','1'),(499,1,29,'North Tripura','1'),(500,1,29,'South Tripura','1'),(501,1,29,'West Tripura','1'),(502,1,30,'Almora','1'),(503,1,30,'Bageshwar','1'),(504,1,30,'Chamoli','1'),(505,1,30,'Champawat','1'),(506,1,30,'Dehradun','1'),(507,1,30,'Haridwar','1'),(508,1,30,'Nainital','1'),(509,1,30,'Pauri Garhwal','1'),(510,1,30,'Pithoragharh','1'),(511,1,30,'Rudraprayag','1'),(512,1,30,'Tehri Garhwal','1'),(513,1,30,'Udham Singh Nagar','1'),(514,1,30,'Uttarkashi','1'),(515,1,31,'Agra','1'),(516,1,31,'Allahabad','1'),(517,1,31,'Aligarh','1'),(518,1,31,'Ambedkar Nagar','1'),(519,1,31,'Auraiya','1'),(520,1,31,'Azamgarh','1'),(521,1,31,'Barabanki','1'),(522,1,31,'Badaun','1'),(523,1,31,'Bagpat','1'),(524,1,31,'Bahraich','1'),(525,1,31,'Bijnor','1'),(526,1,31,'Ballia','1'),(527,1,31,'Banda','1'),(528,1,31,'Balrampur','1'),(529,1,31,'Bareilly','1'),(530,1,31,'Basti','1'),(531,1,31,'Bulandshahr','1'),(532,1,31,'Chandauli','1'),(533,1,31,'Chitrakoot','1'),(534,1,31,'Deoria','1'),(535,1,31,'Etah','1'),(536,1,31,'Kanshiram Nagar','1'),(537,1,31,'Etawah','1'),(538,1,31,'Firozabad','1'),(539,1,31,'Farrukhabad','1'),(540,1,31,'Fatehpur','1'),(541,1,31,'Faizabad','1'),(542,1,31,'Gautam Buddha Nagar','1'),(543,1,31,'Gonda','1'),(544,1,31,'Ghazipur','1'),(545,1,31,'Gorkakhpur','1'),(546,1,31,'Ghaziabad','1'),(547,1,31,'Hamirpur','1'),(548,1,31,'Hardoi','1'),(549,1,31,'Mahamaya Nagar','1'),(550,1,31,'Jhansi','1'),(551,1,31,'Jalaun','1'),(552,1,31,'Jyotiba Phule Nagar','1'),(553,1,31,'Jaunpur District','1'),(554,1,31,'Kanpur Dehat','1'),(555,1,31,'Kannauj','1'),(556,1,31,'Kanpur Nagar','1'),(557,1,31,'Kaushambi','1'),(558,1,31,'Kushinagar','1'),(559,1,31,'Lalitpur','1'),(560,1,31,'Lakhimpur Kheri','1'),(561,1,31,'Lucknow','1'),(562,1,31,'Mau','1'),(563,1,31,'Meerut','1'),(564,1,31,'Maharajganj','1'),(565,1,31,'Mahoba','1'),(566,1,31,'Mirzapur','1'),(567,1,31,'Moradabad','1'),(568,1,31,'Mainpuri','1'),(569,1,31,'Mathura','1'),(570,1,31,'Muzaffarnagar','1'),(571,1,31,'Pilibhit','1'),(572,1,31,'Pratapgarh','1'),(573,1,31,'Rampur','1'),(574,1,31,'Rae Bareli','1'),(575,1,31,'Saharanpur','1'),(576,1,31,'Sitapur','1'),(577,1,31,'Shahjahanpur','1'),(578,1,31,'Sant Kabir Nagar','1'),(579,1,31,'Siddharthnagar','1'),(580,1,31,'Sonbhadra','1'),(581,1,31,'Sant Ravidas Nagar','1'),(582,1,31,'Sultanpur','1'),(583,1,31,'Shravasti','1'),(584,1,31,'Unnao','1'),(585,1,31,'Varanasi','1'),(586,1,32,'Birbhum','1'),(587,1,32,'Bankura','1'),(588,1,32,'Bardhaman','1'),(589,1,32,'Darjeeling','1'),(590,1,32,'Dakshin Dinajpur','1'),(591,1,32,'Hooghly','1'),(592,1,32,'Howrah','1'),(593,1,32,'Jalpaiguri','1'),(594,1,32,'Cooch Behar','1'),(595,1,32,'Kolkata','1'),(596,1,32,'Malda','1'),(597,1,32,'Midnapore','1'),(598,1,32,'Murshidabad','1'),(599,1,32,'Nadia','1'),(600,1,32,'North 24 Parganas','1'),(601,1,32,'South 24 Parganas','1'),(602,1,32,'Purulia','1'),(603,1,32,'Uttar Dinajpur','1');

/*Table structure for table `hme_countries` */

DROP TABLE IF EXISTS `hme_countries`;

CREATE TABLE `hme_countries` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `country` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `hme_countries` */

insert  into `hme_countries`(`id`,`country`,`status`) values (1,'India','1');

/*Table structure for table `hme_doctor_profile` */

DROP TABLE IF EXISTS `hme_doctor_profile`;

CREATE TABLE `hme_doctor_profile` (
  `docinfo_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL,
  `doc_firstname` varchar(100) NOT NULL,
  `doc_lastname` varchar(100) DEFAULT NULL,
  `doc_dob` date NOT NULL,
  `doc_speciality` varchar(255) DEFAULT NULL,
  `doc_certificate` text,
  `doc_designated` varchar(255) DEFAULT NULL,
  `doc_awards` text,
  `doc_about` text,
  `doc_address_1` text,
  `doc_address_2` text,
  `doc_city` mediumint(9) NOT NULL,
  `doc_state` mediumint(9) NOT NULL,
  `doc_country` mediumint(9) NOT NULL,
  `doc_phone` varchar(100) DEFAULT NULL,
  `doc_mobile_no` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`docinfo_id`),
  KEY `FK_hme_doctor_profile_user` (`user_id`),
  KEY `FK_hme_doctor_profile_country` (`doc_country`),
  KEY `FK_hme_doctor_profile_state` (`doc_state`),
  KEY `FK_hme_doctor_profile_city` (`doc_city`),
  CONSTRAINT `FK_hme_doctor_profile_city` FOREIGN KEY (`doc_city`) REFERENCES `hme_cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_doctor_profile_country` FOREIGN KEY (`doc_country`) REFERENCES `hme_countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_doctor_profile_state` FOREIGN KEY (`doc_state`) REFERENCES `hme_states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_doctor_profile_user` FOREIGN KEY (`user_id`) REFERENCES `hme_users` (`ur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `hme_doctor_profile` */

insert  into `hme_doctor_profile`(`docinfo_id`,`user_id`,`doc_firstname`,`doc_lastname`,`doc_dob`,`doc_speciality`,`doc_certificate`,`doc_designated`,`doc_awards`,`doc_about`,`doc_address_1`,`doc_address_2`,`doc_city`,`doc_state`,`doc_country`,`doc_phone`,`doc_mobile_no`) values (45,46,'doctor one','last test','2014-10-12','speciality','','dest','','','test','',1,1,1,'','9566995815'),(48,53,'Prakash','Arul mani','2014-12-05','','','','','','test','',1,1,1,'','123123213'),(49,55,'Rajesh','','2014-12-06','','','','','','test','',1,1,1,'','123123123');

/*Table structure for table `hme_med_categories` */

DROP TABLE IF EXISTS `hme_med_categories`;

CREATE TABLE `hme_med_categories` (
  `med_cat_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `med_cat_name` varchar(100) NOT NULL,
  `med_cat_parent` mediumint(9) DEFAULT NULL,
  `med_cat_unit` enum('1','2') NOT NULL COMMENT '1 => ml, 2 => gms',
  `med_cat_desc` text NOT NULL,
  `med_cat_status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`med_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `hme_med_categories` */

insert  into `hme_med_categories`(`med_cat_id`,`med_cat_name`,`med_cat_parent`,`med_cat_unit`,`med_cat_desc`,`med_cat_status`) values (8,'Category Name 1',NULL,'1','Category Name 1','1');

/*Table structure for table `hme_med_stock` */

DROP TABLE IF EXISTS `hme_med_stock`;

CREATE TABLE `hme_med_stock` (
  `tenant` mediumint(9) NOT NULL,
  `stk_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `stk_med_id` mediumint(9) NOT NULL,
  `stk_pkg_id` mediumint(9) NOT NULL,
  `stk_batch_no` varchar(150) DEFAULT NULL,
  `stk_avail_units` int(11) NOT NULL DEFAULT '0',
  `stk_debit_units` int(11) NOT NULL DEFAULT '0' COMMENT 'Not used',
  PRIMARY KEY (`stk_id`),
  KEY `FK_hme_med_stock_medicine` (`stk_med_id`),
  KEY `FK_hme_med_stock_medpackage` (`stk_pkg_id`),
  KEY `FK_hme_med_stock_tenant` (`tenant`),
  CONSTRAINT `FK_hme_med_stock_medicine` FOREIGN KEY (`stk_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_med_stock_medpackage` FOREIGN KEY (`stk_pkg_id`) REFERENCES `hme_medicine_pkg` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_med_stock_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `hme_med_stock` */

insert  into `hme_med_stock`(`tenant`,`stk_id`,`stk_med_id`,`stk_pkg_id`,`stk_batch_no`,`stk_avail_units`,`stk_debit_units`) values (1,16,8,17,'TEST0001',25,0),(1,17,8,17,'TEST0002',95,0),(1,18,8,17,'T6UYT7878',0,0),(1,19,9,18,'TEST0005',6,0),(1,20,8,17,'TEST0005',5,0),(1,21,9,18,'TEST0006',0,0),(1,22,8,17,'TEST0006',0,0),(1,23,10,19,'TEST0008',60,0),(1,24,8,17,'TEST0008',5,0);

/*Table structure for table `hme_medicine_pkg` */

DROP TABLE IF EXISTS `hme_medicine_pkg`;

CREATE TABLE `hme_medicine_pkg` (
  `pkg_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `pkg_med_id` mediumint(9) NOT NULL,
  `pkg_med_unit` varchar(50) NOT NULL,
  `pkg_med_power` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pkg_id`),
  KEY `FK_hme_medicine_pkg_medicine` (`pkg_med_id`),
  CONSTRAINT `FK_hme_medicine_pkg_medicine` FOREIGN KEY (`pkg_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `hme_medicine_pkg` */

insert  into `hme_medicine_pkg`(`pkg_id`,`pkg_med_id`,`pkg_med_unit`,`pkg_med_power`) values (17,8,'m1-unit1','m1-pot1'),(18,9,'med 6 unit 1','pot 1'),(19,10,'Med 4 unit','');

/*Table structure for table `hme_medicines` */

DROP TABLE IF EXISTS `hme_medicines`;

CREATE TABLE `hme_medicines` (
  `tenant` mediumint(9) NOT NULL,
  `med_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `med_cat_id` mediumint(9) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `med_desc` longtext,
  `med_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`med_id`),
  KEY `FK_hme_medicines_category` (`med_cat_id`),
  KEY `FK_hme_medicines_tenant` (`tenant`),
  CONSTRAINT `FK_hme_medicines_category` FOREIGN KEY (`med_cat_id`) REFERENCES `hme_med_categories` (`med_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_medicines_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `hme_medicines` */

insert  into `hme_medicines`(`tenant`,`med_id`,`med_cat_id`,`med_name`,`med_desc`,`med_status`) values (1,8,8,'Medicine Name 1','Medicine Name 1','1'),(1,9,8,'New Medicine 6','','1'),(1,10,8,'Med 4','Test a','1');

/*Table structure for table `hme_patient_profile` */

DROP TABLE IF EXISTS `hme_patient_profile`;

CREATE TABLE `hme_patient_profile` (
  `pt_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL,
  `pt_firstname` varchar(100) NOT NULL,
  `pt_lastname` varchar(100) DEFAULT NULL,
  `pt_sex` enum('1','2') NOT NULL,
  `pt_email` varchar(255) DEFAULT NULL,
  `pt_dob` date NOT NULL,
  `pt_bloodgroup` enum('1','2','3','4','5','6','7','8') DEFAULT NULL,
  `pt_height` tinyint(4) DEFAULT NULL,
  `pt_weight` tinyint(4) DEFAULT NULL,
  `pt_address` text,
  `pt_city` mediumint(9) NOT NULL,
  `pt_state` mediumint(9) NOT NULL,
  `pt_country` mediumint(9) NOT NULL,
  `pt_telephone` varchar(100) DEFAULT NULL,
  `pt_mobile` varchar(100) NOT NULL,
  PRIMARY KEY (`pt_id`),
  KEY `FK_hme_patient_profile_user` (`user_id`),
  KEY `FK_hme_patient_profile_city` (`pt_city`),
  KEY `FK_hme_patient_profile_state` (`pt_state`),
  KEY `FK_hme_patient_profile_country` (`pt_country`),
  CONSTRAINT `FK_hme_patient_profile_city` FOREIGN KEY (`pt_city`) REFERENCES `hme_cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_patient_profile_country` FOREIGN KEY (`pt_country`) REFERENCES `hme_countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_patient_profile_state` FOREIGN KEY (`pt_state`) REFERENCES `hme_states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_patient_profile_user` FOREIGN KEY (`user_id`) REFERENCES `hme_users` (`ur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hme_patient_profile` */

insert  into `hme_patient_profile`(`pt_id`,`user_id`,`pt_firstname`,`pt_lastname`,`pt_sex`,`pt_email`,`pt_dob`,`pt_bloodgroup`,`pt_height`,`pt_weight`,`pt_address`,`pt_city`,`pt_state`,`pt_country`,`pt_telephone`,`pt_mobile`) values (1,50,'Prakash patient','arulmani','1','prakash@gmail.com','1990-07-31','1',127,60,NULL,5,1,1,NULL,'9566699580');

/*Table structure for table `hme_pharmacist_profile` */

DROP TABLE IF EXISTS `hme_pharmacist_profile`;

CREATE TABLE `hme_pharmacist_profile` (
  `phr_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(9) NOT NULL,
  `phr_first_name` varchar(100) NOT NULL,
  `phr_last_name` varchar(100) DEFAULT NULL,
  `phr_dob` date NOT NULL,
  `phr_designation` varchar(255) NOT NULL,
  `phr_about` text,
  `phr_address_1` text NOT NULL,
  `phr_address_2` text,
  `phr_city` mediumint(9) NOT NULL,
  `phr_state` mediumint(9) NOT NULL,
  `phr_country` mediumint(9) NOT NULL,
  `phr_phone` varchar(100) DEFAULT NULL,
  `phr_mobile` varchar(100) NOT NULL,
  PRIMARY KEY (`phr_id`),
  KEY `FK_hme_pharmacist_profile_user` (`user_id`),
  KEY `FK_hme_pharmacist_profile_city` (`phr_city`),
  KEY `FK_hme_pharmacist_profile_state` (`phr_state`),
  KEY `FK_hme_pharmacist_profile_country` (`phr_country`),
  CONSTRAINT `FK_hme_pharmacist_profile_city` FOREIGN KEY (`phr_city`) REFERENCES `hme_cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_pharmacist_profile_country` FOREIGN KEY (`phr_country`) REFERENCES `hme_countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_pharmacist_profile_state` FOREIGN KEY (`phr_state`) REFERENCES `hme_states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_hme_pharmacist_profile_user` FOREIGN KEY (`user_id`) REFERENCES `hme_users` (`ur_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hme_pharmacist_profile` */

insert  into `hme_pharmacist_profile`(`phr_id`,`user_id`,`phr_first_name`,`phr_last_name`,`phr_dob`,`phr_designation`,`phr_about`,`phr_address_1`,`phr_address_2`,`phr_city`,`phr_state`,`phr_country`,`phr_phone`,`phr_mobile`) values (1,49,'Nadesh','nadesh','2000-11-25','Test','','Test','',1,1,1,'','123456');

/*Table structure for table `hme_purchase_order` */

DROP TABLE IF EXISTS `hme_purchase_order`;

CREATE TABLE `hme_purchase_order` (
  `tenant` mediumint(9) NOT NULL,
  `po_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `po_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `po_vendor` mediumint(9) NOT NULL,
  `po_invoice` varchar(100) NOT NULL,
  `po_memo` text,
  `po_total` decimal(10,2) NOT NULL,
  `po_paid` decimal(10,2) DEFAULT NULL,
  `po_status` enum('0','1','2') NOT NULL DEFAULT '1',
  `po_created_by` mediumint(9) NOT NULL,
  PRIMARY KEY (`po_id`),
  KEY `FK_hme_purchase_order_vendor` (`po_vendor`),
  KEY `FK_hme_purchase_order_tenant` (`tenant`),
  KEY `FK_hme_purchase_order_created_by` (`po_created_by`),
  CONSTRAINT `FK_hme_purchase_order_created_by` FOREIGN KEY (`po_created_by`) REFERENCES `hme_users` (`ur_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_vendor` FOREIGN KEY (`po_vendor`) REFERENCES `hme_vendors` (`ven_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `hme_purchase_order` */

insert  into `hme_purchase_order`(`tenant`,`po_id`,`po_date`,`po_vendor`,`po_invoice`,`po_memo`,`po_total`,`po_paid`,`po_status`,`po_created_by`) values (1,33,'2014-12-02 00:00:00',1,'00001','Memo one','3835.00','500.00','1',1),(1,37,'2014-12-05 00:00:00',2,'Opening Stock',NULL,'0.00',NULL,'1',1),(1,38,'2014-12-06 00:00:00',1,'00002','','300.00','0.00','1',1);

/*Table structure for table `hme_purchase_order_medicines` */

DROP TABLE IF EXISTS `hme_purchase_order_medicines`;

CREATE TABLE `hme_purchase_order_medicines` (
  `itm_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `itm_po_id` mediumint(9) NOT NULL,
  `itm_med_id` mediumint(9) NOT NULL,
  `itm_pkg_id` mediumint(9) NOT NULL,
  `itm_batch_no` varchar(150) NOT NULL,
  `itm_manf_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `itm_exp_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `itm_vat_tax` decimal(10,2) DEFAULT NULL,
  `itm_mrp_price` decimal(10,2) DEFAULT NULL,
  `itm_discount` decimal(10,2) DEFAULT NULL,
  `itm_net_rate` decimal(10,2) DEFAULT NULL,
  `itm_qty` tinyint(4) NOT NULL,
  `itm_total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`itm_id`),
  KEY `FK_hme_purchase_order_medicines_porder` (`itm_po_id`),
  KEY `FK_hme_purchase_order_medicines_medicine` (`itm_med_id`),
  KEY `FK_hme_purchase_order_medicines_medpackage` (`itm_pkg_id`),
  CONSTRAINT `FK_hme_purchase_order_medicines_medicine` FOREIGN KEY (`itm_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_medicines_medpackage` FOREIGN KEY (`itm_pkg_id`) REFERENCES `hme_medicine_pkg` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_purchase_order_medicines_porder` FOREIGN KEY (`itm_po_id`) REFERENCES `hme_purchase_order` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `hme_purchase_order_medicines` */

insert  into `hme_purchase_order_medicines`(`itm_id`,`itm_po_id`,`itm_med_id`,`itm_pkg_id`,`itm_batch_no`,`itm_manf_date`,`itm_exp_date`,`itm_vat_tax`,`itm_mrp_price`,`itm_discount`,`itm_net_rate`,`itm_qty`,`itm_total_price`) values (51,33,8,17,'TEST0001','2014-08-08 00:00:00','2020-08-08 00:00:00','5.00','50.00','5.00','47.50',50,'2375.00'),(52,33,8,17,'TEST0002','2014-01-29 00:00:00','2020-08-12 00:00:00','5.00','20.00','30.00','14.00',100,'1400.00'),(53,33,9,18,'TEST0005','2014-12-05 00:00:00','2014-12-05 00:00:00','5.00','10.00','0.00','10.00',6,'60.00'),(63,37,8,17,'TEST0005','2014-12-05 00:00:00','2014-12-05 00:00:00','0.00','10.00','0.00','10.00',5,'50.00'),(64,37,10,19,'TEST0008','2014-12-06 00:00:00','2014-12-06 00:00:00','0.00','5.00','0.00','5.00',60,'300.00'),(65,38,8,17,'TEST0008','2014-12-06 00:00:00','2014-12-06 00:00:00','0.00','60.00','0.00','60.00',5,'300.00');

/*Table structure for table `hme_sales_order` */

DROP TABLE IF EXISTS `hme_sales_order`;

CREATE TABLE `hme_sales_order` (
  `tenant` mediumint(9) NOT NULL,
  `so_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `so_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1 => Retailer(Patient), 2=> Wholesale(Other homeo centre)',
  `so_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `so_user` mediumint(9) DEFAULT NULL COMMENT 'If SO Type is 1 => refer user tbl, else refer vendor tbl',
  `so_doctor` mediumint(9) DEFAULT NULL,
  `so_memo` text,
  `so_total` decimal(10,2) NOT NULL,
  `so_paid` decimal(10,2) DEFAULT NULL,
  `so_status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`so_id`),
  KEY `FK_hme_sales_order_tenant` (`tenant`),
  CONSTRAINT `FK_hme_sales_order_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hme_sales_order` */

insert  into `hme_sales_order`(`tenant`,`so_id`,`so_type`,`so_date`,`so_user`,`so_doctor`,`so_memo`,`so_total`,`so_paid`,`so_status`) values (1,1,'1','2014-12-03 00:00:00',50,46,'Memo','1000.00','500.00','0'),(1,2,'2','2014-12-03 00:00:00',NULL,NULL,'','1000.00','1000.00','1');

/*Table structure for table `hme_sales_order_medicines` */

DROP TABLE IF EXISTS `hme_sales_order_medicines`;

CREATE TABLE `hme_sales_order_medicines` (
  `itm_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `itm_so_id` mediumint(9) NOT NULL COMMENT 'Relatrion to sales_order',
  `itm_med_id` mediumint(9) NOT NULL COMMENT 'Relatrion to medicines',
  `itm_pkg_id` mediumint(9) NOT NULL COMMENT 'Relatrion to med_package',
  `itm_batch_no` varchar(150) NOT NULL,
  `itm_vat_tax` decimal(10,2) DEFAULT NULL,
  `itm_mrp_price` decimal(10,2) DEFAULT NULL,
  `itm_discount` decimal(10,2) DEFAULT NULL,
  `itm_net_rate` decimal(10,2) DEFAULT NULL,
  `itm_qty` tinyint(4) NOT NULL,
  `itm_total_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`itm_id`),
  KEY `FK_hme_sales_order_medicines_sorder` (`itm_so_id`),
  KEY `FK_hme_sales_order_medicines_medicine` (`itm_med_id`),
  KEY `FK_hme_sales_order_medicines_medpackage` (`itm_pkg_id`),
  CONSTRAINT `FK_hme_sales_order_medicines_medicine` FOREIGN KEY (`itm_med_id`) REFERENCES `hme_medicines` (`med_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_sales_order_medicines_medpackage` FOREIGN KEY (`itm_pkg_id`) REFERENCES `hme_medicine_pkg` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_sales_order_medicines_sorder` FOREIGN KEY (`itm_so_id`) REFERENCES `hme_sales_order` (`so_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `hme_sales_order_medicines` */

insert  into `hme_sales_order_medicines`(`itm_id`,`itm_so_id`,`itm_med_id`,`itm_pkg_id`,`itm_batch_no`,`itm_vat_tax`,`itm_mrp_price`,`itm_discount`,`itm_net_rate`,`itm_qty`,`itm_total_price`) values (1,1,8,17,'TEST0001','5.00','50.00','5.00','47.50',5,'237.50'),(2,1,8,17,'TEST0002','5.00','20.00','30.00','14.00',5,'70.00'),(3,2,8,17,'TEST0001','5.00','50.00','5.00','47.50',20,'950.00');

/*Table structure for table `hme_states` */

DROP TABLE IF EXISTS `hme_states`;

CREATE TABLE `hme_states` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `country_id` mediumint(9) NOT NULL,
  `state` varchar(200) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `hme_states` */

insert  into `hme_states`(`id`,`country_id`,`state`,`status`) values (1,1,'Tamilnadu','1'),(2,1,'Kerala','1'),(3,1,'Andaman and Nicobar','1'),(4,1,'Andra Pradesh','1'),(5,1,'Arunachal Pradesh\r\n','1'),(6,1,'Assam','1'),(7,1,'Bihar','1'),(8,1,'Chhattisgarh','1'),(9,1,'Daman and Diu','1'),(10,1,'Delhi','1'),(11,1,'Goa','1'),(12,1,'Gujarat','1'),(13,1,'Haryana','1'),(14,1,'Himachal Pradesh','1'),(15,1,'Jammu and Kashmir','1'),(16,1,'Jharkand','1'),(17,1,'Karnataka','1'),(18,1,'Madhya Pradesh','1'),(19,1,'Maharashtra','1'),(20,1,'Manipur','1'),(21,1,'Meghalaya','1'),(22,1,'Mizoram','1'),(23,1,'Nagaland','1'),(24,1,'Orissa','1'),(25,1,'Puducherry','1'),(26,1,'Punjab','1'),(27,1,'Rajasthan','1'),(28,1,'Sikkim','1'),(29,1,'Tripura','1'),(30,1,'Uttarakhand','1'),(31,1,'Uttar Pradesh','1'),(32,1,'West Bengal','1');

/*Table structure for table `hme_tenants` */

DROP TABLE IF EXISTS `hme_tenants`;

CREATE TABLE `hme_tenants` (
  `tn_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tn_hospital_name` varchar(150) NOT NULL,
  `tn_address_one` varchar(255) NOT NULL,
  `tn_address_two` varchar(255) NOT NULL,
  `tn_address_three` varchar(255) DEFAULT NULL,
  `tn_city` mediumint(9) DEFAULT NULL,
  `tn_state` mediumint(9) DEFAULT NULL,
  `tn_country` mediumint(9) DEFAULT NULL,
  `tn_website` varchar(100) DEFAULT NULL,
  `tn_email` varchar(100) DEFAULT NULL,
  `tn_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tn_created_by` mediumint(9) DEFAULT NULL,
  `tn_status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`tn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hme_tenants` */

insert  into `hme_tenants`(`tn_id`,`tn_hospital_name`,`tn_address_one`,`tn_address_two`,`tn_address_three`,`tn_city`,`tn_state`,`tn_country`,`tn_website`,`tn_email`,`tn_created_at`,`tn_created_by`,`tn_status`) values (1,'Abraham Homeo Clinic','Sample Address','Sample Address','Sample Address',0,0,0,'Website','Email','2014-11-14 19:50:18',0,'1'),(2,'Test','test','test','test',0,0,0,'web','email','2014-12-05 13:48:54',0,'1');

/*Table structure for table `hme_user_role` */

DROP TABLE IF EXISTS `hme_user_role`;

CREATE TABLE `hme_user_role` (
  `urole_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `urole_name` varchar(150) NOT NULL,
  `urole_status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`urole_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `hme_user_role` */

insert  into `hme_user_role`(`urole_id`,`urole_name`,`urole_status`) values (8,'Patient','1'),(9,'Doctor','1'),(10,'Pharmacist','1'),(11,'Admin','1');

/*Table structure for table `hme_users` */

DROP TABLE IF EXISTS `hme_users`;

CREATE TABLE `hme_users` (
  `tenant` mediumint(9) NOT NULL COMMENT 'Users amongst which tenant id, refers hme_tenants table PK',
  `ur_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `ur_role_id` mediumint(9) NOT NULL COMMENT 'User role id, refers hme_user_role table PK',
  `ur_username` varchar(100) NOT NULL,
  `ur_password` varchar(255) NOT NULL,
  `ur_activation_key` varchar(100) DEFAULT NULL,
  `ur_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ur_modified_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ur_last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ur_last_ip` varchar(50) DEFAULT NULL,
  `ur_status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`ur_id`),
  KEY `FK_hme_users_role` (`ur_role_id`),
  KEY `FK_hme_users_tenant` (`tenant`),
  CONSTRAINT `FK_hme_users_role` FOREIGN KEY (`ur_role_id`) REFERENCES `hme_user_role` (`urole_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_hme_users_tenant` FOREIGN KEY (`tenant`) REFERENCES `hme_tenants` (`tn_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `hme_users` */

insert  into `hme_users`(`tenant`,`ur_id`,`ur_role_id`,`ur_username`,`ur_password`,`ur_activation_key`,`ur_created_at`,`ur_modified_at`,`ur_last_login`,`ur_last_ip`,`ur_status`) values (1,1,11,'hadmin','b3122934150f9c276fedf3ade4801c0944fe54ed1b52402f664ac2f2ad6a5b087e7157bbbc30357e6f184534139e941cf8184762965f689ebee8f6e3806a48bc',NULL,'2014-11-17 12:47:34','2014-12-06 16:33:56','2014-12-06 16:33:48','::1','1'),(1,46,9,'stan','b3122934150f9c276fedf3ade4801c0944fe54ed1b52402f664ac2f2ad6a5b087e7157bbbc30357e6f184534139e941cf8184762965f689ebee8f6e3806a48bc',NULL,'2014-11-19 11:09:47','2014-12-06 17:38:35','0000-00-00 00:00:00',NULL,'1'),(1,49,10,'nadesh2','263fec58861449aacc1c328a4aff64aff4c62df4a2d50b3f207fa89b6e242c9aa778e7a8baeffef85b6ca6d2e7dc16ff0a760d59c13c238f6bcdc32f8ce9cc62',NULL,'2014-11-25 16:40:41','2014-12-06 17:33:51','0000-00-00 00:00:00',NULL,'1'),(1,50,8,'prakasharulmani','admin',NULL,'2014-12-01 18:02:45','2014-12-06 17:33:35','0000-00-00 00:00:00',NULL,'1'),(1,53,9,'prakash','cef4817824cea8cf2bb83fa3f1e81b3f8aaf4be19ad563264e36102c0c1f87204fb66bc1e5a20698ab3692c985b861dcdbaa58f13dca5af0d55c1ffb9e90f5b2',NULL,'2014-12-06 17:59:26','2014-12-06 17:59:26','0000-00-00 00:00:00',NULL,'1'),(2,54,11,'hadmin','adasdsa',NULL,'2014-12-06 18:01:35','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'0'),(1,55,9,'rajesh','3f2408466b45ddc6d4f0c6ce4d9f725750a455aac559fcd4dbd641a56c70652b248e6c61dff02829a53996e092cfd7c86555e36dfe765ef4c08ec33f501c686a',NULL,'2014-12-06 18:02:04','2014-12-06 18:02:04','0000-00-00 00:00:00',NULL,'1');

/*Table structure for table `hme_vendors` */

DROP TABLE IF EXISTS `hme_vendors`;

CREATE TABLE `hme_vendors` (
  `tenant` mediumint(9) NOT NULL,
  `ven_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `ven_name` varchar(255) NOT NULL,
  `ven_address` text,
  `ven_phone_no` varchar(150) DEFAULT NULL,
  `ven_email` varchar(150) DEFAULT NULL,
  `ven_status` enum('0','1') NOT NULL DEFAULT '1',
  `ven_created_by` mediumint(9) NOT NULL,
  `ven_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `self_user_id` mediumint(9) DEFAULT NULL COMMENT 'Its belongs to Admin',
  PRIMARY KEY (`ven_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `hme_vendors` */

insert  into `hme_vendors`(`tenant`,`ven_id`,`ven_name`,`ven_address`,`ven_phone_no`,`ven_email`,`ven_status`,`ven_created_by`,`ven_created_at`,`self_user_id`) values (1,1,'Supplier 1','1 Ahimshapuram 5th street,\r\nSellur,\r\nMadurai','9566699580','prakash.paramanandam@arkinfotec.com','1',1,'2014-12-06 12:24:42',NULL),(1,2,'hadmin',NULL,NULL,NULL,'1',1,'2014-12-05 13:57:55',1),(2,5,'hadmin',NULL,NULL,NULL,'1',54,'2014-12-06 18:01:35',54);

/* Trigger structure for table `hme_purchase_order` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_purchase_order_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_purchase_order_delete` BEFORE DELETE ON `hme_purchase_order` FOR EACH ROW BEGIN
	DELETE FROM hme_purchase_order_medicines
	WHERE itm_po_id = old.po_id;
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_purchase_order_medicines` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_purchase_order_medicines_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_purchase_order_medicines_insert` AFTER INSERT ON `hme_purchase_order_medicines` FOR EACH ROW BEGIN

	DECLARE v_count INT;
	DECLARE v_tenant INT;
	
	SET v_tenant = (SELECT tenant 
			FROM hme_purchase_order
			WHERE po_id = new.itm_po_id);
			
	SET v_count = (SELECT COUNT(*) 
			FROM hme_med_stock
			WHERE tenant = v_tenant
			AND stk_med_id = new.itm_med_id
			AND stk_pkg_id = new.itm_pkg_id
			AND stk_batch_no = new.itm_batch_no
			);
	
	/** Insert a new row when no record was not found **/		
	IF v_count = 0	THEN
		INSERT INTO hme_med_stock(tenant, stk_med_id, stk_pkg_id, stk_batch_no, stk_avail_units, stk_debit_units)
		VALUES (v_tenant, new.itm_med_id, new.itm_pkg_id, new.itm_batch_no, new.itm_qty,0);
	ELSE
	/** update stock **/		
		UPDATE hme_med_stock
		SET stk_avail_units = (stk_avail_units + new.itm_qty)
		WHERE stk_med_id = new.itm_med_id
		AND stk_pkg_id = new.itm_pkg_id
		AND stk_batch_no = new.itm_batch_no;
	END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_purchase_order_medicines` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_purchase_order_medicines_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_purchase_order_medicines_update` BEFORE UPDATE ON `hme_purchase_order_medicines` FOR EACH ROW BEGIN
	DECLARE v_count INT;
	DECLARE v_tenant INT;
	DECLARE v_stk_id INT;
	DECLARE v_old_avail_units INT;
	DECLARE v_new_avail_units INT;
	
	SET v_tenant = (SELECT tenant 
			FROM hme_purchase_order
			WHERE po_id = new.itm_po_id);
			
	SET v_count = (SELECT COUNT(*) 
			FROM hme_med_stock
			WHERE tenant = v_tenant
			AND stk_med_id = new.itm_med_id
			AND stk_pkg_id = new.itm_pkg_id
			AND stk_batch_no = new.itm_batch_no
			);
			
	/** Insert a new row when no record was not found **/	
	IF v_count = 0	THEN
		INSERT INTO hme_med_stock(tenant, stk_med_id, stk_pkg_id, stk_batch_no, stk_avail_units, stk_debit_units)
		VALUES (v_tenant, new.itm_med_id, new.itm_pkg_id, new.itm_batch_no, new.itm_qty,0);
	/** update stock **/
	ELSE
		SET v_stk_id =  (SELECT stk_id
				FROM hme_med_stock
				WHERE tenant = v_tenant
				AND stk_med_id = new.itm_med_id
				AND stk_pkg_id = new.itm_pkg_id
				AND stk_batch_no = new.itm_batch_no
				LIMIT 1
				);
				
		SET v_old_avail_units = (SELECT stk_avail_units FROM hme_med_stock WHERE stk_id = v_stk_id);
		SET v_new_avail_units = (SELECT stk_avail_units FROM hme_med_stock WHERE stk_id = v_stk_id);
		
		/** if medicine or package or batch no changed - increase stock by new itm qty*/
		IF old.itm_med_id != new.itm_med_id OR old.itm_pkg_id != new.itm_pkg_id OR old.itm_batch_no != new.itm_batch_no THEN
			SET v_new_avail_units = (v_old_avail_units + new.itm_qty);
		ELSE
			IF old.itm_qty < new.itm_qty THEN
				SET v_new_avail_units = (v_old_avail_units) + (new.itm_qty - old.itm_qty);
			ELSEIF old.itm_qty > new.itm_qty THEN
				SET v_new_avail_units = (v_old_avail_units) - (old.itm_qty - new.itm_qty);
			END IF;
			
		END IF;
		
		IF v_old_avail_units != v_new_avail_units THEN
			UPDATE hme_med_stock
			SET stk_avail_units = v_new_avail_units
			WHERE stk_id = v_stk_id;
		END IF;
	END IF;
    
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_purchase_order_medicines` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_purchase_order_medicines_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_purchase_order_medicines_delete` AFTER DELETE ON `hme_purchase_order_medicines` FOR EACH ROW BEGIN
	DECLARE v_tenant INT;
	
	SET v_tenant = (SELECT tenant 
			FROM hme_purchase_order
			WHERE po_id = old.itm_po_id);
			
				
	UPDATE hme_med_stock
	SET stk_avail_units = stk_avail_units - old.itm_qty
	WHERE tenant = v_tenant
	AND stk_med_id = old.itm_med_id
	AND stk_pkg_id = old.itm_pkg_id
	AND stk_batch_no = old.itm_batch_no
	LIMIT 1;    
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_sales_order` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_sales_order_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_sales_order_delete` BEFORE DELETE ON `hme_sales_order` FOR EACH ROW BEGIN
	DELETE FROM hme_sales_order_medicines
	WHERE itm_so_id = old.so_id;
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_sales_order_medicines` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_sales_order_medicines_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_sales_order_medicines_insert` AFTER INSERT ON `hme_sales_order_medicines` FOR EACH ROW BEGIN
	DECLARE v_tenant INT;
	
	SET v_tenant = (SELECT tenant 
			FROM hme_sales_order
			WHERE so_id = new.itm_so_id);
	
	
	update hme_med_stock
	set stk_avail_units = (stk_avail_units - new.itm_qty)
	where tenant = v_tenant
	and stk_med_id = new.itm_med_id
	and stk_pkg_id = new.itm_pkg_id
	and stk_batch_no = new.itm_batch_no;
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_sales_order_medicines` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_sales_order_medicines_update` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_sales_order_medicines_update` AFTER UPDATE ON `hme_sales_order_medicines` FOR EACH ROW BEGIN
	DECLARE v_tenant INT;
	DECLARE v_stk_id INT;
	DECLARE v_old_avail_units INT;
	DECLARE v_new_avail_units INT;
	
	SET v_tenant = (SELECT tenant 
			FROM hme_sales_order
			WHERE so_id = new.itm_so_id);
			
	SET v_stk_id =  (SELECT stk_id
				FROM hme_med_stock
				WHERE tenant = v_tenant
				AND stk_med_id = new.itm_med_id
				AND stk_pkg_id = new.itm_pkg_id
				AND stk_batch_no = new.itm_batch_no
				LIMIT 1
				);
				
	SET v_old_avail_units = (SELECT stk_avail_units FROM hme_med_stock WHERE stk_id = v_stk_id);
	SET v_new_avail_units = (SELECT stk_avail_units FROM hme_med_stock WHERE stk_id = v_stk_id);
				
	IF old.itm_med_id != new.itm_med_id OR old.itm_pkg_id != new.itm_pkg_id OR old.itm_batch_no != new.itm_batch_no THEN
		SET v_new_avail_units = (v_old_avail_units - new.itm_qty);
	else
		IF old.itm_qty < new.itm_qty THEN
			SET v_new_avail_units = (v_old_avail_units) - (new.itm_qty - old.itm_qty);
		ELSEIF old.itm_qty > new.itm_qty THEN
			SET v_new_avail_units = (v_old_avail_units) + (old.itm_qty - new.itm_qty);
		END IF;
	end if;
	
	IF v_old_avail_units != v_new_avail_units THEN
		UPDATE hme_med_stock
		SET stk_avail_units = v_new_avail_units
		WHERE stk_id = v_stk_id;
	END IF;
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_sales_order_medicines` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_sales_order_medicines_delete` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_sales_order_medicines_delete` AFTER DELETE ON `hme_sales_order_medicines` FOR EACH ROW BEGIN
	DECLARE v_tenant INT;
	
	SET v_tenant = (SELECT tenant 
			FROM hme_sales_order
			WHERE so_id = old.itm_so_id);
			
				
	UPDATE hme_med_stock
	SET stk_avail_units = stk_avail_units + old.itm_qty
	WHERE tenant = v_tenant
	AND stk_med_id = old.itm_med_id
	AND stk_pkg_id = old.itm_pkg_id
	AND stk_batch_no = old.itm_batch_no
	LIMIT 1;
    END */$$


DELIMITER ;

/* Trigger structure for table `hme_users` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hme_users_insert` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hme_users_insert` AFTER INSERT ON `hme_users` FOR EACH ROW BEGIN
	
	if new.ur_role_id = 11 then
		insert into hme_vendors(tenant, ven_name, ven_created_by, self_user_id)
		values (new.tenant, new.ur_username, new.ur_id, new.ur_id);
	end if;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
