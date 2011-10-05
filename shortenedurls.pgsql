-- 
-- Table structure for table `shortenedurls`
-- 

-- instead the sequence we could use SERIAL data type, but that's a macro around 
-- sequences and imo this way it's easier to now what's going on

CREATE SEQUENCE s_shortenedurls_ids;
CREATE TABLE shortenedurls (
  id int default nextval('s_shortenedurls_ids') NOT NULL primary key,
  long_url varchar NOT NULL unique,
  created bigint NOT NULL,
  creator char(15) NOT NULL,
  referrals bigint NOT NULL default 0
);
CREATE INDEX referrals ON shortenedurls (referrals);
