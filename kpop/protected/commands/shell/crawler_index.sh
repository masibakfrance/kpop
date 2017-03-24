#!/usr/bin/env bash
SCRIPT=`readlink -f $0`
SCRIPTPATH=`dirname $SCRIPT`

count=`ps axu | grep crawler_index.sh | grep -v "grep" |wc -l`
if [ $count -ge 3  ] ; then
    echo "Service is running"
    /bin/ps -ef |grep "/var/www/kpop/kpop/kpop/crawler/crawl_url.js" |grep -v grep |awk '{print$2}' |xargs kill >/dev/null 2>&1
    echo "Service to be killed"
    exit 1
fi
cd /var/www/kpop/kpop/kpop/crawler
node crawl_url.js