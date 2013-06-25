-- sponsee_listing view

create view sponsee_listing as
select 
    s.*, year(now()) - year(s.birthdate) as age,
    sum(coalesce(sn.neededamount, 0)) as total_neededamount,
    sum(coalesce(sn.donatedamount, 0)) as total_donatedamount,
    coalesce(
      (sum(coalesce(sn.donatedamount, 0)) / sum(coalesce(sn.neededamount,0)) * 100)
    , 0) as percentage
from sponsees s
left join sponsee_needs sn on sn.sponsee_id = s.id
GROUP by s.id
