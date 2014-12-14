#!/bin/sh
echo "Start"
cd /var/www/deploy.3manaties.com/cache && git clone https://github.com/antonio-valdez-arce/odsamegorana.git && cd /var/www/deploy.3manaties.com/cache/odsamegorana/src-jekyll/ 
cd /var/www/deploy.3manaties.com/cache/odsamegorana/src-jekyll/ 
jekyll build --destination /var/www/odsamegorana.3manaties.com/public_html 
rm -r /var/www/deploy.3manaties.com/cache/odsamegorana/ 
echo "End"
